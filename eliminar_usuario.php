
<?php 
@session_start();
$conexion = mysqli_connect("localhost", "root", "", "cultura");				

$id = $_SESSION["k_id_usuario"];

$query = "delete from usuario where ID_U = '$id'";  
$result = mysqli_query($conexion,$query);   

?>
<script type="text/javascript">
	alert("Cuenta eliminada con éxito. ¡Esperamos verte pronto!");
	window.location.href='index.html';
</script>