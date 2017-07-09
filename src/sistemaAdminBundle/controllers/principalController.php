<?php 

	require_once ADMIN_BUNDLE."model/producto.php";

	class PrincipalController{


		public function administracion(){
			return Vista::crear(ADMIN_BUNDLE."views/principal/administracion.php");
		}

	}