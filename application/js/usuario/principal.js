$(document).on("ready", function(){
	now = $('.now').val();

	/*Validamos si el usuario existe*/
	$('.username').change(function (){


			username = $('.username').val();
			urlpost = now + "index.php/api/usuariorest/userexist/format/json";			
			expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		    if ( !expr.test(username) ){

						$.post(urlpost, {"username": username } ).done(function(data){
							

							
							if (data == 0) {
								/*Usuario correcto*/
								response= "<div data-alert class='alert-box info radius'>Usuario correcto</div>";		
								$("#reporte_registro").html(response);
								

							}else{

								response = "<span class='[success alert secondary] [round radius] label'> ✖Intente con un usuario distinto</span>";
								$("#reporte_registro").html(response);
								
								
							}
							
						
						}).fail(function(){
							alert("error");
						});
									
		    }else{			    	

				    	
				    	$('#reporte_registro').html(repo);
		    }
	});

	

	$("#registrousuario").click(function(){

		pwregistro  = $('.pwregistro').val();		
		pwconfirm  = $('.pwconfirm').val();

		usermail  = $('#usermailresg').val();					

		pw = ""+CryptoJS.SHA1(pwregistro);					

		postdata= $(".now").val()+"index.php/api/useraccessrest/validadata/format/json"; 				

			$.post(postdata , {  "usermail" : usermail , "pw" : pw })
			.done(function(data){

				alert(data);

			}).fail(function(){

				alert("error");
			});

		
	});


	$(".seguir_leyendo").click(seguir_leyendo);


});


function seguir_leyendo(){
	
	
	$('#dlgterminos_condiciones').foundation('reveal', 'open');

}