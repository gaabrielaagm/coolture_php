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
	<!-- SCRIPTS JS-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/peticion.js"></script>
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
</head>
<body>
	<header class="header">
		<div class="contenedor">
			<span class="icon-menu" id="btn-menu"></span>
			<nav class="nav" id="nav">
				<ul class="menu">
					<li class="menu__item"><a class="menu__link" href="clasificacion.php">Inicio</a> </li>	
					<li class="menu__item"><a class="menu__link" href="subclasificacion.php">Subcategorías</a></li>	
					<li class="menu__item"><a class="menu__link" href="eventos.php">Eventos</a></li>			
					<li class="menu__item"><a class="menu__link" href="acerca.php">Acerca de</a></li>		
					<li class="menu__item"><a class="menu__link" href="contacto.php">Contacto</a></li>		
					<?php
						@session_start();
						$usuario = $_SESSION['k_nombre'];
						if($usuario != ""){
							echo '<li class="menu__item"><a class="menu__link select" href="editarperfil.php">'.$usuario.'</a>';
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
			<p><img src="img/logo.png" class="logo" style="transform: translateX(-120%) translateY(-80%);"></p>
			<h2 class="banner__titulo">MI PERFIL</h2>
			<!--<p class="banner__txt"> Elige una bella arte</p>-->
		</div>

	</div>
	<main class="main">
		
		</header>
		<section class="seccion-registro">
			<form action="ejecutar_edicion.php" method="post" class="form-register" >
				<?php
				@session_start();
				// Conexión a la base de datos
				$conexion = mysqli_connect("localhost", "root", "", "cultura");				

				/*
				// obtener datos del usuario  
			    $q = "SELECT * FROM `$tabla` WHERE `$iden` = '$id'";  
			    $result = mysql_query($q, $sql_link) or oiError(mysql_error($sql_link));  
			    $ret = mysql_fetch_array($result);  
			    $segm = $ret[$campo];  
			    mysql_free_result($result);  
				*/
			    //Obtener variables desde tabla
				$id_usuario = $_SESSION["k_id_usuario"];
			    $q = "SELECT * FROM usuario WHERE ID_U=$id_usuario";
			    $result = mysqli_query($conexion,$q);// or oiError(mysql_error($conexion)); 
			    $row = mysqli_fetch_array($result);  
				// Variables para formulario
				$password = $_SESSION["k_password"]=$row["PASSWORD"];
				$correo = $_SESSION["k_correo"]=$row["CORREO"];
				$notif = $_SESSION["k_notif"]=$row["NOTIF"];
				
				echo '
				<div class="contenedor-inputs">
					<input type="text" name="nombre" value="'.$usuario.'" class="input-100" required><br><br>
					<input type="password" name="password" value="'.$password.'" class="input-100" required><br><br>
					<input type="email" name="correo" value="'.$correo.'" class="input-100" required><br><br>
					<p>¿Qué tipos de arte prefieres?</p>';?>
					  <div class="opciones">
					  	<?php
					  	$query='CALL consultar_intereses('.$id_usuario.')';
					  	$buscarAlumnos=$conexion->query($query);
					  	$cont=1; // Contador para que se muestren los check no activos
						$filaAlumnos= $buscarAlumnos->fetch_assoc();
					  	while($cont<=7)
						{
							switch ($cont) {
								case 1:
									if ($cont==(int)$filaAlumnos["ID_C"]) {
										$filaAlumnos= $buscarAlumnos->fetch_assoc();?>
										<input type="checkbox" name="preferencias[]" value="danza" checked> Danza <br>
										<?php
									}else{?>
										<input type="checkbox" name="preferencias[]" value="danza"> Danza <br>
										<?php
									}
									break;
								case 2:
									if ($cont==(int)$filaAlumnos["ID_C"]) {
										$filaAlumnos= $buscarAlumnos->fetch_assoc();?>
										<input type="checkbox" name="preferencias[]" value="pintura" checked> Pintura <br>
										<?php
									}else{?>
										<input type="checkbox" name="preferencias[]" value="pintura"> Pintura <br>
										<?php
									}									
									break;
								case 3:
									if ($cont==(int)$filaAlumnos["ID_C"]) {
										$filaAlumnos= $buscarAlumnos->fetch_assoc();?>
										<input type="checkbox" name="preferencias[]" value="arquitectura" checked> Arquitectura <br>
										<?php
									}else{?>
										<input type="checkbox" name="preferencias[]" value="arquitectura"> Arquitectura <br>
										<?php
									}
									break;
								case 4:
									if ($cont==(int)$filaAlumnos["ID_C"]) {
										$filaAlumnos= $buscarAlumnos->fetch_assoc();?>
										<input type="checkbox" name="preferencias[]" value="escultura" checked> Escultura <br>
										<?php
									}else{?>
										<input type="checkbox" name="preferencias[]" value="escultura" > Escultura <br>
										<?php
									}
									break;
								case 5:
									if ($cont==(int)$filaAlumnos["ID_C"]) {
										$filaAlumnos= $buscarAlumnos->fetch_assoc();?>
										<input type="checkbox" name="preferencias[]" value="musica" checked> Musica <br>
										<?php
									}else{?>
										<input type="checkbox" name="preferencias[]" value="musica"> Musica <br>
										<?php
									}
									break;
								case 6:
									if ($cont==(int)$filaAlumnos["ID_C"]) {
										$filaAlumnos= $buscarAlumnos->fetch_assoc();?>
										<input type="checkbox" name="preferencias[]" value="cine" checked> Cine <br>
										<?php
									}else{?>
										<input type="checkbox" name="preferencias[]" value="cine"> Cine <br>
										<?php
									}
									break;
								case 7:
									if ($cont==(int)$filaAlumnos["ID_C"]) {
										$filaAlumnos= $buscarAlumnos->fetch_assoc();?>
										<input type="checkbox" name="preferencias[]" value="literatura" checked> Literatura <br>
										<?php
									}else{?>
										<input type="checkbox" name="preferencias[]" value="literatura"> Literatura <br>
										<?php
									}
									break;								
								default:
									break;
							}
							$cont=$cont+1;

						}
					  		
					  	?>
					  	
					  </div>
					<p><br>¿Deseas recibir notificaciones?</p>
					<div class="opciones">
						<?php
				
						if ($notif==1) {?>
							<input type="radio" name="notif" value="si" checked> Si
							<input type="radio" name="notif" value="no"> No <br> <br>
						<?php
						}else{?>
							<input type="radio" name="notif" value="si"> Si
							<input type="radio" name="notif" value="no" checked> No <br> <br>
						<?php
						}

						?>
					</div>
					<input type="submit" name="Guardar_cambios" value="Guardar cambios" class="btn-enviar"><br><br><br>
					<div class="opciones" style="font-size: 20px; color: blue;"><br>
						<a href="eliminar_usuario.php">Eliminar cuenta</a>
				</div>
				
			</form>
		</section>
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