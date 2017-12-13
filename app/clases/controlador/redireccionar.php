<?php 

	class Redireccionar{
		public static function redireccionarARuta($ruta){
                        $rutaARedireccionar = "http://" . $_SERVER["SERVER_NAME"] . "/" . $ruta;
			header('Location: '.$rutaARedireccionar);
		}
	}