db_alimentos=null;
$(document).on("ready", function(){

	/*LISTADO */

	loadalimetos();		
	llenarclasificacion("#lst_clasif_alim");
	llenarunidades("#lst_unidad_alim");
	/*REGISTRO*/
	$("#img_guardar_alim").click(function(){
		registrar_alimento();
	});



});

function editar_alimento(evt)
{

	 idalimento= evt.delegateTarget.id; 
	 $("#clave").val(idalimento);
	 url = $(".now").val()+'/index.php/api/ingrediente/getalimentobyid/format/json'; 

	 $.get(url , {"idalimento": idalimento} ).done(function(data){

	 	nombre = data[0].nombre;	 	
	 	$("#nombre").val(nombre);

	 }).fail(function(){
	 	alert("Falla");
	 });


}

function loadalimetos(){
		var jqxhr = $.get($(".now").val()+ "/index.php/api/ingrediente/listingrediente/format/json")
		.done(function(data) {
			listdata="";			

			for (var a = 0; a < data.length; a++) {

				ingrediente =data[a].idingrediente;
				nombreingrediente = data[a].nombreingrediente;
				unidad = data[a].unidad;
				nombre= data[a].nombre;												
				status = data[a].estado;
				clasificacion = data[a].clasificacion;

				listdata +=" <tr class='filas_alim' id='"+ingrediente+"'>"+
						   "<th><a id='ingredienteelement' >"+ingrediente+"</a></th>"+
						   "<th>"+nombreingrediente+"</th>"+			   
						   "<th>"+unidad+"</th>"+
						   "<th>"+nombre+"</th>"+						   
						   "<th>"+clasificacion+"</th>"+
						   "<th>"+status+"</th></tr>";						   							
			}
			$('#tbl_alimentos').html(listdata);
			$(".filas_alim").click(editar_alimento);
			//variable que almacenará los datos
			db_alimentos=data;
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			//alert( "complete" );
		});


	}
	
function registrar_alimento(){

		alert($('#frm_ingredientes').serialize());
		$.post($(".now").val()+'/index.php/api/ingrediente/registroingrediente/format/json',
		 $('#frm_ingredientes').serialize())
		.done(function(data){
			loadalimetos();
				

		}).fail(function(){

			alert("e");
		});

}
