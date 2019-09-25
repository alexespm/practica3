
<?php
session_start();
include "conexion.php";
		
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$creditos =  $_POST['creditos'];
	$cupos =  $_POST['cupos'];	
	$aula = $_POST['aula'];

	mysqli_query($conn,"update materias set nombremat='$nombre', creditos='$creditos', cupos='$cupos', aula='$aula' where NRC=$id");
	
?>	
	<SCRIPT LANGUAGE="javascript"> 
         alert("Materia Actualizada"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoadm.php">


