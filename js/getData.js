var identificador;
$(document).ready(function(){  
	// Código para obtener todos los registros de la tabla a través del cuadro de selección
	$("#materias").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'empid='+ id;  
		$.ajax({
			url: 'getPersonal.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(employeeData) {
				if(employeeData) {
					var valor=0;
					$("#heading").show();		  
					$("#no_records").hide();
					     
	
    				$.each(employeeData, function(key, val) {
					    var tr=$('<tr></tr>');
					    $.each(val, function(k, v){
					    	$('<input type="hidden" name="mi_variable" id="'+valor+'"value="'+v+'">').appendTo(tr);
					    	if(v!=0)
					    	{return false ;}	
					    });
					    
					    $.each(val, function(k, v){
					    	
					        $('<td>'+v+'</td>').appendTo(tr);
					    });
					    $('<td><input type="radio" onChange="habilita(this);" class="evaluar" name="evaluar" id="'+valor+'" value="Calificar"><label>Calificar</label><br><input type="radio" class="evaluar" name="evaluar" id="'+valor+'" value="Reprobado" onChange="deshabilita(this);"><label>Reprobado</label><br><input type="radio" class="evaluar" id="'+valor+'" name="evaluar"value="Cursando" onChange="deshabilita(this);"><label>Cursando...</label></td>').appendTo(tr);
					    $('<td><input type="text" name="calif"class="califica" id="'+valor+'" style="display:none" placeholder="Ingresa Calficacion"><br><button type="submit" id="'+valor+'" class="btn btn-primary">Guardar</button><td>').appendTo(tr);
					    tr.appendTo('#cuerpo');
					    identificador = valor;
					    valor++;		
					});
			   		$("#records").show();					
					
			   		
										 
				} else {
					$("#heading").hide();
					$("#records").hide();
					$("#no_records").show();
				}
			} 
		});
 	})
});

function habilita(obj)
{
 	var radios = document.getElementsByClassName('evaluar');
	var inputs = document.getElementsByClassName('califica');
	var variable;
	var id;
		for(var i =0; i< radios.length; i++){
			radios[i].onclick = function(){
				$("input[type=radio]:checked").each(function(){
					//cada elemento seleccionado
					variable = $(this).val();


				});
				
				    
				for(var i =0; i< inputs.length; i++){

					if($("input:checked").is(':checked')) {  
					    id=$("input:checked").attr("id");  
					}
					if(variable =="Calificar")
					{
						inputs[id].style.display = "block";
					}
				}
			}
		}
 	//document.getElementById('boton').style.display = "block";
}

function deshabilita(obj)
{
	var radios = document.getElementsByClassName('evaluar');
	var inputs = document.getElementsByClassName('califica');
	var id2; 
		for(var i =0; i< inputs.length; i++){
			if($("input:checked").is(':checked')) {  
				id2=$("input:checked").attr("id");
			}
			if($('input:radio[name=evaluar]:checked').val() =="Reprobado")
			{
				inputs[id2].style.display = "none";
			}
			if($('input:radio[name=evaluar]:checked').val() =="Cursando")
			{
				inputs[id2].style.display = "none";
			}
		}
	//document.getElementById('boton').style.display = "none";
}
// $.each(employeeData, function(i, item) {
//             		$("#Nombre").text(item.nombre);
//             		alert(item.nombre);
//                 }); 
// $("#Codigo").text(employeeData[i].usuario_ide);
// $("#Nombre").text(employeeData[i].nombre);
// $("#emp_salario").text(employeeData[i].susuario_ide);
