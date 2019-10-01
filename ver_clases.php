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
			$consulta2 = "SELECT NRC,clave,nombremat,aula,dias,hora FROM clases INNER JOIN materias ON id_materia = NRC INNER JOIN horario ON ide_horario = horario_id WHERE id_usuario='$id_profesor'";
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
				     echo "<a data-toggle='modal' name='editUsu 'data-target='#editUsu'data-id='" .$fila[0] ."' class='btn btn-warning' id='raaagh'><span class='glyphicon glyphicon-pencil'></span>Ver alumnos</a> ";	
					echo "<a class='btn btn-danger' href='eliminaclases.php?id=" .$fila[0] ."&dia=".$fila[4]."&hora=".$fila[5]."'><span class='glyphicon glyphicon-remove'></span>Descartar</a>";	
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
                    <div class="modal-body">
                            <input  id="id" name="id" hidden=></input>
                        <table class="table" id="alumnos">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">Codigo</th>
					      <th scope="col">Alumno</th>
					    </tr>
					  </thead>
					  <tbody id="cuerpo">

					  </tbody>
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
    $(document).ready(function(){
			$('#clases tr').on('click', function(){
			  	var dato = $(this).find('td:first').html();
			  	$('#cuerpo').empty();
			  	$('#id').val(dato);   
		var dataString = 'empid='+ dato;  
		$.ajax({
			url: 'ver_alumnos.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(employeeData) {
				$("#id").val(id);
				if(employeeData) {
					var valor=0;
					$("#heading").show();		  
					$("#no_records").hide();
					     
	
    				$.each(employeeData, function(key, val) {
					    var tr=$('<tr></tr>');
					    $.each(val, function(k, v){
					    	if(v!=0)
					    	{return false ;}	
					    });
					    
					    $.each(val, function(k, v){
					    	
					        $('<td>'+v+'</td>').appendTo(tr);
					    });
					    
					    tr.appendTo('#cuerpo');
					    identificador = valor;
					    valor++;		
					});
			   		$("#records").show();					
					
			   		
										 
				} else {
					$("#heading").hide();
					$("#records").hide();
					$("#no_records").show();
				}
			} 
		});
 	})
 	
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