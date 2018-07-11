<?php
	@session_start();
	if(empty($_SESSION["Nom_clas"]) || empty($_SESSION["ID_C"]) ){
		if(empty($_SESSION['k_nombre'])){
			?>
			<script language="javascript">
				alert('ERROR DE INICIO DE SESION, FAVOR DE VOLVER A INGRESAR');
				location.href = "ingresar.html";
			</script>
			<?php			
		}else if($usuario == "Admin"){
			?>
			<script language="javascript">
				location.href = "admin.php";
			</script>
			<?php
		}			
	}else{
		$clasificacion = $_SESSION["Nom_clas"];
		$ID_C = $_SESSION["ID_C"];
		$subclasificacion = $_SESSION["Nom_subclas"];
		$ID_S = $_SESSION["ID_S"];
		$artistas = $_SESSION["ids_artistas"];	

		$conexion = mysqli_connect("localhost", "root", "", "cultura");

		$cont = count($artistas);
		$nom_artistas = array();
		for ($i = 0; $i < $cont; $i++) {
			$query = "SELECT NOM_A from artista where ID_A =".$artistas[$i]."; ";
			$result = mysqli_query($conexion,$query);
			$query = mysqli_fetch_row($result);
			$nom_artista = $query[0];
			$nom_artistas[] = $nom_artista;	
		}
	}
?>
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
	<script  type="text/javascript" language="javascript">

		function validar_evento(){
			var titulo,hora,fecha,descripcion, subcl;
			titulo=document.getElementById("titulo").value;
			hora=document.getElementById("hora").value;			
			var hoy=new Date();
			fecha=new Date(document.getElementById("fecha").value);

			descripcion=document.getElementById("descripcion").value;
			subcl=document.getElementById("subclasificacion").value;
				
			if(titulo==="" || hora==="" || fecha==="" || descripcion==="" ){
				alert("Los campos son obligatorios");
				return false; 
			}else if(titulo.length>40){
				alert("El nombre es muy largo");
				return false;
			}else if((fecha.getFullYear()<hoy.getFullYear()) ||(fecha.getFullYear()===hoy.getFullYear() && fecha.getMonth()<hoy.getMonth() )  || (fecha.getFullYear()===hoy.getFullYear() && fecha.getMonth()===hoy.getMonth() && fecha.getDay()<=hoy.getDay() )){
				alert("Solo puedes agregar eventos en el FUTURO ");
				return false;
			}
			else if(fecha.getFullYear()===hoy.getFullYear() && fecha.getMonth()===hoy.getMonth() && fecha.getDay()<=(hoy.getDay()+3)){
				alert("Solo puedes agregar eventos con tres días de anticipación");
				return false;

			}

			var lugar,calle,num,colonia, mpio,x;
			lugar=document.getElementById("nom_lugar").value;
			calle=document.getElementById("calle").value;
			num=document.getElementById("num").value;
			colonia=document.getElementById("colonia").value;
			mpio=document.getElementById("municipio").value;
			
			if(nom_lugar==="" || calle==="" || num==="" || colonia==="" || mpio==="" ){
				alert("Los campos son obligatorios");
				return false; 
			}	
			else if(nom_lugar.length>20){
				alert("El nombre es muy largo");
				return false;
			}else if(calle.length>20){
				alert("El calle es muy largo");
				return false;
			}else if(num.length>4){
				alert("El numero es muy largo");
				return false;
			}else if(colonia.length>15){
				alert("El colonia es muy largo");
				return false;
			}else if(mpio.length>15){
				alert("El mpio es muy largo");
				return false;
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
		<br><br><br><br><br><br><br><br><br><br><br>
		<div class="contenedor" style="transform: translateX(25%) ">
			<p><img src="img/logo.png" class="logo" style="height: 230px; width: 230px; transform: translateX(-300%) translateY(-105%);"></p>
			<h2 class="banner__titulo" style="color: white; text-align: center; transform: translateX(-100%) translateY(-30%);">DATOS DEL EVENTO </h2>
			<br><br>
		</div>
	</header>
	<section class="seccion-registro">
		<br><br><br><br>
		<form action="dar_alta_evento.php" name="form_evento" method="post" class="form-register"  onsubmit=" return validar_evento()" " >
			<div class="contenedor-inputs" >

				<input type="text" id="titulo" name="titulo" placeholder="Título" class="input-100" ><br><br>
				<input type="time" id="hora" name="hora" placeholder="Hora" class="input-100" ><br><br>
				<input type="date" id="fecha" name="fecha" placeholder="fecha" class="input-100" ><br><br>
				<textarea rows="10" cols="30" id="descripcion" name="descripcion"  placeholder="Descripcion" class="input-100"></textarea>
				<BR><BR><BR><BR><b>LUGAR DONDE SE PRESENTARÁ:<BR><BR>
				
				<div class="contenedor-inputs" >
					<input type="text" id="nom_lugar" name="nom_lugar" placeholder="Nombre del lugar" class="input-100" ><br><br>
					<input type="text" id="calle" name="calle" placeholder="Calle" class="input-100" ><br><br>
					<b>No.<input type="number" id="num" name="num" min="0" max="5000" step="1" value="1"></b><br><br>
					<input type="text" id="colonia" name="colonia" placeholder="colonia" class="input-100" ><br><br>
					<input type="text" id="municipio" name="municipio" placeholder="Municipio" class="input-100" ><br><br>
				</div>
				<br><br>
				<b>CLASIFICACION A LA QUE PERTENECE:<BR><BR>
				<?php
				echo '<input type="text" id="clasificacion" name="clasificacion" placeholder="'.$clasificacion.'" class="input-100" readonly="readonly" ><br><br>';
				?>				
				<b>SUBCLASIFICACIÓN A LA QUE PERTENECE:<BR><BR>
				<?php
				echo '<input type="text" id="subclasificacion" name="subclasificacion" placeholder="'.$subclasificacion.'" class="input-100" readonly="readonly" ><br><br>';
				?>
				<b>ARTISTAS QUE PARTICIPAN:<BR><BR>
				<?php
				for ($i = 0; $i < $cont; $i++){
					echo '<input type="text" id="lugar" name="lugar" placeholder="'.$nom_artistas[$i].'" class="input-100" readonly="readonly"><br>';
				}
				
				?>	
				
				<input type="submit" name="aceptar" value="Aceptar" class="btn-enviar"><br><br><br>
			</div>
		</form>
	</section>
	<br><br><br>
	<!--
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
	-->
</body>
</html>