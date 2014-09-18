<script type="text/javascript" src="<?=base_url()?>application/js/backend.js"></script>
<div class="row">
	<div class="large-12 columns">
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
		<h3>Alimentos</h3>
		<button onclick="showtipolimentos()" class="large-4 columns">Tipos de alimentos</button>		
		<a onclick="showpresentacion()"  class="button disabled large-4 columns">Presentación de los alimentos</a>  	
		<button onclick="redirecalimento('<?=base_url()?>')" class="large-4 columns"> Alimentos</button>		
	</div>

	<div class="large-12 columns">
		<h3>Opciones del Menú y recetas</h3>
		<button id="opcionesmenu" class="opcionesmenu large-4 columns">Opciones de menú</button>	
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
		<button id="asignaringredientes" class="asignaringredientes  large-4 columns">Asignar ingredientes a las opciones de menú</button>	

	</div>

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
	</div>

=======
		<button onclick="showtipolimentos()">Tipos de alimentos</button>		
		<button onclick="showpresentacion()">Presentación de los alimentos</button>	
		<button onclick="redirecalimento('<?=base_url()?>')">Alimentos</button>
		<button id="opcionesmenu" class="opcionesmenu">Opciones de menú</button>
	</div>	
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
</div>

<div class="formulariotipoalimentos" id="formulariotipoalimentos">
	<div class="row">

		<div class="large-6 columns">
			<label>Tipo de alimento:</label>
			<input  type="text" name="nombre" id="nombretipo"  placeholder="Fruta , legumbre ....." required >			
			<p id="msjerrortipoingrediente"></p>						

			<label>Descripción</label>
			<textarea rows="4"  name="descripcion" id="descripcion" placeholder="Carga un tipo nevo de alimento el cual se verá reflejado posteriormente en el apartado de menú"></textarea>		
			<p id="msjerrordescriptipo"></p>			
			<strong><p class="okmensaje"></p></strong>
			<button onclick="registrotipoingrediente('<?=base_url()?>')">Registrar</button>
		</div>
		<div class="large-6 columns">
			<h3>Registra un nuevo  tipo de alimento en el sistema.</h3>			
			<div class="Listtiposingredientes"></div>
			<input type="hidden" name="now" id="now" class="now" value="<?=base_url()?>">
		</div>	
	</div>


</div>


<div class="formulariopresentacion" id="formulariopresentacion">
		<div class="row">
			<div class="large-6 columns">
			<h3>Existen diversos tipos de presentación  para cada alimento carga una nueva presentación ahora</h3>

				<div class="listpresentacion" id="listpresentacion"></div>	

				
			</div>
			<div class="large-6 columns">			
				<label>Presentación:</label>
				<input class="" type="text" name="nombrepresentacion" id="nombrepresentacion" required placeholder="Plato , Cuchara, Vaso" >			
				
				
				<div class="large-6 columns">

					<label>Unidad</label>
					<select name="unidad" id="unidad" class="unida">
											
						<option value=""></option>				
						<option value="1">ML</option>						
						<option value="2">PZA</option>
						<option value="3">SOBRE</option>
						<option value="4">LT</option>
						<option value="5">KG</option>
						<option value="6">CAJA</option>
					</select>
				</div>
				<div class="large-6 columns">
					<label>Equivalencia</label>
					<input type="text" name="equivalencia" class="equivalencia" id="equivalencia">

				</div>	
				<p class="msjerrorpresentacion" id="msjerrorpresentacion"></p>
				<label>Descripción</label>
				<textarea rows="4"  name="descripcionpresentacion" id="descripcionpresentacion"></textarea>		
				<input type="hidden" name="presentacion" value="1">

					
				<strong><p class="okmensajepresentacion" id="okmensajepresentacion"></p></strong>
				<button onclick="registropresentacion('<?=base_url()?>')">Registrar</button>		
			</div>	
		</div>

</div>


