<?php
	#$ID_E = $_GET['variable1'];
	#echo $ID_E;
	#$pdo = new PDO('mysql:host= localhost; dbname=cultura', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
	if(!empty($_POST["subclas_seleccionada"])){
		$NOMBRE_S = $_POST["subclas_seleccionada"];
		@session_start();
		$conexion = mysqli_connect("localhost", "root", "", "cultura");
		$query = "SELECT NOM_C,NOM_S, DESC_S,ID_S from subclasif_clasif where NOM_S='".$NOMBRE_S."';";
		#echo "";
		$result = mysqli_query($conexion,$query);	
		if (!$result) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}
	}else{
		?>
		<script language="javascript">
			location.href = "clasificacion.php";
		</script>
		<?php
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
	<link rel="stylesheet" type="text/css" href="css/estilosEventos.css">
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
			max-width: 140px;
		}
		.nav li:hover > ul{
			display: block;
			-webkit-user-select: none;
		    
		}

		.info{
			background-color: #BE81F7;
			opacity: 0.9;
		}
	</style>

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
	<br><br><br><br>
	<main class="main">
		<div class="contenedor">
			<div class="container group">
			<center><div class="EventoM">
			<?php	
			 	$fila = mysqli_fetch_row($result);
			 		$NOM_C = $fila[0];
					$NOM_S = $fila[1];		
					$DESC_S = $fila[2];
					$ID_S = $fila[3];
					echo '<div class="info" >';
						echo '<div class="infoPrinc"><br>';
						echo '<h2>'.$NOM_C.'</h2> <hr>';
						echo '<h2>'.$NOM_S.'</h2>';
						echo "<br></div>";
						echo '<div class="extra">';
							echo "<br><br><br>";
							echo '<div class="titulos">DESCRIPCION: <textarea rows="4" cols="50" name="comment" form="usrform" style="width:400px;height:200px; min-width:480px"  readonly="readonly">'.$DESC_S.'</textarea> </div><br><br>';
							echo '<form action="detalles_eventos_sub.php" name="form_evento" method="post">';
								echo '<input type="hidden" name="id_sub" value="'.$ID_S.'">';
								echo '<br><input type="submit" style="width:250px;height:50px" name="aceptar" value="Ver eventos" class="btn-enviar"><br>';
							echo "</form>";
							echo "<br><br>";
						echo '</div>';	
					echo '</div>';
			?>
			</div>
			</center>
			</div>
		</div>
	</main>

	<br><br><br><br><br><br>
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
