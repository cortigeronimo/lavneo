<?php

class RepositoryCategoria extends Repository {
    
    function __construct() {
        $this->tabla = "categorias";
    }

    protected function convertDataToObject($informacion) {
        $categoria = new Categoria();
        $categoria->setId($informacion["id"]);
        $categoria->setNombre($informacion["nombre"]);
        $categoria->setPadre($informacion["padre"]);
        return $categoria;
    }

    protected function generarValores($categoria) {
        $string = "(";
        $string = $string . "'" . $categoria->getNombre() . "'" . ", ";
        if($categoria->getPadre() == "NULL"){
            $string = $string . $categoria->getPadre();
        }
        else{
            $string = $string . "'" . $categoria->getPadre()->getId() . "'";
        }
        $string = $string . ")";
        return $string;
    }

    protected function generarColumnas() {
        $string = "(";
        $string = $string . "nombre" . ", ";
        $string = $string . "padre";
        $string = $string . ")";
        return $string;
    }

}
