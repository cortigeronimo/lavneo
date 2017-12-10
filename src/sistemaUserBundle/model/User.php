<?php

class User extends MasterBD {

    private $password;
    private $email;
    private $inscripcion;
    private $isActive;
    private $rol;
    private $datos;
    private $pedidos = array();

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
