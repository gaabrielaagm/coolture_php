<<?php 
	EliminarEvento($_GET['no']);

	function EliminarEvento($id_ev){
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
		$sentencia= "DELETE FROM evento where ID_E='".$id_ev."'";//"CALL editar_evento('.$titulo_,$hora_,$fecha_,$id_sc,$num_asis,$desc,$id_ev.')";
		$resultado=$conexion->query($sentencia);
	}


 ?>

 <script type="text/javascript">
	alert("Producto Eliminado Exitosamente");
	window.location.href='modif_eventos.php';
</script>