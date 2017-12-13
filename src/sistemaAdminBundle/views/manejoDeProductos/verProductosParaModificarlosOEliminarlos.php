<?php $titulo = "Neomix - Baja producto" ?>

<?php ob_start() ?>
<form>
    <?php foreach ($productos as $producto) { ?>
        <h2><a>Id: <?php echo $producto->getId(); ?></a></h2>
        <p>Nombre: <?php echo $producto->getNombre(); ?></p>
        <p>Descripcion: <?php echo $producto->getDescripcion(); ?></p>
        <img src="<?php assets::asset($producto->getImagen()); ?>" alt="<?php echo $producto->getNombre(); ?>" height="42" width="42"><br>
        <p>Precio Unitario: <?php $producto->getPrecioUnitario(); ?></p>
        <a href="<?php assets::form("baja/producto/" . $producto->getId()); ?>"></a><br>
        <a href="<?php assets::form("modificacion/producto/" . $producto->getId()); ?>"></a><br>
    <?php } ?>
</form>

<?php $contenido = ob_get_clean() ?>

<?php
include PLANTILLAS . "admin.php";
