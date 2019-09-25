$id = "<script>$(this).find(':selected').val();</script>";

<?php
include "conexion.php";

$calif= $_POST['calif'];
$valor = $_POST["evaluar"];
//$id = $_POST['mi_variable'];
echo $calif;
echo $valor;
echo $id;
$query = "UPDATE usuarioclase set calificacion=$valor where usuario_ide = 4 AND clase_ide = 1";
mysqli_query($conn,$query);
?>