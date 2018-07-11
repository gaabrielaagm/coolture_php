<?php

	ModificarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['clasif'],$_POST['id_s']);

	function ModificarProducto($nombre_,$desc_,$clasif_,$id_sc){
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

		/*
		UPDATE subclasificacion SET NOM_S='Pop', DESC_S='Musica Pop es aquella que, al margen de la instrumentacion y tecnologica aplicada para su creacion, conserva la estructura formal "verso -estribillo - verso", ejecutada de un modo sencillo, melodico, pegadizo,y normalmente asimilable para el gran publico. Sus grandes diferencias con otros estilos estan en las voces melodicas y claras en primer plano y percusiones lineales y repetidas. ademas empezaron a triunfar o a Empezar en el siglo XX en Inglaterra, en la decada de los 60. Michael Jackson es el maximo representante de este estilo.' WHERE ID_S=1

		*/
		$sentencia= "UPDATE subclasificacion SET NOM_S='$nombre_', DESC_S='$desc_' WHERE ID_S=$id_sc";//"UPDATE lista_subclasif SET NOM_S='$nombre_', DESC_S='$desc_', NOM_C='$clasif_' WHERE ID_S=$id_sc";
		//echo $sentencia;
		/*"UPDATE evento SET TITULO='$titulo_', HORA='$hora_', FECHA='$fecha_', ID_S=$id_sc, ASISTENCIAS=$num_asis, DESC_E='$descr' WHERE ID_E=$id_ev"*/
		$resultado=$conexion->query($sentencia);
	}

?>

<script type="text/javascript">
	alert("Subclasificación Modificada Exitosamente");
	window.location.href='modif_subclasif.php';
</script>