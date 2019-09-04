<?php
include('conexion.php');
session_start(); 
	$sql = "SELECT * FROM usuarios";
	$result = mysqli_query($conn, $sql);        
		if (mysqli_num_rows($result) > 0) {
?>
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<label>Nombre:</label><br><input type="text" name="nombre" placeholder="Ingresa usuario"><br>
		Apellido: <br><input type="text" name="apellido" placeholder="Ingresa apellido"><br>
		Edad: <br><input type="text" name="edad" placeholder="Ingresa edad"><br>
		Sexo: <br><input type="text" name="sexo" placeholder="Ingresa sexo"><br>
		Telefono: <br><input type="text" name="telefono" placeholder="Ingresa telefono"><br>
		E-mail: <br><input type="text" name="email" placeholder="Ingresa email"><br>
		Estado: <br><input type="text" name="estado" placeholder="Ingresa estado"><br>
		<label>Usuario:</label><br><input type="text" name="usuario" placeholder="Ingresa usuario"><br>
		<label>Password:</label><br><input type="text" name="password" placeholder="Ingresa password"><br>
		<label>Rol:</label><br><input type="text" name="rol" placeholder="Ingresa rol"><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
<?php		
    } 
    else {
		echo "0 results";
	}
	mysqli_close($conn);
	?>