<?php
	include_once 'direccionador.php';
	//vendriá a ser el routing.yml de symfony
	//agregar esto que esta comentado cuando se suba el proyecto

	/*set_error_handler(function($errno, $errstr, $errfile, $errline, array $errcontext) {
	    // error was suppressed with the @-operator
	    if (0 === error_reporting()) {
	        return false;
	    }

	    throw new ErrorException();
	});*/
	
	$mainController = new mainController();
	
	$controladores = array(
		"/" => new Direccionador("generalBundle", "generalController", "index", 0),

		"/catalogo-de-productos" => new Direccionador("generalBundle", "generalController", "catalogo", 0),

		"/geronimoCorti" => new Direccionador("generalBundle", "generalController", "geronimoCorti", 0),

		"/organizacion" => new Direccionador("generalBundle", "generalController", "organizacion", 0),

		"/contacto" => new Direccionador("generalBundle", "generalController", "contacto", 0),

		"/administracion" => new Direccionador("sistemaAdminBundle", "principalController", "administracion", 0),

		"/alta/producto" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "subirProductos", 0),

		"/baja/producto" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "eliminarProductos", 0),

		"/modificacion/producto" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "modificarProductos", 0),

		"/producto" => new Direccionador("generalBundle", "generalController", "producto", 1),

		"/sesion/inicio" => new Direccionador("sistemaUserBundle", "sessionController", "inicioSesion", 0),

		"/registro" => new Direccionador("sistemaUserBundle", "sessionController", "registro", 0),

		"/sesion/cerrar" => new Direccionador("sistemaUserBundle", "sessionController", "cerrarSesion", 0),

		);

	$mainController->setControllers($controladores);

	try{
		$mainController->run();
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
