<script type="text/javascript" src="<?=base_url('/application/js/ingrediente.js')?>"></script>
<div class="panel" id="panel_alimentos">
	<form id="frm_ingredientes">
		<div class="row">
			<input type="hidden" name="clave" value="" id="clave">
			<label class="large-3 columns">
				<input type="text" name="nombre" id="nombre" placeholder="Acelga, manzana, arroz, queso,...">
			</label>
			<select class="large-2 columns" name="tipo" id="lst_clasif_alim" placeholder="Seleccione">
				<option value="">--Seleccione -- </option>
			</select>
			
			<select class="large-2 columns" id="lst_unidad_alim" name="unidad" placeholder="Seleccione">
				<option value="">--Seleccione -- </option>
			</select>
			
			<select class="large-2 columns" id="lst_tipo_alim" name="clasif" placeholder="Seleccione">
				<option >Abarrotes </option>
				<option >Frescos </option>
			</select>
			<label class="large-1 columns"><input type="checkbox" name="status" value="1">Activo</label>
			<div class="large-2 columns">
				<img id="img_guardar_alim" src='<?=base_url()?>application/img/cmd_guardar.jpg' style="width:3em;height:3em">	
				<img src='<?=base_url()?>application/img/cmd_buscar.jpg' style="width:3em;height:3em">	
			</div>
		</div>
	</form>
		<div class="row">
			<table style="width:100%">
				<caption>Alimentos registrados</caption>
				<thead>
					<tr>
						<th>#</th>
						<th>Alimento</th>
						<th>Clasif:</th>
						<th>Unidad:</th>
						<th>caducidad:</th>
						<th>Status</th>
					</tr>	
				</thead>
				<tbody id='tbl_alimentos'></tbody>
				<tfoot></tfoot>
			</table>
		</div>
		<div class="row">
			<ul class="pagination centered">
				<li class="arrow"><a href="">&laquo;</a></li>
				<li><a href="">1</a></li>
				<li><a href="">2</a></li>
				<li class="unavailable"><a href="">&hellip;</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
				<li class="arrow"><a href="">&raquo;</a></li>
			</ul>
		</div>
</div>