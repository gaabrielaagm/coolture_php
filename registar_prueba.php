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


$resultado=mysqli_query($conexion, "CALL insertar('$nombre','$pass','$correo',$notif)");
if(!$resultado){
	echo '<script> alert("Error al registrarse :(");
					window.history.go(-1);
	      </script>';
}else{
	if(in_array('danza', $_POST['preferencias'])){
		#echo 'Danza was checked!';
		$insert_danza = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',1)");
	}
	if(in_array('pintura', $_POST['preferencias'])){
		#echo 'Pintura was checked!';
		$insert_pintura = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',2)");
	}
	if(in_array('arquitectura', $_POST['preferencias'])){
		#echo 'Arquitectura was checked!';
		$insert_arquitec = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',3)");
	}
	if(in_array('escultura', $_POST['preferencias'])){
		#echo 'Escultura was checked!';
		$insert_escultura = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',4)");
	}
	if(in_array('musica', $_POST['preferencias'])){
		#echo 'Musica was checked!';
		$insert_musica = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',5)");
	}
	if(in_array('cine', $_POST['preferencias'])){
		#echo 'Cine was checked!';
		$insert_cena = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',6)");
	}
	if(in_array('literatura', $_POST['preferencias'])){
		#echo 'Literatura was checked!';
		$insert_litera = mysqli_query($conexion, "CALL insertar_se_interesa('$correo',7)");
	}

	echo '<script>
				location.href = "msj_registro.html";
	     </script>';
}
mysqli_close($conexion);