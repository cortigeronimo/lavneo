<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $titulo ?></title>
	<link href="https://fonts.googleapis.com/css?family=Rubik|Signika" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="<?php assets::asset("imagenes/logo/neomix-chico.png"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/cssParaTodos/valoresGenerales.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/generalBundle/plantilla/footer.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/cssParaTodos/valoresGenerales.css"); ?>">
</head>

<body>
	<section>
		<?php echo $contenido ?>
	</section>
	<footer>
		<div class="copyright">
			<p>© Copyright 2016 - Desarrollado por <a href="<?php assets::ruta("geronimoCorti"); ?>" title="">Gerónimo Corti</a> - <a href="<?php assets::ruta("administracion"); ?>" title="">Administrador</a></p>
		</div>
	</footer>
</body>
</html>