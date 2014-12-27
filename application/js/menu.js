$(document).on("ready", function(){
	$('#img_menu_agregar').click(function(){
		$('#dlg_new_menu').foundation('reveal','open');
		});
	
	$('#img_menu_guardar').click(guardar_menu);
/*
	datos = llenaropcionesmenu("#des_bebida", "Desayuno" , "BEBIDA");
	datos = llenaropcionesmenu("#des_guisado" , "Desayuno" , "GUISADO");
	datos = llenaropcionesmenu("#des_tortilla", "Desayuno" , "TORTILLAS");
	datos = llenaropcionesmenu("#des_fruta" , "Desayuno" , "FRUTA");
	datos = llenaropcionesmenu("#des_guarnicion" , "Desayuno" , "GUARNICION");

	com_bebida = llenaropcionesmenu("#com_bebida" , "Comida" , "BEBIDA");
	com_sopa = llenaropcionesmenu("#com_sopa" ,  "Comida" , "SOPA");
	com_guisado = llenaropcionesmenu("#com_guisado" , "Comida" , "GUISADO");	
	com_leguminosa = llenaropcionesmenu("#com_leguminosa" , "Comida" , "LEGUMINOSA");
	com_guarnicion1 = llenaropcionesmenu("#com_guarnicion1" , "Comida" , "GUISADO");
	com_guarnicion2 = llenaropcionesmenu("#com_guarnicion2" , "Comida" , "GUARNICION");
	com_tortilla = llenaropcionesmenu("#com_tortilla" , "Comida" , "TORTILLA");
	com_postre = llenaropcionesmenu("#com_postre" ,"Comida" , "POSTRE" );
	
	cena_bebida = llenaropcionesmenu("#cena_bebida" , "Cena" , "BEBIDA");
	cena_guisado = llenaropcionesmenu("#cena_guisado" , "Cena" , "GUISADO");
	cena_guarnicion = llenaropcionesmenu("#cena_guarnicion" , "Cena" , "GUARNICION");
	cena_verdura = llenaropcionesmenu("#cena_verdura" , "Cena" , "VERDURA");
	cena_tortilla= llenaropcionesmenu("#cena_tortilla" , "Cena" , "TORTILLAS");
*/

	llenar_menu();
	

/*Termina document*/
});


function guardar_menu(){

		//TODO: Almacenar el platillo
		//alert($('#frm_menu_nuevo').serialize());
		$.post($(".now").val()+"index.php/api/menu/registro/format/json", $('#frm_menu_nuevo').serialize())
		.done(function(data){
			//actualizar cuadro de menu semanal
	$('#dlg_new_menu').foundation('reveal','close');
		var celda=$("#frm_menu_nuevo input[name=dia_semana]").attr("id");
		$('#'+celda).attr("idmenu",data[0].idmenu);
		$('#'+celda).html(data[0].opcionmenu);

		}).fail(function(data){
			alert("error al registrar menu");
		});
					
}


