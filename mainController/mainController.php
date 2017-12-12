<?php

require_once APP_RUTA . "clases/clasesMadre/masterBD.php";
require_once APP_RUTA . "clases/clasesMadre/Repository.php";

require_once APP_RUTA . "clases/controlador/email.php";
require_once APP_RUTA . "clases/controlador/redireccionar.php";
require_once APP_RUTA . "clases/controlador/regex.php";
require_once APP_RUTA . "clases/controlador/sesiones.php";

require_once APP_RUTA . "clases/herramientas/herramientasParaMysql.php";

require_once APP_RUTA . "clases/vista/vista.php";
require_once APP_RUTA . "clases/vista/assets.php";

require_once APP_RUTA . "excepciones/excepciones.php";
require_once RUTA . "rutas.php";

class mainController {

    private $_controladores = array();

    public function setControllers($controladores) {
        $this->_controladores = $controladores;
    }

    public function getControllers() {
        return $this->_controladores;
    }

    public function run() {
        $uri = isset($_GET["uri"]) ? "/" . $_GET["uri"] : "/";
        $direccionador = $this->obtenerDireccionador($uri);

        $this->getController($direccionador->getBundle(), $direccionador->getControlador(), $direccionador->getMetodo(), $direccionador->getParametros());
    }

    public function obtenerDireccionador($uri) {
        foreach ($this->_controladores as $key => $value) {
            if ($this->matchea($uri, $key, $value)) {
                echo "Matchee";
                return $value;
            }
            echo "No Matchee";
        }
        
        echo "No pude matchear con ninguno";

        throw new Exception404();
    }

    public function matchea($uri, $router, $direccionador) {
        if(strcmp($uri, "/") == 0){
            return true;
        }
        $contadorArray = 1;
        $splitUri = explode("/", $uri);
        $splitRouter = explode("/", $router);
        $this->borrarEspaciosVaciosDeArray($splitUri);
        $this->borrarEspaciosVaciosDeArray($splitRouter);
        $longitudUri = count($splitUri);
        $longitudRouter = count($splitRouter);
        if ($longitudRouter != $longitudUri) {
            return false;
        }
        while ($contadorArray < $longitudUri) {
            if ($splitRouter[$contadorArray][0] == '{') {
                $sinLlaves = $this->quitarLlaves($splitRouter[$contadorArray]);
                $direccionador->addParametro($sinLlaves, $splitUri[$contadorArray]);
                echo "entre";
            } else if (strcmp($splitUri[$contadorArray], $splitRouter[$contadorArray]) != 0) {
                $direccionador->cleanParametros();
                return false;
            }
            $contadorArray++;
        }
        return true;
    }

    public function borrarEspaciosVaciosDeArray(&$array) {
        while (array_search("", $array) !== false) {
            $this->buscarElementoYEliminar("", $array);
        }
    }

    public function buscarElementoYEliminar($string, &$array) {
        $i = 0;
        while ($i < count($array)) {
            if ($array[$i] == $string) {
                array_splice($array, $i, 1);
                return;
            }
            $i++;
        }
    }

    public function quitarLlaves($stringConLlaves) {
        $sinUnaLlave = str_replace("{", "", $stringConLlaves);
        $sinDosLlaves = str_replace("}", "", $sinUnaLlave);
        return $sinDosLlaves;
    }

    public function getController($bundle, $controlador, $metodo, $parametros) {
        //llamamos al metodo que incluye al controlador del bundle
        $this->incluirControlador($bundle, $controlador);

        switch ($controlador) {
            case "adminController":
            case "userController":
                if (!Sesiones::estaLogeado()) {
                    return Vista::crear(MENSAJES . "error/accesoProhibido.php");
                }
                break;
        }

        $claseTemporal = new $controlador();

        if (!empty($parametros)) {

            $claseTemporal->$metodo($parametros);
        } else {

            $claseTemporal->$metodo();
        }
    }

    public function incluirControlador($bundle, $controlador) {
        //si el archivo existe
        $archivo = BUNDLES_RUTA . $bundle . "/" . "controllers" . "/" . $controlador . ".php";
        require_once $archivo;
    }

}
