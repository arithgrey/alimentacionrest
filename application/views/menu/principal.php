<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?=base_url('/application/js/menu.js')?>"></script>
<div class='row'>
<div class='row'>  
 <ul class="pagination" role="menubar" aria-label="Pagination">
  <li class="arrow unavailable" aria-disabled="true"><a href="">&laquo; Fechas anteriores</a></li>
  <li class="current"><a href="">1</a></li>
  <li><a href="">2</a></li>
  <li><a href="">3</a></li>
  <li><a href="">4</a></li>
  <li class="unavailable" aria-disabled="true"><a href="">&hellip;</a></li>
  <li><a href="">12</a></li>
  <li><a href="">13</a></li>
  <li class="arrow"><a href="">Siguiente &raquo;</a></li>
</ul>
</div>
<table>
  <thead>
    <tr>
      <th width="200"><h4 class="subheader">Lunes</h4></th>
      <th><h4 class="subheader">Platillos</h4></th>
      <th width="100"><h4 class="subheader">Nota</h4></th>
      <th width="100"><h4 class="subheader"></h4></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><h4>Desayuno</h4></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><h4>Comida</h4></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><h4>Cena</h4></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>

<div class='row'>
  <div class='large-6 columns'>
    <label><h2 class="subheader">Tiempo</h2></label>
    <select class='tiempo' id='tiempo'>
      <option value='desayuno'>Desayuno</option>
      <option value='comida'>Comida</option>
      <option value='cena'>Cena</option>
    </select>

<label>Registrar</label>
<div class="registro switch">
  <input id="CheckboxSwitch" type="checkbox">
  <label for="CheckboxSwitch"></label>
</div> 

  </div>

  <div class='large-6 columns'>
    <label class='large-12 columns'><h2 class="subheader">Platillos</h2></label>
    <div class='large-12 columns'>
         <div class='opcionesdemenuacuales' id='opcionesdemenuacuales'></div>
    </div>

  </div>

</div> 



