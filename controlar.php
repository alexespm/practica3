<?php
include "conexion.php"; 


$nombre = $_POST['usuario'];
$password = $_POST['password'];

$consulta = mysqli_query ($conn, "SELECT * FROM usuarios WHERE usuario = '$nombre' AND password = '$password'");  

if(!$consulta){ 
    echo mysqli_error($consulta);
    exit;
} 

if($dato = mysqli_fetch_assoc($consulta)) {
	$var1 = $dato["rol"];
	$var2 = $dato["usu_id"];
	$var3 = $dato['usuario']; 
	if($var1==1){	
		session_start();
		$_SESSION['administrador']=$var2;
		$_SESSION['usuario']=$var3;
		header("Location: ingresoadm.php");
		exit(); 
	}
	if($var1==2){
		session_start();
		$_SESSION['maestro']=$var2;
		$_SESSION['usuario']=$var3;
		header("Location: ingresomtro.php");
		exit(); 
	}
	if($var1==3){
		session_start();
		$_SESSION['alumno']=$var2;
		$_SESSION['usuario']=$var3;
		header("Location: ingresoalum.php");
		exit(); 
	}
} 
else {
	echo '<script language="javascript">alert("El usuario y la contraseña son incorrectos, por favor vuelva a introducirlos.");window.location.href="login.php"</script>';
}
?>