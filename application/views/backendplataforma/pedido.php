<script type="text/javascript" src="<?=base_url()?>application/js/pedidos.js"></script>
<div class="row">
<div class="panel" id="panel_pedidos">
	<div class="panel" id="panel_sel_menus">
	<form id="frm_pedido_menus">
		<table style="width:100%">
			<caption>1. Seleccione el menú</caption>
			<thead>
				<tr>
					<th>Dia</th>
					<th>Desayuno</th>
					<th>Comida</th>
					<th>Cena</th>
				</tr>
			</thead>
			<tbody id="tbl_pedido_menus">
			</tbody>
		</table>
		<img src='<?=base_url()?>application/img/cmd_guardar.jpg' style="width:3em;height:3em" id="cmd_guardar_listamenus">	
	</form>
	</div>

	<div class="panel" id="panel_sel_casas">
		<form id="frm_sel_casas">
			<table style="width:100%">
			<caption>2. Seleccione las casas y comedores</caption>
			<thead><tr><th>Delegación</th>
				<th>Centro coordinador</th>
				<th>Casas</th></tr>
			</thead>
				<tbody id="tbl_casas_pedido">
					
				</tbody>
			</table>
		</form>	
			<img src='<?=base_url()?>application/img/cmd_guardar.jpg' style="width:3em;height:3em" id="cmd_guardar_listacasas">	

		</div>
		<div class="panel" id="panel_presentaciones_pedido">
			<form id="frm_presentaciones_pedido">
			<table style="width:100%">
				<caption>3. Selecciones las unidades de pedido</caption>
				<thead>
					<tr>
						<th>Tipo</th>
						<th>Alimentos</th>
						<th>Presentacion</th>
						<th>costo Unitario</th>
					</tr>
				</thead>
				<tbody id="tbl_presentaciones_pedido">
				</tbody>
			</table>
			<img src='<?=base_url()?>application/img/cmd_guardar.jpg' style="width:3em;height:3em" id="cmd_guardar_presentaciones">	
			</form>
		</div>
		<div class="panel" id="panel_pedido_alimentos">
			<table style="width:100%">
				<caption>4. Resumen de pedido de productos</caption>
				<thead>
					<tr>
						<th>#</th>
						<th>Producto</th>
						<th>Unidad</th>
						<th>cantidad</th>
						<th>costo u.</th>
						<th>Importe</th>
					</tr>
				</thead>
				<tbody id="tbl_presentaciones_pedido">
					
				</tbody>
			</table>
		</div>
		<div class="panel" id="panel_pedido_opciones_listado">
			<div class="row">
				<h3>Selecciona el tipo de pedido a generar</h3>
				<form id="frm_pedido_opciones">
					<div class="row">
						<div class="large-2 columns">
						<label>
							<b>número de Pedido</b>
						<input name="idpedido" value="">
						</label>
						</div>

						<div class="large-3 columns">
							<b>Tipo de alimento</b>
							<label><input name="tipo" type="radio" value="frescos">Frescos</label>
							<label><input name="tipo" type="radio" value="abarrotes">Abarrotes</label>
							<label><input name="tipo" type="radio" value="" selected="selected">Ambos</label>
						</div>
						<div class="large-3 columns">
							<b>Desagregacion por:</b>
							<label><input name="detalle" type="radio" value="3">Casas y comedores</label>
							<label><input name="detalle" type="radio" value="2">Centro coordinador</label>
							<label><input name="detalle" type="radio" value="1">Delegacion</label>
						</div>
						<label class="large-2 columns">
							<b>Semana:</b>
							<select name="semana">
							</select>
						</label>

						<div class="large-2 columns">
							<img src='<?=base_url()?>application/img/cmd_guardar.jpg' style="width:3em;height:3em" id="cmd_mostrar_datos">	
						</div>
					</div>
					<div class="row">
					</div>
				</form>

			</div>
		</div>
		<div class="panel" id="panel_reportes">
			<div class="row" id="tbl_listado_pedido">

			</div>
		</div>
	</div>
</div>