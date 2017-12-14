<?php $titulo = "Neomix - Baja y Modificacion de Categorias" ?>

<?php ob_start() ?>
<form>
    <?php foreach ($categorias as $categoria) { ?>
        <h2><a>Id: <?php echo $categoria->getId(); ?></a></h2>
        <p>Nombre: <?php echo $categoria->getNombre(); ?></p>
        <p>Padre: <?php if($categoria->getPadre() == NULL) { echo "No tiene padre."; } else { echo $categoria->getPadre()->getNombre(); }?></p>
        <a href="<?php assets::form("baja/categoria/" . $categoria->getId()); ?>">Eliminar</a><br>
        <a href="<?php assets::form("modificacion/categoria/" . $categoria->getId()); ?>">Modificar</a><br>
    <?php } ?>
</form>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS . "admin.php";

