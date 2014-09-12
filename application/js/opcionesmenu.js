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

<<<<<<< HEAD
	
	$("#verlista").click(function(){
		urlformada = $(".now").val();	
=======
<<<<<<< HEAD
	
	$("#verlista").click(function(){
		urlformada = $(".now").val();	
=======
<<<<<<< HEAD
	/*
	$("#verlista").click(function(){

>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
		urlregistro= urlformada+"index.php/api/opcionmenu/listopciones/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,					
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
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


<<<<<<< HEAD
=======
=======
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

=======
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
	/*Registro de nuevo elementp*/

	$('.registraropcion').click(function(){

		urlformada = $(".now").val();	
		opcionmenu =  $(".opcionmenu").val();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
		if (opcionmenu.length <1) {

			$('.reporte-registro').html("Registre el nombre de su opción de menú");

		}else{
			param = {"opcionmenu" : opcionmenu}
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======

		param = {"opcionmenu" : opcionmenu}
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
				
		urlregistro= urlformada+"index.php/api/opcionmenu/registro/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,
			data: param,			
			dataType: "json"	

		}).done(function(data) {
				
<<<<<<< HEAD
			$('.reporte-registro').html(data);
			$(".opcionmenu").val("");
=======
<<<<<<< HEAD
			$('.reporte-registro').html(data);
			$(".opcionmenu").val("");
=======
<<<<<<< HEAD
			$('.reporte-registro').html(data);
			$(".opcionmenu").val("");
=======
			alert(data);	
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee

		})
		.fail(function() {
			alert( "error" );
		})
		.always(function(){});
<<<<<<< HEAD
		}

		
=======
<<<<<<< HEAD
		}

		
=======
<<<<<<< HEAD
		}

		
=======
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee


	});


<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee


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

		
			
		
<<<<<<< HEAD
=======
=======
		$('.d').click(function(){

>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
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
<<<<<<< HEAD
				nombreingrediente = data[a].nombreingrediente;				
=======
<<<<<<< HEAD
				nombreingrediente = data[a].nombreingrediente;				
=======
				nombreingrediente = data[a].nombreingrediente;
				unidad = data[a].unidad;
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
				nombre= data[a].nombre;												
				status = data[a].estado;
				nombrepresentacion = data[a].nombrepresentacion;


				listdata +="<div class='row'>"+						   						   
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
						   "<div class='large-4 columns'><input type='checkbox' name='ingredienteselect' class='ingredienteselect' id='ingredienteselect' > "+nombreingrediente+"</div>"+						   
						   
							"</div>";						   							
			}

			$('.alimentosasignar').html(listdata);
				
		});

		
<<<<<<< HEAD
=======
=======
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

>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee


	});




});