<?php
	@session_start();
	$eleccion = $_POST["subclas"];
	if($eleccion == ""){
		?>
		<script language="javascript">
			alert("Es necesario seleccionar una subclasficacion.")
			location.href = "lista_subclasificacion_e.php";
		</script>
		<?php
	}else{
		#echo "Elecion: ". $eleccion;	
		$conexion = mysqli_connect("localhost", "root", "", "cultura");
		$query = "SELECT ID_S from subclasificacion where NOM_S ='".$eleccion."';";
		$result = mysqli_query($conexion,$query);	
		if (!$result) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}else{
			$query = mysqli_fetch_row($result);
			$ID_S = $query[0];
			#echo "ID_S seleccionado = " . $ID_S;
			if($ID_S == ""){
				?>
				<script language="javascript">
					alert("La subclasificacion ingresada no existe. Vuelva a ingresar o a seleccionar.");
					location.href = "lista_subclasificacion_e.php";
				</script>	
				<?php
			}else{
				$_SESSION["Nom_subclas"] = $eleccion;
				$_SESSION["ID_S"] = $ID_S;
				?>
				<script language="javascript">
					location.href = "lista_artistas_e.php";
				</script>	
				<?php
			}
		}	
			
	}
	
?>


