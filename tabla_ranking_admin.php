<?php
	header('Content-Type: text/html; charset=UTF-8');
	@session_start();
	$conexion = mysqli_connect("localhost", "root", "", "cultura");
	$query = "SELECT TITULO, ASISTENCIAS from ranking";
	$result = mysqli_query($conexion,$query);	
	if (!$result) {
	    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
	    exit;
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ranking</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="icon" href="img/logo.ico">
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
		table, td, th {    
	    border: 1px solid #ddd;
	    text-align: center;
	}

	table {
	    border-collapse: collapse;
	    width: 100%;
	}

	th, td {
	    padding: 15px;
	}
	</style>

	
<body>
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
	</div>

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
			<h2 class="banner__titulo">Artistas</h2>
			<!--<p class="banner__txt"> Elige una bella arte</p>-->
		</div>

	</div>

	<main class="main">
		<div class="contenedor">			
			<br><br><center><a href="eventos_recientes_admin.php" style="color: white">VER MAS RECIENTES</a></h1></center><br>
		</div>
	</main>
	<center>
	<section class="seccion-registro">
		<br><br>
		<form action="obtener_artista_e.php" name="form_evento" method="post" class="form-register"  onsubmit=" return validar_evento()" " >			
			<br><br><h3>TOP DE EVENTOS CON MAYOR ASISTENCIA</h3><hr><br>
			<div class="contenedor-inputs" >

				<table cellpadding="50" cellspacing="10">
					<tr>
						<th>EVENTO</th>
						<th>ASISTENCIAS</th>
					</tr>			
				<?php					
					$cont = 1;	
					while($cont <= 5 && $fila = mysqli_fetch_row($result)){
						$TITULO = $fila[0];
						$ASIST = $fila[1];
						echo "<tr>";
							echo '<td> '.$TITULO.' </td>';
							echo '<td>'.$ASIST.'</td>';
						echo "</tr";						
						echo "<br>";
						$cont = $cont + 1;
					}
				?>		
				</table>	
			</div>
			<br><br>
			
		</form>
		</center>
	</section>
	
	<script src="js/menu.js"></script>
</body>
</html>