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


	/**/
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


	/*Registro de nuevo elemento*/

	$('.registraropcion').click(function(){

		urlformada = $(".now").val();	
		opcionmenu =  $(".opcionmenu").val();
		receta  = $(".receta").val();


		if (opcionmenu.length <1) {

			$('.reporte-registro').html("Registre el nombre de su opción de menú");

		}else{
			param = {"opcionmenu" : opcionmenu , "receta" : receta}
				
		urlregistro= urlformada+"index.php/api/opcionmenu/registro/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,
			data: param,			
			dataType: "json"	

		}).done(function(data) {
				
			$('.reporte-registro').html(data);
			$(".opcionmenu").val("");
			$(".receta").val("");

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
				

			listado="<h3>Opción del menú</h3><select  onchange='muestratiposalimentos()' class='opcionmenuactual' id='opcionmenuactual'><option></option>";
			for (var a = 0; a < data.length; a++) {
					
					idopcionmenu = data[a].idopcionmenu;
					nombre = data[a].nombre;

					listado +="<option value ='"+idopcionmenu+"'>"+nombre +"</option>";
							
			};		
			listado +="</select>";

			$('.opcionesdemenuacuales').html(listado);

		});
	
	});


		

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

		}).fail(function(data){
			alert("error");
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