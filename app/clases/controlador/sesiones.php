<?php

	class Sesiones{

		public static function estaLogeado(){
			
			return true;
		}

		public static function crearSesion($id, $email){
			session_start();

			$_SESSION['id']  = $id;
			$_SESSION['email'] = $email;


			//session_write_close();
		}

		public static function abrirSesion(){
			session_start();
		}

		public static function cerrarSesion(){
			self::abrirSesion();
			session_destroy();
			Redireccionar::redireccionarARuta('/');
		}


	}