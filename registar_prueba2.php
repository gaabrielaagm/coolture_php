<?php
include 'conexion.php';

$nombre= $_POST["nombre"];
$pass=   $_POST["password"];
$correo= $_POST["correo"];
$vec_pref=$_POST["preferencias"];
$num=count($vec_pref);
$preferencias='';
for($i=0; $i<$num; $i++){
	$preferencias.= ' '.$vec_pref[$i];
}
$notif=$_POST["notif"];

$correo_correcto= mysqli_query($conexion,"SELECT * FROM usuario WHERE CORREO='$correo' ");
if(mysqli_num_rows($correo_correcto)>0){
	echo '<script> alert("El correo ya esta registrado");
					window.history.go(-1);
	      </script>';
	exit;
}


$resultado=mysqli_query($conexion, "CALL insertar('$nombre','$pass','$correo','$preferencias',$notif )");
if(!$resultado){
	echo '<script> alert("Error al registrarse :(");
					window.history.go(-1);
	      </script>';
}else{
	echo '<script>
				location.href = "msj_registro.html";
	      </script>';
}
mysqli_close($conexion);