<script type="text/javascript" src="<?=base_url('/application/js/presentacion.js')?>"></script>

<div class="panel" id="dlg_presentaciones">
	<div class="row">
	<h1>Equivalencia de presentacion</h1>
</div>
	<form id="frm_presentaciones">
		<div id="reporte_presentacion"></div>
		<input type='hidden' name='idpresentacion' id="idpresentacion"> 
		<input type='hidden' name='pre' id="pre"> 
		<div class="row">
				<div class="large-2 columns"> <label>Unidad:<input type="text" name="unidad" id="unidad"> </label></div>
				
				<div class="large-2 columns"> <label>Presentacion:
					<select name='presentacion'>
						<option value='KG'>KG</option>
						<option value='LT'>LT</option>
					</select>
				</label></div>			


				<div class="large-2 columns"> <label>Equivalencia:<input type="text" name="factor" id="factor"> </label></div>
				<div class="large-4 columns"> <label>Descripcion:<input type="text" name="descripcion" id="descripcion"> </label></div>

				<div class="large-2 columns">
					<a class="item" id="cmd_presentaciones" >
						<img id="img_present_guardar" class="img_present_guardar" src='<?=base_url()?>application/img/cmd_guardar.jpg' style="width:3em;height:3em" >
						<img src='<?=base_url()?>application/img/cmd_buscar.jpg' style="width:3em;height:3em" id="img_present_buscar">	
					</a>
				</div>
			</div>
		</form>
		<div class="row">
			<table style="width=100%">
				<col style="width:8.33%"></col>
				<col style="width:8.33%"></col>
				<col style="width:8.33%"></col>
				<col style="width:8.33%"></col>
				<col style="width:33.3%"></col>
				<thead>
				</thead>
				<tbody id='tbl_presentaciones'>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
		</div>
		<!--	<a class="close-reveal-modal">&#215;</a>-->
	</div>
