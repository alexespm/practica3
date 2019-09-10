<?php
include "conexion.php";
session_start();

if(isset($_SESSION['maestro'])){
	$id = $_POST['id'];
	$dia = $_POST['dias'];
	$hora = $_POST['hora'];	
	$id_usuario = $_SESSION["maestro"];
	$consulta = "INSERT INTO clases (id_materia) VALUES ('$id')";
	if(!$consulta){ 
    echo mysqli_error($consulta);
    exit;
	}
	else{
		if (mysqli_query($conn, $consulta)) {
?>			
		    <SCRIPT LANGUAGE="javascript"> 
            	alert("Materia Registrada"); 
        	</SCRIPT> 
        	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoadm.php">	
<?php
		} else {
		    echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
		}
	} 
}
?>
