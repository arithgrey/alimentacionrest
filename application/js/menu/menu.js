$(document).on("ready", function(){
	$('#img_menu_agregar').click(function(){
		$('#dlg_new_menu').foundation('reveal','open');
		});
	
	$('#img_menu_guardar').click(guardar_menu);


	llenar_menu();
	

/*Termina document*/
});


function guardar_menu(){

		//TODO: Almacenar el platillo
		alert($('#frm_menu_nuevo').serialize());
		$.post($(".now").val()+"index.php/api/menu/registro/format/json", $('#frm_menu_nuevo').serialize())
		.done(function(data){
			//actualizar cuadro de menu semanal

		}).fail(function(data){
			alert("error al registrar menu");
		});					
}

function dibuja_semana(semana,menu)
{

	var strSemana="<table style='width:100%'>"+
					"<caption id='lbl_"+semana+"'></caption>"+
					"<thead>"+
						"<tr>"+
							"<th>tiempos</th>"+
							"<th>Lunes</th>"+
							"<th>Martes</th>"+
							"<th>Miercoles</th>"+
							"<th>Jueves</th>"+
							"<th>Viernes</th>"+
							"<th>Sabado</th>"+
							"<th>Domingo</th>"+
						"</tr>"+
					"</thead>"+
					"<tbody id='tbl_semana"+semana+"'>"+
					"<tr>"+
						"<th colspan='8'>Desayuno</th>"+
					"</tr>"+
					"<tbody id='des_"+((semana-1)*5+1)+"'></tbody>"+
					"<tr>"+
						"<th colspan='8'>Comida</th>"+
					"</tr>"+
					"<tbody id='com_"+((semana-1)*5+1)+"'></tbody>"+
					"<tr>"+
						"<th colspan='8'>Cena</th>"+
					"</tr>"+
					"<tbody id='cen_"+((semana-1)*5+1)+"'></tbody>"+
					"</tbody>"+
				"</table>";
		$('#panel_semanas').append(strSemana);
		$('.sel_tiempo').click(editar_menu);

}



function editar_menu(evt)
{
	
}

function llenar_menu(){
	$.get($('.now').val()+"index.php/api/menu/getmenubyday/format/json")
	.done(function(datos){
		dias=datos.length;
		//calcular y dibujar  semanas
		/*
		var num_semanas=(dias/5)+1 ;
		for (var i = 1; i <= num_semanas; i++) 
			dibuja_semana(i);

		$('.sel_dia').click(editar_menu);

		for (var i = 0; i < datos.length; i++)
			upd_menu(datos[i],i+1);
		*/
	})
	.fail(function(){
		alert("no se pudo obtener listado de menus");
	})
}