function dibuja_semana(semana,menu)
{

	var strSemana="<table style='width:100%'>"+
					"<caption id='lbl_"+semana+"'>MENU SEMANA "+semana+"</caption>"+
					"<thead>"+
						"<tr>"+
							"<th>tiempos</th>"+
							"<th>Lunes</th>"+
							"<th>Martes</th>"+
							"<th>Miercoles</th>"+
							"<th>Jueves</th>"+
							"<th>Viernes</th>"+
						"</tr>"+
					"</thead>"+
					"<tr>"+
						"<th colspan='8' style='text-align:center'>DESAYUNO</th>"+
					"</tr>"+
					"<tbody id='des_"+semana+"'></tbody>"+
					"<tr>"+
						"<th colspan='8' style='text-align:center'>COMIDA</th>"+
					"</tr>"+
					"<tbody id='com_"+semana+"' ></tbody>"+
					"<tr>"+
						"<th colspan='8' style='text-align:center'>CENA</th>"+
					"</tr>"+
					"<tbody id='cen_"+semana+"' ></tbody>"+					
				"</table>";
		$('#panel_semanas').append(strSemana);
		agregar_fila('#des_'+semana,semana,'desayuno','Bebida');
		agregar_fila('#des_'+semana,semana,'desayuno','Guisado');
		agregar_fila('#des_'+semana,semana,'desayuno','Guarnicion');
		agregar_fila('#des_'+semana,semana,'desayuno','tortillas');
		agregar_fila('#des_'+semana,semana,'desayuno','Fruta');

		agregar_fila('#com_'+semana,semana,'comida','bebida');
		agregar_fila('#com_'+semana,semana,'comida','sopa');
		agregar_fila('#com_'+semana,semana,'comida','guisado');
		agregar_fila('#com_'+semana,semana,'comida','leguminosa');
		agregar_fila('#com_'+semana,semana,'comida','guarnicion1');
		agregar_fila('#com_'+semana,semana,'comida','guarnicion2');
		agregar_fila('#com_'+semana,semana,'comida','tortillas');
		agregar_fila('#com_'+semana,semana,'comida','postre');

		agregar_fila('#cen_'+semana,semana,'cena','bebida');
		agregar_fila('#cen_'+semana,semana,'cena','guisado');
		agregar_fila('#cen_'+semana,semana,'cena','guarnicion');
		agregar_fila('#cen_'+semana,semana,'cena','verduras');
		agregar_fila('#cen_'+semana,semana,'cena','tortillas');
}
function agregar_fila(contenedor,semana,tiempo,tipo){
var strfila="<tr>";
	strfila+="<th class='h_tipo'>"+tipo+"</th>";
for (var i = 1; i < 6; i++) {
	strfila+="<td><a class='menu_platillos' idmenu='' id='"+tiempo+"_"+tipo+"_"+(((semana-1)*5)+i)+"'><li class='foundicon-plus'></li></a></td>";
};
strfila+="</tr>";
$(contenedor).append(strfila);

};


function editar_menu(evt)
{
	//obtener dia y tiempo
	
	var tiempo=evt.delegateTarget.id.split("_")[0];
	var tipo=evt.delegateTarget.id.split("_")[1];
	var dia_sem=evt.delegateTarget.id.split("_")[2];

	$('#frm_menu_nuevo input[name=tiempo]').attr("value",tiempo);
	$('#frm_menu_nuevo input[name=tipo]').attr("value",tipo);
	$('#frm_menu_nuevo input[name=dia_semana]').attr("value",dia_sem);
	$('#frm_menu_nuevo input[name=dia_semana]').attr("id",evt.delegateTarget.id);
	
		$.get($('.now').val()+"index.php/api/opcionmenu/listopciones/format/json", 
			{'filtro':tiempo,'tipo':tipo})
		.done(function(datos){
			upd_select('#frm_menu_nuevo select[name=platillo]',datos);
		})
		.fail(function(){
			alert("error al obtener opciones de menu");
		});

	var idmenu=$(evt.delegateTarget).attr('idmenu');
	if (idmenu) {
		$.get($('.now').val()+"index.php/api/menu/getmenubyday/format/json",{'id':idmenu})
		.done(function(data){
			
			return false;
		})
		.fail(function(){
			return false;
		});
	}
	
	$('#dlg_new_menu').foundation('reveal','open');
	
	return false;
}
function agregar_menu()
{

}

function llenar_menu(){
	$.get($('.now').val()+"index.php/api/menu/getmenubyday/format/json")
	.done(function(datos){
		dias=datos.length;
		//calcular y dibujar  semanas
		var num_semanas=(dias/5)+1 ;
		for (var i = 1; i <= num_semanas; i++) 
			dibuja_semana(i);
		
		//cargar menu obtenido del servidor;

		for (var i = 0; i < datos.length; i++)
				cargar_menu(i+1,datos[i]);
		//asociar manejador  de evento
		$('.menu_platillos').click(editar_menu);
	})
	.fail(function(){
		alert("no se pudo obtener listado de menus");
	})
}
function cargar_menu(dia,menu)
{
	for (var i = 0; i < menu.desayuno.length; i++)
		llenar_platillo_menu("#desayuno_"+menu.desayuno[i].tipo+"_"+dia,menu.desayuno[i]);

	for (var i = 0; i < menu.comida.length; i++) 
		llenar_platillo_menu("#comida_"+menu.comida[i].tipo+"_"+dia,menu.comida[i]);

	for (var i = 0; i < menu.cena.length; i++) 
		llenar_platillo_menu("#cena_"+menu.cena[i].tipo+"_"+dia,menu.cena[i]);

}
function llenar_platillo_menu(objeto,platillo){
	//alert(objeto);
	$(objeto).html(platillo.opcionmenu);
	$(objeto).attr('idmenu',platillo.idmenu);
}

