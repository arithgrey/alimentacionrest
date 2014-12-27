$(document).on("ready", function(){
	$('#panel_sel_casas').hide();
	$('#panel_presentaciones_pedido').hide();
	$('#panel_pedido_alimentos').hide();
	$('#panel_pedido_opciones_listado').hide();
	$('#cmd_guardar_listamenus').click(guardar_menus_pedido);
	$('#cmd_guardar_listacasas').click(guardar_casas_pedido);
	$('#cmd_guardar_presentaciones').click(guardar_pedido);
	$('#cmd_mostrar_datos').click(generar_pedido);
	llenar_tabla_menu_pedido();
	/*Termina*/
});

function guardar_menus_pedido(){
	//guardar menus seleccionados
	$.post($('.now').val()+"index.php/api/pedidos/registromenus/format/json",
		$('#frm_pedido_menus').serialize())
	.done(function(datos){
		//alert(datos);
		//ocultar panel de menus seleccionados
		$('#panel_sel_menus').hide();
		//mostrar panel de casas para seleccionar
		$('#panel_sel_casas').show();
		llenar_tabla_casas();
	})
	.fail(function(){
		alert("no se pudo guardar los menus seleccionados");
	});
	//mostrar el formulario de delegaciones, ccds y casas
}

function guardar_casas_pedido(){
	$.post($('.now').val()+"index.php/api/pedidos/registrocasas/format/json",$('#frm_sel_casas').serialize())
	.done(function(datos){
	$('#panel_sel_casas').hide();
	$('#panel_presentaciones_pedido').show();

	//obtener el listado de productos que estan relacionados con los menus seleccionados
	llenar_tabla_presentaciones();
	})
	.fail(function(){
		alert("no se pudo registrar las casas seleccionadas");
	});
}
function guardar_pedido(){
	$.post($('.now').val()+"index.php/api/pedidos/registropedido/format/json",$('#frm_presentaciones_pedido').serialize())
	.done(function(datos){
		$('#panel_presentaciones_pedido').hide();

		// obtener los datos de pedido y num de semanas
		var semanas=[];
		$("#frm_pedido_opciones input[name=idpedido]").val(datos.id);
		for (var i = 0; i < datos.semanas; i++) {

			semanas[i]={id:i+1,nombre:"semana "+(i+1)};
		};
			upd_select("#frm_pedido_opciones select[name=semana]",semanas);
		
		// mostrar opciones de generar el listado de productos del pedido
		$('#panel_pedido_opciones_listado').show();
	});
	};

function llenar_delegs(delegs){
	var strDelegs="";
	/*
	Estructura esperada
	delegs=[
	{id:'02',nombre:"Baja california"},
	{id:'04',nombre:"Campeche"}
	];
	*/
	for (var i = 0; i < delegs.length; i++) {
		strDelegs="<div>"+
			"<label class='delegs'><input class='chk_sel_edo' type='checkbox' name='delegaciones[]' value='"+delegs[i].id+"'>"+delegs[i].nombre+"</label>"+
			"<div style='margin-left:3em' id='deleg_"+delegs[i].id+"'></div>"+
			"</div>";
	$('#tbl_casas_pedido').append(strDelegs);

	};


}

function llenar_tabla_casas(){
	//TODO: espcificar url de datos
	$.get($('.now').val()+"index.php/api/pedidos/lstdelegaciones/format/json")
	.done(function(datos){
		llenar_delegs(datos);
	})
	.fail(function(){
		alert("error al obtener listado de delegaciones");
	})
}
function llenar_ccds(ccdis){

}
function llenar_casas(casas){

}
function llenar_tabla_menu_pedido(){
	//TODO: espcificar url de datos
	$.get($('.now').val()+ "index.php/api/menu/getmenubyday/format/json")
	.done(function(datos){
		/*
		Estructura esperada
		datos=[
		{dia:1,desayuno:[{tipo:'bebida',id:123,opcionmenu:"chilaquiles"}],comida:[],cena:[]}
		];
		*/
		//crear espacios de tiempo por dia
		strMenu="";
		for (var i = 0; i < datos.length; i++) {
			strMenu+="<tr>"+
				"<td><input type='checkbox' name='dia[]' value='"+datos[i].dia+"'>"+datos[i].dia+"</td>"+
				"<td id='desayuno_"+datos[i].dia+"'></td>"+
				"<td id='comida_"+datos[i].dia+"'></td>"+
				"<td id='cena_"+datos[i].dia+"'></td>"+
				"</tr>";
		};
		$('#tbl_pedido_menus').append(strMenu);

		//concatenar platillos por dia y tiempo
		for (var i = 0; i < datos.length; i++) {
			upd_menu(datos[i],datos[i].dia);
		};
		$('#chk_sel_edo').click(llenar_ccds);
	})
	.fail(function(){
		alert("error al obtener el catalogo de menus")
	})
}
function llenar_tabla_presentaciones(){
$.get($('.now').val() +"index.php/api/pedidos/listapresentaciones/format/json")
.done(function(datos){
	strAlimentos="";
	for (var i = 0; i < datos.length; i++){
		strAlimentos+="<tr>"+
			"<td><input type='hidden' value='"+datos[i].id+"' name='alim[]'>"+datos[i].tipo+" </td>"+
			"<td>"+datos[i].alim+"</td>"+
			"<td><select class='lst_alim_pedido' name='unidad[]' value='"+datos[i].unidad+"'></select></td>"+
			"<td><input type='text' name='costo[]' value='"+datos[i].costo+"'></td>"+
			"</tr>";
	};
	$('#tbl_presentaciones_pedido').append(strAlimentos);
	llenarunidades('.lst_alim_pedido');

})
.fail(function(){
alert("ocurrio error al obtener presentaciones");
})
}

function generar_pedido()
{
	$.get($('.now').val()+"index.php/api/pedidos/pedido_productos/format/html",$('#frm_pedido_opciones').serialize())
	.done(function(datos){
		var strListado="";
		/*
		for (var i = 0; i < datos.length; i++) {

			
		};
		*/
		$('#tbl_listado_pedido').html(datos);
	})
	.fail(function(){
		alert("ocurrio un error al generar el pedido solicitado");
	});

}