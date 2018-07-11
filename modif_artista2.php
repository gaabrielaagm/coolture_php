<?php

	ModificarArtista($_POST['nombre'],$_POST['fec_nac'],$_POST['fec_fall'],$_POST['descripcion'],$_POST['id_a']);

	function ModificarArtista($nombre_,$fec_nac_,$fec_fall_,$desc_,$id_ar){
		/////// CONEXIÓN A LA BASE DE DATOS /////////
		$host="localhost";
		$usuario="root";
		$contraseña="";
		$base="cultura";

		$conexion= new mysqli($host, $usuario, $contraseña, $base);
		if ($conexion -> connect_errno)
		{
			die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
		}
		
		if ($fec_fall_=="") {
			$sentencia= "UPDATE artista SET NOM_A='$nombre_', FEC_NAC='$fec_nac_',FEC_FALL='$fec_fall_',DESC_A='$desc_' where ID_A=$id_ar" ;
			$resultado=$conexion->query($sentencia) ;
		}else{
			echo $sentencia= "UPDATE artista SET NOM_A='$nombre_', FEC_NAC='$fec_nac_', FEC_FALL='$fec_fall_', DESC_A='$desc_' where ID_A=$id_ar" ;
			$resultado=$conexion->query($sentencia);
		}
		
	}

?>

<script type="text/javascript">
	alert("Producto Modificado Exitosamente");
	window.location.href='modif_artista.php';
</script>