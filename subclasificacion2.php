<!DOCTYPE html>
<html lang="es">
<head>
	<title>Subcategorías</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="icon" href="img/logo.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/peticion_subclasif.js"></script>
</head>
<body>
	<header class="header">
		<div class="contenedor">
			<span class="icon-menu" id="btn-menu"></span>
			<nav class="nav" id="nav">
				<ul class="menu">
					<li class="menu__item"><a class="menu__link" href="clasificacion.php">Inicio</a> </li>	
					<li class="menu__item"><a class="menu__link select" href="subclasificacion.php">Subcategorías</a></li>	
					<li class="menu__item"><a class="menu__link" href="eventos.php">Eventos</a></li>			
					<li class="menu__item"><a class="menu__link" href="acerca.php">Acerca de</a></li>		
					<li class="menu__item"><a class="menu__link" href="contacto.php">Contacto</a></li>		
					<?php
						@session_start();
						$usuario = $_SESSION['k_nombre'];
						if($usuario != ""){
							echo '<li class="menu__item"><a class="menu__link" href="">'.$usuario.'</a>';
							#echo '<center><label>Usuario: ' . $usuario . '</label></center>';
						}else{
						?>			
							<script language="javascript">
							alert('ERROR DE INICIO DE SESION, FAVOR DE VOLVER A INGRESAR');
							location.href = "ingresar.html";
							</script>
						<?php
						}
					?>	
						<ul class="menu">
							<li><a class="menu__link" href="editarperfil.html">Editar perfil</a></li>
							<li><a class="menu__link"  href="cerrar_sesion.php">Salir</a></li>
						</ul>	
					</li>			
				</ul>
			</nav>

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
			<h2 class="banner__titulo">SUBCLASIFICACIONES</h2>
			<!--<p class="banner__txt"> Elige una bella arte</p>-->
		</div>

	</div>
	<main class="main">
		<div class="contenedor">
			<section class="cursos">
				<div class="cursos__columna">
					<img src="img/img1.jpeg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos_titulo">Renacentista</h3>
						<p class="cursos__txt">Lorem ipsum dolor sit amet, consectetur adipsicing elit. Sus...</p>
					</div>
				</div>
				<div class="cursos__columna">
					<img src="img/img1.jpeg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos_titulo">Barroco</h3>
						<p class="cursos__txt">Lorem ipsum dolor sit amet, consectetur adipsicing elit. Sus...</p>
					</div>
				</div>
				<div class="cursos__columna">
					<img src="img/img1.jpeg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos_titulo">Contemporanea</h3>
						<p class="cursos__txt">Lorem ipsum dolor sit amet, consectetur adipsicing elit. Sus...</p>
					</div>
				</div>
			</section>	
		</div>
	</main>
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