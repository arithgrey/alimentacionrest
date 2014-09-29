$(document).on("ready", function(){

	listtipos();
	listpresentacion();
	$(".formulariotipoalimentos").hide();
	$(".formulariopresentacion").hide();

	$('.opcionesmenu').click(function(){
		window.location.replace("index.php/backend/opcionesmenu");
	});

	$('.asignaringredientes').click(function(){
		window.location.replace("index.php/backend/asignaringredientes");	
	});

	$('.menu-principal').click(function (){
		red="index.php/menu/principal";
		window.location.replace(red);	

	});
		

});


function showtipolimentos(){
	$(".formulariotipoalimentos").show();
	$(".formulariopresentacion").hide();
}
function showpresentacion(){
	$(".formulariotipoalimentos").hide();
	$(".formulariopresentacion").show();	
}
function redirecalimento(url){

	window.location.replace(url+"index.php/backend/ingrediente");
}


function listpresentacion(){

	actual = $(".now").val();	

	var jqxhr = $.ajax({
			type: "GET",
			url: actual+"index.php/api/backend/listpresentacion/format/json",						
			dataType: "json"	

		}).done(function(data) {			
						
			elementos="<p>List de presentación actual</p>";

			for (var a = 0; a < data.length; a++) {				
				/*Pasar  a una lista o algo parecido */
				elementos+=	a+".- "+data[a].nombre+"<br>";
			}

			$(".listpresentacion").html("<label>"+elementos+"</label>");						

		}).fail(function() {
			alert( "error" );
		}).always(function() {
			//alert( "complete" );
		});


}

function listtipos(){
	
	actual = $(".now").val();	

	var jqxhr = $.ajax({

			type: "GET",
			url: actual+"index.php/api/backend/listtipos/format/json",						
			dataType: "json"	

		}).done(function(data) {			
						
			elementos="<p>Tipos de ingredientes actuales</p>";

			for (var a = 0; a < data.length; a++) {				
				/*Pasar  a una lista o algo parecido */
				elementos+=	a+".- "+data[a].nombre+"<br>";
			}

			$(".Listtiposingredientes").html("<label>"+elementos+"</label>");						

		}).fail(function() {
			alert( "error" );
		}).always(function() {
			//alert( "complete" );
		});

}


function registropresentacion(url){

	urlactual=url;
	urlformada=url+"index.php/api/backend/registropresentacion/format/json";

	nombre = document.getElementById("nombrepresentacion").value;
	descripcion = document.getElementById("descripcionpresentacion").value;

	unidad = $("#unidad").val();
	equivalencia = $("#equivalencia").val();

	//alert("noombre : " + nombre +"descripcion: " + descripcion + "unidad : " + unidad + "equivalencia : " +equivalencia );	

	if (descripcion.length < 1) {
		descripcion="s/n";
	}

	if (nombre.length < 1) {

		$('#msjerrorpresentacion').html("Falta llenar el campo nombre para presentación");

	}else{

		params = { "nombre" : nombre , "descripcion" : descripcion , "unidad" : unidad , "equivalencia" : equivalencia };

		var jqxhr = $.ajax({

			type: "POST",
			url: urlformada,			
			data: params,
			dataType: "json"	

		}).done(function(data) {
			
			
			$('#msjerrorpresentacion').html("");
			$('.okmensajepresentacion').html(data.databasemsj);
			listpresentacion();
		})
		.fail(function() {
			alert( "error" );
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
			listtipos();
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			//alert( "complete" );
		});

	}


}



