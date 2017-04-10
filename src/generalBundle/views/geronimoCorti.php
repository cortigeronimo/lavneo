<?php $titulo = "Neomix - Gerónimo Corti" ?>

<?php ob_start() ?>

	<div class="presentacion">
		<p>Mi nombre es Gerónimo Corti, estudio Ingeniería en Sistemas de Información en la Universidad Tecnológica Nacional de Buenos Aires. Estoy titulado como Programador Web avanzado por la misma facultad, y me especializo fundamentalmente en el back-end de los desarrollos.</p>
		<p>Tengo sólidos conocimientos en Programación Orientada a Objetos con PHP; buen manejo de Javascript, Ajax y Jquery y conocimiento en front-end como HTML, HTML5, CSS, CSS3. Utilizo Frameworks como Symfony3, Laravel y propios (desarrollados por mi cuenta).</p>
	</div>

<?php $contenido = ob_get_clean() ?>

<?php include PLANTILLAS."comun.php"; ?>