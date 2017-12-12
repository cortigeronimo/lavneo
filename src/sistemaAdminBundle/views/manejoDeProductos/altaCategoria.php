<?php $titulo = "Neomix - Alta Producto" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/Admin/subirProductos/cuerpo.css"); ?>">

<?php ob_start() ?>

	<form action="<?php assets::form("alta/categoria"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

		<div class="campos">
			<label>Nombre de la Categoria:</label>
			<input type="text" name="nombre">
		</div>

		<div class="campos">
			<label>Categoría padre:</label>
			<select name="padre">
                                <option value="NULL">No tiene padre.</option>
				<?php foreach($categorias as $categoria){ ?>
				<option value="<?php echo $categoria->getId();?>"><?php echo $categoria->getNombre();?></option>
				<?php } ?>
                                
			</select>
		</div>

		<div class="campos">
			<input type="submit" name="Enviar">
		</div>

	</form>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."admin.php";