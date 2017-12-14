<?php $titulo = "Neomix - Administración" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/Admin/Administracion/cuerpo.css"); ?>">

<?php ob_start() ?>

	<div class="lista">
            <h2>Operaciones con categorias:</h2>
		<ul>
                        <li><a href="<?php assets::ruta("alta/categoria"); ?>" title="">Añadir Categoria</a></li>
                        <li><a href="<?php assets::ruta("accion/categorias"); ?>" title="">Modificar o Eliminar Categorias.</a></li>
			
		</ul>
            
            
            <h2>Operaciones con productos:</h2>
		<ul>
			<li><a href="<?php assets::ruta("alta/producto"); ?>" title="">Subír Productos.</a></li>
			<li><a href="<?php assets::ruta("accion/productos"); ?>" title="">Modificar o Eliminar Productos.</a></li>
		</ul>
	</div>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."admin.php"; ?>