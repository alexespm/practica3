
<?php 	
session_start();
include "conexion.php";
	if(isset($_SESSION['administrador']))
	{
		$id = $_GET['id'];
				
		mysqli_query($conn,"delete from usuarios where usu_id='$id'");	
		echo "<script language='javascript'> alert('Registro Eliminado'); </script>";
		echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=ingresoadm.php'>";
	}
	else
		{
				echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
				echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=ingresoadm.php'>";
		}	

 ?>