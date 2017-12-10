<?php

class Item extends MasterBD{
    private $cantidad;
    private $producto;
    private $precioFinal;
    
    public function getCantidad() {
        return $this->cantidad;
    }

    public function getProducto() {
        return $this->producto;
    }

    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setProducto($producto) {
        $this->producto = $producto;
    }

    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }
    
}

