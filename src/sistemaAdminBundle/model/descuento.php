<?php

	class Descuento extends ConexionConMysql{

		private $nombre;
		private $porcentaje;
		private $aclaracion;
		CONST TABLA = "descuentos";

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getPorcentaje(){
			return $this->porcentaje;
		}

		public function setPorcentaje($porcentaje){
			$this->porcentaje = $porcentaje;
		}

		public function getAclaracion(){
			return $this->aclaracion;
		}

		public function setAclaracion($aclaracion){
			$this->aclaracion = $aclaracion;
		}
	}