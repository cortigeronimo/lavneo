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
	<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/generalBundle/plantilla/nav.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php assets::asset("css/cssParaTodos/linkeos.css"); ?>">

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
		$(document).on("scroll",function(){
		    if($(document).scrollTop()> 1){
		        $("nav").addClass("efecto");
		    } else{
		        $("nav").removeClass("efecto");
		    }
		});
	</script>
</head>

<body>
	<nav>
		<div class="logo-chico">
			<a href="<?php assets::ruta("/"); ?>" title=""><img class="logo" src="<?php assets::asset("imagenes/logo/neomix-chico-blanco.png"); ?>" alt="Neomix"></a>
			<a href="<?php assets::ruta("/"); ?>" title=""><img class="letra" src="<?php assets::asset("imagenes/logo/logo-blanco.png"); ?>" alt="Neomix"></a>
		</div>
		<ul>
			<li><a href="<?php assets::ruta("catalogo-de-productos"); ?>" title="">Catalogo</a></li><li><a href="<?php assets::ruta("organizacion"); ?>" title="">Organización</a></li><li><a href="<?php assets::ruta("contacto"); ?>" title="">Contacto</a></li>
		</ul>
	</nav>
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