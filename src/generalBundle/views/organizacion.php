<?php $titulo = "Neomix - Organización" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/generalBundle/organizacion/cuerpo.css"); ?>">

<?php ob_start() ?>

	<div class="principal">
		<div class="relativo">
			<h1>¿Como hacerlo?</h1>
			<h2>Con solo 4 pasos, hacemos esto posible.</h2>
			<p>¡Una guía sencilla que no te tomará más de 3 minutos de tu tiempo! Y con tu ayuda, podemos lograr que nuestros objetivos se cumplan.</p>
		</div>

		<div class="flecha">
			<a href=""><img src="<?php assets::asset("imagenes/generalBundle/organizacion/Flecha/flecha.png"); ?>"></a>
		</div>
	</div>

	<div class="pasos">
		<h2><img src="<?php assets::asset("imagenes/generalBundle/organizacion/Secciones/sesion/3.png"); ?>"> Inicia sesión</h2>
		<p>Primero, <a href="">inicia sesión</a> con tu nombre de usuario y constraseña. En caso de no tener una cuenta, poder registrarte haciendo click <a href="">aquí.</a> Esto te permitirá:</p>
		<ul>
			<li> Acceder a los precios de lista de los productos.</li>
			<li> Realizar pedidos y hacer un seguimiento de los mismos, hasta que sea entregado en tu negocio.</li>
			<li> Gestionar tus compras.</li>
			<li> Tener un contacto más cercano y personalizado con la empresa.</li>
		</ul>
	</div>

	<div class="pasos">
		<h2><img src="<?php assets::asset("imagenes/generalBundle/organizacion/Secciones/pedido/1.png"); ?>""> Hace tu pedido</h2>
		<p>Una vez ingresado al sistema, podrás realizar pedidos cuando lo precises, con los siguientes beneficios:</p>
		<ul>
			<li> Compras rápidas y eficientes. Con descripción de productos, precios, calidad, y otros.</li>
			<li> Abierto las 24 horas, pudiendo realizar la operación los feriados y fin de semanas, sin necesidad de esperar al primer día hábil más cercano.</li>
			<li> Seguimiento y gestión del pedido.</li>
		</ul>
		<p><strong>Una vez realizado el pedido, el plazo de entrega es de 72 horas hábiles.</strong></p>
	</div>

	<div class="pasos">
		<h2><img src="<?php assets::asset("imagenes/generalBundle/organizacion/Secciones/seguimiento/7.png"); ?>""> Seguimiento</h2>
		<p>Luego de realizar la operación, podrás gestionar y hacer un seguimiento de tu pedido, el cual transitará a lo largo de su vida, por los siguientes estados:</p>
		<ul>
			<li> En espera: el pedido está en cola para ser visto y luego facturado por uno de nuestros empleados. En esta instancia, podrás modificar o eliminar el mismo en caso de arrepentimiento o error a la hora de realizar la operación.</li>
			<li> Facturado: el pedido ya fue facturado y entra en el proceso de entrega, donde se enviará la mercadería a su local.</li>
			<li> Envíado: el vehículo de entrega se encuentra de camino a su negocio. <strong>Tener en cuenta que los envíos se realizan de Lunes a Viernes de 9hs a 16hs.</strong></li>
		</ul>
	</div>

	<div class="pasos">
		<h2><img src="<?php assets::asset("imagenes/generalBundle/organizacion/Secciones/entrega/1.png"); ?>""> Entrega</h2>
		<p>Como se ha dicho anteriormente, luego de realizar el pedido, se entregará la mercancía dentro de las 72 horas hábiles y los envíos se realizan de Lunes a Viernes de 9hs a 16hs. Además, la compra mínima es de pesos argentinos $500 (quinientos pesos argentinos).</p>
	</div>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."comun.php"; ?>