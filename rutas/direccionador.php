<?php

	class Direccionador{
		private $bundle;
		private $controlador;
		private $metodo;

		function __construct( $bundle, $controlador, $metodo){
			$this->bundle = $bundle;
			$this->controlador = $controlador;
			$this->metodo = $metodo;
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
	}