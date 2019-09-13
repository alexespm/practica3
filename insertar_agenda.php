<?php
include "conexion.php";
session_start(); 
$id_usuario = $_SESSION['alumno'];
$nrc = $_POST['nrc'];
		
		$consulta = "INSERT INTO usuarioclase (clase_ide,usuario_ide) VALUES ('$nrc','$id_usuario')";
		$consulta1= mysqli_query($conn, "SELECT cupos,NRC FROM materias where NRC = $nrc");
		$consulta2 = mysqli_query($conn,"SELECT id_materia from clases where id_materia = $nrc");
		$consulta3 = mysqli_query($conn,"SELECT clase_ide from usuarioclase WHERE clase_ide=$nrc");
		$dato = mysqli_fetch_assoc($consulta1);
		$cupos = $dato["cupos"];
		$dato2 = mysqli_fetch_assoc($consulta3);
		$materiacod = $dato2["clase_ide"];
		$cupomenos = $cupos-1;
		if(!$consulta){ 
			echo mysqli_error($consulta);
		    exit;
		} 
		if($nrc==$materiacod)
		{
?>			
				<SCRIPT LANGUAGE="javascript"> 
		           	alert("Esta materia ya pertenece a tu horario"); 
		       	</SCRIPT> 
		       	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoalum.php">	
<?php
		}
		else
		{
			if(mysqli_query($conn, $consulta))
			{
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
			echo $materiacod;
		}

		mysqli_close($conn);
	
?>