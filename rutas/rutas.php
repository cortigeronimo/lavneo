<?php
	include_once 'direccionador.php';
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
			"/" => new Direccionador("generalBundle", "generalController", "index"),

			"/catalogo-de-productos" => new Direccionador("generalBundle", "generalController", "galeria"),

			"/geronimoCorti" => new Direccionador("generalBundle", "generalController", "geronimoCorti"),

			"/organizacion" => new Direccionador("generalBundle", "generalController", "organizacion"),

			"/contacto" => new Direccionador("generalBundle", "generalController", "contacto"),

			"/administracion" => new Direccionador("sistemaAdminBundle", "principalController", "administracion"),

			"/subir-productos" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "subirProductos"),

			"/eliminar-productos" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "eliminarProductos"),

			"/modificar-productos" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "modificarProductos"),

			"/producto" => new Direccionador("generalBundle", "generalController", "producto"),

			"/inicioSesion" => new Direccionador("sistemaUserBundle", "sessionController", "inicioSesion"),

			"/registro" => new Direccionador("sistemaUserBundle", "sessionController", "registro"),

			"/cerrarSesion" => new Direccionador("sistemaUserBundle", "sessionController", "cerrarSesion"),

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
