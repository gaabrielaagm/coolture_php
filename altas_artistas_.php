<?php
	$nom_artista = $_POST["nombre"];
	$fecha_nac = $_POST["fecha_nac"];
	$fecha_fall = $_POST["fecha_fall"];
	$descripcion = $_POST["descripcion"];

	$conexion = mysqli_connect("localhost", "root", "", "cultura");

	$query = "SELECT * from artista where NOM_A='$nom_artista'";
	$result = mysqli_query($conexion,$query);
	if(mysqli_num_rows($result)>0){
		echo '<script language="javascript">
					alert("El artita ya existe");
					window.history.go(-1);
				</script>';
	}else{
		#$query = "INSERT INTO artista(NOM_A,FEC_NAC,FEC_FALL,DESC_A) VALUES ('$nom_artista','$fecha_nac','$fecha_fall','$descripcion')";
		$query = "CALL insert_a('$nom_artista','$fecha_nac','$fecha_fall','$descripcion')";
		$result = mysqli_query($conexion,$query);	
		if (!$result) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}else{
			echo '<script language="javascript">
				alert("El artista fue registrados correctamente");
				location.href = "admin.php";
			</script>';		
		}
	}
?>