function registropresentacion(url){

	urlactual=url;
	urlformada=url+"index.php/api/backend/registropresentacion/format/json";

	nombre = document.getElementById("nombrepresentacion").value;
	descripcion = document.getElementById("descripcionpresentacion").value;



		if (descripcion.length < 1) {
		descripcion="s/n";
	}

	if (nombre.length < 1) {

		$('#msjerrorpresentacion').html("Falta llenar el campo nombre para presentación");

	}else{

		params = { "nombre" : nombre , "descripcion" : descripcion };

		var jqxhr = $.ajax({

			type: "POST",
			url: urlformada,			
			data: params,
			dataType: "json"	

		}).done(function(data) {
			
			$('#msjerrorpresentacion').html("");
			$('.okmensajepresentacion').html(data.databasemsj);
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			//alert( "complete" );
		});

	}


	
}


function registrotipoingrediente(url) {
	
	urlactual=url;
	urlformada=url+"index.php/api/backend/registro/format/json";
	nombre = document.getElementById("nombretipo").value;
	descripcion = document.getElementById("descripcion").value;

	if (descripcion.length < 1) {
		descripcion="s/n";
	}

	if (nombre.length < 1) {

		$('#msjerrortipoingrediente').html("Falta llenar el campo nombre");

	}else{

		params = { "nombre" : nombre , "descripcion" : descripcion };

		var jqxhr = $.ajax({

			type: "POST",
			url: urlformada,			
			data: params,
			dataType: "json"	

		}).done(function(data) {
			
			$('#msjerrortipoingrediente').html("");
			$('.okmensaje').html(data.databasemsj);
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			//alert( "complete" );
		});

	}


}

