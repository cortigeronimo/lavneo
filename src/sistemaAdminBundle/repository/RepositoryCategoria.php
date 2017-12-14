<?php

class RepositoryCategoria extends Repository {
    
    function __construct() {
        $this->tabla = "categorias";
    }
    
    //posible recursividad
    protected function convertDataToObject($informacion) {
        $categoria = new Categoria();
        $categoria->setId($informacion["id"]);   
        $categoria->setNombre($informacion["nombre"]);
        $repositorioCategorias = new RepositoryCategoria();
        if($informacion["padre"] == "NULL"){
            $categoria->setPadre(NULL);
            return $categoria;
        }
        $categoriaPadre = $repositorioCategorias->findOneByColumn("id", $informacion["padre"]);
        $categoria->setPadre($categoriaPadre);
        return $categoria;
    }

    protected function generarValores($categoria) {
        $string = "(";
        $string = $string . "'" . $categoria->getNombre() . "'" . ", ";
        if($categoria->getPadre() == NULL){
            $string = $string . "NULL";
        }
        else{
            $string = $string . $categoria->getPadre()->getId();
        }
        $string = $string . ")";
        return $string;
    }
    
    protected function generarValoresUpdate($categoria) {
        $string = "nombre=";
        $string = $string . "'" . $categoria->getNombre() . "'" . ", ";
        $string = $string . "padre=";
        if($categoria->getPadre() == NULL){
            $string = $string . "NULL";
        }
        else{
            $string = $string . $categoria->getPadre()->getId();
        }
        return $string;
    }
    

    protected function generarColumnas() {
        $string = "(";
        $string = $string . "nombre" . ", ";
        $string = $string . "padre";
        $string = $string . ")";
        return $string;
    }
    
    public function interconectarCategorias(){
        
    }

}
