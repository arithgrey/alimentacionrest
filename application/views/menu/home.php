<script type="text/javascript" src="<?=base_url()?>application/js/menu_2.js"></script>
<script type="text/javascript" src="<?=base_url('application/js/menu/home.js')?>"></script>
<script src="<?=base_url('application/js/foundation/foundation.joyride.js')?>"></script>
<script src="<?=base_url('application/js/vendor/jquery.cookie.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/usuario/reguser.js')?>"> </script>


<style type="text/css">


.menu_section{
  color: white;
}
#p_bienvenida{
  font-size: 1.7em;
}
#p_opcionesdisponibles{
  font-size: 1.3em;
}
#title_registro_menu{
  color: white;
}
.cal_dia_seleccionado{
  font-size: 1.5em;
}
.steps{
  color: white;
  font-size: 3em;
}
#seleccion_p{
  color: white;
}
</style>

<?php     
    $this->load->view("menu/useraccess");
?>





<div class="row">

  <!--Nuevo menú -->  
  <div id='seccion_nuevomenu'>

    <div class="small-12 large-8 large-push-4 columns">
      <h2 class="subheader">Menú administración</h2>
      <div class="panel callout radius">
        <p id="p_bienvenida">Bienvenido</p>
        <div class='row'>
          <div class="large-6 columns">
            <div class="row">
              <p id="p_opcionesdisponibles">opciones disponibles</p>
              <input name ='radio_definirmenu' id="radio_definirmenu" type="radio" value="nuevo" onclick="section('e_definiestablecido')";> 
              <span data-tooltip aria-haspopup="true" class="has-tip" title="Puedes elegir el menú que actualmente se encuentra definido en el sistema">Establecido</span>
              <input id="radio_definirestablecido"  name='radio_definirmenu' type="radio" value="establecido" onclick="section('e_definirnuevo')";> 
              <span data-tooltip aria-haspopup="true" class="has-tip" title="Elabora tu propio menú en el sistema">Nuevo</span>
            </div>    
          </div>

          <button data-dropdown="drop" aria-controls="drop", aria-expanded="false" class="disabled button dropdown">Inicio</button><br>
          <ul id="drop" data-dropdown-content class="f-dropdown" role="menu", aria-hidden="false" tabindex="-1">
            <li><a href="#">This is a link</a></li>
            <li><a href="#">This is another</a></li>
            <li><a href="#">But they don't show up!</a></li>
          </ul>          
        </div>
      </div>


      
      <!--section_denifininuevo-->

      <div class='section_denifininuevo' id='section_denifininuevo'>          

         <ol class="joyride-list" data-joyride>            
            <li data-id="firstStop" data-text="Next" data-options="tip_location: top; prev_button: false">
             <p>Hello and welcome to the Joyride documentation page.</p> 
           </li> 

           <li data-id="numero1" data-class="custom so-awesome" data-text="Next" data-prev-text="Prev"> 
            <h4>Stop #1</h4> 
            <p>You can control all the details for you tour stop. Any valid HTML will work inside of Joyride.</p> 
            </li>

           <li data-id="numero2" data-button="Next" data-prev-text="Prev" data-options="tip_location:top;tip_animation:fade">
            <h4>Stop #2</h4> 
            <p>Get the details right by styling Joyride with a custom stylesheet!</p>
           </li> 
           <li data-button="End" id='endbutton' onclick="section('e_nuevoform');"  data-prev-text="Prev"> 
             <h4>Stop #3</h4> <p>It works as a modal too!</p>
           </li>
      </ol>


        <div id="mainAlert1" data-alert class="alert-box" tabindex="0" aria-live="assertive" role="dialogalert">         
        <div class='row'>      
        <div class='firstStop' id='firstStop'>
          <p class='steps'>Registra un nuevo menú en tres pasos sencillos </p>
          
          <div class='panel'>
            <p>
              The tooltips can be positioned on the "tip-bottom", 
              which is the default position, "tip-top" (hehe), "tip-left", or "tip-right" of the target element by adding the appropriate class to them. You can even add your own custom class to style each tip differently. On a small device, the tooltips are full-width and bottom aligned.
              The tooltips can be positioned on the "tip-bottom", 

              which is the default position, "tip-top" (hehe), "tip-left", or "tip-right" of the target element by adding the appropriate class to them. You can even add your own custom class to style each tip differently. On a small device, the tooltips are full-width and bottom aligned.
            </p>
          </div>


        </div>

        <div class='numero1' id='numero1'>
          <p class='steps' >First</p>
          <div class='panel callout radius'>
          <p>
            At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
            At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
          </p>
          </div>

        </div>


        <div class='numero2' id='numero2'>
          <p class='steps'>second step</p>
          
          <div class='panel'>
            <p>
              At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
              At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
            </p>
          </div>

        </div>


        <div class='End' id='End'>
          <p class='steps'>End</p>
          <div class='panel callout radius'>
          <p>
            At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
            At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
          </p>
          </div>
        </div>
    </div>    
 </div>
