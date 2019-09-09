<?php
	session_start();
	include "conexion.php"; 
	if(isset($_SESSION['administrador']))
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
				
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoMat">Nueva Materia</a><br><br>
			<table class='table'>
				<tr>
					<th>Id</th>
					<th>Clave</th>
					<th>Nombre de Materia</th>
					<th>Cupos</th>
					<th>Aula</th>
					<th>Horario</th>
					<th>Creditos</th>
					
					<th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "", "practica4");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM materias";
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
						<td>$fila[6]</td>
						<td>$fila[3]</td>";
					echo"<td>";						
				     echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-clave'" .$fila[2] ."' data-nombre='" .$fila[1] ."' data-cupos='" .$fila[4] ."' data-aula='" .$fila[5] ."' data-horarios='" .$fila[6] ."' data-creditos='" .$fila[3] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
					echo "<a class='btn btn-danger' href='elimina.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
					echo "</td>";
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
                        <h4>Nuevo Contacto</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="insertar_materia.php" method="POST" data-toggle="validator">              		
                       		<div class="form-group">
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Ingresa nombre de la materia" required></input>
                       		</div>     
                       		<div class="form-group">
                       			<input class="form-control" id="creditos" name="creditos" onkeypress="solonumeros(event);"type="number" min="2" max="12" placeholder="Ingresa creditos" required></input>
                       		</div> 
                       		<div class="form-group">
                       			<input class="form-control" id="cupos" name="cupos" onkeypress="solonumeros(event);"type="number" min="20" max="40" placeholder="Ingresa cupos" required></input>
                       		</div> 
                       		<div class="form-group">
                       			<input class="form-control" id="aula" name="aula" type="text" placeholder="Ingresa aula" required></input>
                       		</div>
                       		<div class="form-group">		
								<input type="datetime-local" class="form-control" name="horario" id="horario" required>
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
                       <form action="actualiza_materia.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="nombre">Nombre de Materia:</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="creditos">Creditos:</label>
		                       			<input class="form-control" onkeypress="solonumeros(event);" id="creditos" name="creditos" type="text" min="2" max="12"></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="cupos">Cupos:</label>
		                       			<input class="form-control" onkeypress="solonumeros(event);" id="cupos" name="cupos" type="text" min="20" max="40"></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="aula">Aula:</label>
		                       			<input class="form-control" id="aula" name="aula" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="horario">Horario:</label>
		                       			<input class="form-control" id="horario" name="horario" type="datetime-local" ></input>
		                       		</div>
									
									<input type="submit" class="btn btn-success">							
                       </form>
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
	<script src="js/validaciones.js"></script>
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('nombre')
		  var recipient2 = button.data('creditos')
		  var recipient3 = button.data('cupos')
		  var recipient4 = button.data('aula')
		  var recipient5 = button.data('horario')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #nombre').val(recipient1)
		  modal.find('.modal-body #creditos').val(recipient2)
		  modal.find('.modal-body #cupos').val(recipient3)	
		  modal.find('.modal-body #aula').val(recipient4)
		  modal.find('.modal-body #horario').val(recipient5)	
		})
		
	</script>
	<!-- <script src="js/validaciones.js"></script>	 -->
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