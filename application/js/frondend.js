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


function  loadtiposaliementos(){
	
	var urlactual= $('.now').val();
	var urlformadatiposingredientes=urlactual+ "index.php/api/frondend/listtiposingredientes/format/json";
	var jqxhr = $.ajax({
				type: "POST",
				url: urlformadatiposingredientes,							
				dataType: "json"	

			}).done(function(data) {				
				/*Formamos el menú de selección para los tipos de ingredientes*/						
				text="";	
				text+="<select class='tipoingrediente' id='tipoingrediente' name='tipoingrediente'>";	
				text+="<option> </option>";	

				for (var a = 0; a < data.length; a++) {
					
					text+="<option value='"+data[a].idtipoingrediente+"' >"+data[a].nombre+"</option>";					
				}
				text+="</select>";
				
				$("#listtipos").html(text);
				

			}).fail(function() {
				alert( "error" );
			});
	
}
