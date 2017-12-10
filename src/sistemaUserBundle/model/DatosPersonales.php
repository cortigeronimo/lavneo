<?php

class DatosPersonales extends MasterBD {

    private $nombreFacturacion;
    private $codigoPostal;
    private $calle;
    private $numero;
    private $aclaracion;
    private $telefono;
    private $telefonoOpcional;
    private $provincia;
    private $localidad;
    private $cuitOCuil;

    public function getNombreFacturacion() {
        return $this->nombreFacturacion;
    }

    public function getCodigoPostal() {
        return $this->codigoPostal;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getAclaracion() {
        return $this->aclaracion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getTelefonoOpcional() {
        return $this->telefonoOpcional;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getCuitOCuil() {
        return $this->cuitOCuil;
    }

    public function setNombreFacturacion($nombreFacturacion) {
        $this->nombreFacturacion = $nombreFacturacion;
    }

    public function setCodigoPostal($codigoPostal) {
        $this->codigoPostal = $codigoPostal;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setAclaracion($aclaracion) {
        $this->aclaracion = $aclaracion;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setTelefonoOpcional($telefonoOpcional) {
        $this->telefonoOpcional = $telefonoOpcional;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    public function setCuitOCuil($cuitOCuil) {
        $this->cuitOCuil = $cuitOCuil;
    }

}
