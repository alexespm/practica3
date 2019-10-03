<?php
include_once("conexion.php");
if($_REQUEST['empid']) { 
	$consulta = mysqli_query ($conn, "SELECT clase_id FROM clases WHERE id_materia = '".$_REQUEST['empid']."'");  
$dato = mysqli_fetch_assoc($consulta);
$var1 = $dato["clase_id"];
    $sql = "SELECT usuario_ide,nombre FROM usuarioclase INNER JOIN usuarios ON usu_id = usuario_ide WHERE clase_ide ='$var1'";
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    $data = array();
    
    $i=0;
    while( $rows = mysqli_fetch_assoc($resultset) ) {
        
        $data[$i] = $rows;
        $i++;
            
    }

    echo json_encode($data);
} else {
    echo 0; 
}
?>