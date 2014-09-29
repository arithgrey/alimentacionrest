<script type="text/javascript" src="<?=base_url()?>application/js/opcionesmenu.js"></script>
<div class="row">
	
		<h3 class="large-12 columns">Ingredientes</h3>
		<button class="listadoopcionesmenu" id="listadoopcionesmenu">Listar opciones de menú</button>
		<div class="row">
			<form name="form1" class="form1" id="form1">		
				<!--Listado de opciones de menú-->		
				<div class="large-4 columns">
					<input type="hidden" class="now" id="id" value="<?=base_url()?>">
					<div class="opcionesdemenuacuales" id="opcionesdemenuacuales"></div>
				</div>
				<div class="large-4 columns">
					<div class="Listtiposingredientes" id="Listtiposingredientes"></div>	
				</div>
				<div class="large-4 columns">
					<div class="alimentosasignar" id="alimentosasignar"></div>
				</div>	
			</form>			
		</div>				
</div>
<div class="row">
	<div class="reportemovimiento" id="reportemovimiento"></div>
</div>


