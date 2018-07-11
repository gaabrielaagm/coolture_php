<?php
	header('Content-Type: text/html; charset=UTF-8');
	@session_start();
	$sub = $_SESSION["subclasificacion"];
	$_SESSION["subclasificacion"] = $sub;
	$conexion = mysqli_connect("localhost", "root", "", "cultura");
	$query = "SELECT ID_A, NOM_A from artista";
	$result = mysqli_query($conexion,$query);	
	if (!$result) {
	    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
	    exit;
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Artistas</title>
	<meta charset="UTF-8">
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
	</style>
</head>
	
<body>
<header class="header">
		<div class="contenedor">
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
							<li><a class="menu__link" href="subclasificacion_admin.php">Subclasificación</a></li>
							<li><a class="menu__link"  href="subclasificacion_mostrar_admin.php">Evento</a></li>
							<li><a class="menu__link"  href="subclasificacion_mostrar.php">Artista</a></li>
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
	<?php
		@session_start();
		if(empty($_SESSION['k_nombre'])){
			?>
			<script language="javascript">
				alert('ERROR DE INICIO DE SESION, FAVOR DE VOLVER A INGRESAR');
				location.href = "ingresar.html";
			</script>
			<?php			
		}
	?>
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
			<h2 class="banner__titulo">SELECCIONAR ARTISTAS</h2>
			<!--<p class="banner__txt"> Elige una bella arte</p>-->
		</div>

	</div>
	<main class="main">
		<div class="contenedor">
			
		</div>
	</main>
	<center>
	<section class="seccion-registro">
		<br><br><br><br>
		<form action="obtener_artista_e.php" name="form_evento" method="post" class="form-register"  onsubmit=" return validar_evento()" " >			
			<div class="contenedor-inputs" >
				<table  >
					<tr>
						<th>SELECCIONAR</th>
						<th>NOM. ARTISTA</th>
					</tr>			
				<?php						
					while($fila = mysqli_fetch_row($result)){
						$ID_A = $fila[0];
						$NOMBRE = $fila[1];
						echo "<tr>";
							echo '<td> <input type="checkbox" name="artist[]" value="'.$ID_A.'"> </td>';
							echo '<td>'.$NOMBRE.'</td>';
						echo "</tr";						
						echo "<br>";
					}
				?>		
				</table>	
			</div>
			<br><br>
			<input type="submit" name="aceptar" value="Siguiente" class="btn-enviar">
			<br><br><a href="altas_artistas.html">Crear Nueva</a><br><br>
			
		</form>
		</center>
	</section>
	
	<script src="js/menu.js"></script>
</body>
</html>