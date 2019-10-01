<?php
include "conexion.php";
session_start();

if(isset($_SESSION['maestro'])){
	$id = $_POST['id'];
	$dia = $_POST['dias'];
	$hora = $_POST['hora'];	
	$id_usuario = $_SESSION["maestro"];
	//CONSULTA Y OBTINE ID DEL HORARIO
	$consulta2 = mysqli_query($conn, "SELECT * FROM horario WHERE dias = '$dia' AND hora = '$hora'");
	$dato = mysqli_fetch_assoc($consulta2);
	$id_horario = $dato["horario_id"];
	//CONSULTA Y OBTIEN ID DE USUARIO Y HORARIO DE CLASE
	$consulta3 = mysqli_query($conn, "SELECT * FROM clases where ide_horario = '$id_horario' AND id_usuario= '$id_usuario'");
	$dato2 = mysqli_fetch_assoc($consulta3);
	$idclase =  $dato2["ide_horario"];
	$usuclase = $dato2["id_usuario"];
	$mateclase = $dato2["id_materia"];
	//CONSULTA PARA INSERTAR
	$consulta = "INSERT INTO clases (id_materia,id_usuario,ide_horario) VALUES ('$id','$id_usuario','$id_horario')";
	if(!$consulta){ 
    	echo mysqli_error($consulta);
    	exit;
	}
	if($id_horario == $idclase){
		?>
			<SCRIPT LANGUAGE="javascript"> 
            	alert("Tienes materia es este horario"); 
        	</SCRIPT> 
        	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresomtro.php">	
		<?php
	}
	else
	{

		if (mysqli_query($conn, $consulta)) {
?>			
		    <SCRIPT LANGUAGE="javascript"> 
            	alert("Materia Registrada"); 
        	</SCRIPT> 
        	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresomtro.php">	
<?php
		} else {
		    echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
		}
	}
		mysqli_close($conn);
} 
?>
<div> <?php echo $dato2['id_horario']; ?> </div>
<div> <?php echo $idclase; ?> </div>
<div> <?php echo $dato2['id_usuario']; ?> </div>