</div>






      



      <!--Sección para definir el menú-->


      <div class='panel' id="section_establecido">
        <div data-alert class="alert-box">
          <form id="frm_sel_fechas">
                  <div id="lst_fechas_sel"></div>
            <input type="hidden" name="year" id='a_actual' value="<?=$añoactual;?>">
            <input type="hidden" name="month" id="mesactual"  value="<?=$numerodemes;?>" >
            
              <p id="seleccion_p" >Selecciona los días de operación</p>

            </div>
            <div class="panel" id="calendario_general" >              
              <div class="row">
                <div class="large-8 columns">
                  <?=$calendario;?>    
                </div>
                
                  <p id="ndias"> Días seleccionados</p>
                  <input name="dias" type="text" id="txt_dias_sel" style="width:5em">
                
              </div>
            </div>
            <button id="btn_mostrar_panel_casas">Siguiente</button>
          </form>
        </div>
        <!--Sección para seleccionar casas-->
        <div class='panel' id="panel_casas">
          <div data-alert class="alert-box">
            <p id="seleccion_p">seleccione las casas y comedores</p>
          </div>
          <form id="form_sel_casas">
            <div class="row">
              <input type="hidden" name='menu' value="establecido">
              <select class="columns large-6" name='delegaciones' id='cbo_delegs'></select>
              <select class="columns large-6" name='ccds' id='cbo_ccds'></select>
            </div>
            <div class="row" >
              <table style="width:100%">
                <col style="width:60%"></col>
                <col style="width:40%"></col>
                <thead>
                  <tr>

                    <th><input type="checkbox" id="sel_todas_casas" value='1'>casa o comedor</th>

                    <th>servicio</th>
                  </tr>
                </thead>
                <tbody id="tbl_sel_casas">
                </tbody>
              </table>
              
              <button id="btn_mostrar_opciones_pedido">Siguiente</button>
              <button id="btn_mostrar_regresar_calendario">Anterior</button>

            </div>
          </form>
        </div>






        <!--Sección para especificar menus de frescos y abarrotes-->
        <div class='panel' id="panel_opciones_pedido">




    <div id="menu_presente">
    <div class="panel" id="panel_menu">
  <div class="row">
    <h1>menus registrados</h1>
    <img src='<?=base_url()?>application/img/cmd_agregar.jpg' style="width:3em;height:3em" id="img_menu_agregar">
  </div>
  <div class="row" id="panel_semanas">

  </div>
  <div class="reveal-modal" style='width:50em' id="dlg_new_menu" data-reveal>
    <!--<center>      <h2>Nuevo menú</h2> </center>-->
    <form id="frm_menu_nuevo">
      <input name='dia_semana' id="" type="hidden" value="">
      <input name="tiempo" type="hidden" value="">
      <input name="tipo" value="" type="hidden">
      <div class="row">
        <div class="large-4 columns">
          <label>
          </label>
          <label>tipo:
          </label>
          <label>Platillo:
            <select name="platillo"></select>
          </label>
        </div>
        <div class="large-4 columns" id="gpo_lst_platillos"></div>
        <div class="large-2 columns">     
          <img src='<?=base_url()?>application/img/cmd_agregar.jpg' style="width:3em;height:3em" id="img_menu_guardar"> 
        </div>
        
      </div>
    </form>
  </div>
</div>

</div>








          <div data-alert class="alert-box">
            <h5>Especifica las opciones del pedido</h5>
          </div>
          <form id="frm_opciones_pedido" method="POST">
            <div class="row">
              <div class="columns large-12">
                <label>Numero de pedido
                <input type="text" name="idpedido" value="" id="idpedido">
                <input type="hidden" name="tipo" value="">
                </label>
              </div>
              <div class="columns large-4">
                <h6>Abarrotes</h6>
                Meses
                <select name="abarrotes" id="abarrotes_periodo">
                  <option value="1">para un mes</option>
                  <option value="2">para dos meses</option>
                </select>
              </div>
              <div class="columns large-4">
                <h6>Frescos</h6>
                <label>Semana 1<input type="checkbox" name="frescos[]" onclick="semana(1)"; value="1"> </label>
                <label>Semana 2<input type="checkbox" name="frescos[]" onclick="semana(2)"; value="2"> </label>
                <label>Semana 3<input type="checkbox" name="frescos[]" onclick="semana(3)"; value="3"> </label>
                <label>Semana 4<input type="checkbox" name="frescos[]" onclick="semana(4)"; value="4"> </label>
              </div>
              <div class="columns large-4">
                <h6>Menus</h6>
                <label>Semana 1<input type="radio" name="menu" value="1"> </label>
                <label>Semana 2<input type="radio" name="menu" value="2"> </label>
                <label>Semana 3<input type="radio" name="menu" value="3"> </label>
                <label>Semana 4<input type="radio" name="menu" value="4"> </label>
              </div>
            </div>
            </form>
            <div class="row">
              <div class="columns large-4">
                <button class="btn_abarrotes" id="btn_abarrotes">Generar</button>
              </div>
              <div class="columns large-4">
                <button class="btn_frescos" id="btn_frescos">Generar</button>
              </div> 
              <div class="columns large-4">
                <button  id="btn_menu_imprimir">Imprimir</button>
              </div>
            </div>
          
        </div>
      </div>
    </div>
    <!--Menu-->
    <div class="small-12 large-4 large-pull-8 columns">
      <div class="row">
        
        <div class="medium-4 large-12 columns" onclick="section('e_menu' )"; >
          <div data-alert class="alert-box info radius">          
            <h3 class='menu_section'>Elaborar menus</h3>
          </div>
        </div>

        <div class="medium-4 large-12 columns" onclick="section('e_platillos')";>        
          <div data-alert class="alert-box" >
            <h3 class='menu_section'>Elaborar platillos</h3>
          </div>
        </div>
        

        <div class="medium-4 large-12 columns" onclick="section('e_alimentacion' )";>
          <div data-alert class="alert-box secondary">
            <h3 class='menu_section'>Alimentación</h3>
          </div>

        </div>
      </div>
    </div>

  </div>





