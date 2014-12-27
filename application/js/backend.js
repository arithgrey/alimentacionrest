$(document).on("ready", function(){

	$('#cmd_opciones .item').click(function(evt){
		
		switch(evt.delegateTarget.id){
			case "cmd_alimentos":
				window.location.assign($('.now').val()+"index.php/backend/ingrediente");
				break;
			case "cmd_presentaciones":
				window.location.assign($('.now').val()+"index.php/backend/presentacion");
				break;	
			case "cmd_tipos_alim":
				window.location.assign($('.now').val()+"index.php/backend/tipoingrediente");
				break;			
				case "cmd_platillos":
				window.location.assign($('.now').val()+"index.php/backend/platillos");
				break;
				case "cmd_menu":
				window.location.assign($('.now').val()+"/index.php/backend/menu");
				break;	
				case "cmd_pedido":
				window.location.assign($('.now').val()+"/index.php/backend/pedidos");
				break;
		}
	});
	
});


function llenarunidades(id){



		$.get( $(".now").val()+ "/index.php/api/ingrediente/getunidad/format/json"  ).done(function(data){

			$(id).html("");
			elementos ="";
			for (var i = 0; i < data.length; i++) {
				
				elementos +="<option >"+data[i].unidad+"</option>";

			};

			$(id).append(elementos);

		});

}
function upd_select(id_select,datos)
{
$(id_select).html("");
	var lst_opciones="";
	for (var i = 0; i < datos.length; i++) {
		lst_opciones+="<option value='"+datos[i].id+"'>"+datos[i].nombre+"</option>";
	};
	$(id_select).append(lst_opciones);
}

/*
function llenaropcionesmenu(id_select,filtro){
	filtro=filtro || {};
	$.get($('.now').val()+"index.php/api/opcionmenu/listopciones/format/json",filtro)
	.done(function(datos){
		upd_select(id_select,datos);
		return datos;
	})
	.fail(function(){
		
	});
}
*/
function llenaropcionesmenu(id_select , filtro , tipo ){
		

	$.get($('.now').val()+"index.php/api/opcionmenu/listopciones/format/json", 
		{"filtro":filtro , "tipo" : tipo }
		)
	.done(function(datos){
		
		
		upd_select(id_select, datos);
		return datos;
	})
	.fail(function(){
		
	});
}



function  llenarclasificacion(id){
	var urlformadatiposingredientes=$('.now').val()+ "index.php/api/frondend/listtiposingredientes/format/json";
	var jqxhr = $.ajax({
				type: "POST",
				url: urlformadatiposingredientes,							
				dataType: "json"	

			}).done(function(data) {				
				/*Formamos el menú de selección para los tipos de ingredientes*/						
				text="";	
				$(id).html("");

				for (var a = 0; a < data.length; a++) {
					
					text+="<option value='"+data[a].idtipoingrediente+"' >"+data[a].nombre+"</option>";					
				}
				$(id).append(text);
			}).fail(function() {
				alert( "error" );
			});
	
}

function llenaringredientes(id,filtro)
{
	filtro=filtro || {};
	filtro.corto=1;
	$.get($('.now').val()+"index.php/api/ingrediente/listingrediente/format/json",filtro)
	.done(function(data){
		strOpciones="";
		for (var i = 0; i < data.length; i++) {
			strOpciones+="<option value='"+data[i].id+"'>"+data[i].nombre+"</option>";
		};
			$(id).append(strOpciones);
	})
	.fail(function(){

	})
}


// se utiliza en menus y pedidos
function upd_menu(menu,dia){
	
	strdesayuno=strcomida=strcena="";
	for (var i = 0; i < menu.desayuno.length; i++) {
		strdesayuno+= "<label>"+menu.desayuno[i].opcionmenu+"</label>";
	};
	for (var i = 0; i < menu.comida.length; i++) {
		strcomida+= "<label>"+menu.comida[i].opcionmenu+"</label>";
	};
	for (var i = 0; i < menu.cena.length; i++) {
		strcena+= "<label>"+menu.cena[i].opcionmenu+"</label>";
	};
	$('#desayuno_'+dia).html(strdesayuno);
	$('#comida_'+dia).html(strcomida);
	$('#cena_'+dia).html(strcena);
}
function llenar_menu_tiempo(datos){
	
}