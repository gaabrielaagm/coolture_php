<!DOCTYPE html>
<html lang="es">
<head>
	<title>Adminitradoras</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="icon" href="img/logo.ico">
	<STYLE type="text/css">
			section{
				background-color: #bf80ff;
				width: 100%;
				margin:30px;

			}
			.div-central{
				padding: 10px;
				width: 95%;
				margin: auto;
				background: rgba(153, 204, 255,1);
				border-radius: 7px;
			}
	</STYLE>


</head>
<body>
	<header class="header">
		<div class="contenedor">
			<span class="icon-menu" id="btn-menu"></span>
			
		</div>
	</header>
	<div class="banner">
		<div class="slider">
			<ul>
				<li><img src="img/sli1.jpg" alt=""></li>
				<li><img src="img/sli2.jpg" alt=""></li>
				<li><img src="img/sli3.jpg" alt=""></li>
				<li><img src="img/sli4.jpg" alt=""></li>
			</ul>
		</div>
		<div class="contenedor">
			<p><img src="img/logo.png" class="logo"></p>
			<h2 class="banner__titulo">¡BIENVENIDAS ADMINISTRADORAS!</h2>
			<!--<p class="banner__txt"> Elige una bella arte</p>-->
		</div>

	</div>
	<section>
		<nav class="nav" id="nav">
			<ul class="menu">
				<li class="menu__item"><a class="menu__link select" href="admin.html">Inicio</a> </li>	
				<li class="menu__item"><a class="menu__link" href="altas_eventos.html">Altas Eventos</a></li>	
				<li class="menu__item"><a class="menu__link" href="modif_eventos.php">Eliminar Eventos</a></li>			
				<li class="menu__item"><a class="menu__link" href="lista_eventos.html">Lista de eventos</a></li>		
				<li class="menu__item"><a class="menu__link" href="index.html">Salir</a></li>			
			</ul>
		</nav>
	</section>
	
	<div class="div-central">
		<?php
		include "consulta_elimin_subclasif.php"
		?>
	</div>
	<br>
	<footer class="footer">

		<div class="social">
			<a href= "#" class="icon-facebook"></a>
			<a href= "#" class="icon-instagram"></a>
			<a href= "#" class="icon-googleplus"></a>
			<a href= "#" class="icon-mail"></a>
		</div>
		<p class="copy">&copy; SAGA 2017 - Todos los derechos reservados.</p>
	</footer>
	<script src="js/menu.js"></script>
</body>
</html>