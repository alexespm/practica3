
<?php 
session_start();
include "conexion.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profesor-Alumno</title>
	<script type="text/javascript" src="js/getData.js"></script>
	<script type="text/javascript" src="js/insertacalif.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	    <div>
	    	<label>Materias del profesor <?php	echo $_SESSION["usuario"];?></label><br>   
			<select id="materias">
				<option value="" selected="selected">Seleccionar Materia</option>
				<?php
				$id_profesor = $_SESSION['maestro'];
				$sql = "SELECT NRC,clave,nombremat FROM clases INNER JOIN materias ON id_materia = NRC INNER JOIN horario ON ide_horario = horario_id WHERE id_usuario='$id_profesor'";
				$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
				while( $rows = mysqli_fetch_assoc($resultset) ) { 
				?>
				<option value="<?php echo $rows["NRC"]; ?>"><?php echo $rows["nombremat"]; ?></option>
				<?php }	?>
			</select>		           
	    </div>
	    <div id="display">
			<div class="row" id="heading" style="display:none;">

<!-- <br><h5>Resultados de la Base de Datos.</h5><br> -->           
				<form id="mi_formulario" action="subircalificacion.php" method="POST">
					<table class="table" id="alumnos">
					  <thead class="thead-dark" id="cabeza">
					    <tr>
					      <th scope="col">Codigo</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Calificar</th>
					    </tr>
					  </thead>
					  <tbody id="cuerpo">

					  </tbody>
					</table>
					
				</form> 
			</div>
			<br>		
			<div class="row" id="no_records">    
				<div class="col-sm-10">Por favor, seleccione una materia para ver sus Alumnos</div>
			</div>
	    </div>
	    <!-- Modal editar de materiass -->
        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Calificar Alumno</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="subircalificacion.php" method="POST">
                       				<input type="text" id="ide_usuario" name="ide_usuario" hidden>
                       				<input type="text" id="ver" name="ver" hidden>                        		               		         		
		                       		<div class="form-group">
		                       			<label for="nombre">CALIFICAR:</label>
		                       			<input class="form-control" id="calif" name="calif" type="text" ></input>
		                       			<input class="form-control"type="text" id="evaluar" name="evaluar" readonly="readonly"></input>
		                       		</div>		                  
									<input type="submit" class="btn btn-success">							
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button id="boton"type="button" class="btn btn-warning" data-dismiss="modal" onclick='javascript:window.location.reload()'>Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 	
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/validaciones.js"></script>
	
</body>

</html>