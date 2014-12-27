$(document).on("ready", function()
{
	//llenar listados y tabla

//triggers de platillos
$('#cmd_guardar_platillo').click(guardar_platillo);
$('#cmd_buscar_platillo').click(function(){
	llenar_tabla_platillos();
});

$('#cmd_nuevo_platillo').click(function(evt){
	$('#frm_platillos')[0].reset();
});
$('#cmd_guardar_ingred_platillo').click(guardar_ingrediente_platillo);


llenar_tabla_platillos();
llenaringredientes("#lst_ingrediente_platillo");
llenarunidades("#lst_unidad_platillo");

});
/**/

function guardar_platillo(){
	$.post($(".now").val()+"index.php/api/opcionmenu/registro/format/json",$('#frm_platillos').serialize())
	.done(function(datos){
		
		$("#dlg_platillos_ingredientes").foundation("reveal",'open');

		$('#frm_platillo_ingrediente input[name=idplatillo]').val(datos.id);
		$('#tbl_ingred_platillos').html("");
		for (var i = 0; i < datos.ingreds.length; i++) {
			agregar_ingred(	datos.ingreds[i]);
		};

	})
	.fail(function(){
		alert("hubo un error al registrar el platillo");
	});
}


function llenar_tabla_platillos(){
	$.get($(".now").val()+"index.php/api/opcionmenu/listatabla/format/json",$("#frm_platillos").serialize()).done(function(data) {

		listado ="";
		$('#tbl_lista_platillos').html("");

		for (var a = 0; a < data.length; a++) {
			listado += "<tr>"+
			"<td><a class='platilloselement' id='"+data[a].id +"'>"+data[a].id + "</a></td>"+
			"<td>" + data[a].tipo+ "</td>"+
			"<td>" + data[a].platillo+ "</td>"+
			"<td>" + data[a].des+ "</td>"+
			"<td>" + data[a].com+ "</td>"+
			"<td>" + data[a].cena+ "</td>"+
			"</tr>"; 
		};		
		$('#tbl_lista_platillos').append(listado);

		/**/
		$('.platilloselement').click(edita_opcionmenu);

	}).fail(function() {
		alert( "error" );
	}).always(function(){});
}
/*Registro de nuevo elemento*/
function agregar_ingred(data){
	strFila="";
	strFila="<tr class='lst_ingred_platillo' id='"+data.id+"'>"+
	"<td>"+data.ingred+"</td>"+
	"<td>"+data.unidad+"</td>"+
	"<td>"+data.escolar+"</td>"+
	"<td>"+data.adoles_m+"</td>"+
	"<td>"+data.adoles_h+"</td>"+
	"</tr>";
	$('#tbl_ingred_platillos').append(strFila);
	$('.lst_ingred_platillo').click(edita_ingred_opcion);
}
function edita_ingred_opcion(evt){
	var ingred=evt.delegateTarget.id;
	$.get($('.now').val()+"index.php/api/opcionmenu/listaingredienteporplatillo/format/json?",{idingredopcion:ingred})
	.done(function(datos){
		$("#frm_platillo_ingrediente select[name='ingrediente']").val(datos[0].idingrediente);
		$("#frm_platillo_ingrediente select[name='unidad']").val(datos[0].unidad);
		$("#frm_platillo_ingrediente input[name='cant_escolar']").val(datos[0].escolar);
		$("#frm_platillo_ingrediente input[name='cant_adoles_m']").val(datos[0].adoles_m);
		$("#frm_platillo_ingrediente input[name='cant_adoles_h']").val(datos[0].adoles_h);
		$("#frm_platillo_ingrediente input[name='cant_adoles_h']").val(datos[0].adoles_h);
	})
	.fail(function(){});
}
function guardar_ingrediente_platillo(){
		//guardar información
		//alert($('#frm_platillo_ingrediente').serialize());
		$.post($(".now").val()+"index.php/api/opcionmenu/registroingrediente/format/json",$('#frm_platillo_ingrediente').serialize())
		.done(function(data) {
			agregar_ingred(data[0]);
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function(){});
	}

	/**/
	function edita_opcionmenu(event){

		url = $(".now").val() + "index.php/api/opcionmenu/getelementbyid/format/json";
		opcionmenuid= event.target.id;
		$("#frm_platillos input[name='platillo']").val(opcionmenuid);

		$.get(url , {"opcionmenuid" : opcionmenuid})
		.done(function(data){

			$('#frm_platillos input[name=cve]').val(data[0].idopcionmenu);
			$('#frm_platillos input[name=platillo]').val(data[0].nombre);
			$('#frm_platillos input[name=desayuno]').val(data[0].desayuno);
			$('#frm_platillos input[name=comida]').val(data[0].comida);
			$('#frm_platillos input[name=cena]').val(data[0].cena);
			$('#frm_platillos select[name=tipo_platillo]').val(data[0].tipo);

			$("#frm_platillos input[name='platillo']").focus();
		}).fail(function(){

			alert("Algo falló");
		});	


	}


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