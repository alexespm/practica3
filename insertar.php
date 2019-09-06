	<?php
		$mysqli = new mysqli("localhost", "root", "", "practica4");	
		$nom = $_POST['nombre'];
		$apep = $_POST['apellido'];
		$edad = $_POST['edad'];
		$cor = $_POST['correo'];
		$tel = $_POST['telefono'];
		$sexo = $_POST['sexo'];	
		$est = $_POST['estado'];
		$usu = $_POST['usuario'];
		$pass = $_POST['password'];
		$rol = $_POST['rol'];	

		if($edad > 17 && $edad < 101):
			$sql = $mysqli->query("insert into usuarios (nombre,apellidos,correo,telefono,sexo,edad,estado,usuario,password,rol) values ('$nom','$apep','$cor','$tel','$sexo','$edad','$est','$usu','$pass','$rol') ");
			$sql2 = $mysqli->query("insert into login (usuario,password,rol) values ('$usu','$pass','$rol') ");
	?>
		<SCRIPT LANGUAGE="javascript"> 
            alert("Contacto Registrado"); 
        </SCRIPT> 
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoadm.php">		
	<?php
		else:
	?>
			<script language="javascript">alert("ingresa una edad valida para el registro");window.location.href="ingresoadm.php"</script>';
<?php
			endif; 
?>


		   
