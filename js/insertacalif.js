$(document).ready(function(e) {
	$('#submit').click(function(){
		var name = $('input:radio[name=evaluar]:checked').val();
		$.ajax({
			type:'POST',
			data:{calificacion:name},
			url:"subircalificacion.php", //php page URL where we post this data to save in databse
			success: function(result){
			
				$('#alert').show();
				console.log(data);
				
				$('#show').html(result);	
			}
		})
	});
});

