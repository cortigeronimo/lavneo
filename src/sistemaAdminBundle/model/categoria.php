<?php 

	class Categoria extends ConexionConMysql{

		private $nombre;
		CONST TABLA = "categorias";

		function __contruct(){
			$this->tabla = "categorias";
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
	}