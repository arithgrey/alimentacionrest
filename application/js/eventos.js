$('#cmd_opciones').click(function(evt){
	$('#dlg_presentaciones').hide();
	$('#panel_alimentos').hide();
	$('#panel_tipos_alim').hide();
	$('#panel_platillos').hide();
	$('#panel_menu').hide();
	$('#panel_pedidos').hide();
		switch(evt.target.id){
			case "cmd_alimentos":
				$('#panel_alimentos').show();
				break;
			case "cmd_presentaciones":
				$('#dlg_presentaciones').show();
				break;	
			case "cmd_tipos_alim":
				$('#panel_tipos_alim').show();
				break;			
			case "cmd_platillos":
				$('#panel_platillos').show();
				break;
			case "cmd_menu":
				$('#panel_menu').show();
				break;
			case "cmd_pedido":
				$('#panel_pedido').show();
				break;
		}
	});