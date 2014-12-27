<script type="text/javascript" src="<?=base_url()?>application/js/opcionesmenu.js"></script>

<div class="panel" id="panel_platillos">
	<div class="row">
		<h1>Registro de platillos</h1>
		<form id="frm_platillos">
			<input type="hidden" value="" name="cve">
			<div class="row">
				<label class="large-3 columns" >
					<input name="platillo" id="platillo" type="text" placeholder="nombre del platillo...">
				</label>
					<select class="large-2 columns" name="tipo_platillo" id="lst_tipo_platillo">
						<option>bebida</option>
						<option>fruta</option>
						<option>guisado</option>
						<option>postre</option>
						<option>sopa</option>
						<option>tortillas</option>
						<option>guarnicion</option>
						<option>leguminosa</option>
					</select>
					<div class="large-1 columns"> <input type="text" placeholder="desayuno" name="desayuno" value=""></div>
					<div class="large-1 columns"> <input type="text" placeholder="comida" name="comida" value=""></div>
					<div class="large-1 columns"> <input type="text" placeholder="cena" name="cena" value=""></div>
				<!--
				<label class="large-1 columns">Activo:<input name="status" type="checkbox"></label>
-->
				<div class="large-2 columns">
				<img src='<?=base_url()?>application/img/cmd_buscar.jpg' style="width:3em;height:3em" id="cmd_buscar_platillo">	
				<img src='<?=base_url()?>application/img/cmd_agregar.jpg' style="width:3em;height:3em" id="cmd_nuevo_platillo">	
				<img src='<?=base_url()?>application/img/cmd_guardar.jpg' style="width:3em;height:3em" id="cmd_guardar_platillo">	
				</div>
			</div>
		</form>
	</div>
	<div class="row">
		<table style="width:100%">
			<caption>Platillos registrados</caption>
			<thead>
				<tr>
					<th>#</th>
					<th>tipo</th>
					<th>platillo</th>
					<th>Desayuno</th>
					<th>comida</th>
					<th>cena</th>
				<!--	<th>activo</th> -->
				</tr>
			</thead>
			<tbody id="tbl_lista_platillos">

			</tbody>
			<tfoot></tfoot>
		</table>
	</div>
	<div id="dlg_platillos_ingredientes" class="reveal-modal" data-reveal>
		<div class="row">
			<h1>Registro de ingredientes del platillo</h1>
				<p style="text-align:right">
				<img src='<?=base_url()?>application/img/cmd_guardar.jpg' style="width:3em;height:3em" id="cmd_guardar_ingred_platillo">
			</p>
			<form id="frm_platillo_ingrediente">
				<input type="hidden" name="idplatillo">
				<table style="width:100%">
					<col style="width:30%"></col>
					<col style="width:20%"></col>
					<col style="width:20%"></col>
					<col style="width:10%"></col>
					<col style="width:10%"></col>
					<col style="width:10%"></col>
					<thead>
						<tr>
							<th rowspan='2'>Ingrediente:</th>
							<th rowspan='2'>Unidad:</th>
							<!--<th rowspan='2'>U. Casera:</th> -->
							<th colspan='3'>cantidades</th>
						</tr>
						<tr>
							<th>Niño</th>
							<th>adoles. M</th>
							<th>adoles. H</th>
						</tr>
						<tr>
							<td><select id="lst_ingrediente_platillo" name="ingrediente"></select> </td>
							<td><select id="lst_unidad_platillo" name="unidad"></select> </td>
							<!--<td><input type="text" id="unidad_casera_platillo" name="u_casera"></td>-->
							<td><input name="cant_escolar" type="text" placeholder=""> </td>
							<td><input name="cant_adoles_m" type="text"> </td>
							<td><input name="cant_adoles_h" type="text"> </td>
						</tr>
					</thead>
					<tbody id="tbl_ingred_platillos">
					</tbody>
					
					<tfoot>

					</tfoot>
				</table>
			</form>

		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
</div>
