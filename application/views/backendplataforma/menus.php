<script type="text/javascript" src="<?=base_url()?>application/js/menu.js"></script>

<div class="panel" id="panel_menu">
	<div class="row">
		<h1>menus registrados</h1>
		<img src='<?=base_url()?>application/img/cmd_agregar.jpg' style="width:3em;height:3em" id="img_menu_agregar">
	</div>
	<div class="row" id="panel_semanas">

	</div>
	<div class="reveal-modal" style='width:50em' id="dlg_new_menu" data-reveal>
		<!--<center>			<h2>Nuevo menú</h2> </center>-->
		<form id="frm_menu_nuevo">
			<input name='dia_semana' id="" type="hidden" value="">
			<input name="tiempo" type="hidden" value="">
			<input name="tipo" value="" type="hidden">
			<div class="row">
				<div class="large-4 columns">
					<label>
					</label>
					<label>tipo:
					</label>
					<label>Platillo:
						<select name="platillo"></select>
					</label>
				</div>
				<div class="large-4 columns" id="gpo_lst_platillos"></div>
				<div class="large-2 columns">			
					<img src='<?=base_url()?>application/img/cmd_agregar.jpg' style="width:3em;height:3em" id="img_menu_guardar">	
				</div>
				
			</div>
		</form>
	</div>
</div>

<p id="dias_p"></p>