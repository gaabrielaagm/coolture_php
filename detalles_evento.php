<?php
	#$ID_E = $_GET['variable1'];
	#echo $ID_E;
	@session_start();						
	$usuario = $_SESSION['k_nombre'];
	if(!empty($_POST["valor"])){
		$ID_E = $_POST["valor"];
		#echo $ID_E;
		@session_start();
		$conexion = mysqli_connect("localhost", "root", "", "cultura");
		$query = "SELECT TITULO,NOM_S,NOM_C,HORA,FECHA,ID_E,DIREC,DESC_E,ASISTENCIAS from eventos where ID_E='".$ID_E."'";
		$result = mysqli_query($conexion,$query);	
		if (!$result) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}

		$query2 = "SELECT DISTINCT NOM_A from pertenece_nombres where ID_E='".$ID_E."'";
		$result2 = mysqli_query($conexion,$query2);	
		if (!$result2) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}

		$query3 = "SELECT ID_U from asistira where ID_U= (select ID_U from usuario where NOM_U = '".$usuario."') and Asistencia = 1";
		$result3 = mysqli_query($conexion,$query3);	
		if (!$result3) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}else{

		}
	}else{
		?>
		<script language="javascript">
			location.href = "eventos.php";
		</script>
		<?php
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Subclasificaciones</title>
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
						
						if($usuario != ""){
							echo '<li class="menu__item"><a class="menu__link" href="#"">'.$usuario.'</a>';
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
			<div class="container group">
			<center><div class="EventoM">
			<?php	
			 	$fila = mysqli_fetch_row($result);
					$TITULO = $fila[0];
					$NOM_S = $fila[1];
					$NOM_C = $fila[2];
					$HORA = $fila[3];
					$FECHA = $fila[4];
					$ID_E = $fila[5];
					$DIREC = $fila[6];
					$DESC = $fila[7];
					$ASISTENCIAS = $fila[8];
					$_SESSION["ID_E"] = $ID_E;
					echo '<form action="detalles_evento_.php" name="form_evento" method="post">';
					echo '<div class="info" >';
						echo '<div class="infoPrinc"><br>';
						echo '<h2>'.$NOM_C.'</h2><hr>';
						echo '<h3>'.$TITULO.'</h3><hr>';
						echo '<p>'.$NOM_S.'</p>';
						echo "<br></div>";
						echo '<div class="extra">';
							echo '<br><div class="titulos">HORA: <input type="time" style="width:160px;height:15px" name="" value="'.$HORA.'" readonly="readonly"> </div>';
							echo '<div class="titulos">FECHA: <input type="text"  style="width:160px;height:15px" name="" value="'.$FECHA.'"> </div>';
							echo '<div class="titulos">DIRECCION:  <input type="textarea" style="width:500px;height:15px" name="" value="'.$DIREC.'"> </div>';
							echo '<div class="titulos">DESCRIPCIÓN: <textarea rows="4" cols="50" name="comment" form="usrform" style="width:400px;height:50px; min-width:480px"  readonly="readonly">'.$DESC.'</textarea> </div><br><br>';
							echo '<div class="titulos">ASISTENCIAS: <input type="text" style="width:50px;height:15px" name="" value="'.$ASISTENCIAS.'" readonly="readonly"> </div>';
							echo '<br><div class="titulos">ARTISTAS:<br><br>';
							while($fila2 = mysqli_fetch_row($result2)){
								echo "» ".$fila2[0]."<br> ";
							}
							$querys = mysqli_num_rows($result3);
							#echo "querys =".$querys;
							$fila3 = mysqli_fetch_row($result3);
							$_SESSION["id_user_"] = $fila3[0];
							if($querys == 0){									
								echo '<br><br><input type="checkbox" value="x" name="asistira"> ¿Asistirá?';
								echo '</div>';						
								#echo '<br><input type="submit" style="width:200px;height:60px" name="aceptar" value="Sí asistiré" class="btn-enviar">';			
							}else{	
								echo '<br><br><input type="checkbox" value="x" name="asistira" checked> ¿Asistirá?';
								echo '</div>';						
										
							}	
							echo '<br><input type="submit" style="width:200px;height:60px" name="aceptar" value="Aceptar" class="btn-enviar">';							
					echo '</div>';
					echo '</div>';
					echo '</form>';

			?>
			</div>
			</center>
			</div>
		</div>

	</main>
	<br><br>
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
