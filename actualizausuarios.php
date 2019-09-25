<?php
session_start();
include "conexion.php";
		
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$apellido =  $_POST['apellido'];
	$correo =  $_POST['correo'];	
	$telefono = $_POST['telefono'];
	$sexo = $_POST['sexo'];
	$edad = $_POST['edad'];
	$estado = $_POST['estado'];
	$rol = $_POST['rol'];
	$usuario = $_POST['usuario'];
	mysqli_query($conn,"update usuarios set nombre='$nombre', apellidos='$apellido', correo='$correo', telefono='$telefono', sexo='$sexo', edad='$edad', estado='$estado', rol='$rol', usuario='$usuario' where usu_id=$id");
	
?>	
	<SCRIPT LANGUAGE="javascript"> 
         alert("Contacto Actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoadm.php">

