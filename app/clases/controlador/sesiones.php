<?php

	class Sesiones{

		public static function estaLogeado(){
			
			return true;
		}

		public static function crearSesion($id, $usuario){
			session_start();

			$_SESSION['id']  = $id;
			$_SESSION['usuario'] = $usuario;


			//session_write_close();
		}

		public static function cerrarSesion(){
			self::iniciarSesion();
			session_destroy();
		}


	}