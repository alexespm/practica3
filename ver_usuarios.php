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
	<title>CRUD php Mysql + bootstrap</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloslistar.css">	
	<script src="js/metodos.js"></script>
</head>
<body>
	<!-- <header>

		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Desplegar / Ocultar Menu</span>	
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Contactos</a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav">
						<li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>							
						<li><a href="cerrars.php"><span class="glyphicon glyphicon-remove"></span>Salir</a></li>						
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php								
							echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> ".$_SESSION['usuario']."</a></li>";
						?>				      
				    </ul>			
				</div>
			</div>
		</nav>
	</header> -->

	<div class="container">
		<div class="row">	
				
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nuevo Contacto</a><br><br>
			<table class='table'>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Correo</th>
					<th>Telefono</th>
					<th>Sexo</th>
					<th>Edad</th>
					<th>Estado</th>
					<th>Rol</th>
					<th>Usuario</th>
					<th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "", "practica4");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM usuarios";
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
				    echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-edad='" .$fila[2] ."' data-direccion='" .$fila[3] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
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
		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Contacto</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="insertar.php" method="POST">              		
                       		<div class="form-group">
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Ingresa nombre" required></input>
                       		</div>
                       		<div class="form-group">
                       			<input class="form-control" id="apellido" name="apellido" type="text" placeholder="Ingresa apellido" required></input>
                       		</div>          
                       		<div class="form-group">
                       			<input class="form-control" id="edad" name="edad" type="number" placeholder="Ingresa edad" required></input>
                       		</div> 
                       		<div class="form-group">
							    <select name="sexo" class="form-control" required>
									<option value="">Selecciona Sexo</option>
									<option value="masculino">Masculino</option>
									<option value="femenino">Femenino</option>
								</select>
							 </div>
                       		<div class="form-group">
                       			<input class="form-control" id="telefono" name="telefono" type="number" placeholder="Ingresa telefono" required></input>
                       		</div>
                       		<div class="form-group">
                       			<input class="form-control" id="correo" name="correo" type="text" placeholder="Ingresa correo"required></input>
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
							    <select name="rol" class="form-control" required>
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
		                       			<label for="nombre">Nombre:</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="edad">Edad:</label>
		                       			<input class="form-control" id="edad" name="edad" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="direccion">Direccion:</label>
		                       			<input class="form-control" id="direccion" name="direccion" type="text" ></input>
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
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('nombre')
		  var recipient2 = button.data('edad')
		  var recipient3 = button.data('direccion')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #nombre').val(recipient1)
		  modal.find('.modal-body #edad').val(recipient2)
		  modal.find('.modal-body #direccion').val(recipient3)		 
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