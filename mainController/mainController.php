<?php
	
	require_once APP_RUTA."excepciones/excepciones.php";
	require_once APP_RUTA."clases/controlador/redireccionar.php";
	require_once APP_RUTA."clases/vista/vista.php";
	require_once APP_RUTA."clases/herramientas/herramientasParaMysql.php";
	require_once APP_RUTA."clases/controlador/email.php";
	require_once APP_RUTA."clases/vista/assets.php";
	require_once APP_RUTA."clases/controlador/sesiones.php";
	require_once APP_RUTA."clases/clasesMadre/conexionConMysql.php";
	require_once CONFIG."conexion.php";
	require_once RUTA."rutas.php";

	class mainController{

		private $_controladores = array();

		public function setControllers($controladores){
			$this->_controladores = $controladores;
		}

		public function run(){
			$uri = isset($_GET["uri"])? "/".$_GET["uri"]:"/";
			$direccionador = $this->buscarDireccionador($uri);

			if($direccionador->cantidadDeParametrs() == 0){
			$this->getController($direccionador->getBundle(),$direccionador->getControlador(),$direccionador->getMetodo(), NULL);
			}

			else{
				$parametros = $this->obtenerParametrosDeUnaRuta($uri, $direccionador->getCantidadDeParametros());
				$this->getController($direccionador->getBundle(),$direccionador->getControlador(),$direccionador->getMetodo(), $parametros);
			}

		}

		private function obtenerParametrosDeUnaRuta($uri, $cantidadDeParametros){
			$split = explode("/", $uri);
			$longitudArray = count($split);
			$posicionInicial = $longitudArray - $cantidadDeParametros;
			$parametros = array();
			while($posicionInicial < $longitudArray){
				$parametros[] = $split[$posicionInicial];
				$posicionInicial++;
			}

			return $parametros;
		}

		private function buscarDireccionador($string){
			foreach ($this->_controladores as $key => $value) {
				if(substr_count($string, $key) == 1 && subpos($string, $key) == 0){
					return $value;
				}
			}

			throw new Exception404();
			
		}

		public function getController($bundle,$controlador,$metodo, $parametros = null){
				//llamamos al metodo que incluye al controlador del bundle
				$this->incluirControlador($bundle,$controlador);

				switch($controlador){
					case "adminController":
					case "userController": 
						if(!Sesiones::estaLogeado()){
							return Vista::crear(MENSAJES."error/accesoProhibido.php");
						}
						break;
				}

				$claseTemporal = new $controlador();
						
						if(!empty($parametros)){
							
							$claseTemporal->$metodo($parametros);	
						}

						else{
							
							$claseTemporal->$metodo();	
						}

		}

		public function incluirControlador($bundle,$controlador){
			//si el archivo existe
			$archivo = BUNDLES_RUTA.$bundle."/"."controllers"."/".$controlador.".php";
			require_once $archivo;
		}
	}