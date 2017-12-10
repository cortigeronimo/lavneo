<?php

class RepositoryUser {

    public function insertar() {
        $cn = conexion::conectar();
        $query = "INSERT INTO " . self::TABLA . " (usuario,password) VALUES ('" . $this->usuario . "','" . $this->password . "','" . $this->email . "') ";
        $resultado = $cn->query($query);
        conexion::cerrar($cn);
        if ($resultado) {
            return $resultado;
        }
        throw ExceptionCrearUsuario();
    }

    public function eliminar() {
        
    }

    public function modificar() {
        
    }

    public function buscarElUsuario() {
        $cn = conexion::conectar();
        $query = "SELECT * FROM " . self::TABLA . " WHERE email = '" . $this->email . "' AND password = '" . $this->password . "'";
        $resultado = $cn->query($query);
        conexion::cerrar($cn);
        if ($resultado) {
            $usuario = HerramientasParaMysql::deObjetoSqlAObjeto($resultado);
            return $usuario;
        } else {
            return false;
        }
    }

    public function buscarPor($string, $valor) {
        $cn = conexion::conectar();
        $query = "SELECT * FROM " . self::TABLA . " WHERE " . $string . " = '" . $valor . "'";
        $resultado = $cn->query($query);
        conexion::cerrar($cn);
        if ($resultado) {
            $usuario = HerramientasParaMysql::deObjetoSqlAObjeto($resultado);
            return $usuario;
        } else {
            return false;
        }
    }

}
