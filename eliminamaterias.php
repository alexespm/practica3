<<<<<<< HEAD
<?php 	
session_start();
include "conexion.php";
	if(isset($_SESSION['administrador']))
	{
		$id = $_GET['id'];
				
		mysqli_query($conn,"delete from materias where NRC='$id'");	
		echo "<script language='javascript'> alert('Registro Eliminado'); </script>";
		echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=ingresoadm.php'>";
	}
	else
		{
				echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
				echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=ingresoadm.php'>";
		}	
=======
<?php 	
session_start();
include "conexion.php";
	if(isset($_SESSION['administrador']))
	{
		$id = $_GET['id'];
				
		mysqli_query($conn,"delete from materias where NRC='$id'");	
		echo "<script language='javascript'> alert('Registro Eliminado'); </script>";
		echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=ingresoadm.php'>";
	}
	else
		{
				echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
				echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=ingresoadm.php'>";
		}	
>>>>>>> 702384de83345d8bba56e41cbe37f7ee399d0fa6
 ?>