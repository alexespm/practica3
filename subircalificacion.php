<?php
include "conexion.php";
session_start(); 
$iden_usu=$_POST['ide_usuario'];
$calif= $_POST['calif'];
$valor = $_POST["evaluar"];
$idemateria = $_POST['ver'];
if (isset($valor)) {
    //Pequeño ejemplo.
    	if($valor=="Reprobado"||$valor=="Cursando"){
    		$query1 = "UPDATE usuarioclase set calificacion='$valor' WHERE usuario_ide = $iden_usu AND clase_ide = $idemateria";
			mysqli_query($conn, $query1);
			?>
			<SCRIPT LANGUAGE="javascript"> 
				alert("Calificacion Asignada"); 
			</SCRIPT> 
			<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresomtro.php">
			<?php
    	}
    	if($valor=="Calificar"){
    		$query = "UPDATE usuarioclase set calificacion=$calif WHERE usuario_ide = $iden_usu AND clase_ide = '$idemateria'";
			mysqli_query($conn, $query);
			?>
			<SCRIPT LANGUAGE="javascript"> 
				alert("Calificacion Asignada"); 
			</SCRIPT> 
			<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresomtro.php">
			<?php
    	}
}
else{
?>
	<SCRIPT LANGUAGE="javascript"> 
		alert("Hay un error en los datos"); 
	</SCRIPT> 
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresomtro.php">
<?php
}



//$id = $_POST['mi_variable'];



//$query = "UPDATE usuarioclase set calificacion=$valor where usuario_ide = $iden_usu AND clase_ide = 1";
//mysqli_query($conn,$query);

?>