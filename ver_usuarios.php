<?php
include('conexion.php');
session_start(); 
		$sql = "SELECT * FROM usuarios";
		$result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
?>
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script>
        function cargaUsu() {
            $('#contenido').load('agregar_empleados.php');
        }

    </script>
        <!-- LIST -->
<div class=col-md-12 id="contenido">
    
    <form id="form-list-client">
            <legend>List of clients</legend>
    <div class="pull-right">
        <a class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
        <a class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> New</a>
    </div>
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <td>Name</td>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
                
        </thead>
        <tbody id="form-list-client-body">
            
                <?php
                while($row = mysqli_fetch_array($result)){
                    echo"<tr>";
                    echo "<td>" . $row['usu_id'] . "</td>";
                    echo "<td>" . $row['usuario'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo'<td>
                        <a title="view this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-eye-open text-primary"></i> </a>
                        <a title="edit this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>
                        <a title="delete this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>
                        
                        <a title="check credit" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-duplicate text-danger"></i> </a>
                        <a title="generate invoice" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-level-up bg-success"></i> </a>
                   </td>
                   </tr>';
                }
                ?>  
        </tbody>
    </table>
    </form>

    
</div>


<br> 
<?php		
        } 
        else {
			    echo "0 results";
			}

			mysqli_close($conn);
	?>