<script src="<?=base_url('application/js/sha1.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/usuario/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/sha1.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/usuario/accessuser.js')?>"></script>

  <style type="text/css">

#repoacces{
   background: #01A9DB;

}
  .ex{
	color: black;
}
#terminoscp_p, #acerca_p{
	color: white;
	font-size: 2.3em;
}
#registro_new{
	background: white;
	color: black;
}

</style> 

<div data-alert class="alert-box">
<div class="row">
	<a href="<?=base_url()?>">Home</a>      
	

  
  <div class="small-12 large-6 columns">    
    <button id="registro_new">Registrar</button>
   </div>

    <div class="small-12 large-6 columns">
    	<div class="panel"> 
    	<h2 class="subheader">Acceso</h2>	
      <div class="row">

        <div class="small-12 columns">          

            <div class="row">
            <form id="form_accessystem">
	              <div class="small-12 medium-6 columns">
	                <label>Mail o usuario</label>
	                  <input type="text" class='emailaccess' id='emailaccess' name='emailaccess' placeholder="arithgrey@gmail.com"/>
	                  <div class='repomail' id='repomail'></div>
	              </div>

	              <div class="small-12 medium-6 columns">
	                <label>Password</label>

	                  <input type="password" class='passwordaccess' id ='passwordaccess' name='passwordaccess' placeholder=""/>
	                  <div  id='repopass'></div>
	                  <span class="label">Olvidé contraseña</span>
	              </div>
	            </div>
            </form>
            <button class='accessuser' id='accessuser'>Acceder</button>
          <div  class='repoacces' id='repoacces'></div>
        </div>
      </div>
    </div>
</div>
</div>

<div class='row'>
</div>
</div>










<div class='row'> 
	<div class='large-10 columns'>
	</div>
	<div class='large-2 columns'>
	

	</div>	
</div>	








<div class="reveal-modal" id="dlg_form_registro" data-reveal>



	<div class='row'>
			<!--Terminos y condiciones-->
			<div  class="large-5 columns panel" data-equalizer-watch>
				<h3>Terminos y condiciones</h3>
				<label>
					
					relleno de las imprentas y archivos de texto.
					 Lorem Ipsum ha sido el texto de relleno estándar de las industrias
					  desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería 
					  de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en
					   documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la
					 creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente 
				</label>
				<span data-tooltip aria-haspopup="true" class="has-tip" title=""><a class="seguir_leyendo" id="textoid">Seguir leyendo</a></span>

			</div>
		  <!-- Formulario -->
		  <div class="large-6 columns">    
				<div class='row'>
					<span class="label large-5 columns">Mail:<br>@</span>				
					<input type="text" id="usermailresg" name="usermail" class="usermail large-7 columns" placeholder="arithgrey@gmail.com" required>
								
					<span class="label large-5 columns" >Password:<br>******</span>				
					<input type="password" name="pwregistro" class="pwregistro large-7 columns" id="pwregistro" required>				
								
					<span class="label large-5 columns">Confirmar<br> Password: </span>							
					<input type="password" name="pwconfirm" id="pwconfirm" class="pwconfirm large-7 columns" required>				
				</div>																		
				<div class='row'>
					<div id='reporte_registro' class='reporte_registro'></div>
	  				<a  class="button" id="registrousuario">Registrar</a>  				
	  			</div>
	  	</div>    
	</div>

	</div>

	<div class="reveal-modal" id="dlgterminos_condiciones" data-reveal>
	    	<a href="#" class="close">&times;</a>

		<div class='panel'>
			<div data-alert class="alert-box">
	  			<p id="terminoscp_p">Terminos y condiciones </p>  
			</div>
		
		</div>
	    
	</div>  

</div>