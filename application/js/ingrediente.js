$(document).on("ready", function(){

	/*LISTADO */

	$(".listaact").hide();
	$(".ocultar").hide();



	$('.listadoactual').click(function(){

		urlformada = $(".now").val();	
		urllista= urlformada+"index.php/api/ingrediente/listingrediente/format/json";

		var jqxhr = $.ajax({

			type: "POST",
			url: urllista,			
			dataType: "json"	

		}).done(function(data) {
	
			listdata="";			

			for (var a = 0; a < data.length; a++) {

				ingrediente =data[a].idingrediente;
				nombreingrediente = data[a].nombreingrediente;
				unidad = data[a].unidad;
				nombre= data[a].nombre;												
				status = data[a].estado;
				nombrepresentacion = data[a].nombrepresentacion;

				listdata +="<div class='row'>"+
						   "<div class='large-1 columns'>"+ingrediente+"</div>"+
						   "<div class='large-1 columns'>"+status+"</div>"+
						   "<div class='large-4 columns'>"+nombreingrediente+"</div>"+						   
						   "<div class='large-2 columns'>"+unidad+"</div>"+
						   "<div class='large-2 columns'>"+nombre+"</div>"+						   
						   "<div class='large-2 columns'>"+nombrepresentacion+"</div></div>";						   							
			}

			$('.listaalimentos').html(listdata);
			$(".listaact").show();
			$(".ocultar").show();
			$(".listadoactual").html("Refrescar listado");
			
			
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			//alert( "complete" );
		});



	});

	
	/*OCULTAR*/
	
	$(".ocultar").click(function (){
			$(".listaact").hide();
	});
	/*REGISTRO*/
	$("#registroalimento").click(function(){

		ingrediente = $(".nombreingrediente").val();
		presentacion = $(".presentacion").val();
		tipoingrediente = $(".tipoingrediente").val();		
		clasificacion = $(".clasificacion").val();
		urlformada = $(".now").val();

		params = { "nombreingrediente" : ingrediente , "presentacion" : presentacion, "tipoingrediente" : tipoingrediente, "clasificacion": clasificacion };

		var jqxhr = $.ajax({

			type: "POST",
			url: urlformada+"index.php/api/ingrediente/registroingrediente/format/json",			
			data: params,
			dataType: "json"	

		}).done(function(data) {
			
			$('#estadoregistro').html(data);
			
			
		})
		.fail(function() {
			alert( "error" );
		});


	});


});

	


