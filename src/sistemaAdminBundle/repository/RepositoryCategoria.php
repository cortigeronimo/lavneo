<?php

    class RepositoryCategoria extends Repository{
        function __construct(){
            $this->tabla = "categorias";
        }
        
        protected function convertDataToObject($informacion) {
            $categoria = new Categoria();
            $categoria->setId($informacion["id"]);
            $categoria->setNombre($informacion["nombre"]);
            $categoria->setPadre($informacion["padre"]);
            return $categoria;
        }
    }

