<?php
	$nom_sub = $_POST["nombre_s"];
	$ID_C = $_POST["clasificacion"];
	$descripcion = $_POST["descripcion"];

	$conexion = mysqli_connect("localhost", "root", "", "cultura");

	#$query = "CALL buscar('subclasificacion','$nom_sub')";
	$query = "SELECT * from subclasificacion where NOM_S='$nom_sub'";
	$result = mysqli_query($conexion,$query);
	if(mysqli_num_rows($result)>0){
		echo '<script language="javascript">
					alert("La subclasificacion ya existe");
					window.history.go(-1);
				</script>';
	}else{
		#$query = "INSERT INTO subclasificacion(NOM_S,DESC_S,ID_C) VALUES ('$nom_sub','$descripcion','$ID_C')";
		$query = "CALL insert_s('$nom_sub','$descripcion','$ID_C')";
		$result = mysqli_query($conexion,$query);	
		if (!$result) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}else{
				echo '<script language="javascript">
					alert("La nueva subclasificacion fue registrada correctamente");
					location.href = "admin.php";
				</script>';						
		}
	}
?>