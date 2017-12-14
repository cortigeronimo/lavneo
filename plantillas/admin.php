<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $titulo ?></title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/General/valoresGenerales.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/Admin/footer.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/Admin/nav.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/Admin/header.css"); ?>">
</head>

<body>
	<header>
		<nav>
			<ul>
				<li><a href="<?php assets::form("administracion"); ?>" title="">Administración</a></li><li><a href="<?php assets::form("sesion/cerrar"); ?>" title="">Cerrar Sesión</a></li>
			</ul>
		</nav>	
	</header>

	<section>
		<?php echo $contenido ?>
	</section>

	<footer>
		<div class="copyright">
			<p>© Copyright 2016 - Desarrollado por <a href="<?php assets::ruta("geronimoCorti"); ?>" title="">Gerónimo Corti</a>.</p>
		</div>
	</footer>

</body>
</html>