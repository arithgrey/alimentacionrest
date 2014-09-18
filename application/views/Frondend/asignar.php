<script type="text/javascript" src="<?=base_url()?>application/js/opcionesmenu.js"></script>
<div class="row">
	

		<h3 class="large-12 columns">Ingredientes</h3>
		<button class="listadoopcionesmenu" id="listadoopcionesmenu">Listar opciones de menú</button>
		
		<div class="row">
			<form name="form1" class="form1" id="form1">
			
			<!--Listado de opciones de menú-->		
			<div class="large-6 columns">
				<input type="hidden" class="now" id="id" value="<?=base_url()?>">
				<div class="opcionesdemenuacuales"></div>

			</div>
			<div class="large-6 columns">
				<div class="alimentosasignar" id="alimentosasignar"></div>
			</div>	
		</div>	
		</form>
		<button class="relaciona" id="relaciona">Formar opción de menú</button>
		
	
</div>
<div class="reportemovimiento" id="reportemovimiento"></div>