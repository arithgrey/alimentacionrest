<script type="text/javascript" src="<?=base_url()?>application/js/frondend.js"></script>
<script type="text/javascript" src="<?=base_url()?>/application/js/ingrediente.js"></script>


<div class="panel">
<div class="icon-bar two-up">
<a class="item"><img src="<?base_url()?>">	<label>Inicio</label></a>
<a class="item"><img src="<?base_url()?>">	<label>Anterior</label></a>
</div>

<div class="row">
	<h3>Bienvenido al registro de alimentos</h3>
</div>
<div class="row">
	<div class='estadoregistro' id='estadoregistro'></div>
	<div class="large-3 columns">
			<input type="text" name="ingrediente" id="nombreingrediente" class="nombreingrediente" required>
	</div>
	<div class="listtipos large-3 columns" id='listtipos' ></div>
	<div class="listpresentacion large-3 columns" id='listpresentacion'></div>
	
		
	<select class="large-2 columns" name="clasificacion" id="clasificacion">
		<option value="1">Perecedero</option>
		<option value="2">No perecedero</option>
	</select>
	<button class="registroalimento large-1 columns" id='registroalimento' >Registrar</button>
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
<tbody id="listaalimentos" class='listaalimentos'>
</tbody>
</table>
</div>
</div>
