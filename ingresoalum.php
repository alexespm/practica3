<?php 
include "conexion.php"; 
session_start(); 
if(isset($_SESSION['alumno'])): ?>

	<!DOCTYPE html>
	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Load an icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/acceso.css">
	<link rel="stylesheet" type="text/css" href="css/estilousuarios.css">
	<!-- <script type="text/javascript"src="http://code.jquery.com/jquery-latest.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script>
		function cargaHomeAlum() {
	    	$('#contenido').load('ingresoalum.php');
	   	}
	   	function cargaAgenda() {
	    	$('#contenido').load('Agendar.php');
		}
		function cargaMaterias() {
	    	$('#contenido').load('horario.php');
		}
		function cargaKardex() {
	    	$('#contenido').load('kardex.php');
		}
	</script>
	</head>
	<body>
	<!-- The sidebar -->
	<div class="sidebar">
	  <a href="#home" onclick="cargaHomeAlum()"><i class="fa fa-fw fa-home"></i> Home</a>
	  <a href="#Agenda" onclick="cargaAgenda()"><i class="fa fa-fw fa-user"></i> Agendar</a>
	  <a href="#Horario" onclick="cargaMaterias()"><i class="fa fa-fw fa-user"></i> Horario</a>
	  <a href="#Kardex" onclick="cargaKardex()"><i class="fa fa-fw fa-user"></i> Kardex</a>
	</div>

	<div class="main" id="contenido">
		<h1>Bienvenido Alumno</h1>
		<div>			
			<?php	echo "Inicio sesion con el usuario " . $_SESSION["usuario"] ." con su id ".$_SESSION["alumno"].".";?>
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

