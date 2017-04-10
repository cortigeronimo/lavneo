<?php $titulo = "Neomix - Inicio de Sesión" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/cssParaTodos/linkeos.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/sistemaUserBundle/inicioSesion/inicioSesion.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/cssParaTodos/inputsConClase.css"); ?>">


<?php ob_start() ?>

	<nav>
			<div class="logo-chico">
				<a href="<?php assets::ruta("/"); ?>" title=""><img class="logo" src="<?php assets::asset("imagenes/logo/neomix-chico-blanco.png"); ?>" alt="Neomix"></a>
				<a href="<?php assets::ruta("/"); ?>" title=""><img class="letra" src="<?php assets::asset("imagenes/logo/logo-blanco.png"); ?>" alt="Neomix"></a>
			</div>
			<ul>
				<li><a href="<?php assets::ruta("/"); ?>" title="">Inicio</a></li>
			</ul>
	</nav>
	<div class="contenedor">
		 <div class="item">
		 	<h1>Inicia Sesión</h1>
		 	<h3>¿Nuevo en Neomix? <a href="">Registrate</a></h3>
		 	<form action="<?php assets::ruta("inicioSesion"); ?>" method="POST">
		 		<input class="inputsConClase" type="text" name="usuario" placeholder="Usuario o Email">
		 		<input class="inputsConClase" type="password" name="password" placeholder="Contraseña">
		 		<a href="">¿Olvidaste tu contraseña?</a>
		 		<input class="linkeos" type="submit" name="Inicia Sesión">
		 	</form>
		 </div>
	</div>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."simple.php"; ?>