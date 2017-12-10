<?php

class Pedido extends MasterBD {

    private $fecha;
    private $hora;
    private $estado;
    private $items = array();
    
    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getItems() {
        return $this->items;
    }

    public function setFecha() {
        $this->fecha = new DateTime();
    }

    public function setHora() {
        $this->hora = new DateTime();
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setItems($items) {
        $this->items = $items;
    }
    
    public function addItem($item) {
        $this->items = $item;
    }

}
