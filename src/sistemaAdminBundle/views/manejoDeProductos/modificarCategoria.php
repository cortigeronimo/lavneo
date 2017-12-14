<?php $titulo = "Neomix - Modificar categorias" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/Admin/modificarcategorias/modificarcategorias.css"); ?>">

<?php ob_start() ?>
<?php $categorias = $array["categorias"]; $categoria = $array["categoria"]; ?>
<form action="<?php assets::form("modificacion/categoria/" . $categoria->getId()); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <h2>ID: <?php echo $categoria->getId(); ?></h2>
    <p>Nombre: <input name="nombre" type="text" value="<?php echo $categoria->getNombre(); ?>"></p>
    <p>Padre:</p>
    <select name="categoria">        
        <?php foreach ($categorias as $categ) { ?>
            <?php if(!$categ->tienePadre()){?>
            <option value="NULL" selected>Sin padre</option>
            <?php }if ($categ->getId() == $categoria->getPadre()->getId()){ ?>
            <option value="<?php echo $categ->getId(); ?>" selected><?php echo $categ->getNombre(); ?></option>
            <?php } else{ ?>
            <option value="<?php echo $categ->getId(); ?>"><?php echo $categ->getNombre(); ?></option>
            <?php } ?>
        <?php } ?>
    </select>
    <p><input type="submit" value="Enviar"></p>
</form>
<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS . "admin.php";