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
	<title>Alumno</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloslistar.css">		
</head>
<body>
	
	<div class="container">
		<div class="row">	
				
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoMat">Agendar Materia</a><br><br>
			<table class='table'>
				<tr>
					<th>NRC</th>
					<th>Clave</th>
					<th>Nombre de Materia</th>
					<th>Dias</th>
					<th>Hora</th>
					<th>Aula</th>
					<th>Cupos</th>
					<th>Creditos</th>
					<th>Profesor</th>
					
					<th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "", "practica4");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta = "SELECT clase_id,nombremat,clave,aula,dias,hora,aula,cupos,creditos,nombre FROM clases INNER JOIN materias ON id_materia = NRC INNER JOIN horario ON id_horario = horario_id INNER JOIN usuarios ON id_usuario = usu_id";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td>
						<td>$fila[2]</td>
						<td>$fila[1]</td>
						<td>$fila[4]</td>
						<td>$fila[5]</td>
						<td>$fila[3]</td>
						<td>$fila[7]</td>
						<td>$fila[8]</td>
						<td>$fila[9]</td>";
					echo "</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();			
?>
	        </table>
		</div> 


		<!-- Modal registro de usuarios -->
		<div class="modal" id="nuevoMat" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5>Ingresa NRC de la materia a agendar</h5>                       
                    </div>
                    <div class="modal-body">
                    	<form action="insertar_agenda.php" method="POST" data-toggle="validator">
                    		<div class="form-group">
                       			<input class="form-control" id="nrc" name="nrc" type="text" placeholder="Ingresa NRC de la materia" required></input>
                       		</div>
                       		<input type="submit" class="btn btn-success" value="Guardar">  

                    	</form>
                    	 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Modal editar de usuarios -->
        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Contacto</h4>
                    </div>
                    <div class="modal-body">                      

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 

	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	

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