<?php 

	class Rol extends ConexionConMysql{

		private $nombre;
		CONST TABLA = "roles";

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
	}