$(document).on("ready", function(){
	
	$("#registro_new").click(showregistroform);

});

function showregistroform(){

	$("#dlg_form_registro").foundation('reveal', 'open');

}