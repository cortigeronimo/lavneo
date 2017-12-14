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
		"/" => new Direccionador("generalBundle", "generalController", "index"),

		"/catalogo-de-productos" => new Direccionador("generalBundle", "generalController", "catalogo"),

		"/geronimoCorti" => new Direccionador("generalBundle", "generalController", "geronimoCorti"),

		"/organizacion" => new Direccionador("generalBundle", "generalController", "organizacion"),

		"/contacto" => new Direccionador("generalBundle", "generalController", "contacto"),

		"/administracion" => new Direccionador("sistemaAdminBundle", "principalController", "administracion"),
            
                "/alta/categoria" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "altaCategoria"),

		"/alta/producto" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "altaProducto"),

		"/accion/productos" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "accionSobreProductos"),
            
                "/accion/categorias" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "accionSobreCategorias"),
            
                "/baja/producto/{id}" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "bajaProducto"),

		"/modificacion/producto/{id}" => new Direccionador("sistemaAdminBundle", "manejoDeProductosController", "modificarProducto"),

		"/producto/{codigo}" => new Direccionador("generalBundle", "generalController", "producto"),

		"/sesion/inicio" => new Direccionador("sistemaUserBundle", "sessionController", "inicioSesion"),

		"/registro" => new Direccionador("sistemaUserBundle", "sessionController", "registro"),

		"/sesion/cerrar" => new Direccionador("sistemaUserBundle", "sessionController", "cerrarSesion"),

		);

	$mainController->setControllers($controladores);

	try{
		$mainController->run();
	}

	catch(Exception404 $e){
		//Vista::crear(APP_RUTA."excepciones/error404.php");
            echo "Error 404";
	}
	catch(ErrorException $e){
		echo "Ha ocurrido un ERROR inesperado";
	}
	catch(Exception $e){
		echo "EXCEPCION INESPERADA";
	}
