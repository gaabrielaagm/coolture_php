<?php
include 'conexion.php';
@session_start();
$nombre= $_POST["nombre"];
$_SESSION["k_nombre"] = $nombre; //Se actualiza la variable usuario de sesión
$pass=   $_POST["password"];
$correo= $_POST["correo"];
$vec_pref=$_POST["preferencias"];
$num=count($vec_pref);
$preferencias='';
for($i=0; $i<$num; $i++){
	$preferencias.= ' '.$vec_pref[$i];
}
$notificacion=$_POST["notif"];
if ($notificacion=='si') {
	$notif = 1;
}else{$notif=0;}

$correo_correcto= mysqli_query($conexion,"SELECT * FROM usuario WHERE CORREO='$correo' ");
if(mysqli_num_rows($correo_correcto)>1){ //Se pone mayor a 1 porque no debe tomar en cuenta el correo activo como repetido
	echo '<script> alert("El correo ya esta registrado");
					window.history.go(-1);
	      </script>';
	exit;
}
/*
CREATE PROCEDURE editar_perfil(IN `_id` INT(6), IN `_nombre` VARCHAR(50), IN `_password` VARCHAR(15), IN `_correo` VARCHAR(80), IN `_notif` INT(1)) UPDATE cultura.usuario SET nombre=_nombre, PASSWORD=_password, CORREO=_correo, NOTIF=_notif WHERE ID_U=_id;
*/

// Obtener el id del usuario actual para editar sus datos

$id = $_SESSION["k_id_usuario"];

$resultado=mysqli_query($conexion, "CALL editar_perfil('$id','$nombre','$pass','$correo','$notif')");
$borrar = mysqli_query($conexion,"delete from se_interesa where ID_U = $id;"); //Borra las preferenias del usuario para reingresarlas
if(!$resultado){
	echo '<script> alert("No se pudo editar perfil :(");
					window.history.go(-1);
	      </script>';
}else{
	if(in_array('danza', $_POST['preferencias'])){
		$insert_danza = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',1)");
	}
	if(in_array('pintura', $_POST['preferencias'])){
		$insert_pintura = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',2)");
	}
	if(in_array('arquitectura', $_POST['preferencias'])){
		$insert_arquitec = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',3)");
	}
	if(in_array('escultura', $_POST['preferencias'])){
		$insert_escultura = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',4)");
	}
	if(in_array('musica', $_POST['preferencias'])){
		$insert_musica = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',5)");
	}
	if(in_array('cine', $_POST['preferencias'])){
		$insert_cena = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',6)");
	}
	if(in_array('literatura', $_POST['preferencias'])){
		$insert_litera = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',7)");
	}

	echo '<script>
				location.href = "clasificacion.php";
	     </script>';
}

mysqli_close($conexion);