<?php
	@session_start();
	$nom_sub = $_POST["nombre_s"];
	$ID_C = $_POST["clasificacion"];
	$descripcion = $_POST["descripcion"];

	$conexion = mysqli_connect("localhost", "root", "", "cultura");

	$query = "SELECT * from subclasificacion where NOM_S='$nom_sub'";
	$result = mysqli_query($conexion,$query);
	if(mysqli_num_rows($result)>0){
		echo '<script language="javascript">
					alert("La subclasificacion ya existe");
					window.history.go(-1);
				</script>';
	}else{
		$query = "INSERT INTO subclasificacion(NOM_S,DESC_S,ID_C) VALUES ('$nom_sub','$descripcion','$ID_C')";
		$result = mysqli_query($conexion,$query);	
		if (!$result) {
		    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
		    exit;
		}else{
			$query = "SELECT ID_S,ID_C,NOM_C from subclasif_clasif where NOM_S='".$nom_sub."'";
			$result = mysqli_query($conexion,$query);	
			if (!$result) {
			    echo 'No se pudo ejecutar la consulta: ' . mysqli_error($conexion);
			    exit;
			}else{
				$query_ = mysqli_fetch_row($result);
				$ID_S = $query_[0];
				$ID_C = $query_[1];
				$NOM_C = $query_[2];

				$_SESSION["Nom_subclas"] = $nom_sub;
				$_SESSION["ID_S"] = $ID_S;
				$_SESSION["ID_C"] = $ID_C;
				$_SESSION["Nom_clas"] = $NOM_C;

				#echo "ID_C=".$ID_C;
				
				echo '<script language="javascript">
					alert("La nueva subclasificacion fue registrada y seleccionada correctamente");
					location.href = "lista_artistas_e.php";
				</script>';
			}
			
		}
	}
?>