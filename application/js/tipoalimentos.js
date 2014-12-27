$(document).on("ready", function(){

		
	//actualizar  listado de clasificacion de alimentos

		$('#cmd_guardar_tipos').click(registrotipoingrediente);
		loadtiposalimentos();
});
function registrotipoingrediente() {

	
	urlactual=$('.now').val();
	urlformada=urlactual+"index.php/api/backend/registro/format/json";
	$.post(urlformada,$('#formulariotipos').serialize())
	.done(function(datos){
		
		loadtiposalimentos();

	}).
	fail(function(){
		alert("errror al guardar tipo de ingrediente");
	})
		// nombre = document.getElementById("nombretipo").value;
		// descripcion = document.getElementById("descripcion").value;
		// if (descripcion.length < 1) {
		// 	descripcion="s/n";
		// }
		// if (nombre.length < 1) {
		// 	$('#msjerrortipoingrediente').html("Falta llenar el campo nombre");
		// }else{
		// 	params = { "nombre" : nombre , "descripcion" : descripcion };
		// 	var jqxhr = $.ajax({
		// 		type: "POST",
		// 		url: urlformada,			
		// 		data: params,
		// 		dataType: "json"	
		// 	}).done(function(data) {			
		// 		$('#msjerrortipoingrediente').html("");
		// 		$('.okmensaje').html(data.databasemsj);
		// 		listtipos();
		// 	})
		// 	.fail(function() {
		// 		alert( "error" );
		// 	})
		// 	.always(function() {
		// 		//alert( "complete");
		// 	});
		// }
}


 function loadtiposalimentos(){

 	e = "";
	$.get($('.now').val()+'index.php/api/backend/listtipos/format/json')
		.done(function(datos){
			
			for(var i=0; i<datos.length; i++){
					
				name ="nombre"+datos[i].idtipoingrediente;
				e += "<tr><td><a onclick='edittipoalimentos("+datos[i].idtipoingrediente+" )'>"+datos[i].idtipoingrediente+"</td><td id='"+name+"'>"+datos[i].nombre+"</a></td></tr>";
			}
			$('#tbl_tipos_alimentos').html(e);

		});
		
}

function  edittipoalimentos(e){

	$("#edit_id").val(e);	
	urlformada=$(".now").val()+"index.php/api/backend/gettipoalimentobyid/format/json";

		$.get(urlformada , $("#edit_form").serialize()).
		done(function(data){

			idtipoingrediente = data[0].idtipoingrediente; 
			nombre= data[0].nombre;
			descripcion= data[0].descripcion;

			$("#descrip").val(descripcion);
			$("#tipo").val(nombre);

			$("#idtipoingrediente").val(idtipoingrediente);

		}).fail(function(){

			alert("Error al registrar");
		});


}