<?php

	require_once USER_BUNDLE."model/usuario.php";

	class SessionController{

		public function inicioSesion(){

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$usuario = new Usuario();
				$usuario->setUsuario($_POST['usuario']);
				$usuario->setPassword($_POST['password']);
				$existencia = $usuario->buscarElUsuario();
				if($existencia){
					Sesiones::crearSesion($existencia[0]->id, $existencia[0]->usuario);
					Redireccionar::redireccionarARuta('/');
				}

				Vista::crear(USER_BUNDLE."views/session/inicioSesion.php");
			}
			
			Vista::crear(USER_BUNDLE."views/session/inicioSesion.php");
		}

		public function registro(){
			
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$usuario = new Usuario();
				$usuario->setUsuario();
				$usuario->setPassword();
				$usuario->setEmail();
				$usuario->insertar();
				$usuario->traerUsuario();
				$datos = new Datos();
				$datos->asignarUsuario();
			}
				Vista::crear(USER_BUNDLE."views/session/registro.php");
		}

		public function cerrarSesion(){
			Sesiones::cerrarSesion();
		}
	}