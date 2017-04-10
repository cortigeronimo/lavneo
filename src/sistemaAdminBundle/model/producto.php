<?php

	class Producto{

		private $codigo;
		private $nombre;
		private $descripcion;
		private $precio;
		private $imagen;
		CONST TABLA = "productos";

		public function crearTabla(){
			$cn = conexion::conectar();
			$query = 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
			SET time_zone = "+00:00";
			CREATE TABLE `productos` (
			`codigo` bigint(20) NOT NULL,
			`nombre` varchar(80) NOT NULL,
			`descripcion` mediumtext NOT NULL,
			`precio` double NOT NULL,
			`imagen` varchar(100) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
			ALTER TABLE `productos` ADD UNIQUE KEY `codigo` (`codigo`);
	  		ALTER TABLE `productos` MODIFY `codigo` bigint(20) NOT NULL AUTO_INCREMENT;';
  			$resultado = $cn->query($query);

		}

		public function subir($nombre, $descripcion, $precio, $imagen){

			$cn = conexion::conectar();
			$this->codigo = rand(0,1000);
			$query = "SELECT codigo FROM ".self::TABLA."WHERE codigo = ".$this->codigo;
			
			while($resultado = $cn->query($query)){
				$this->codigo = rand(0,1000);
			}

			$this->nombre = $nombre;
			$this->descripcion = $descripcion;
			$this->precio = $precio;
			$this->imagen = $imagen;

			$query = "INSERT INTO ".self::TABLA." (codigo,nombre,descripcion,precio,imagen) VALUES ('".$this->codigo."','".$this->nombre."','".$this->descripcion."', '".$this->precio."', '".$this->imagen."') ";
			$resultado = $cn->query($query);
			conexion::cerrar($cn);
			return $resultado;
		}

		public function eliminar(){

		}

		public function modificar(){

		}

		public function buscarPorCodigo($codigo){
			$cn = conexion::conectar();
			$query = "SELECT * FROM ".self::TABLA." WHERE codigo = ".$codigo;
			$resultado = $cn->query($query);
			$rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
			conexion::cerrar($cn);
			return $rows;
		}

		public function buscarPorNombre($nombre){
			$cn = conexion::conectar();
			$query = "SELECT * FROM ".self::TABLA." WHERE nombre = ".$nombre;
			$resultado = $cn->query($query);
			$rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
			conexion::cerrar($cn);
			return $rows;
		}

		public function buscarTodos(){
			$cn = conexion::conectar();
			$rows = array();
			$query = "SELECT * FROM ".self::TABLA." ORDER BY nombre ASC";
			$resultado = $cn->query($query);
			$rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
			conexion::cerrar($cn);
			return $rows;
		}


	}