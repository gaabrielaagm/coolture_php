<!DOCTYPE html>
<html>
<head>
	<title>Ingresar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="icon" href="img/logo.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
	<script type="text/javascript" language="javascript">

		function validar_subclasif(){

			var nom_s, desc_s;
			nom_s=document.getElementById("nombre_s").value;
			desc_s=document.getElementById("descripcion").value;

			if(nom_s== "" || desc_s==="" ){
				alert("Los campos son obligatorios");
				return false; 
			}	
			else if(nom_s.length>50){
				alert("El nombre es muy largo");
				return false;
			}else{
				alert ("Todo bien");			    
			}
		}
			
		 </script>

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
		/*ESTILO DE MENU */
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
			transform: translateX(40%) translateY(-15%);
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
	<header class="cabecera">
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
		<br><br><br><br><br><br><br><br><br><br>
		<div class="contenedor" style="transform: translateX(25%) ">
			<p><img src="img/logo.png" class="logo" style="height: 230px; width: 230px; transform: translateX(-300%) translateY(-105%);"></p>
			<h2 class="banner__titulo" style="color: white; text-align: center; transform: translateX(-100%) translateY(-30%);">DATOS DE LA SUBCLASIFICACIÓN</h2>
			<br><br>
			<!-- -->

		</div>
	</header>
	<?php
		@session_start();
		$usuario = $_SESSION['k_nombre'];
		if(empty($usuario)){
			?>
			<script language="javascript">
				alert('ERROR DE INICIO DE SESION, FAVOR DE VOLVER A INGRESAR');
				location.href = "ingresar.html";
			</script>
			<?php			
		}
	?>
	
	<section class="seccion-registro">
		<br><br><br><br>
		<form action="dar_alta_sub_menu.php" name="form_evento" method="post" class="form-register" onsubmit=" return validar_subclasif()"  " >
			<div class="contenedor-inputs" >
				<input type="text" id="nombre_s" name="nombre_s" placeholder="Nombre" class="input-100" required><br><br>
				<b>CLASIFICACIÓN A LA QUE PERTENECE:<BR>
				<select name="clasificacion" id="clasificacion">
					<option value="1" selected>Danza</option>
					<option value="2">Pintura</option>
				    <option value="3">Arquitectura</option>
				    <option value="4">Escultura</option>
				    <option value="5">Música</option>
				    <option value="6">Cine</option> 
				    <option value="7">Literatura</option>	
			  	</select> 
			  	<br><br>
				<textarea rows="10" cols="30" id="descripcion" name="descripcion" placeholder="Descripcion" class="input-100"></textarea>
				<br><br>
				<input type="submit" name="aceptar" value="Aceptar" class="btn-enviar"><br><br><br>
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