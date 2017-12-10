<?php

	class Direccionador{
		private $bundle;
		private $controlador;
		private $metodo;
                private $parametros = array();

		function __construct($bundle, $controlador, $metodo){
			$this->bundle = $bundle;
			$this->controlador = $controlador;
			$this->metodo = $metodo;
		}
                
                public function setBundle($bundle){
                    $this->bundle = $bundle;
                }
                
                public function setControlador($controlador){
                    $this->controlador = $controlador;
                }
                
                public function setMetodo($metodo){
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
                
                public function getParametros(){
                    return $this->parametros;
                }
                
                public function setParametros($parametros){
                    $this->parametros = $parametros;
                }
                
                public function addParametro($key, $value){
                    $this->parametros[$key] = $value;
                }
                
                public function cleanParametros(){
                    $this->parametros = array();
                }
	}