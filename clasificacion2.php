<!DOCTYPE html>
<html lang="es">
<head>
	<title>INICIO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="icon" href="img/logo.ico">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style.css">  
</head>
<body>
	<header class="header">
		<div class="contenedor">
			<span class="icon-menu" id="btn-menu"></span>
			<nav class="nav" id="nav">
				<ul class="menu">
					<li class="menu__item"><a class="menu__link select" href="clasificacion.php">Inicio</a> </li>	
					<li class="menu__item"><a class="menu__link" href="subclasificacion.php">Subcategorías</a></li>	
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
			<h2 class="banner__titulo">CLASIFIACIONES</h2>
			<!--<p class="banner__txt"> Elige una bella arte</p>-->
		</div>

	</div>
	<main class="main">
		<div class="contenedor">
			<section class="info">
				<article class="info__columna">
					<img src="img/img1.jpeg" alt="" class="info__img">
					<h2 class="info__titulo">Arquitectura</h2>
					<p class="info__txt">Texto de descripción</p>
				</article>
				<article class="info__columna">
					<img src="img/img1.jpeg" alt="" class="info__img">
					<h2 class="info__titulo">Cine</h2>
					<p class="info__txt">Texto de descripción</p>
				</article>
				<article class="info__columna">
					<img src="img/img1.jpeg" alt="" class="info__img">
					<h2 class="info__titulo">Danza</h2>
					<p class="info__txt">Texto de descripción</p>
				</article>
			</section>	
			<section class="info">
				<article class="info__columna">
					<img src="img/img1.jpeg" alt="" class="info__img">
					<h2 class="info__titulo">Escultura</h2>
					<p class="info__txt">Texto de descripción</p>
				</article>
				<article class="info__columna">
					<img src="img/img1.jpeg" alt="" class="info__img">
					<h2 class="info__titulo">Literatura</h2>
					<p class="info__txt">Texto de descripción</p>
				</article>
				<article class="info__columna">
					<img src="img/img1.jpeg" alt="" class="info__img">
					<h2 class="info__titulo">Música</h2>
					<p class="info__txt">Texto de descripción</p>
				</article>
			</section>
			<section class="info">				
				<article class="info__columna">
					<img src="img/img1.jpeg" alt="" class="info__img">
					<h2 class="info__titulo">Pintura</h2>
					<p class="info__txt">Texto de descripción</p>
				</article>
			</section>
			<!--
			<section class="cursos">
				<h2 class="section__titulo">CATEGORÍAS</h2>
				<div class="cursos__columna">
					<img src="img/img2.jpeg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos_titulo">Pintura</h3>
						<p class="cursos__txt">Lorem ipsum dolor sit amet, consectetur adipsicing elit. Sus...</p>
					</div>
				</div>
				<div class="cursos__columna">
					<img src="img/img2.jpeg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos_titulo">Escultura</h3>
						<p class="cursos__txt">Lorem ipsum dolor sit amet, consectetur adipsicing elit. Sus...</p>
					</div>
				</div>
				<div class="cursos__columna">
					<img src="img/img2.jpeg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos_titulo">Danza</h3>
						<p class="cursos__txt">Lorem ipsum dolor sit amet, consectetur adipsicing elit. Sus...</p>
					</div>
				</div>
				<div class="cursos__columna">
					<img src="img/img2.jpeg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos_titulo">Arquitectura</h3>
						<p class="cursos__txt">Lorem ipsum dolor sit amet, consectetur adipsicing elit. Sus...</p>
					</div>
				</div>
				<div class="cursos__columna">
					<img src="img/img2.jpeg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos_titulo">Danza</h3>
						<p class="cursos__txt">Lorem ipsum dolor sit amet, consectetur adipsicing elit. Sus...</p>
					</div>
				</div>
			</section>	
			-->	
		</div>
<center>
		<div class="container group">
			<div class="grid-1-5">
				<h2>Basic</h2>
				<h3><span class="uppercase">Free</span></h3>
				<p>10,000 monthly visits</p>
				<ul>
					<li>Limited Email Support</li>
					<li>Unlimited Data Transfer</li>
					<li>10GB Local Storage</li>
				</ul>
				<a href="" class="button">Sign Up</a>
			</div> 
			<div class="grid-1-5">
				<h2>Startup</h2>
				<h3><sup>$</sup>79<span class="small">/mo</span></h3>
				<p>25,000 monthly visits</p>
				<ul>
					<li>Limited Email Support</li>
					<li>Unlimited Data Transfer</li>
					<li>20GB Local Storage</li>
				</ul>		
				<a href="" class="button">Sign Up</a>	
			</div>
			<div class="grid-1-5">
				<h2>Growth</h2>
				<h3> <sup>$</sup> 179 <span class="small"> /mo </span></h3>
				<p>75,000 monthly visits</p>
				<ul>
					<li>Email Support</li>
					<li>Unlimited Data Transfer</li>
					<li>30GB Local Storage</li>
				</ul>	
				<a href="" class="button">Sign Up</a>		
			</div>
			<div class="grid-1-5">
				<h2>Premium</h2>
				<h3><sup>$</sup>499<span class="small">/mo</span></h3>
				<p>225,000 monthly visits</p>
				<ul>
					<li>Email Support</li>
					<li>Phone Support</li>
					<li>Unlimited Data Transfer</li>
				</ul>	
				<a href="" class="button">Sign Up</a>		
			</div>
			<div class="grid-1-5">
				<h2>Enterprise</h2>
				<h3><span class="uppercase">Let's Talk</span></h3>
				<p>1M+ monthly visits</p>
				<ul>
					<li>Email Support</li>
					<li>Phone Support</li>
					<li>Dedicated Environment</li>
					<li>Customized Plan</li>
				</ul>
				<a href="" class="button">Sign Up</a>
			</div>		
			<div class="grid-1-5">
				<h2>Enterprise</h2>
				<h3><span class="uppercase">Let's Talk</span></h3>
				<p>1M+ monthly visits</p>
				<ul>
					<li>Email Support</li>
					<li>Phone Support</li>
					<li>Dedicated Environment</li>
					<li>Customized Plan</li>
				</ul>
				<a href="" class="button">Sign Up</a>
			</div>
			<div class="grid-1-5">
				<h2>Enterprise</h2>
				<h3><span class="uppercase">Let's Talk</span></h3>
				<p>1M+ monthly visits</p>
				<ul>
					<li>Email Support</li>
					<li>Phone Support</li>
					<li>Dedicated Environment</li>
					<li>Customized Plan</li>
				</ul>
				<a href="" class="button">Sign Up</a>
			</div>	
			<div class="grid-1-5">
				<h2>Enterprise</h2>
				<h3><span class="uppercase">Let's Talk</span></h3>
				<p>1M+ monthly visits</p>
				<ul>
					<li>Email Support</li>
					<li>Phone Support</li>
					<li>Dedicated Environment</li>
					<li>Customized Plan</li>
				</ul>
				<a href="" class="button">Sign Up</a>
			</div>	
		</div>
	</main>
	</center>
	<br><br><br>
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