<?php
	@session_start();
	$conexion = mysqli_connect("localhost", "root", "", "cultura");
	$query = "SELECT TITULO,NOM_S,NOM_C,HORA,FECHA,ID_E,DIREC,DESC_E,ASISTENCIAS from eventos where ID_E=57";
	$result = mysqli_query($conexion,$query);	
	if (!$result) {
	    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
	    exit;
	}

	$query2 = "SELECT NOM_A from pertenece_nombres where ID_E='".$ID_E."'";
	$result2 = mysqli_query($conexion,$query2);	
	if (!$result2) {
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
					<li class="menu__item"><a class="menu__link" href="clasificacion.php">Inicio</a> </li>	
					<li class="menu__item"><a class="menu__link" href="subclasificacion.php">Subcategorías</a></li>	
					<li class="menu__item"><a class="menu__link select" href="eventos.php">Eventos</a></li>			
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
			<h2 class="banner__titulo">EVENTOS</h2>
			<!--<p class="banner__txt"> Elige una bella arte</p>-->
		</div>

	</div>
	<main class="main">
		<div class="contenedor">
			<div class="container group">
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
					
					echo '<div class="grid-1-5">';
						echo "<br>";
						echo '<h2>'.$NOM_C.'</h2>';
						echo '<h3>'.$TITULO.'<span class="uppercase"></span> </h3>';
						echo '<p>'.$NOM_S.'</p>';
						echo "<br>";
						echo '<ul>';
							echo '<li>HORA: '.$HORA.'</li>';
							echo '<li>FECHA: '.$FECHA.'</li>';
							echo '<li>DIRECCION: '.$DIREC.'</li>';
							echo '<li>DESCRIPCION: '.$DESC.'</li>';
							echo '<li>ASISTENCIAS: '.$ASISTENCIAS.'</li>';
							echo '<li>ARTISTAS: <ul>';
							while($fila2 = mysqli_fetch_row($result2)){
								echo "<li>".$fila2[0]." ";
							}
							echo '</lu>'
						echo '</ul>';
					echo '</div>';
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