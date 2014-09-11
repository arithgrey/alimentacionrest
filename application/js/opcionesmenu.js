$(document).on("ready", function(){

	$(".registronuevo").hide();

	$('.administracion').click(function(){
		baseurl = $(".now").val();
		window.location.replace(baseurl);
	});

	$(".shownuevo").click(function(){
		$('.registronuevo').show();
		$('.shownuevo').hide();
	});

	/*
	$("#verlista").click(function(){

		urlregistro= urlformada+"index.php/api/opcionmenu/listopciones/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,					
			dataType: "text"	

		}).done(function(data) {
			alert(data);				
			$('.lista-opciones').html(data);
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function(){});
		}

		

	});
*/

	/*Registro de nuevo elementp*/

	$('.registraropcion').click(function(){

		urlformada = $(".now").val();	
		opcionmenu =  $(".opcionmenu").val();
		if (opcionmenu.length <1) {

			$('.reporte-registro').html("Registre el nombre de su opción de menú");

		}else{
			param = {"opcionmenu" : opcionmenu}
				
		urlregistro= urlformada+"index.php/api/opcionmenu/registro/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,
			data: param,			
			dataType: "json"	

		}).done(function(data) {
				
			$('.reporte-registro').html(data);
			$(".opcionmenu").val("");

		})
		.fail(function() {
			alert( "error" );
		})
		.always(function(){});
		}

		


	});


		$('.d').click(function(){

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
						   "<div class='large-4 columns'>"+nombreingrediente+"</div>"+						   
						   /*
						   "<div class='large-2 columns'>"+unidad+"</div>"+
						   "<div class='large-2 columns'>"+nombre+"</div>"+						   
						   "<div class='large-2 columns'>"+nombrepresentacion+"</div>
							*/
							"</div>";						   							
			}

			$('.listaalimentos').html(listdata);
			
			//$(".listadoactual").html("Refrescar listado");
			
			
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			//alert( "complete" );
		});



	});




});