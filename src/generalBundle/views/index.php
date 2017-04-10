<?php $titulo = "Neomix" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/generalBundle/home/cuerpo.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/cssParaTodos/inputs.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/cssParaTodos/enviar.css"); ?>">

<?php ob_start() ?>
		<div class="principal">
			<div class="relativo">
				<h1>NEOMIX S.A</h1>
				<h2>Productos de calidad, al mejor precio.</h2>
				<p>Al iniciar sesión, se le proporcionara los beneficios de poder realizar pedidos, viendo así los precios de los productos</p>
				<a class="linkeos" href="<?php assets::ruta("inicioSesion"); ?>">Iniciar Sesión</a>
				<a class="linkeos" href="<?php assets::ruta("registro"); ?>">Registrarme</a>
			</div>
			<div class="flecha">
				<a href="#ancla"><img src="<?php assets::asset("imagenes/generalBundle/index/Flecha/flecha-negra.png"); ?>"></a>
			</div>
		</div>

	<div class="registro">
		
	</div>

	<div class="links" id="ancla">
		<div class="entrada">
			<h1>La Empresa</h1>
			<h2>Neomix es una empresa especializada en venta de sanitarios</h2>	
		</div>

		<div class="link">
			<img src="<?php assets::asset("imagenes/generalBundle/index/Secciones/productos.png"); ?>">
			<p>CATALOGO</p>
		</div>
		<div class="link">
			<img src="<?php assets::asset("imagenes/generalBundle/index/Secciones/empresa.png"); ?>">
			<p>INFO</p>
		</div>
		<div class="link">
			<img src="<?php assets::asset("imagenes/generalBundle/index/Secciones/contacto.png"); ?>">
			<p>CONTACTO</p>
		</div>
	</div>

	<div class="fijo">
		<h2>Estamos a tu disposición!</h2>
	</div>

	<div class="formulario">
		<form>
			<h2>Contactate!</h2>
			<h3>En breve te responderemos el mensaje!</h3>
			<div>
				<input class="inputs" type="" name="" placeholder="Nombre">	
			</div>
			<div>
				<input class="inputs" type="" name="" placeholder="Email">
			</div>
			<div>
				<input class="inputs" type="" name="" placeholder="Mensaje">	
			</div>
			<div>
				<input class="enviar" type="submit" name="Enviar">
			</div>
			
		</form>
	</div>
	<script type="text/javascript">
		$(".relativo").hover(function(){
			$(".principal").toggleClass("principal-cambio");
		})
		

	</script>
			

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."comun.php"; ?>