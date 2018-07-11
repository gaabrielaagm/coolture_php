<?php
	@session_start();

	$clasificacion = $_SESSION["Nom_clas"];
	$ID_C = $_SESSION["ID_C"];
	#echo "ID_C = ".$ID_C;
	$subclasificacion = $_SESSION["Nom_subclas"];
	$ID_S = $_SESSION["ID_S"];
	$artistas = $_SESSION["ids_artistas"];	
	#$ID_L = $_SESSION["ID_L"];

	$titulo = $_POST["titulo"];
	$hora = $_POST["hora"];
	$fecha = $_POST["fecha"];	
	$descripcion = $_POST["descripcion"];

	$nom_lugar = $_POST["nom_lugar"];
	$calle = $_POST["calle"];
	$num = $_POST["num"];
	$colonia = $_POST["colonia"];
	$municipio =$_POST["municipio"];

	$conexion = mysqli_connect("localhost", "root", "", "cultura");

	$query = "SELECT * from evento where TITULO='$titulo' and FECHA='$fecha' and HORA='$hora'";
	$result = mysqli_query($conexion,$query);
	if(mysqli_num_rows($result)>0){
		echo '<script language="javascript">
					alert("El evento ya existe");
					window.history.go(-1);
				</script>';
	}else{
		$query = "CALL insert_e('$titulo','$hora','$fecha','$descripcion','$ID_S','0')";
		#$query = "INSERT INTO evento(TITULO,HORA,FECHA,DESC_E,ID_S,ASISTENCIAS) VALUES ('$titulo','$hora','$fecha','$descripcion','$ID_S','0')";
		$result = mysqli_query($conexion,$query);	
		if (!$result) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}

		$query = "SELECT ID_E from evento where TITULO='".$titulo."'";
		$result = mysqli_query($conexion,$query);	
		if (!$result) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}else{
			$query_ = mysqli_fetch_row($result);
			$ID_E = $query_[0];
			
			if($ID_E != ""){
				$query = "CALL insert_l('$ID_E','$nom_lugar','$calle','$num','$colonia','$municipio')";
				#$query = "INSERT INTO lugar(ID_E,NOM_L,CALLE,NUM,COL,MPIO) VALUES ('$ID_E','$nom_lugar','$calle','$num','$colonia','$municipio')";
				$result = mysqli_query($conexion,$query);	
				if (!$result) {
				    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
				    exit;
				}else{
					for($i=0; $i < count($artistas); $i++){
						$query = "CALL insert_pertenece('$ID_E','artistas[$i]')";
						#$query = "INSERT INTO pertenece(ID_E,ID_A) VALUES ('$ID_E','$artistas[$i]')";
						$result = mysqli_query($conexion,$query);
						if (!$result) {
						    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
						    exit;
						}
					}
					?>
					<script language="javascript">
						alert("El evento fue registrado correctamente")
						location.href = "admin.php";
					</script>
					<?php
				}								
			}			
		}
	}		
?>
