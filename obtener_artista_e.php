<?php
	@session_start();
	if(empty($_POST["artist"])){
		?>
		<script language="javascript">
			alert("Es necesario seleccionar al menos un artista");
			location.href = "lista_artistas_e.php";
		</script>
		<?php
	}else{
		$eleccion = $_POST["artist"];	
		#echo "Elecion: ".artist"] count($eleccion);
		$_SESSION["ids_artistas"] = $eleccion;
		?>
			<script language="javascript">
				location.href = "altas_eventos.php";
			</script>
		<?php
	}
	?>




