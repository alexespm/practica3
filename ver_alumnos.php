
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

                            <input  id="id" name="id" ></input>
                   
                        
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
            //echo $_GET["idmateria"];
            
            $sql = "SELECT usuario_ide,nombre FROM usuarioclase INNER JOIN usuarios ON usu_id = usuario_ide WHERE clase_ide = '$nrc'";
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
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/validaciones.js"></script>
    
    <!-- <script src="js/validaciones.js"></script>  -->
</body>
</html>
<?php 
    }
    else {
            echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
 ?>
