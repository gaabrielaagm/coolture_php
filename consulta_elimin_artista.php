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
$query="SELECT * FROM artista ORDER BY ID_A";

//create view lista_eventos as SELECT ID_E,TITULO,HORA,FECHA,DESC_E,NOM_S,NOM_C,ASISTENCIAS FROM evento NATURAL JOIN subclasificacion NATURAL JOIN clasificacion

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['alumnos']))
{
	$q=$conexion->real_escape_string($_POST['alumnos']); //representa lo que hay en la caja de búsqueda
	$query="SELECT * FROM artista WHERE 
		id_e LIKE '%".$q."%' OR
		titulo LIKE '%".$q."%' OR
		fecha LIKE '%".$q."%'";
}

$resultado=$conexion->query($query);
if ($resultado->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID</td>
			<td>NOMBRE</td>
			<td>FECHA NACIMIENTO</td>
			<td>FALLECIMIENTO</td>
			<td>DESCRIPCIÓN</td>

		</tr>';

	while($filas= $resultado->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filas['ID_A'].'</td>
			<td>'.$filas['NOM_A'].'</td>
			<td>'.$filas['FEC_NAC'].'</td>
			<td>'.$filas['FEC_FALL'].'</td>
			<td>'.$filas['DESC_A'].'</td>'.
			"<td> <a href='modif_artista1.php?n_a=".$filas['ID_A']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>
			<td> <a href='eliminar_artista.php?n_e=".$filas['ID_A']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>
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
