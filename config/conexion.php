<?php

require_once CONFIG."config.php";

class conexion{

	public static function conectar(){

			$cn = new mysqli(HOST, USER, PASSWORD, DB);
			if($cn->connect_errno){
				throw new ExceptionConexion();
			}
			return $cn;
	}

	public static function cerrar($cn){
		$cn->close();
		return;
	}

}