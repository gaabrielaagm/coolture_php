<?php

	ModificarProducto($_POST['titulo'],$_POST['hora'],$_POST['fecha'],$_POST['id_s'],$_POST['asistencias'],$_POST['descripcion'],$_POST['id_e']);

	function ModificarProducto($titulo_,$hora_,$fecha_,$id_sc,$num_asis,$descr,$id_ev){
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
		$sentencia= "UPDATE evento SET TITULO='$titulo_', HORA='$hora_', FECHA='$fecha_', ID_S=$id_sc, ASISTENCIAS=$num_asis, DESC_E='$descr' WHERE ID_E=$id_ev";//"CALL editar_evento('.$titulo_,$hora_,$fecha_,$id_sc,$num_asis,$desc,$id_ev.')";
		$resultado=$conexion->query($sentencia);
	}

?>

<script type="text/javascript">
	alert("Producto Modificado Exitosamente");
	window.location.href='modif_eventos.php';
</script>