<!DOCTYPE html>
<html lang="es">
<head>
	<title>INICIO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="icon" href="img/logo.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<style type="text/css">
		.nav{
			position: absolute; /*para que se salga*/
			top: 60px;
			left: -100%; /*para que se vaya a la izquierda y no se vea*/
			width: 100%;
			transition: all 0.4s;
			transform: translateX(100%) translateY(-50%);
		}
		.menu,.submenu__item{
			list-style: none; /* quita los puntos de la lista*/
			padding: 0;
			margin: 0;	
			display: flex;
			transform: translateX(40%);
			background-color: rgba(0,0,77,0.5);
		}
		.menu__link, .submenu__item{
			display: block;
			padding: 20px;
			text-decoration: none;
			color: #fff;
			font-size: 20px;

		}

		.menu__link:hover, .select, .submenu__item:hover{ /*Se tomaran los estilos cuando esté seleccionada la opción*/
			background: white;
			color: #00004d;

		}
		.mostrar{ /*Para mostrar y esconder el menú*/
			left: 0;
		}
		.k li a:hover{
			background-color: #424242;

		}

		.nav li ul{
			display: none;
			position: absolute;
			max-width: 140px;
		}
		.nav li:hover > ul{
			display: block;
			-webkit-user-select: none;
		    
		}
		.transpa  {
	    background-color: transparent;
	    color:white;
	    }
	</style>
</head>
<body>
	<header class="header">
		<div class="contenedor">
			<span class="icon-menu" id="btn-menu"></span>
			<nav class="nav" id="nav">
				<ul class="menu">
					<li class="menu__item"><a class="menu__link select" href="clasificacion.php">Inicio</a> </li>	
					<li class="menu__item"><a class="menu__link" href="#">Subclasificación</a>
						<ul class="menu">
							<li><a class="menu__link" href="subclasificacion.php">Buscar</a></li>
							<li><a class="menu__link"  href="subclasificacion_mostrar.php">Mostrar</a></li>
						</ul>	
					</li>
					<li class="menu__item"><a class="menu__link" href="#">Eventos</a>
						<ul class="menu">
							<li><a class="menu__link" href="eventos_.php">Buscar</a></li>
							<li><a class="menu__link"  href="eventos.php">Mostrar</a></li>
						</ul>	
					</li>
					<li class="menu__item"><a class="menu__link" href="#">Artistas</a>
						<ul class="menu">
							<li><a class="menu__link" href="artistas_.php">Buscar</a></li>
							<li><a class="menu__link"  href="artistas.php">Mostrar</a></li>
						</ul>	
					</li>	
					<li class="menu__item"><a class="menu__link" href="acerca.php">Acerca de</a></li>		
							
					<?php
						@session_start();
						$usuario = $_SESSION['k_nombre'];
						if($usuario != ""){
							echo '<li class="menu__item"><a class="menu__link" href="editarperfil.php">'.$usuario.'</a>';
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
							<!--<li><a class="menu__link" href="editarperfil.php">Editar perfil</a></li>-->
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
						<form action="detalles_subclas.php" name="form_evento" method="post">
							<a href="subclasificacion_1.php"><img src="img/danza.jpg" alt="" class="info__img"></a>
							<h3>Danza</h3><br>
							Clasificacion: <input type="text" style="width:40px; height:1px" value="1" name="valor" class="transpa" readonly="readonly"><br><br>
							<input type="submit" name="aceptar" value="Ver detalles" class="btn-enviar">
						</form>
					</article>

					<article class="info__columna">
						<form action="detalles_subclas.php" name="form_evento" method="post">			
							<a href="subclasificacion_1.php"><img src="img/pintura.jpeg" alt="" class="info__img"></a>
							<h3>Pintura</h3><br>
							Clasificacion: <input type="text" style="width:40px; height:1px" value="2" name="valor" class="transpa" readonly="readonly"><br><br>
							<input type="submit" name="aceptar" value="Ver detalles" class="btn-enviar">
						</form>
					</article>

					<article class="info__columna" >
						<form action="detalles_subclas.php" name="form_evento" method="post">
							<a href="subclasificacion_1.php"><img src="img/arqui.jpg" alt="" class="info__img"></a>
							<h3>Arquitectura</h3><br>
							Clasificacion: <input type="text"  style="width:40px; height:1px" value="3" name="valor" class="transpa" readonly="readonly"><br><br>
							<input type="submit" name="aceptar" value="Ver detalles" class="btn-enviar">
						</form>
					</article>
				
									
			</section>	

			<section class="info">
				
					<article class="info__columna">
						<form action="detalles_subclas.php" name="form_evento" method="post">
							<a href="subclasificacion_1.php"><img src="img/escultura.jpg" alt="" class="info__img"></a>
							<h3>Escultura</h3><br>
							Clasificacion: <input type="text" style="width:40px; height:1px" value="4" name="valor" class="transpa" readonly="readonly"><br><br>
							<input type="submit" name="aceptar" value="Ver detalles" class="btn-enviar">
						</form>
					</article>			

				
					<article class="info__columna">
						<form action="detalles_subclas.php" name="form_evento" method="post">
							<a href="subclasificacion_1.php"><img src="img/musica.png" alt="" class="info__img"></a>
							<h3>Musica</h3><br>
							Clasificacion: <input type="text" style="width:40px; height:1px" value="5" name="valor" class="transpa" readonly="readonly"><br><br>
							<input type="submit" name="aceptar" value="Ver detalles" class="btn-enviar">
						</form>
					</article>

					<article class="info__columna">
						<form action="detalles_subclas.php" name="form_evento" method="post">
							<a href="subclasificacion_1.php"><img src="img/cine.jpg" alt="" class="info__img"></a>
							<h3>Cine</h3><br>
							Clasificacion: <input type="text" style="width:40px; height:1px" value="6" name="valor" class="transpa" readonly="readonly"><br><br>
							<input type="submit" name="aceptar" value="Ver detalles" class="btn-enviar">
						</form>
					</article>			

			</section>

			<section class="info">	

					<article class="info__columna">
						<form action="detalles_subclas.php" name="form_evento" method="post">
							<a href="subclasificacion_1.php"><img src="img/literatura.jpg" alt="" class="info__img"></a>
							<h3>Literatura</h3><br>
							Clasificacion: <input type="text" style="width:40px; height:1px" value="7" name="valor" class="transpa" readonly="readonly"><br><br>
							<input type="submit" name="aceptar" value="Ver detalles" class="btn-enviar">
						</form>
					</article>
				
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