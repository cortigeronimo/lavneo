<?php $titulo = "Neomix - Modificar Productos" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/Admin/modificarProductos/modificarProductos.css"); ?>">

<?php ob_start() ?>

	<div class="productos">

		<?php foreach($productos as $producto){?>
		<div class="producto">

			<div class="img">
				<?php if($producto['imagen'] != ""){ ?>

				<img src="<?php assets::asset("imagenes/productos/".$producto['imagen']); ?>" alt="<?php echo $producto['nombre']; ?>">

				<?php } else{ ?>

				<img src="<?php assets::asset("imagenes/productos/no-disponible.png"); ?>" alt="no-disponible">

				<?php } ?>
			</div>

			<div class="contenido-producto">
				<h2>Código de producto: <a href="<?php assets::ruta('modificarProducto/'.str_replace(" ","-",$producto['nombre'])); ?>" title="">#<?php echo $producto['codigo']; ?></a></h2>
				<h3><?php echo $producto['nombre'];?></h3>
				<p><?php echo $producto['descripcion'];?></p>
			</div>

		</div>
		<?php } ?>

	</div>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."admin.php"; ?>