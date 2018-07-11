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
$query="SELECT * FROM lista_eventos ORDER BY ID_E";

//create view lista_eventos as SELECT ID_E,TITULO,HORA,FECHA,DESC_E,NOM_S,NOM_C,ASISTENCIAS FROM evento NATURAL JOIN subclasificacion NATURAL JOIN clasificacion

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['alumnos']))
{
	$q=$conexion->real_escape_string($_POST['alumnos']); //representa lo que hay en la caja de búsqueda
	$query="SELECT * FROM lista_eventos WHERE 
		id_e LIKE '%".$q."%' OR
		titulo LIKE '%".$q."%' OR
		fecha LIKE '%".$q."%'";
}

$buscarAlumnos=$conexion->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID</td>
			<td>NOMBRE</td>
			<td>HORA</td>
			<td>FECHA</td>
			<td>DESCRIPCIÓN</td>
			<td>SUBCLASIFICACION</td>
			<td>CLASIFICACION</td>
			<td>ASISTENCIAS</td>

		</tr>';

	while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaAlumnos['ID_E'].'</td>
			<td>'.$filaAlumnos['TITULO'].'</td>
			<td>'.$filaAlumnos['HORA'].'</td>
			<td>'.$filaAlumnos['FECHA'].'</td>
			<td>'.$filaAlumnos['DESC_E'].'</td>
			<td>'.$filaAlumnos['NOM_S'].'</td>
			<td>'.$filaAlumnos['NOM_C'].'</td>
			<td>'.$filaAlumnos['ASISTENCIAS'].'</td>
			<!--<td> <input type="button" name="Asistir" value="asistir" class="btn-enviar onclick="aumentar();">-->
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
