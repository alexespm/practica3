
<?php 
include "conexion.php"; 
session_start(); 
if(isset($_SESSION['administrador'])): ?>

	<!DOCTYPE html>
	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administracion</title>
	<!-- Load an icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/acceso.css">
	<link rel="stylesheet" type="text/css" href="css/estilousuarios.css">
	<script type="text/javascript"src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
		function cargaHomeAdm() {
	    	$('#contenido').load('ingresoadm.php');
	   	}
	   	function cargaUsuarios() {
	    	$('#contenido').load('ver_usuarios.php');
		}
		function cargaMaterias() {
	    	$('#contenido').load('ver_materias.php');
		}
	</script>
	</head>
	<body>
	<!-- The sidebar -->
	<div class="sidebar">
	  <a href="#home" onclick="cargaHomeAdm()"><i class="fa fa-fw fa-home"></i> Home</a>
	  <a href="#" onclick="cargaUsuarios()"><i class="fa fa-fw fa-user"></i> Usuarios</a>
	  <a href="#" onclick="cargaMaterias()"><i class="fa fa-fw fa-user"></i> Materias</a>
	</div>

	<div class="main" id="contenido">
		<h1>Bienvenido Administrador</h1>
		<div>			
			<?php	echo "Inicio sesion con el usuario " . $_SESSION["usuario"] ." con su id ".$_SESSION["administrador"].".";?>
		</div>
		<br><br>		
		<form action='cerrarsesion.php'>
			<input type="submit" name="cerrarsesion" value="Cerrar sesion"/>
		</form>
	</div>  
	</body>
	</html> 

<?php else: ?>
<script language="javascript">alert("Debes iniciar sesión");window.location.href="login.php"</script>';
<?php endif; ?>



