<?php 

	class Redireccionar{
		public static function redireccionarARuta($ruta){
			header('Location: '.$ruta.'');
		}
	}