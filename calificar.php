<?php 
session_start();
include "conexion.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profesor-Alumno</title>
	<script type="text/javascript" src="js/getData.js"></script>
</head>
<body>
	<div class="container">
	    <div>
	    	<label>Materias del profesor <?php	echo $_SESSION["usuario"];?></label><br>   
			<select id="materias">
				<option value="" selected="selected">Seleccionar Materia</option>
				<?php
				$id_profesor = $_SESSION['maestro'];
				$sql = "SELECT NRC,clave,nombremat FROM clases INNER JOIN materias ON id_materia = NRC INNER JOIN horario ON id_horario = horario_id WHERE id_usuario='$id_profesor'";
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
<table class="table" id="alumnos">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Calificar</th>
    </tr>
  </thead>
  <tbody id="cuerpo">

  </tbody>
</table>   
</div>
<br>		
<div class="row" id="no_records">
            
<div class="col-sm-10">Por favor, seleccione una materia para ver sus Alumnos</div></div>
        </div>	
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/validaciones.js"></script>
	
</body>
</html>