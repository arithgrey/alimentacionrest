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
=======
<<<<<<< HEAD

	/*relaciona*/
	$('.relaciona').click(function(){
		opcionmenusend = $('#opcionsend').val();
		var checkboxes = document.getElementById("form1").checkbox;
		    /*
     		valores ="";	
		    for (var x=0; x < checkboxes.length; x++) {
		    	
			    if (checkboxes[x].checked) {
				    				   
			    		ingredienteselect = "#ingredienteselect"+x;
			    		valor = $(ingredienteselect).val();
			    		
			    		valores +="Elemento: "+ x +" Valor : " + valor +"<br>";
			    		 $('.reporte').html(valores);
			    	}
		    }*/
	
	});

	


>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde

	/**/
	$("#verlista").click(function(){
		urlformada = $(".now").val();	
<<<<<<< HEAD
=======
=======
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
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde
		urlregistro= urlformada+"index.php/api/opcionmenu/listopciones/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,					
<<<<<<< HEAD
			dataType: "json"	

		}).done(function(data) {
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
			dataType: "json"	

		}).done(function(data) {
				
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde

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
	/*Registro de nuevo elemento*/
=======
<<<<<<< HEAD
=======
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
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
	/*Registro de nuevo elementp*/
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde

	$('.registraropcion').click(function(){

		urlformada = $(".now").val();	
		opcionmenu =  $(".opcionmenu").val();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde
		if (opcionmenu.length <1) {

			$('.reporte-registro').html("Registre el nombre de su opción de menú");

		}else{
			param = {"opcionmenu" : opcionmenu}
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======

		param = {"opcionmenu" : opcionmenu}
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde
				
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
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde

		})
		.fail(function() {
			alert( "error" );
		})
		.always(function(){});
<<<<<<< HEAD
		}

	});


=======
<<<<<<< HEAD
		}

		
=======
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
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4


	});


<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde


	$("#listadoopcionesmenu").click(function(){
		urlformada = $(".now").val();	
		urlregistro= urlformada+"index.php/api/opcionmenu/listopciones/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,					
			dataType: "json"	

		}).done(function(data) {
				

<<<<<<< HEAD
			listado="<h3>Opción del menú</h3><select  onchange='muestratiposalimentos()' class='opcionmenuactual' id='opcionmenuactual'><option></option>";
=======
			listado="";
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde
			for (var a = 0; a < data.length; a++) {
					
					idopcionmenu = data[a].idopcionmenu;
					nombre = data[a].nombre;
<<<<<<< HEAD

					listado +="<option value ='"+idopcionmenu+"'>"+nombre +"</option>";
							
			};		
			listado +="</select>";

			$('.opcionesdemenuacuales').html(listado);

		});
=======
					listado += "<div class='large-2 columns'>"+idopcionmenu + "</div>"
							+ "<div class='opcionsend large-10 columns'> <input type='radio' name='opcionsend' id='opcionsend' value='"+idopcionmenu+"' >  "+nombre + "</div>"; 
			};		


			$('.opcionesdemenuacuales').html(listado);

		}).fail(function() {
			alert( "error" );
		}).always(function(){});
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde
	
	});


<<<<<<< HEAD
		

/**/

});
/**/



function edicioncheck(e){
		
		opcion = $('.opcionmenuactual').val();
		elemento = e.value;
	
		urlformada = $(".now").val();	
		param = {"opcionmenu" : opcion , "ingrediente" : elemento}
				
		urlregistro= urlformada+"index.php/api/opcionmenu/relacionaopcioningrediente/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,
			data: param,			
			dataType: "json"	

		}).done(function(data) {
				
				$('.reportemovimiento').html(data);

		});
		


	
}


function muestratiposalimentos(){

			actual = $(".now").val();	
			$('.alimentosasignar').hide();

			var jqxhr = $.ajax({

			type: "GET",
			url: actual+"index.php/api/backend/listtipos/format/json",						
			dataType: "json"	

		}).done(function(data) {			
						
			elementos="<h3>Tipo de ingrediente</h3>";
			elementos+="<select name='tipoingrediente' id='tipoingrediente' class='tipoingrediente' onchange='relacionalimento(this)' >";
			elementos+="<option></option>";

			for (var a = 0; a < data.length; a++) {				
					
				elementos +="<option value='"+data[a].idtipoingrediente+"'>"+data[a].nombre+"</option>";					
			}
			elementos+="</select>";
			$(".Listtiposingredientes").html("<label>"+elementos+"</label>");						

		});

}



function relacionalimento(e){


			$('.alimentosasignar').show();
			urlformada = $(".now").val();	
			urllista= urlformada+"index.php/api/ingrediente/listingrediente/format/json";
			idtipoingrediente = e.value;		

			param ={"idtipoingrediente" : idtipoingrediente}

			var jqxhr = $.ajax({

				type: "POST",
				url: urllista,	
				data: param,					
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
							   "<div class='large-4 columns'>"+
							  "<input type='checkbox' onchange='edicioncheck(this)' class='ingredienteselect"+a+"' id='ingredienteselect"+a+"' value='"+ingrediente+"' > "+nombreingrediente+"</div>"+						   							   
								"</div>";						   							
				}

			$('.alimentosasignar').html(listdata);
				
			});

	

}
=======


		$('.opcionesdemenuacuales').click(function(){

		
			
		
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
		$('.d').click(function(){

>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
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
<<<<<<< HEAD
				nombreingrediente = data[a].nombreingrediente;				
=======
				nombreingrediente = data[a].nombreingrediente;
				unidad = data[a].unidad;
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
				nombre= data[a].nombre;												
				status = data[a].estado;
				nombrepresentacion = data[a].nombrepresentacion;


				listdata +="<div class='row'>"+						   						   
<<<<<<< HEAD
						   "<div class='large-4 columns'><input type='checkbox' name='checkbox' onchange='edicioncheck("+ingrediente+")' class='ingredienteselect"+a+"' id='ingredienteselect"+a+"' value='"+ingrediente+"' > "+nombreingrediente+"</div>"+						   
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
						   "<div class='large-4 columns'><input type='checkbox' name='ingredienteselect' class='ingredienteselect' id='ingredienteselect' > "+nombreingrediente+"</div>"+						   
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
						   
							"</div>";						   							
			}

			$('.alimentosasignar').html(listdata);
				
		});

		
<<<<<<< HEAD


	});




});

function edicioncheck(e){
	
	opcionmenusend = $('#opcionsend').val();
	elemento = e;

	//alert(elemento + opcionmenusend);
	
		urlformada = $(".now").val();	
		param = {"opcionmenu" : opcionmenusend , "ingrediente" : elemento}
				
		urlregistro= urlformada+"index.php/api/opcionmenu/relacionaopcioningrediente/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,
			data: param,			
			dataType: "json"	

		}).done(function(data) {
				
				$('.reportemovimiento').html(data);

		})
		.fail(function() {
			alert( "error" );
		});
		


	
}
=======
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
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde
