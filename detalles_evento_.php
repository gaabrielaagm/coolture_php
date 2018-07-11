<?php
	@session_start();
	$ID_E = $_SESSION["ID_E"];
	$usuario = $_SESSION['k_nombre'];
	#echo "ID_E=".$ID_E;
	#echo "NOM_U=".$usuario;

	$conexion = mysqli_connect("localhost", "root", "", "cultura");
	$query = "SELECT ID_U from usuario where NOM_U='".$usuario."'";
	$result = mysqli_query($conexion,$query);
	$renglon = mysqli_fetch_row($result);
	$ID_U = $renglon[0];
	#echo "ID_U=".$ID_U;

	if(!empty($_POST["asistira"])){
		#echo "Asistira";
		$query2 = "INSERT INTO asistira (ID_U,ID_E,Asistencia) values (".$ID_U.", ".$ID_E.",1)";
		#echo "query2=".$query2;
		$result = mysqli_query($conexion,$query2);	
		if (!$result) {
			echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
			exit;
		}	
		$query2 = "UPDATE evento set asistencias = asistencias+1 where ID_E =".$ID_E;
			$result = mysqli_query($conexion,$query2);	
			if (!$result) {
			    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
			    exit;
			}		
	}else{
		#echo "NO Asistira";		
			$ID_U = $_SESSION["id_user_"];
			$query2 = "UPDATE asistira set Asistencia = 0 where ID_U =".$ID_U;
			$result = mysqli_query($conexion,$query2);	
			if (!$result) {
			    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
			    exit;
			}

			$query2 = "UPDATE evento set asistencias = asistencias-1 where ID_E =".$ID_E;
			$result = mysqli_query($conexion,$query2);	
			if (!$result) {
			    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
			    exit;
			}
	}
?>
	<script language="javascript">
		location.href = "eventos.php";
	</script>
