<?php
include_once("conexion.php");
if($_REQUEST['empid']) { 
    $sql = "SELECT usuario_ide,nombre FROM usuarioclase INNER JOIN usuarios ON usu_id = usuario_ide WHERE clase_ide ='".$_REQUEST['empid']."'";
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