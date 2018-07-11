<?php
	/////// CONEXIÓN A LA BASE DE DATOS /////////
	$host="localhost";
	$usuario="root";
	$contraseña="";
	$base="cultura";

	$conexion= new mysqli($host, $usuario, $contraseña, $base);
	if ($conexion -> connect_errno)
	{
		die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
	}

	$consulta=ConsultarSubclasif($_GET['ns']);

	function ConsultarSubclasif($id_sc){
		$host="localhost";
		$usuario="root";
		$contraseña="";
		$base="cultura";
		$conexion= new mysqli($host, $usuario, $contraseña, $base);
		$query = "SELECT * FROM lista_subclasif where ID_S='".$id_sc."' ";
		$resultado=$conexion->query($query);
		$filas= $resultado->fetch_assoc();
		return [
			$filas['ID_S'],
			$filas['NOM_S'],
			$filas['DESC_S'],
			$filas['NOM_C']
		];

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="icon" href="img/logo.ico">
	<style type="text/css">
		p{
			color: #00004d;
			font-family: "Arial";
			transform: translateX(35%);
		}
		.opciones{
			width: 100%;
			vertical-align: middle;
			transform: translateX(35%);
		}
		.cabecera{
			height: 250px;
			background-color: rgba(102, 0, 102,0.8);
		}
		.seccion-registro{
			height: 800px;
		}
		.form-register{
			width: 95%;
			max-width: 500px;
			margin: auto;
			background: white;
			border-radius: 7px;
		}
		.form-register{
			width: 95%;
			max-width: 500px;
			padding: 15px;
			margin: auto;
			background: rgba(153, 153, 255,0.9);
			border-radius: 7px;
		}
		.contenedor-inputs {
			padding: 10px 30px;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		input{
			margin-bottom: 15px;
			padding: 15px;
			font-size: 16px;
			border-radius: 3px;
			border: 1px solid darkgray;
		}

		.input-48{
			width: 48%;
		}
		.input-100{
			width: 100%;
		}

		.btn-enviar{
			background: rgba(0, 0, 77,1);
			color: #fff;
			margin: auto;
			padding: 10px 40px;
			cursor: pointer;
			font-size: 20px;
		}
		.btn-enviar:active{
			transform: scale(1.05);
		}
		.from__link{
			width: 100%;
			margin: 7px;
			text-align: center;
			font-size: 14px;
		}
	</style>
</head>
<body>
	<header class="cabecera">
		<br><br><br><br><br><br><br><br><br><br><br>
		<div class="contenedor" style="transform: translateX(25%) ">
			<p><img src="img/logo.png" class="logo" style="height: 230px; width: 230px; transform: translateX(-100%) translateY(-105%);"></p>
			<h2 class="banner__titulo" style="color: white; text-align: center; transform: translateX(10%) translateY(-30%);">Ingresa los datos a cambiar</h2>
			<br><br>
		</div>
	</header>
	<section class="seccion-registro">
		<br><br><br><br>
		<form action="modif_subclasif2.php" method="post" class="form-register" >
			<div class="contenedor-inputs">
				<input type="hidden" name="id_s" value="<?php echo $consulta[0] ?>">
				<?php echo $_GET['ns'] ?>
				Nombre: <input type="text" name="nombre"  value='<?php echo $consulta[1] ?>' class="input-100" >
				Clasificacion:<input type="text" name="clasif"  value='<?php echo $consulta[3] ?>' class="input-100" >
				Descripción:<textarea style="border-radius: 10px;" rows="3" cols="50" name="descripcion" class="input-100"><?php echo $consulta[2]; ?></textarea>
				<input type="submit" name="guardar" value="Guardar cambios" class="btn-enviar"><br><br><br>
			</div>
		</form>
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