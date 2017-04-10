<?php $titulo = "Neomix - Inicio de Sesión" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/cssParaTodos/inputsConClase.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/cssParaTodos/linkeos.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/sistemaUserBundle/registro/registro.css"); ?>">

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
		 	<h1>Registrate</h1>
		 	<h3>¿Ya tenes una cuenta en Neomix? <a href="<?php assets::ruta("inicioSesion"); ?>">Inicia Sesión</a></h3>
		 	<form>
		 		<div class="dos">
		 			<input class="inputsConClase" type="text" name="usuario" placeholder="Nombre de usuario ha utilizar"><input class="inputsConClase" type="email" name="email" placeholder="Ingrese su Email">
		 		</div>
		 		<input class="inputsConClase" type="password" name="password" placeholder="Contraseña">
		 		<div class="dos">
		 			<input class="inputsConClase" type="text" name="nombre" placeholder="Nombre de facturación del negocio"><input class="inputsConClase" type="text" name="cuit" placeholder="Número de cuit">
		 		</div>
		 		<div class="tres">
		 			<input class="inputsConClase" type="text" name="postal" placeholder="Código Postal"><input class="inputsConClase" type="text" name="Calle" placeholder="Calle"><input class="inputsConClase" type="text" name="Altura" placeholder="Altura">
		 		</div>
		 		<input class="inputsConClase" type="text" name="text" placeholder="Aclaración sobre domicilio (número de departamento, timbre, etc) - opcional">
		 		<div class="dos">
		 			<input class="inputsConClase" type="text" name="telefono" placeholder="telefono"><input class="inputsConClase" type="text" name="celular" placeholder="celular">
		 		</div>
		 		
		 		<input class="linkeos" type="submit" name="Inicia Sesión">
		 	</form>
		 </div>
	</div>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."simple.php"; ?>