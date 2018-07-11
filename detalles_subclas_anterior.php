<?php
	#$ID_E = $_GET['variable1'];
	#echo $ID_E;
	#$pdo = new PDO('mysql:host= localhost; dbname=cultura', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
	if(!empty($_POST["valor"])){
		$ID_C = $_POST["valor"];
		echo $ID_C;
		@session_start();
		$conexion = mysqli_connect("localhost", "root", "", "cultura");
		$query = "SELECT NOM_C,DESC_C from clasificacion where ID_C=".$ID_C.";";
		#echo "";
		$result = mysqli_query($conexion,$query);	
		if (!$result) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}

		$query2 = "SELECT NOM_S from subclasificacion where ID_C='".$ID_C."'";
		$result2 = mysqli_query($conexion,$query2);	
		if (!$result2) {
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
	</style>

<body>
	<header class="header">
		<div class="contenedor">
			<span class="icon-menu" id="btn-menu"></span>
			<nav class="nav" id="nav">
				<ul class="menu">
					<li class="menu__item"><a class="menu__link" href="clasificacion.php">Inicio</a> </li>	
					<li class="menu__item"><a class="menu__link" href="subclasificacion.php">Subcategorías</a></li>	
					<li class="menu__item"><a class="menu__link select" href="eventos.php">Eventos</a>
						<ul class="menu">
								<li><a class="menu__link"  href="eventos_.php">Buscar</a></li>
								<li><a class="menu__link"  href="eventos_.php">Mostrar</a></li>
						</ul>		
					</li>
					<li class="menu__item"><a class="menu__link" href="acerca.php">Acerca de</a></li>		
					<li class="menu__item"><a class="menu__link" href="contacto.php">Contacto</a></li>		
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
			<h2 class="banner__titulo">SUNCLASIFICACION </h2>
			<!--<p class="banner__txt"> Elige una bella arte</p>-->
		</div>

	</div>
	<main class="main">
		<div class="contenedor">
			<div class="container group">
			<center><div class="EventoM">
			<?php	
			 	$fila = mysqli_fetch_row($result);
			 		$NOM_C = $fila[0];
					$DESC_C = $fila[1];					
					#$_SESSION["ID_E"] = $ID_E;
					echo '<div >';
						echo '<div class="infoPrinc"><br>';
						echo '<h2>'.$NOM_C.'</h2>';
						echo "<br></div>";
						echo '<div class="extra">';
							echo '<br><div class="titulos">DESCRIPCION:</div>'.$DESC_C.'<br>';
							echo '<br><div class="titulos">SUBCLASIFICACIONES:</div>';
							while($fila2 = mysqli_fetch_row($result2)){
								echo "".$fila2[0]."<br> ";
							}
							echo '';
						echo '</div>';	
					echo '</div>';

			?>
			</div>
			</center>
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
