<?php
include "conexion.php";
session_start(); 
$id_usuario = $_SESSION['alumno'];
$nrc = $_POST['nrc'];
		
		$consulta = "INSERT INTO usuarioclase (clase_ide,usuario_ide) VALUES ('$nrc','$id_usuario')";
		if(!$consulta){ 
			echo mysqli_error($consulta);
		    exit;
		} 
		else
		{
			if (mysqli_query($conn, $consulta)) {
?>			
		    <SCRIPT LANGUAGE="javascript"> 
            	alert("Materia Registrada"); 
        	</SCRIPT> 
        	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoalum.php">	
<?php
			} 
			else {
		    echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
			}
		}

		mysqli_close($conn);
				
?>