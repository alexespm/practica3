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
					<th>Nombre de Materia</th>
					<th>Descripcion</th>
					<th>Crn</th>
					<th>Clave</th>
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
						<td>$fila[1]</td>
						<td>$fila[2]</td>
						<td>$fila[3]</td>
						<td>$fila[4]</td>
						<td>$fila[5]</td>
						<td>$fila[6]</td>
						<td>$fila[7]</td>
						<td>$fila[8]</td>
						<td>$fila[9]</td>";	
					echo"<td>";						
				     echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-apellido='" .$fila[2] ."' data-correo='" .$fila[3] ."' data-telefono='" .$fila[4] ."' data-sexo='" .$fila[5] ."' data-edad='" .$fila[6] ."' data-estado='" .$fila[7] ."' data-rol='" .$fila[8] ."' data-usuario='" .$fila[9] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
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
                       <form action="insertar.php" method="POST" data-toggle="validator">              		
                       		<div class="form-group">
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Ingresa nombre" required></input>
                       		</div>
                       		<div class="form-group">
                       			<input class="form-control" id="apellido" name="apellido" type="text" placeholder="Ingresa apellido" required></input>
                       		</div>          
                       		<div class="form-group">
                       			<input class="form-control" id="edad" name="edad" onkeypress="solonumeros(event);"type="number" min="18" max="100" placeholder="Ingresa edad" required></input>
                       		</div> 
                       		<div class="form-group">
							    <select name="sexo" id="sexo" class="form-control" required>
									<option value="">Selecciona Sexo</option>
									<option value="masculino">Masculino</option>
									<option value="femenino">Femenino</option>
								</select>
							 </div>
                       		<div class="form-group">
                       			<input class="form-control" id="telefono" name="telefono" type="text" placeholder="Ingresa telefono" required></input>
                       		</div>
                       		
                       		<div class="form-group">
    							<input type="email" class="form-control" id="correo" placeholder="Email" data-error="Ohh, correo invalido" required>
    						</div>
                       		<div class="form-group">
                       			<input class="form-control" id="estado" name="estado" type="text" placeholder="Ingresa estado" required></input>
                       		</div>
                       		<div class="form-group">
                       			<input class="form-control" id="usuario" name="usuario" type="text" placeholder="Ingresa usuario" required></input>
                       		</div>
                       		<div class="form-group">
                       			<input class="form-control" id="password" name="password" type="password" placeholder="Ingresa password" required></input>
                       		</div>
                       		<div class="form-group">
							    <select name="rol" id="rol" class="form-control" required>
									<option value="">Selecciona Rol</option>
									<option value="1">Administrador</option>
									<option value="2">Maestro</option>
									<option value="3">Alumno</option>
								</select>
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
                       <form action="actualiza.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="nombre">Nombre(s):</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="apellido">Apellidos:</label>
		                       			<input class="form-control" id="apellido" name="apellido" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="correo">Correo:</label>
		                       			<input class="form-control" id="correo" name="correo" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="telefono">Telefono:</label>
		                       			<input class="form-control" id="telefono" name="telefono" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
									    <select name="sexo" id="sexo" class="form-control" required>
											<option value="">Selecciona Sexo</option>
											<option value="Masculino">Masculino</option>
											<option value="Femenino">Femenino</option>
										</select>
									</div>
									<div class="form-group">
		                       			<label for="edad">Edad:</label>
		                       			<input class="form-control" id="edad" name="edad" type="text" ></input>
		                       		</div>
			                       		<div class="form-group">
	                       				<input class="form-control" id="estado" name="estado" type="text"></input>
	                       			</div>	
	                       			<div class="form-group">
		                       			<label for="rol">Rol:</label>
		                       			<input class="form-control" id="rol" name="rol" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="usuario">Usuario:</label>
		                       			<input class="form-control" id="usuario" name="usuario" type="text" ></input>
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
		  var recipient2 = button.data('apellido')
		  var recipient3 = button.data('correo')
		  var recipient4 = button.data('telefono')
		  var recipient5 = button.data('sexo')
		  var recipient6 = button.data('edad')
		  var recipient7 = button.data('estado')
		  var recipient8 = button.data('rol')
		  var recipient9 = button.data('usuario')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #nombre').val(recipient1)
		  modal.find('.modal-body #apellido').val(recipient2)
		  modal.find('.modal-body #correo').val(recipient3)	
		  modal.find('.modal-body #telefono').val(recipient4)
		  modal.find('.modal-body #sexo').val(recipient5)	
		  modal.find('.modal-body #edad').val(recipient6)
		  modal.find('.modal-body #estado').val(recipient7)
		  modal.find('.modal-body #rol').val(recipient8)
		  modal.find('.modal-body #usuario').val(recipient9)
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