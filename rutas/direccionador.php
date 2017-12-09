<?php

	class Direccionador{
		private $bundle;
		private $controlador;
		private $metodo;
		private $cantidadDeParametros;

		function __construct( $bundle, $controlador, $metodo, $cantidadDeParametros){
			$this->bundle = $bundle;
			$this->controlador = $controlador;
			$this->metodo = $metodo;
			$this->cantidadDeParametros = $cantidadDeParametros;
		}

		public function getBundle(){
			return $this->bundle;
		}

		public function getControlador(){
			return $this->controlador;
		}

		public function getMetodo(){
			return $this->metodo;
		}

		public function getCantidadDeParametro(){
			return $this->cantidadDeParametros;
		}
	}