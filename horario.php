<?php
	session_start();
	include "conexion.php"; 
	if(isset($_SESSION['alumno']))
	{
?>
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Usuarios</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloslistar.css">		
</head>
<body>
	
	<div class="container">
		<div class="row">	
			<table class='table'>
				<tr>
					<th>NRC</th>
					<th>Clave</th>
					<th>Nombre de Materia</th>
					<th>Aula</th>
					<th>Dias de clase</th>
					<th>Hora</th>
					
					<th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php
			$id_alumno= $_SESSION['alumno'];
			$mysqli = new mysqli("localhost", "root", "", "practica4");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			
			$consulta2 = "SELECT clase_id,clave,nombremat,aula,dias,hora FROM clases INNER JOIN materias ON id_materia = NRC  INNER JOIN horario ON ide_horario = horario_id INNER JOIN usuarioclase on clase_ide = clase_id where usuario_ide = '$id_alumno'";
			if ($resultado = $mysqli->query($consulta2)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td>
						<td>$fila[1]</td>
						<td>$fila[2]</td>
						<td>$fila[3]</td>
						<td>$fila[4]</td>
						<td>$fila[5]</td>";
					
					echo "</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();				
?>
	        </table>
		</div> 
		
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/validaciones.js"></script>
	
	<!-- <script src="js/validaciones.js"></script>	 -->
</body>
</html>
<?php 
	}
	else {
		    echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
		}
	
		mysqli_close($conn);
 ?>
