<script type="text/javascript" src="<?=base_url('/application/js/tipoalimentos.js')?>"></script>
<div class="panel" id='panel_tipos_alim' >
	<div class="row">
		<h1>
		Tipos de alimentos
		</h1>
	</div>

	<div class="row">
<form class='sformulariotipo' id="formulariotipos">
<table>
		<col style="width:25%"></col>
		<col style="width:60%"></col>
		<col style="width:15%"></col>
		<thead>
			<tr>
				<th>Tipo de alimento</th>
				<th>Descripcion</th>
				<th></th>
			</tr>
			<tr>	

				<input type="hidden" name="idtipoingrediente" id="idtipoingrediente" >
				<th><label><input name='tipo' id="tipo" type="text" placeholder="verduras de hoja,..."></label></th>
				<th><label><input name='descrip' id= "descrip" type="text" placeholder="describir los alimentos que entren en la categoria"></label>
				</th>
				<th>
				<img id="cmd_guardar_tipos" src='<?=base_url()?>application/img/cmd_guardar.jpg' style="width:3em;height:3em">

				</th>
			</tr>
		</thead>
		<tbody id="tbl_tipos_alimentos">
		</tbody>
		<tfoot></tfoot>
	</table>
	
	</form>
	</div>
</div>

<form id="edit_form">
	<input type="hidden" name='edit_id' id="edit_id">
</form>

