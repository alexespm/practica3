<link rel="stylesheet" type="text/css" href="css/estilousuarios.css">
<?php 
session_start(); 
if(isset($_SESSION['maestro'])): ?>
	<h1>Bienvenido Maestro</h1>
	<div>
		<?php	echo "Inicio sesion con el usuario " . $_SESSION["usuario"] ." con su id ".$_SESSION["maestro"].".";?>
	</div>
	<br><br>
	<form action='cerrarsesion.php'>
    	<input type="submit" name="cerrarsesion" value="Cerrar sesion"/>
	</form>
<?php else: ?>
<script language="javascript">alert("Debes iniciar sesión");window.location.href="login.php"</script>
<?php endif; ?>
