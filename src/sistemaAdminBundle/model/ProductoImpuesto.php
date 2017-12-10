<?php

class ProductoImpuesto extends MasterBD{
    private $impuestoBeneficio;

    public function getImpuesto() {
        return $this->impuestoBeneficio;
    }

    public function setImpuesto($impuesto) {
        $this->impuestoBeneficio = $impuesto;
    }


}

