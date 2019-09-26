
<?php
	session_start();
	include "conexion.php"; 
	if(isset($_SESSION['maestro']))
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
			<table id="clases" class='table'>
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
			$id_profesor = $_SESSION['maestro'];
			$mysqli = new mysqli("localhost", "root", "", "practica4");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}

			$consulta2 = "SELECT NRC,clave,nombremat,aula,dias,hora FROM clases INNER JOIN materias ON id_materia = NRC INNER JOIN horario ON id_horario = horario_id WHERE id_usuario='$id_profesor'";
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
					echo"<td>";
					 echo"<button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#editUsu'>Abrir modal</button>";						
				     echo "<a href='ver_alumnos.php' data-toggle='modal' name='editUsu 'data-target='#editUsu'data-id='" .$fila[0] ."' class='btn btn-warning' id='raaagh'><span class='glyphicon glyphicon-pencil'></span>Ver alumnos</a> ";	
					echo "<a class='btn btn-danger' href='elimina.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Descartar</a>";	
					echo "</td>";
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
	<script>
		$(document).ready(function(){
			$('#clases tr').on('click', function(){
			  	var dato = $(this).find('td:first').html();
			  	$('#id').val(dato);
			  	var dataString = 'nrc='+ dato;  

			  	$.ajax({
				type: "GET",
				url: 'ver_alumnos.php',
				data: dataString,
				success: function(data) {
					 $("#editUsu").modal("show");
				}
			});

			});	


		});			 
			
		
		
	</script>

</body>
</html>     
<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">
		 <?php
	}

?>