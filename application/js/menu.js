$(document).on("ready", function(){
	


	/**/



	$('body').ready(function (){
		listtipos();
	});

	/**/
	$('.registro').click(function(){

		 registro = $('#CheckboxSwitch').val();

		    var x = document.forms["myForm"]["fname"].value;
		    if (x == null || x == "") {
		        alert("First name must be filled out");
		        return false;
		    }




		
	/*Termina la función*/	
	});

/*Termina document*/
});

function listtipos(){

		urlformada = $(".now").val();
		urlregistro= urlformada+"index.php/api/opcionmenu/listopciones/format/json";
		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,					
			dataType: "json"	

		}).done(function(data) {
			
			listado ="";
			for (var a = 0; a < data.length; a++) {
					
					idopcionmenu = data[a].idopcionmenu;
					nombre = data[a].nombre;

					listado +="<div class='large-10 columns'><h5 class='subheader'>"+nombre +"</h5></div><div class='large-2 columns'>"+"<input type='checkbox' name='platilloopcion' value='"+idopcionmenu+"' onchange='registra(this)' >"+"</div>";
							
			};		
			
			$('.opcionesdemenuacuales').html(listado);

		});
	

}


function registra(e){

	platillo = e.value; 
	Tiempo  = $('.tiempo').val();
	params = { "platillo" : platillo , "tiempo" : Tiempo };

		urlformada = $(".now").val();
		urlregistro= urlformada+"index.php/api/menu/registro/format/json";

		var jqxhr = $.ajax({

			type: "POST",
			url: urlregistro,
			data: params,					
			dataType: "json"	

		}).done(function(data) {
			
			alert(data);
			
		}).fail(function(){
			alert("error");
		});
	
/*Termina la función*/	
}