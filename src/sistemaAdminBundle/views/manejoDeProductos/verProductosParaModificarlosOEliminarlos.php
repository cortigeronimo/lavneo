<?php $titulo = "Neomix - Baja y modificacion de productos" ?>

<?php ob_start() ?>
<form>
    <?php foreach ($productos as $producto) { ?>
        <h2><a>Id: <?php echo $producto->getId(); ?></a></h2>
        <p>Nombre: <?php echo $producto->getNombre(); ?></p>
        <p>Descripcion: <?php echo $producto->getDescripcion(); ?></p>
        <img src="<?php assets::asset($producto->getImagen()); ?>" alt="<?php echo $producto->getNombre(); ?>" height="42" width="42"><br>
        <p>Precio Unitario: <?php echo $producto->getPrecioUnitario(); ?></p>
        <a href="<?php assets::form("baja/producto/" . $producto->getId()); ?>">Eliminar</a><br>
        <a href="<?php assets::form("modificacion/producto/" . $producto->getId()); ?>">Modificar</a><br>
    <?php } ?>
</form>

<?php $contenido = ob_get_clean() ?>

<?php
include PLANTILLAS . "admin.php";
