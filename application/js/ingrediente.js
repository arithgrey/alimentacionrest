$(document).on("ready", function(){

	$("#registroalimento").click(function(){

		ingrediente = $(".nombreingrediente").val();
		presentacion = $(".presentacion").val();
		tipoingrediente = $(".tipoingrediente").val();
		unidad = $(".unidad").val();
		clasificacion = $(".clasificacion").val();
		urlformada = $(".now").val();

		params = { "nombreingrediente" : ingrediente , "presentacion" : presentacion, "tipoingrediente" : tipoingrediente, "unidad": unidad, "clasificacion": clasificacion };

		var jqxhr = $.ajax({

			type: "POST",
			url: urlformada+"index.php/api/ingrediente/registroingrediente/format/json",			
			data: params,
			dataType: "json"	

		}).done(function(data) {
			
			
			
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			//alert( "complete" );
		});



		

	});


});