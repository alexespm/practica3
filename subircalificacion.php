<?php
include conexion.php;
 
$tiempo = $_POST['tiempo'];
$sql = "INSERT INTO oc_t_comercio_destacado (id_ad,tiempo) VALUES ('0','$tiempo')";
mysql_query($sql,$enlace);
?>