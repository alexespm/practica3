<?php 	
session_start();
include "conexion.php";
	if(isset($_SESSION['maestro']))
	{
		$id = $_GET['id'];
		$dia = $_GET['dia'];
		$hora = $_GET['hora'];
		$id_usuario = $_SESSION["maestro"];
		$consulta2 = mysqli_query($conn, "SELECT * FROM horario WHERE dias = '$dia' AND hora = '$hora'");
		$dato = mysqli_fetch_assoc($consulta2);
		$ide_horario = $dato["horario_id"];
		$consulta3 = mysqli_query($conn, "SELECT * FROM clases where id_horario = '$ide_horario' AND id_usuario= '$id_usuario'");
		$dato2 = mysqli_fetch_assoc($consulta3);
		$idclase =  $dato2["id_horario"];
		$usuclase = $dato2["id_usuario"];
		$mateclase = $dato2["id_materia"];
		$clasemate = $dato2["clase_id"];	
		mysqli_query($conn,"delete from clases where Clase_id='$clasemate' ");	
		echo "<script language='javascript'> alert('Registro Eliminado'); </script>";
		echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=ingresomtro.php'>";
	}
	else
		{
				echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
				echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=ingresomtro.php'>";
		}	

 ?>