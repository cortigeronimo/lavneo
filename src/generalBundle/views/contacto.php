<?php $titulo = "Neomix - Contacto" ?>

<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/General/contacto/contacto.css"); ?>">

<?php ob_start() ?>

	<div class="informacion">
		<div class="info">
			<h2>Horarios de Atención e información adicional:</h2>
			<p>
				Los horarios de atención telefónica y toma de pedidos es de 9:00hs a 13:00hs y de 14:00hs a 18:00hs, de lunes a viernes a través de los siguientes números telefónicos: 4444-4444/5555. Además podran enviar mails al siguiente correo electrónico lavoc@arnetbiz.com.ar en cualquier momento de la semana.
			</p>
		</div>

		<div class="info">
			<h2>Envíos de productos:</h2>
			<p>
				Respecto a los envíos de mercadería, se realizaran dentro de las 48hs despúes de haber hecho el pedido, de lunes a viernes. Tendrán cargo extra (envío) los pedidos con monto menor a $500 pesos argentinos. 
			</p>
		</div>

		<div class="info">
			<h2>Precios:</h2>
			<p>
				Los precios pueden preguntarse vía telefónica o vía correo electrónico.
			</p>
		</div>
	</div>

	<form action="<?php assets::ruta('contacto') ?>" method="post" accept-charset="utf-8">

		<div class="campos">
			<label>Su Nombre:</label>
			<input type="text" name="nombre">
		</div>

		<div class="campos">
			<label>Su Correo:</label>
			<input type="email" name="email">
		</div>

		<div class="campos">
			<label>Asunto:</label>
			<input type="text" name="asunto">
		</div>

		<div class="campos">
			<label>Mensaje:</label>
			<textarea name="mensaje"></textarea>
		</div>

		<div class="campos">
			<input type="submit" name="Enviar">
		</div>

	</form>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."comun.php"; ?>