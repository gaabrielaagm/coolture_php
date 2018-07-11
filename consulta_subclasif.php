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

//////////////// VALORES INICIALES ///////////////////////
/*
nueva vista
create VIEW lista_subclasif as SELECT ID_S,NOM_S,DESC_S,NOM_C FROM subclasificacion NATURAL JOIN clasificacion
*/

$tabla="";
$query="SELECT * FROM lista_subclasif ORDER BY ID_S";

//create view lista_eventos as SELECT ID_E,TITULO,HORA,FECHA,DESC_E,NOM_S,NOM_C,ASISTENCIAS FROM evento NATURAL JOIN subclasificacion NATURAL JOIN clasificacion

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['alumnos']))
{
	$q=$conexion->real_escape_string($_POST['alumnos']); //representa lo que hay en la caja de búsqueda
	$query="SELECT * FROM lista_subclasif WHERE 
		id_s LIKE '%".$q."%' OR
		NOM_S LIKE '%".$q."%'";
}

$buscarAlumnos=$conexion->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	$tabla.= 
	'<table class="rwd-table">
		<tr class="bg-primary">
			<td>ID</td>
			<td>NOMBRE</td>
			<td>DESCRIPCIÓN</td>
			<td>CLASIFICACION</td>

		</tr>';

	while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaAlumnos['ID_S'].'</td>
			<td>'.$filaAlumnos['NOM_S'].'</td>
			<td>'.$filaAlumnos['DESC_S'].'</td>
			<td>'.$filaAlumnos['NOM_C'].'</td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
