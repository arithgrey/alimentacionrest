$(document).on("ready", function(){

	$("#accessuser").click(validateuseraccess);

});

function validateuseraccess(){
		
		url= $(".now").val()+"index.php/api/useraccessrest/checkuseraccount/format/json"; 				

		emailaccess = $("#emailaccess").val();

		passwordaccess =  $("#passwordaccess").val();
		pw = ""+CryptoJS.SHA1(passwordaccess);			



		$.post(url , {"emailaccess" : emailaccess   , "passwordaccess" : pw } )
		.done(function(data){
			alert(data);

		}).fail(function(){
			alert("Fail on validateuseraccess");
		}) ;

}