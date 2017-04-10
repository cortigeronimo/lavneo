<?php $titulo = "Neomix - Galeria" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/General/producto/producto.css"); ?>">

<?php ob_start() ?>
	
		
		<div class="producto">

			<div class="img">
				<img src="<?php assets::asset("imagenes/productos/".$producto[0]['imagen']); ?>" alt="<?php echo $producto[0]['nombre']; ?>">
			</div>

			<div class="contenido-producto">
				<h2>Código de producto: <a href="<?php assets::ruta('producto/'.str_replace(" ","-",$producto[0]['nombre'])); ?>" title="">#<?php echo $producto[0]['codigo']; ?></a></h2>
				<h3><?php echo $producto[0]['nombre'];?></h3>
				<p><?php echo $producto[0]['descripcion'];?></p>
			</div>

		</div>



<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."comun.php"; ?>