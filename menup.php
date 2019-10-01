<?php 
include "conexion.php"; 
session_start(); 
if(isset($_SESSION['maestro'])): ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Profesor</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="css/style.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Bootstrap Vertical Nav -->
        <link rel="stylesheet" href="css/bootstrap-vertical-menu.css">

        <style type="text/css">
            body {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                padding: 50px 0;
            }

            h1 {
                font-weight: 200;
            }

            @media (min-width: 768px) {
                .bootstrap-vertical-nav {
                    margin-top: 50px;
                }
            }
        </style>
        <script>
    	$(document).ready(function(e) {
    		$('#nav-link active').on('click', function(){
    			
    			$('#content').attr('src', 'ver_materias.php');
    		});
    		$('#menu2').on('click', function(){
    			$('#content').attr('src', 'page2.html');
    			
    		});
    		$('#menu3').on('click', function(){		
    			$('#content').attr('src', 'http://bing.com');
    			
    		});
    	});
    	function cargaContenido() {
            $('#contenidomaterias').load('ver_materias.php');
        }
        function cargaContenido2() {
            $('#admitareas').load('adm_tareas.php');
        }
        function cargaContenido3() {
            $('#admitareas').load('califica_tarea.php');
        }
    </script>
    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3">

                <div class="bootstrap-vertical-nav">

                    <button class="btn btn-primary hidden-md-up" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <span class="">Menu</span>
                    </button>

                    <div class="collapse" id="collapseExample">
                        <ul class="nav flex-column" id="exCollapsingNavbar3">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" onclick="cargaContenido();">Ver Materias del Profesor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="cargaContenido2();">Administracion de tareas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="cargaContenido3();">Calificar Tareas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://prograparainter.000webhostapp.com/borrar.php" onclick="">Vaciar Tablas</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link disabled" href="#">Disabled</a>
                            </li>-->
                        </ul>
                    </div>

                </div>

            </div>
            <div id="admitareas" class="col-md-8 col-lg-9">
                <h1>Bienvenido Profesor</h1>

                <hr />

                <div class="jumbotron">
                    <h3>Datos de Profesor</h3>
          	        <table class='table table-responsive table-bordered'>
                  		<tr>
                        	<th>Codigo<th>
                            <th>Nombre<th>
                            <th>User<th>
                            <th>Correo</th>
                            <th>Telefono</th>
                        </tr>
            			<tr>
            			<?php
            			    //.$datos[1].;
            			    echo"<td>".$_SESSION['maestro']."<td>";
                            echo"<td>".$_SESSION["nombre"].' '.$_SESSION["apellidos"]."<td>";
      				        echo"<td>".$_SESSION["usuario"]."<td>";
                            echo"<td>".$_SESSION["correo"]."<td>";
                            echo"<td>".$_SESSION["telefono"]."<td>";
            		    ?>           	
                  		</tr>
                   	</table>
                </div>

                <hr />
                <div id="contenidomaterias"></div>
                
            </div>
        </div>
    </div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
<?php else: ?>
<script language="javascript">alert("Debes iniciar sesión");window.location.href="login.php"</script>';
<?php endif; ?>
