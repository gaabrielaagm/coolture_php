<?php	
	$conexion = mysqli_connect("localhost", "root", "", "cultura");
	$query = "SELECT NOM_C from clasificacion;";
	$result = mysqli_query($conexion,$query);	
	if (!$result) {
	    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
	    exit;
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Clasificaciones</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="icon" href="img/logo.ico">
</head>
<body>
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
			<h2 class="banner__titulo">ACERCA DE</h2>
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
		<form action="obtener_clas.php" name="form_evento" method="post" class="form-register"  onsubmit=" return validar_evento()" " >			
			<div class="contenedor-inputs" >				
				<input list="nav" name="clasificacion">
					<datalist id="nav">
						<?php						
							while($fila = mysqli_fetch_row($result)){
								$NOMBRE = $fila[0];
								echo "<option value='".$NOMBRE."'>";
							}
						?>						
					</datalist>
			</div>
			<br><br>
			<input type="submit" name="aceptar" value="Siguiente" class="btn-enviar">
			<br><br><a href="altas_subclasificacion.html">Crear Nueva</a><br><br>
			
		</form>
		</center>
	</section>
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