<?php $titulo = "Neomix - Administración" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/Admin/Administracion/cuerpo.css"); ?>">

<?php ob_start() ?>

	<div class="lista">
		<ul>
			<li><a href="<?php assets::ruta("subir-productos"); ?>" title="">Subír Productos.</a></li>
			<li><a href="<?php assets::ruta("modificar-productos"); ?>" title="">Modificar Productos.</a></li>
			<li><a href="<?php assets::ruta("eliminar-productos"); ?>" title="">Eliminar Productos.</a></li>
		</ul>
	</div>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."admin.php"; ?>