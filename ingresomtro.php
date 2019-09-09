<?php 
include "conexion.php"; 
session_start(); 
if(isset($_SESSION['maestro'])): ?>

	<!DOCTYPE html>
	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Load an icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/acceso.css">
	<link rel="stylesheet" type="text/css" href="css/estilousuarios.css">
	<script type="text/javascript"src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
		function cargaHomeMtro() {
	    	$('#contenido').load('ingresomtro.php');
	   	}
	   	function cargaUsuarios() {
	    	$('#contenido').load('impartir_materia.php');
		}
		function cargaMaterias() {
	    	$('#contenido').load('');
		}
	</script>
	</head>
	<body>
	<!-- The sidebar -->
	<div class="sidebar">
	  <a href="#home" onclick="cargaHomeMtro()"><i class="fa fa-fw fa-home"></i> Home</a>
	  <a href="#" onclick="cargaUsuarios()"><i class="fa fa-fw fa-user"></i> Impartir Materias</a>
	  <a href="#" onclick="cargaMaterias()"><i class="fa fa-fw fa-user"></i> Ver Clases</a>
	</div>

	<div class="main" id="contenido">
		<h1>Bienvenido Maestro</h1>
		<div>			
			<?php	echo "Inicio sesion con el usuario " . $_SESSION["usuario"] ." con su id ".$_SESSION["maestro"].".";?>
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

