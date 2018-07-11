<?php
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


////////////////FUNCIONES//////////////////////////


$tabla="";
$query="SELECT * FROM lista_subclasif ORDER BY ID_S";

//create view lista_eventos as SELECT ID_E,TITULO,HORA,FECHA,DESC_E,NOM_S,NOM_C,ASISTENCIAS FROM evento NATURAL JOIN subclasificacion NATURAL JOIN clasificacion

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
/*if(isset($_POST['alumnos']))
{
	$q=$conexion->real_escape_string($_POST['alumnos']); //representa lo que hay en la caja de búsqueda
	$query="SELECT * FROM lista_eventos WHERE 
		id_e LIKE '%".$q."%' OR
		titulo LIKE '%".$q."%' OR
		fecha LIKE '%".$q."%'";
}*/

$resultado=$conexion->query($query);
if ($resultado->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID</td>
			<td>NOMBRE</td>
			<td>DESCRIPCIÓN</td>
			<td>CATEGORÍA</td>

		</tr>';

	while($filas= $resultado->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filas['ID_S'].'</td>
			<td>'.$filas['NOM_S'].'</td>
			<td>'.$filas['DESC_S'].'</td>
			<td>'.$filas['NOM_C'].'</td>'.
			"<td> <a href='modif_subclasif1.php?ns=".$filas['ID_S']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>
			<td> <a href='eliminar_subclasif.php?ns=".$filas['ID_S']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>
		</tr>
		";
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
