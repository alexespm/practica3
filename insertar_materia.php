<?php
include "conexion.php";
session_start(); 
$consulta = mysqli_query ($conn, "SELECT clave FROM materias"); 

	$nom = $_POST['nombre'];
	$credi = $_POST['creditos'];
	$cupos = $_POST['cupos'];
	$aula = $_POST['aula'];
if(!$consulta){ 
    echo mysqli_error($consulta);
    exit;
} 
else{
	$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
	$numerodeletras=5;
	$clave="";

	$sql = "SELECT * FROM materias";
	$resulta = mysqli_query($conn,$sql);
	$numero = mysqli_num_rows($resulta);
	if($numero==0)
	{
		$numerodeletras=5; 
			$clave = "";
			for($i=0;$i<$numerodeletras;$i++)
			{
			    $clave .= substr($caracteres,rand(0,strlen($caracteres)),1); 
			}
		$sql = "INSERT INTO materias (nombremat,clave,creditos,cupos,aula) VALUES ('$nom','$clave','$credi','$cupos','$aula')";
		if (mysqli_query($conn, $sql)) {
?>			
		    <SCRIPT LANGUAGE="javascript"> 
            	alert("Materia Registrada"); 
        	</SCRIPT> 
        	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoadm.php">	
<?php
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	if($dato = mysqli_fetch_assoc($consulta)) {
		$claveobtenida = $dato["clave"];
		do
		{
			$numerodeletras=5; 
			$clave = "";
			for($i=0;$i<$numerodeletras;$i++)
			{
			    $clave .= substr($caracteres,rand(0,strlen($caracteres)),1); 
			}
		}while($claveobtenida == $clave);
		$sql = "INSERT INTO materias (nombremat,clave,creditos,cupos,aula) VALUES ('$nom','$clave','$credi','$cupos','$aula')";
		if (mysqli_query($conn, $sql)) {
?>			
		    <SCRIPT LANGUAGE="javascript"> 
            	alert("Materia Registrada"); 
        	</SCRIPT> 
        	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoadm.php">
<?php
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
				
			}
}

?>