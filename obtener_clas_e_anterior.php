<?php
	@session_start();
	$eleccion = $_POST["clasificacion"];
	$usuario = $_SESSION['k_nombre'];
	#echo "Elecion: ". $eleccion;	
	$conexion = mysqli_connect("localhost", "root", "", "cultura");

	$query = "SELECT ID_U from asistira where (SELECT NOM_U from usuario where usuario.ID_U = asistira.ID_U) ='".$usuario."';";
	$result = mysqli_query($conexion,$query);	
	if (!$result) {
	    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
	    exit;
	}else{
		if(mysqli_num_rows($result) != 0){
			$query2 = "SELECT ID_C from clasificacion where NOM_C ='".$eleccion."';";
			$result2 = mysqli_query($conexion,$query2);	
			if (!$result2) {
			    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
			    exit;
			}else{
				$query2 = mysqli_fetch_row($result2);
				$ID_C = $query[0];
				if($ID_C != ""){
					$_SESSION["Nom_clas"] = $eleccion;
					$_SESSION["ID_C"] = $ID_C;
				}
			}
		}
	}
			
?>
<script language="javascript">
	location.href = "lista_subclasificacion_e.php";
</script>


