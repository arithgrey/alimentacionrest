<script type="text/javascript" src="<?=base_url()?>application/js/frondend.js"></script>
<script type="text/javascript" src="<?=base_url()?>/application/js/ingrediente.js"></script>

<div class="row">
	<h3>Bienvenido al registro de alimentos</h3>
</div>
		<div class="row">
			
			<div class="large-1 columns" >
				<div class="paso1"></div>
			</div>	
			<div class="large-2 columns" >

				<label>Nombre del ingrediente:</label>			
			</div>
			<div class="large-3 columns" >
				<input type="text" name="ingrediente" id="nombreingrediente" class="nombreingrediente" required>
			</div>	
			<div class="large-6 columns" >
				<p>signa un nombre al ingrediente a utilizar  para el menú por de cuerdo al tiempo
					podras solicitar varios ingredientes
				</p>
			</div>
		</div>
		<div class="row">
			<div class="large-6 columns" >
				<div class="paso2"></div>
			</div>
			<div class="large-6 columns" >
				<div class="listtipos" id="listtipos"></div>
			</div>

		</div>			

		<div class="row">
			<div class="large-6 columns" >
				<div class="paso3">
				</div>
			</div>	
			<div class="large-6 columns" >
				<div class="listpresentacion">
					<input type="hidden" name="urlactual" class="urlactual" id="urlactual" value="<?=base_url()?>" >
				</div>
			</div>				
		</div>

		<div class="4" id="4">


		<div class="row">
				
				<div class="large-6 columns" >
					<div class="paso4">
						<h3>4</h3>
					</div>
				</div>

				<div class="large-6 columns" >
					<label>Clasificación</label>
					<select name="clasificacion" class="clasificacion">
						<option value="1">Perecedero</option>
						<option value="2">No perecedero</option>
					</select>
				</div>

			</div>

		<!--		
				<div class="row">
				<div class="large-6 columns" >
					<div class="paso4">
						<h3>4</h3>
					</div>
				</div>
				<div class="large-6 columns" >
					<label>Unidad</label>
					<select name="unidad" id="unidad" class="unidad">
											
						<option value=""></option>				
						<option value="1">ML</option>						
						<option value="2">PZA</option>
						<option value="3">SOBRE</option>
						<option value="4">LT</option>
						<option value="5">KG</option>
						<option value="6">CAJA</option>
					</select>
				</div>
			</div>
		-->

		</div>

		<div class="6">
			<div class="row">
				<div class="large-6 columns" >
					<h3>6</h3>
				</div>
				<div class="large-6 columns" >
					<label>Cantidad</label>
					<div class="cantidad" id="cantidad"></div>								
					<input type="hidden" name="now" class="now" id="now" value="<?=base_url()?>">
				</div>				

			</div>
		</div>
		
		<div class="row">
				<div class="estadoregistro" id="estadoregistro"></div>
		</div>	
		<div class="row">			
			<div class="large-6 columns" >
				<button id="registroalimento" class="registroalimento">Registrar</button>				
			</div>			
		</div>

			
		<div class="row">
			<button class="administracion" id="administracion">
				Administración
			</button>
			<button class="listadoactual" id="listadoactual">
				Mostrar alimentos registrados
			</button>
			<button class="ocultar" id="ocultar">
				Ocultar alimentos registrados
			</button>
			

		</div>	
			<div class="listaact">
				<div class="row">

					<div class="large-1 columns"><p>Identificador</p></div>				
					<div class="large-1 columns"><p>Status</p></div>
					<div class="large-4 columns"><p>Nombre del ingrediente</p></div>				
					<div class="large-2 columns"><p>Unidad </p></div>					
					<div class="large-2 columns"><p>Tipo de alimento</p></div>
					<div class="large-2 columns"><p>Presentación</p></div>
					
				</div>	
				<div class="row">
					<div class="listaalimentos" id="listaalimentos"></div>
				</div>

			</div>			

		
		

