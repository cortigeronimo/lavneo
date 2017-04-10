<?php $titulo = "Neomix - Galeria de Productos" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/generalBundle/catalogo/catalogo.css"); ?>">

<?php ob_start() ?>

	<div class="informacion">
		<div class="relativo">
			<h1>NEOMIX S.A</h1>
			<h2>Productos de calidad, al mejor precio.</h2>
			<p>Al iniciar sesión, se le proporcionara los beneficios de poder realizar pedidos, viendo así los precios de los productos</p>
		</div>

		<div class="flecha">
			
		</div>
	</div>
	
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
				<h2><?php echo $producto['nombre'];?></h2>
				<h5>Código: <a href="<?php assets::ruta('producto/'.$producto['codigo'].'/'.str_replace(" ","-",$producto['nombre'])); ?>" title="">#<?php echo $producto['codigo']; ?></a></h5>
				<p><?php echo $producto['descripcion'];?></p>
				<p class="precio">$<?php echo $producto['precio']?><span>  (con IVA incluído)</span></p>
			</div>				

			<div class="mas">
				<a href="<?php assets::ruta('producto/'.$producto['codigo'].'/'.str_replace(" ","-",$producto['nombre'])); ?>">Ver más</a>	
			</div>

		</div>
		<?php } ?>

	</div>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."comun.php"; ?>