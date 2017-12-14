<?php

class RepositoryImpuestoBeneficio extends Repository {

    function __construct() {
        $this->tabla = "impuesto_beneficio";
    }
    
    public function tienePorcentajeString($porcentaje, $fijo) {
        return !isNullString($porcentaje) && isNullString($fijo);
    }

    public function tieneFijoString($fijo, $porcentaje) {
        return isNullString($porcentaje) && !isNullString($fijo);
    }

    protected function convertDataToObject($informacion) {
        $impuestoBeneficio = new ImpuestoBeneficio();
        $impuestoBeneficio->setId($informacion["id"]);
        $impuestoBeneficio->setNombre($informacion["nombre"]);
        if($this->tienePorcentajeString($informacion["porcentaje"], $informacion["fijo"])){
            $impuestoBeneficio->setPorcentaje($informacion["porcentaje"]);
        }
        else if ($this->tieneFijoString($informacion["fijo"], $informacion["porcentaje"])){
            $impuestoBeneficio->setFijo($informacion["fijo"]);
        }
        else{
            throw ExceptionInconsistenciaEnBaseDeDatos("Dentro de impuesto beneficio, el porcentaje y el fijo son los dos NULOS.");
        }
        $impuestoBeneficio->setImpuestoOBeneficio($informacion["imp_ben"]);
        
        return $impuestoBeneficio;
    }

    protected function generarValores($impuestoBeneficio) {
        $string = "(";
        $string = $string . "'" . $impuestoBeneficio->getNombre() . "'" . ", ";
        if (!$impuestoBeneficio->tienePorcentaje()) {
            $string = $string . "NULL" . ", ";
        } else {
            $string = $string . "'" . $impuestoBeneficio->getPorcentaje() . "'" . ", ";
        }
        if (!$impuestoBeneficio->tieneFijo()) {
            $string = $string . "NULL" . ", ";
        } else {
            $string = $string . "'" . $impuestoBeneficio->getFijo() . "'" . ", ";
        }
        $string = $string . $this->boolToString($impuestoBeneficio->getImpuestoOBeneficio);
        $string = $string . ")";
        return $string;
    }

    protected function generarValoresUpdate($impuestoBeneficio) {
        $string = "nombre=";
        $string = $string . "'" . $impuestoBeneficio->getNombre() . "'" . ", ";
        $string = $string . "porcentaje=";
        if (!$this->tienePorcentaje()) {
            $string = $string . "NULL" . ", ";
        } else {
            $string = $string . "'" . $impuestoBeneficio->getPorcentaje() . "'" . ", ";
        }
        $string = $string . "fijo=";
        if (!$this->tieneFijo()) {
            $string = $string . "NULL" . ", ";
        } else {
            $string = $string . "'" . $impuestoBeneficio->getFijo() . "'" . ", ";
        }
        $string = $string . "imp_ben=";
        $string = $string . $this->boolToString($impuestoBeneficio->getImpuestoOBeneficio);
        return $string;
    }

    protected function generarColumnas() {
        $string = "(";
        $string = $string . "nombre" . ", ";
        $string = $string . "porcentaje" . ", ";
        $string = $string . "fijo" . ", ";
        $string = $string . "imp_ben";
        $string = $string . ")";
        return $string;
    }

}
