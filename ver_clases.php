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
			$id_profesor = $_SESSION['maestro'];
			$mysqli = new mysqli("localhost", "root", "", "practica4");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
<<<<<<< HEAD
			
=======
>>>>>>> 702384de83345d8bba56e41cbe37f7ee399d0fa6
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
				     echo "<a data-toggle='modal' data-target='#editUsu'data-id='" .$fila[0] ."' data-clave'" .$fila[2] ."' data-nombre='" .$fila[1] ."' data-cupos='" .$fila[4] ."' data-aula='" .$fila[5] ."' data-creditos='" .$fila[3] ."' class='btn btn-warning' onclick='onEnviar();'><span class='glyphicon glyphicon-pencil'></span>Ver alumnos</a> ";	
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
	    <!-- Modal GENERAR CLASE-->
        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Alumnos Inscritos</h4>
                    </div>
                    <div id="contenedor"></div>
                    <?php 
                    	echo $_POST['codmat'];
                    ?>
                    <div class="modal-body">
                    	<input  id="id" name="id" type="" ></input>
                    	<table class="table">
                    		<tr>
                    			<th>Codigo</th>
                    			<th>Alumno</th>
                    		</tr>
                    		<?php
			$id_profesor = $_SESSION['maestro'];
			$mysqli = new mysqli("localhost", "root", "", "practica4");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}

			$sql = "SELECT usuario_ide,nombre FROM usuarioclase INNER JOIN usuarios ON usu_id = usuario_ide where clase_ide ='' ";
			if ($resultado = $mysqli->query($sql)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";

					echo "<td>$fila[0]</td>
						<td>$fila[1]</td>
						<td></td>
						</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();
?>			
                    	</table>
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
		  

		$(document).ready(function()
		{
			$("#id").click(function(){
				var txt = $("input").val();
		        $.post("ver_clases.php", {codmat: reci}, function(htmlexterno){
		   			$("#contenedor").html(htmlexterno);
		    	});
			});
		});
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)

		})
	</script>
	<script type="text/javascript">
    var variableJs ="Esta es mi variable en JS";

    function onEnviar(){
       document.getElementById("variable").value=variableJs;
    }

	
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