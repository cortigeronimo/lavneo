<?php

define("RUTA_BASE", dirname(realpath(__FILE__))."/");
define("APP_RUTA", RUTA_BASE."app/");
define("ASSETS_RUTA", RUTA_BASE."assets/");
define("MAILS", RUTA_BASE."mails/");
define("PLANTILLAS", RUTA_BASE."plantillas/");
define("RUTA", RUTA_BASE."rutas/");
define("BUNDLES_RUTA", RUTA_BASE."src/");

define("GENERAL_BUNDLE", BUNDLES_RUTA."generalBundle/");
define("USER_BUNDLE", BUNDLES_RUTA."sistemaUserBundle/");
define("ADMIN_BUNDLE", BUNDLES_RUTA."sistemaAdminBundle/");


require_once "mainController/mainController.php";
