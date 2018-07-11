<?php
include 'cn.php'; 
//Se recibe lo que se escribe en el campo  del método post
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$password = $_POST["password"];
$correo = $_POST["correo"];
$preferencias = $_POST["preferencias"];
$notif = $_POST["notif"];

//Consulta para insertar
$insertar = "INSERT INTO USUARIO(id_u,nom_u,pasword,correo,preferencias,notif) VALUES ('$id','$nombre','$password','$correo','$preferencias','$notif')";

//VERIFICA SI EL USUARIO YA ESTÁ REGISTRADO
//Se pueden hacer verificaciones de correo e ID
$verificar_usuario = mysqli_query($conexion,"SELECT * FROM usuario WHERE nom_u = '$nombre'" );
if (mysqli_num_rows($verificar_usuario)>0) {
	echo '<script>
		  alert("El usuario ya está registrado");
		  window.history.go(-1);
		  </script>';
}else{
	echo '<script>
		  alert("Usted ha sido registrado");
		  window.history.go(-1);
		  </script>';
}

//Ejecutar consulta
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al registrarse";
}else{
	echo "Usuario registrado exitosamente";
}

//Cerrar conexión
mysqli_close($conexion);

//Ir a inicio
header('Location: clasificacion.html');