<script type="text/javascript" src="<?=base_url()?>application/js/backend.js"></script>
<div class="row">
	<div class="large-12 columns">
		<h3>Alimentos</h3>
		<button onclick="showtipolimentos()" class="large-4 columns">Tipos de alimentos</button>		
		<a onclick="showpresentacion()"  class="button disabled large-4 columns">Presentación de los alimentos</a>  	
		<button onclick="redirecalimento('<?=base_url()?>')" class="large-4 columns"> Alimentos</button>		
	</div>

	<div class="large-12 columns">
		<h3>Opciones del Menú y recetas</h3>
		<button id="opcionesmenu" class="opcionesmenu large-4 columns">Opciones de menú</button>	
	</div>

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
				<p class="msjerrorpresentacion" id="msjerrorpresentacion"></p>
				<label>Descripción</label>
				<textarea rows="4"  name="descripcionpresentacion" id="descripcionpresentacion"></textarea>		
				<input type="hidden" name="presentacion" value="1">

				<strong><p class="okmensajepresentacion" id="okmensajepresentacion"></p></strong>
				<button onclick="registropresentacion('<?=base_url()?>')">Registrar</button>		
			</div>	
		</div>

</div>

