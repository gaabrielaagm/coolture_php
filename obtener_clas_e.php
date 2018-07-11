<?php
	@session_start();
	$eleccion = $_POST["clasificacion"];
	#echo "Elecion: ". $eleccion;	
	$conexion = mysqli_connect("localhost", "root", "", "cultura");
	$query = "SELECT ID_C from clasificacion where NOM_C ='".$eleccion."';";
	$result = mysqli_query($conexion,$query);	
	if (!$result) {
	    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
	    exit;
	}else{
		$query = mysqli_fetch_row($result);
		$ID_C = $query[0];
		if($ID_C != ""){
			$_SESSION["Nom_clas"] = $eleccion;
			$_SESSION["ID_C"] = $ID_C;
		}
	}
?>
<script language="javascript">
	location.href = "lista_subclasificacion_e.php";
</script>


	


