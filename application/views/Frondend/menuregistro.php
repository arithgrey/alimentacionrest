<div class="panel">
<div class="icon-bar two-up">
<a class="item"><img src="<?base_url()?>application/">	<label>Inicio</label></a>
<a class="item"><img src="<?base_url()?>application/">	<label>Anterior</label></a>
</div>
<script type="text/javascript" src="<?=base_url()?>application/js/frondend.js"></script>
<script type="text/javascript" src="<?=base_url()?>/application/js/ingrediente.js"></script>

<div class="row">
	<h3>Bienvenido al registro de alimentos</h3>
</div>
<div class="row">
	<div class="large-3 columns">
			<input type="text" name="ingrediente" id="nombreingrediente" class="nombreingrediente" required>
	</div>
	<select class="large-3 columns"></select>
	<select class="large-3 columns"></select>
		
	<select class="large-3 columns" name="clasificacion" id="clasificacion">
		<option value="1">Perecedero</option>
		<option value="2">No perecedero</option>
	</select>
</div>
<div class="row">
<table class="large-12 columns">
<caption>Ingredientes registrados</caption>
<thead>
	<tr>
		<th>Id</th>
		<th>Ingrediente</th>
		<th>Unidad</th>
		<th>Presentacion</th>
		<th>Tipo</th>
		<th>Status</th>
	</tr>
</thead>
<tbody id="listaalimentos">
</tbody>
</table >
</div>
</div>
