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

	
	$("#verlista").click(function(){
		urlformada = $(".now").val();	
		urlregistro= urlformada+"index.php/api/opcionmenu/listopciones/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,					
			dataType: "json"	

		}).done(function(data) {
				

			listado ="";
			for (var a = 0; a < data.length; a++) {
					
					idopcionmenu = data[a].idopcionmenu;
					nombre = data[a].nombre;

					listado += "<div class='large-2 columns'>"+idopcionmenu + "</div><div class='large-10 columns'>" + nombre+ "</div>"; 
			};		

			$('.lista-opciones').html(listado);

		}).fail(function() {
			alert( "error" );
		}).always(function(){});
	
	});


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




	$("#listadoopcionesmenu").click(function(){
		urlformada = $(".now").val();	
		urlregistro= urlformada+"index.php/api/opcionmenu/listopciones/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,					
			dataType: "json"	

		}).done(function(data) {
				

			listado="";
			for (var a = 0; a < data.length; a++) {
					
					idopcionmenu = data[a].idopcionmenu;
					nombre = data[a].nombre;
					listado += "<div class='large-2 columns'>"+idopcionmenu + "</div>"
							+ "<div class='opcionsend large-10 columns'> <input type='radio' name='opcionsend' id='opcionsend' value='"+idopcionmenu+"' >  "+nombre + "</div>"; 
			};		


			$('.opcionesdemenuacuales').html(listado);

		}).fail(function() {
			alert( "error" );
		}).always(function(){});
	
	});




		$('.opcionesdemenuacuales').click(function(){

		
			
		
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
				nombre= data[a].nombre;												
				status = data[a].estado;
				nombrepresentacion = data[a].nombrepresentacion;


				listdata +="<div class='row'>"+						   						   
						   "<div class='large-4 columns'><input type='checkbox' name='ingredienteselect' class='ingredienteselect' id='ingredienteselect' > "+nombreingrediente+"</div>"+						   
						   
							"</div>";						   							
			}

			$('.alimentosasignar').html(listdata);
				
		});

		


	});




});