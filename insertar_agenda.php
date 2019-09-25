
<?php
include "conexion.php";
session_start(); 
$id_usuario = $_SESSION['alumno'];
$nrc = $_POST['nrc'];
		
		$consulta = "INSERT INTO usuarioclase (clase_ide,usuario_ide) VALUES ('$nrc','$id_usuario')";
		$resultado= mysqli_query($conn,"SELECT COUNT(NRC)  as total FROM clases INNER JOIN materias ON id_materia = NRC  INNER JOIN usuarioclase on clase_ide = clase_id where usuario_ide = '$id_usuario' AND clase_ide = '$nrc'");
		
		$row = mysqli_fetch_assoc($resultado);

// comparamos con el alias total que dimos en la consulta
if($row['total'] == '0'){
	mysqli_query($conn, $consulta);
	$query = "UPDATE materias set cupos=$cupomenos WHERE NRC = $nrc";
	mysqli_query($conn, $query);
	?>
	<SCRIPT LANGUAGE="javascript"> 
		alert("Materia Agendada"); 
	</SCRIPT> 
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoalum.php">
	<?php
}
else{
?>
	<SCRIPT LANGUAGE="javascript"> 
		alert("Esta materia ya pertenece a tu horario"); 
	</SCRIPT> 
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoalum.php">
<?php
}



?>			