<?php

    class repositorio {
        
        protected $tabla;
        
        public function getTabla(){
            return $this->tabla;
        }
        
        public function setTabla($nombre){
            $this->tabla = $nombre;
        }

        public function findAll() {
            $cn = conexion::conectar();
            $query = "SELECT * FROM " . $this->tabla . " ORDER BY nombre ASC";
            $resultado = $cn->query($query);
            $rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
            conexion::cerrar($cn);
            return $rows;
        }
        
        public function findById($id) {
            $cn = conexion::conectar();
            $query = "SELECT * FROM " . $this->tabla . " WHERE id = " . $id;
            $resultado = $cn->query($query);
            $rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
            conexion::cerrar($cn);
            return $rows;
        }

    }
