<script type="text/javascript" src="<?=base_url()?>application/js/backend.js"></script>
<div class="row">

		<div class="large-6 columns">
			<label>Tipo de ingrediente:</label>
			<input  type="text" name="nombre" id="nombretipo"  placeholder="Fruta , legumbre ....." required >			
			<p id="msjerrortipoingrediente"></p>						

			<label>Descripción</label>
			<textarea rows="4"  name="descripcion" id="descripcion"></textarea>		
			<p id="msjerrordescriptipo"></p>			
			<strong><p class="okmensaje"></p></strong>
			<button onclick="registrotipoingrediente('<?=base_url()?>')">Registrar</button>
	

		</div>
		<div class="large-6 columns">
			<h3>Registra un nuevo <br>ingredienten en el sistema.</h3>
			<p >Carga un tipo nuevo de ingrediente el cual se verá reflejado posteriormente 
				en el apartado de menu</p>
		</div>	

</div>
<div class="row">
		<div class="large-6 columns">
		<h3>Existen diversos tipos de presentación <br> para cada ingrediente carga una nueva presentación ahora
		</h3>
			<p >Ejemplos:<br><br>
			-Vaso<br>
			-Plato<br>
			-Cuchara<br>
		</p>
		</div>
		<div class="large-6 columns">			
			<label>Presentación:</label>
			<input class="" type="text" name="nombrepresentacion" id="nombrepresentacion" required placeholder="Plata , Cuchara, Vaso" >			
			<p class="msjerrorpresentacion" id="msjerrorpresentacion"></p>
			<label>Descripción</label>
			<textarea rows="4"  name="descripcionpresentacion" id="descripcionpresentacion"></textarea>		
			<input type="hidden" name="presentacion" value="1">
			<strong><p class="okmensajepresentacion" id="okmensajepresentacion"></p></strong>
			<button onclick="registropresentacion('<?=base_url()?>')">Registrar</button>		
		</div>	
</div>