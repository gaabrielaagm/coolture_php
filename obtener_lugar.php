<?php
	@session_start();
	$eleccion = $_POST["lugar"];
	#echo "Elecion: ". $eleccion;	
	$conexion = mysqli_connect("localhost", "root", "", "cultura");
	$query = "SELECT ID_L from lugar where CONCAT(NOM_L,' ',CALLE,' ',NUM,' ',COL) ='".$eleccion."';";
	$result = mysqli_query($conexion,$query);	
	if (!$result) {
	    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
	    exit;
	}
	$query = mysqli_fetch_row($result);
	$ID_L = $query[0];
	#echo "ID_L seleccionado = " . $ID_L;

	$_SESSION["ID_L"] = $ID_L;
?>

<script language="javascript">
	location.href = "altas_eventos.html";
</script>

