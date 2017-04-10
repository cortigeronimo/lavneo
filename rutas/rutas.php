<?php

	//vendriá a ser el routing.yml de symfony

	/*set_error_handler(function($errno, $errstr, $errfile, $errline, array $errcontext) {
	    // error was suppressed with the @-operator
	    if (0 === error_reporting()) {
	        return false;
	    }

	    throw new ErrorException();
	});*/

	/**************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	******************************************AGREGAR AL FINAL DEL PROYECTO****************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	***************************************************************************************************************
	*/
	
	$ruta = new Ruta();
	try{
		$ruta->controladores(array(
			"/" => array("bundle" => "generalBundle", "controlador" => "generalController", "metodo" => "index"),

			"/catalogo-de-productos" => array("bundle" => "generalBundle", "controlador" => "generalController", "metodo" => "galeria"),

			"/geronimoCorti" => array("bundle" => "generalBundle", "controlador" => "generalController", "metodo" => "geronimoCorti"),

			"/organizacion" => array("bundle" => "generalBundle", "controlador" => "generalController", "metodo" => "organizacion"),

			"/contacto" => array("bundle" => "generalBundle", "controlador" => "generalController", "metodo" =>"contacto"),

			"/administracion" => array("bundle" => "sistemaAdminBundle", "controlador" => "adminController", "metodo" => "administracion"),

			"/subir-productos" => array("bundle" => "sistemaAdminBundle", "controlador" => "manejoDeProductosController", "metodo" => "subirProductos"),

			"/eliminar-productos" => array("bundle" => "sistemaAdminBundle", "controlador" => "manejoDeProductosController", "metodo" => "eliminarProductos"),

			"/modificar-productos" => array("bundle" => "sistemaAdminBundle", "controlador" => "manejoDeProductosController", "metodo" => "modificarProductos"),

			"/producto" => array("bundle" => "generalBundle", "controlador" => "generalController", "metodo" => "producto"),

			"/inicioSesion" => array("bundle" => "sistemaUserBundle", "controlador" => "sessionController", "metodo" => "inicioSesion"),

			"/registro" => array("bundle" => "sistemaUserBundle", "controlador" => "sessionController", "metodo" => "registro"),

			"/cerrarSesion" => array("bundle" => "sistemaUserBundle", "controlador" => "sessionController", "metodo" => "cerrarSesion"),

			));
	}

	catch(Excepcion404 $e){
		Vista::crear(MENSAJES."error/error404.php");
	}
	catch(ErrorException $e){
		echo "Ha ocurrido un ERROR inesperado";
	}
	catch(Exception $e){
		echo "EXCEPCION INESPERADA";
	}
