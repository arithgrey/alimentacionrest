/*



$(document).on("ready", function(){

	$('.4').hide();
	$('.5').hide();
	$('.6').hide();
	//carga tipos de ingredentes en el sistema		
	$('.paso1').html("<h3>1</h3>");

	var urlactual= document.getElementById("urlactual").value;
	var urlformada=urlactual+"index.php/api/frondend/listpresentacion/format/json";
	var urlformadatiposingredientes=urlactual+ "index.php/api/frondend/listtiposingredientes/format/json";

	$('.listpresentacion').click(function(){
			$('.4').show();
	});
	$('.4').click(function(){
			$('.5').show();
	});
	
	/*
	$('.5').click(function(){

			selectcantidad="<select name='cantidad'><option><option>";
			for (var i = 0; i < 100; i++) {
				selectcantidad+="<option value='"+i+"'>"+i+"<option>";				
			}
			selectcantidad+="</select>";
			$(".cantidad").html(selectcantidad);
			$('.6').show();
	});
	
	baseurl = $('.now').val();
	
	$('.administracion').click(function(){
		window.location.replace(baseurl);
	});

	//Presentación
	$('.nombreingrediente').click(function(){
			var jqxhr = $.ajax({
				type: "POST",
				url: urlformada,							
				dataType: "json"	

			}).done(function(data) {				
				
				text ="<label>Presentación</label>"
				text+="<select name='presentacion' id='presentacion' class='presentacion'>";	
				text+="<option> </option>";	

				for (var a = 0; a < data.length; a++) {
					
					text+="<option value='"+data[a].idpresentacion+"' >"+data[a].nombre+"</option>";					
				}
				text+="</select>";
				
				$(".listpresentacion").html(text);
				$(".paso3").html("<h3>3</h3>");	

			}).fail(function() {
				alert( "error" );
			}).always(function() {
			
			});

	});


	$('.nombreingrediente').click(function (){		
			var jqxhr = $.ajax({
				type: "POST",
				url: urlformadatiposingredientes,							
				dataType: "json"	

			}).done(function(data) {				
				
				text ="<label>¿Qué tipo de ingrediente es?</label>"
				text+="<select class='tipoingrediente' id='tipoingrediente' name='tipoingrediente'>";	
				text+="<option> </option>";	

				for (var a = 0; a < data.length; a++) {
					
					text+="<option value='"+data[a].idtipoingrediente+"' >"+data[a].nombre+"</option>";					
				}
				text+="</select>";
				
				$(".listtipos").html(text);
				$(".paso2").html("<h3>2</h3>");	

			}).fail(function() {
				alert( "error" );
			}).always(function() {
			
			});
		
	});

});
/*


$(document).on("ready", function(){
	
	loadpresentacion();
	loadtiposaliementos();



/*Termina document on ready*/
});


function loadpresentacion(){
					
			var urlactual= $('.now').val();
			var urlformada=urlactual+"index.php/api/frondend/listpresentacion/format/json";		
			var jqxhr = $.ajax({
				type: "POST",
				url: urlformada,							
				dataType: "json"	

			}).done(function(data) {				

				
				text="<select name='presentacion' id='presentacion' class='presentacion'>";	
				text+="<option> </option>";	

				for (var a = 0; a < data.length; a++) {
					
					text+="<option value='"+data[a].idpresentacion+"' >"+data[a].nombre+"</option>";					
				}
				text+="</select>";
				
				$("#listpresentacion").html(text);
				

			}).fail(function() {
				alert( "error" );
			});

}


