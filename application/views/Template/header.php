<?= doctype('html5')?>

<head>
<title><?=$titulo?></title>
	<!--Información arithgrey@gmail.com-->
	<!--Desarrollador Jonathan Govinda Medrano Salazar-->
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
	
	<?=link_tag('application/css/main.css');?>

	
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.7/slick.css"/>
	<!--JS-->
	
	<script type="text/javascript" src="<?=base_url()?>application/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.3.7/slick.min.js"/></script>
	<script type="text/javascript" src="<?=base_url()?>application/js/foundation.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/dojo/1.10.1/dojo/dojo.js"></script>	
	

</head>
<body>
	<header>
		<h1 class='home' id='home'><a href="<?=base_url()?>">Home</a></h1>
		<div class="row">
		  <div class="large-8 columns">
		  	<h2 ><?=$titulo?></h2>							
		  </div>		
		  
		</div> 		
		<nav>
		</nav>
	</header>
	<div id='wrapper' class='wrapper'>
		<div class='content' id='content'>
		<input type="hidden" class="now" id="id" value="<?=base_url()?>">	


