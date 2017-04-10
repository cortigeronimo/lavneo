<?php
	
	//rutas principales

	define("APP_RUTA", RUTA_BASE."app/");
	define("BUNDLES_RUTA", RUTA_BASE."src/");
	define("ASSETS_RUTA", RUTA_BASE."assets/");
	define("RUTA", RUTA_BASE."rutas/");
	define("PLANTILLAS", RUTA_BASE."plantillas/");
	define("MENSAJES", RUTA_BASE."mensajes/");
	define("CONFIG", RUTA_BASE."config/");
	define("CLASES", APP_RUTA."clases/");
	define("MAILS", RUTA_BASE."mails/");

	//bundles

	define("GENERAL_BUNDLE", BUNDLES_RUTA."generalBundle/");
	define("USER_BUNDLE", BUNDLES_RUTA."sistemaUserBundle/");
	define("ADMIN_BUNDLE", BUNDLES_RUTA."sistemaAdminBundle/");
	
	require_once APP_RUTA."excepciones/excepciones.php";
	require_once APP_RUTA."clases/controlador/redireccionar.php";
	require_once APP_RUTA."clases/vista/vista.php";
	require_once APP_RUTA."clases/herramientas/herramientasParaMysql.php";
	require_once APP_RUTA."clases/controlador/email.php";
	require_once APP_RUTA."clases/vista/assets.php";
	require_once APP_RUTA."clases/controlador/sesiones.php";
	require_once CONFIG."conexion.php";
	require_once "ruta.php";
	require_once RUTA."rutas.php";