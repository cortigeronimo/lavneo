<?php $titulo = "Neomix - Modificar Productos" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/Admin/modificarProductos/modificarProductos.css"); ?>">

<?php ob_start() ?>
<?php $categorias = $array["categorias"]; $producto = $array["producto"]; ?>
<form action="<?php assets::form("modificacion/producto/" . $producto->getId()); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <h2>ID: <?php echo $producto->getId(); ?></h2>
    <p>Nombre: <input name="nombre" type="text" value="<?php echo $producto->getNombre(); ?>"></p>
    <p>Descripcion: <input name="descripcion" type="text" value="<?php echo $producto->getDescripcion(); ?>"></p>
    <img src="<?php assets::asset($producto->getImagen()); ?>" alt="<?php echo $producto->getNombre(); ?>" height="42" width="42"><br>
    <p>Imagen: <input type="file" name="file"></p>
    <p>Precio unitario (sin iva, ni otros impuestos): <input name="precioUnitario" type="text" value="<?php echo $producto->getPrecioUnitario(); ?>"></p>
    <select name="categoria">        
        <?php foreach ($categorias as $categoria) { ?>
            <?php if($categoria->getId() == $producto->getCategoria()->getId()){?>
            <option value="<?php echo $categoria->getId(); ?>" selected><?php echo $categoria->getNombre(); ?></option>
            <?php } else{ ?>
            <option value="<?php echo $categoria->getId(); ?>"><?php echo $categoria->getNombre(); ?></option>
            <?php } ?>
        <?php } ?>
    </select>
    <p><input type="submit" value="Enviar"></p>
</form>
<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS . "admin.php";