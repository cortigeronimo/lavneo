<?php

    class repositorio {

        public function obtenerTodos() {
            $cn = conexion::conectar();
            $query = "SELECT * FROM " . self::TABLA . " ORDER BY nombre ASC";
            $resultado = $cn->query($query);
            $rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
            conexion::cerrar($cn);
            return $rows;
        }

    }
