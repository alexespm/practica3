	<?php
	

			$mysqli = new mysqli("localhost", "root", "", "practica4");	
			$nom = $_POST['nombre'];
			$apep = $_POST['apellido'];
			$edad = $_POST['edad'];
			$cor = $_POST['correo'];
			$tel = $_POST['telefono'];						
			$sql = $mysqli->query("insert into usuarios (nombre,apellidos,correo,edad,telefono) values ('$nom','$apep', '$cor', $edad, '$telefono') ");			
			
	?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Contacto Registrado"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=ingresoadm.php">
