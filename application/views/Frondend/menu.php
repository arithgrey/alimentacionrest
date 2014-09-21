<script type="text/javascript" src="<?=base_url()?>application/js/opcionesmenu.js"></script>
<div class="row">
		<div class="large-12 columns">
			<input type="hidden" class="now" id="now" value="<?=base_url()?>" >
			<button  class="administracion" id="administracion">Administración</button>
		</div>
		<div class="large-6 columns" >
			<h4>Registro de opciones para menú</h4>			
			<div class="lista-opciones" id="lista-opciones"></div>
					
		</div>
		<div class="large-6 columns" >
			
			<!--Input para el nombre del ingrediente-->
			<div class="row"> 
			
				<div class="registronuevo">
					<div class="large-4 columns">					
						<p>Opción de menú</p>	
					</div>	
					<div class="large-8 columns" >
							<input type="text" name="opcionmenu" class="opcionmenu" id="opcionmenu" > 						
							<button class="registraropcion">Registrar</button>
							<div class="reporte-registro"></div>
					</div>
				</div>								
				<!---->
				<div class="row">					
					<button class="shownuevo large-6 columns" id="shownuevo">Registrar nuevo</button>												
				</div>
				<div class="row">
					<button class="large-6 columns" id="verlista">Ver lista</button>	
				</div>
				<!---->
				
			</div>			
		</div>



