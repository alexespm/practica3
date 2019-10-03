<?php
  session_start();
  include "conexion.php"; 
  $codigo = $_REQUEST['miVariableJS2'];
  echo $codigo;
  if(isset($_SESSION['administrador']))
  {
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  	// RESALTAR LAS FILAS AL PASAR EL MOUSE
  	//function enviar()
	//{
		// Esta es la variable que vamos a pasar
	//	var miVariableJS=$("#txtnombre").val();
 
		// Enviamos la variable de javascript a archivo.php
	//	$.post("archivo.php",{"txtnombre":miVariableJS},function(respuesta){
	//		alert(respuesta);
	//	});
	//}
  	function enviar3(){
    	var miVariableJS=$("#txtnombre").val();
      	var miVariableJS2=$("#txtcodigo").val();
          $.ajax({
                      type: "POST",
                      url: "recibe.php",
                      data: {miVariableJS,miVariableJS2},
                      success: function()            
          			  {
                        $("#oculto2").load("archivo.php",{miVariableJS,miVariableJS2}); 
           			  }
                  });
    }
  	function enviar4(){
    	var miVariableJS=$("#txtnombre").val();
      	//var miVariableJS2=$("#txtcodigo").val();
          $.ajax({
                      type: "POST",
                      url: "recibe.php",
                      data: {miVariableJS},
                      success: function()            
          			  {
                        $("#tareas").load("tareas.php",{miVariableJS}); 
           			  }
                  });
    }
  	function enviar5(){
    	var miVariableJS=$("#txtnombre").val();
      	//var miVariableJS2=$("#txtcodigo").val();
          $.ajax({
                      type: "POST",
                      url: "recibe.php",
                      data: {miVariableJS},
                      success: function()            
          			  {
                        $("#actualiza").load("funciones.php",{miVariableJS}); 
           			  }
                  });
    }
  	$(document).ready(iniciar);
    var dato;
  	function iniciar(){
      $('#tbmaterias tr').on('click', function(){
    	dato = $(this).find('td:first','td:second').html();
      	$('#txtnombre').val(dato);  
       	enviar3();
        enviar4();
        enviar5();
        insertcrn();
    }); 
      //$("#tbmaterias tr").click(clickTabla);
    }
    //function clickTabla(){
    //  var x = $(this).parent("tr");
    //  x.css("background-color","red");
	//}
    
</script>

  <h3>Materias</h3>";
  <table class='table table-responsive table-bordered'>";
    <tr>
      <th>Id</th>
      <th>Clave</th>
      <th>Nombre de Materia</th>
      <th>Cupos</th>
      <th>Aula</th>
      <th>Creditos</th> 
      <th><span class="glyphicon glyphicon-wrench"></span></th>
    </tr>
<?php
 		
      if ($conn->connect_errno) {
          echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
          exit();
      }
      $consulta= "SELECT * FROM materias";
      if ($resultado = $conn->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         
          echo "<tr>";
          echo "<td>$fila[0]</td>
            <td>$fila[2]</td>
            <td>$fila[1]</td>
            <td>$fila[4]</td>
            <td>$fila[5]</td>
            <td>$fila[3]</td>";
          echo"<td>";           
             echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-clave'" .$fila[2] ."' data-nombre='" .$fila[1] ."' data-cupos='" .$fila[4] ."' data-aula='" .$fila[5] ."' data-creditos='" .$fila[3] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";     
          echo "<a class='btn btn-danger' href='eliminamaterias.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";   
          echo "</td>";
          echo "</tr>";
        }
        $resultado->close();
      }
      $conn->close();     
?>
<?php
  }
  else
  {
    ?>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">
     <?php
  }
?>