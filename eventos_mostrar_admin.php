<?php
	@session_start();
	$conexion = mysqli_connect("localhost", "root", "", "cultura");
	$query = "SELECT TITULO,NOM_S,NOM_C,HORA,FECHA,ID_E from eventos";
	$result = mysqli_query($conexion,$query);	
	if (!$result) {
	    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
	    exit;
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Eventos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="icon" href="img/logo.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style.css">  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/peticion.js"></script>
</head>
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
			max-width: 180px;
		}
		.nav li:hover > ul{
			display: block;
			-webkit-user-select: none;
		    
		}

		.transpa  {
	    background-color: transparent;
	    color:white;
	    }
	</style>S
<body>
	<header class="header">
		<div class="contenedor">
			<span class="icon-menu" id="btn-menu"></span>
			<nav class="nav" id="nav">
				<ul class="menu">
					<li class="menu__item"><a class="menu__link select" href="admin.php">Inicio</a> </li>	
					<li class="menu__item"><a class="menu__link" href="#">Agregar</a>
						<ul class="menu">
							<li><a class="menu__link" href="altas_subclas_menu.php">Subclasificación</a></li>
							<li><a class="menu__link"  href="lista_clasificacion_e.php">Evento</a></li>
							<li><a class="menu__link"  href="altas_artistas_menu.php">Artista</a></li>
						</ul>	
					</li>
					<li class="menu__item"><a class="menu__link" href="#">Cambios</a>
						<ul class="menu">
							<li><a class="menu__link" href="modif_eventos.php">Subclasificación</a></li>
							<li><a class="menu__link"  href="modif_subclasif.php">Evento</a></li>
							<li><a class="menu__link"  href="modif_artista.php">Artista</a></li>
						</ul>	
					</li>
					<li class="menu__item"><a class="menu__link" href="#">Mostrar</a>
						<ul class="menu">
							<li><a class="menu__link" href="subclas_mostrar_admin.php">Subclasificación</a></li>
							<li><a class="menu__link"  href="eventos_mostrar_admin.php">Evento</a></li>
							<li><a class="menu__link"  href="artistas_mostrar_admin.php">Artista</a></li>
						</ul>
					</li>
							
					<?php
						@session_start();
						$usuario = $_SESSION['k_nombre'];
						if($usuario != ""){
							echo '<li class="menu__item"><a class="menu__link" href="#">'.$usuario.'</a>';
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
			<h2 class="banner__titulo">EVENTOS</h2>
			<!--<p class="banner__txt"> Elige una bella arte</p>-->
		</div>

	</div>

	<main class="main">
		
		<div class="contenedor">
			<br><br><center><h1><a href="tabla_ranking_admin.php" style="color: white">¡VER RANKING!</a></h1>
				<a href="eventos_recientes_admin.php" style="color: white">VER MAS RECIENTES</a></h1></center><br><br><br>
				
			<div class="container group">
			<?php						
				while($fila = mysqli_fetch_row($result)){
					$TITULO = $fila[0];
					$NOM_S = $fila[1];
					$NOM_C = $fila[2];
					$HORA = $fila[3];
					$FECHA = $fila[4];
					$ID_E = $fila[5];
						
					echo '<form action="detalles_evento_admin.php" name="form_evento" method="post">';
					echo '<div class="grid-1-5">';
						echo "<br>";
						echo '<h2>'.$NOM_C.'</h2><br><hr><br>';
						echo '<h3> » '.$TITULO. ' «<span class="uppercase"></span> </h3><br><hr><br>';
						echo '<p><b>  » '.$NOM_S.' « </b </p>';
						echo "<br>";
						echo '<ul>';
							echo '<li>HORA: '.$HORA.'</li>';
							echo '<li>FECHA: '.$FECHA.'</li>';
						echo '</ul>';						
						echo '<input type="hidden"  style="width:40px; height:1px" class="transpa" value="'.$ID_E.'" name="valor" readonly="readonly"><br>';
						echo '<br><input type="submit" name="aceptar" value="Ver detalles" class="btn-enviar">';						
						#echo '<a href="detalles_evento.php" name="post" value="'.$ID_E.'" title="'.$ID_E.'" target="_blank"><img src="img/boton_detalles.png"></a> ';
						#echo '<a href="http://localhost/difusion_arte/detalles_evento.php/?variable1='.$ID_E.'"><img src="img/verdetalle.png"></a>';
						#echo '<a href="" class="button">Ver detalle</a>';
					echo '</div>';
					echo '</form>';
				}
			?>
			</div>
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