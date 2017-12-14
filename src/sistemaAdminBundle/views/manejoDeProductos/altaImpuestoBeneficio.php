<?php $titulo = "Neomix - Alta Impuesto o Descuento" ?>
<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/Admin/subirProductos/cuerpo.css"); ?>">

<?php ob_start() ?>

	<form action="<?php assets::form("alta/impuesto-beneficio"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                
                <div class="campos">
			<label>Es un impuesto o un descuento?</label>
                        <input type="radio" name="impuestoOBeneficio" value="impuesto" checked>Impuesto<br>
                        <input type="radio" name="impuestoOBeneficio" value="beneficio">Descuento<br>
		</div>
            
		<div class="campos">
			<label>Nombre:</label>
			<input type="text" name="nombre">
		</div>
            
                <div class="campos">
			<label>Es un porcentaje o valor fijo?</label>
			<input type="radio" name="tipo" value="porcentaje" checked>Porcentaje<br>
                        <input type="radio" name="tipo" value="fijo">Descuento<br>
                        <label>Valor:</label>
                        <input type="number" name="valor"><br>
		</div>

		<div class="campos">
			<input type="submit" name="Enviar">
		</div>

	</form>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."admin.php";