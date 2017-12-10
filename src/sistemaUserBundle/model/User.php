<?php

class User extends MasterBD {

    private $password;
    private $email;
    private $inscripcion;
    private $isActive;
    private $rol;
    private $datos;
    private $pedidos = array();

    function __construct() {
        $this->inscripcion = new DateTime();
    }

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

    public function getPedidos() {
        return $this->pedidos;
    }

    public function setPedidos($pedidos = array()) {
        $this->pedidos = $pedidos;
    }

    public function addPedido($pedido) {
        $this->pedidos[] = $pedido;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getInscripcion() {
        return $this->inscripcion;
    }

    private function setInscripcion() {
        $this->inscripcion = new DateTime();
    }

    public function getIsActive() {
        return $this->isActive;
    }

    private function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

}
