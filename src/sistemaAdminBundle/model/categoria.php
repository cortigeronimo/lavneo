<?php 

	class Categoria extends ConexionConMysql{

		private $nombre;
		CONST TABLA = "categorias";

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
	}