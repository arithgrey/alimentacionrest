<?= doctype('html5')?>

<head>
<title><?=$titulo?></title>
	<!--Información arithgrey@gmail.com-->

	<!--TAGS-->	
	<?php
		$meta = array(
	        array('name' => 'robots', 'content' => 'no-cache'),
	        array('name' => 'description', 'content' => 'Social I'),
	        array('name' => 'keywords', 'content' => 'social media, business intelligence, emprendimiento'),
	        array('name' => 'robots', 'content' => 'no-cache'),
	        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
	    );	    
	?>
	<?=meta($meta);?>
	<meta name="author" content="Jonathan Govinda Medrano Salazar arithgrey@gmail.com" />
	<!--CSS-->
	<?=link_tag('application/css/foundation.min.css');?>
	<?=link_tag('application/css/normalize.css');?>
	<?=link_tag('application/css/foundation.css');?>
	<?=link_tag('application/css/general_foundicons.css');?>
	
	<?=link_tag('application/css/main.css');?>

	
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.7/slick.css"/>
	<!--JS-->
	
	<script type="text/javascript" src="<?=base_url()?>application/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.3.7/slick.min.js"/></script>
	<script type="text/javascript" src="<?=base_url()?>application/js/foundation.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>application/js/backend.js"></script>
	

	

</head>
<body>
	<header>
	
		<div class="icon-bar six-up" id="cmd_opciones">
	
	<a class="item" id="cmd_tipos_alim" title="haga clic para acceder a las opciones de reigstro de la clasificaciones de los alimentos">
		<img src='<?=base_url()?>application/img/tipos_alim.jpg'>
		<label>Tipos</label>
	</a>
	<a class="item" id="cmd_presentaciones" >
		<img src='<?=base_url()?>application/img/present_alim.jpg'>
		<label>Presentaciones</label>
	</a>
	<a class="item" id="cmd_alimentos">
		<img src='<?=base_url()?>application/img/alimentos.jpg'>
		<label>Alimentos</label>
	</a>
	<a class="item" id="cmd_platillos">
		<img src='<?=base_url()?>application/img/opcion_menu.jpg'>
		<label>Platillos</label>
	</a>
	<a class="item" id="cmd_menu">
		<img src='<?=base_url()?>application/img/menu.jpg'>
		<label>Menu</label>
	</a>
	<a class="item" id="cmd_pedido">
		<img src='<?=base_url()?>application/img/pedido.jpg'>
		<label>Pedido</label>
	</a>

</div>

	</header>
	<div id='wrapper' class='wrapper'>
		<div class='content' id='content'>
		<input type="hidden" class="now" id="id" value="<?=base_url()?>">	


