<script type="text/javascript" src="<?=base_url()?>application/js/opcionesmenu.js"></script>
<div class="row">
		<div class="large-12 columns">
			<input type="hidden" class="now" id="now" value="<?=base_url()?>" >
			<button  class="administracion" id="administracion">Administración</button>
		</div>
		<div class="large-6 columns" >
			<h4>Registro de opciones para menú</h4>
			<p><br>
			<div class="row">
				<div  class="large-4 columns">
					<h5>1.-</h5>
				</div>
				<div class="large-8 columns" >
					 El primer paso es, registrar el  nombre 
					de la nueva opción de menú o directamente  elegir alguno de los actuales
				</div>
				
			</div>	
			<div class="row">
				<div class="large-4 columns" >
					<h5> 2.-</h5>
				</div>
				<div class="large-8 columns" >
					Marca los alimentos necesarios para preparar ésta opción de menú 
				</div>				
			</div>
				
				
			</p>
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
					</div>
				</div>	
					

				
				<!--Registro o listado-->

				<div class="row">
					<div class="large-12 columns" >
						<button class="shownuevo" id="shownuevo">
							Registrar nuevo
						</button>	
					</div>
					<div class="large-12 columns" >

					<button>
						Elegir alguno de la lista
					</button>
					</div>
					
				</div>



			</div>
			
			<div class="row">
				<div class="listaalimentos" id="listaalimentos"></div>


			</div>
			

		</div>


</div>