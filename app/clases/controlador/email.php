<?php

	class email{
		public static function enviarEmail($para, $titulo, $archivo, $datos = null){

			$mensaje = Vista::crear(MAILS.$archivo,$datos); // deberia devolver toda la vista
			$from = "From: Anonimo";
			$envio = mail($para, $titulo, $mensaje, $from);

			if($envio){
				return true;
			}

			else{
				//para que no se rompa todo, comento esto. Despues, descomentar
				///return Vista::crear(MENSAJES."error/errorAlEnviarMail.php");
				return false;
			}
		}
	}