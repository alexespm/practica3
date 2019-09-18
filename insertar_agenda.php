<?php
include "conexion.php";
session_start(); 
$id_usuario = $_SESSION['alumno'];
$nrc = $_POST['nrc'];
		
		$consulta = "INSERT INTO usuarioclase (clase_ide,usuario_ide) VALUES ('$nrc','$id_usuario')";
		$consulta5 = mysqli_query($conn,"SELECT NRC,clave,nombremat,aula,dias,hora FROM clases INNER JOIN materias ON id_materia = NRC  INNER JOIN horario ON id_horario = horario_id INNER JOIN usuarioclase on clase_ide = clase_id where usuario_ide = '$id_usuario' AND clase_ide = '$nrc'");
		//$consulta4 = mysqli_query($conn,"SELECT clase_ide FROM usuarioclase where usuario_ide = 'id_usuario'");

			if ($conn->connect_errno) 
			{
			    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
			    exit();
			}
			if($dato = mysqli_fetch_assoc($consulta5)) 
			{
				$var1 = $dato["NRC"];
				if($var1!=$nrc){
					echo $var1;
					echo '<br>'.$nrc;
					?>
					<SCRIPT LANGUAGE="javascript"> 
				           	alert("Esta materia ya pertenece a tu horario"); 
				       	</SCRIPT> 
				       	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoalum.php">
					<?php
				}
				if(mysqli_num_rows($consulta5)==0){
					echo '<br>'.$nrc;
					?>
					<SCRIPT LANGUAGE="javascript"> 
		 		        	alert("Materia Agendada"); 
		 		        </SCRIPT> 
		 		        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoalum.php">
					<?php

				}
			}
?>			
 