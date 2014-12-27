$(document).on("ready", function(){
	//$('#panel_sel_presentaciones').hide();
	//listpresentacion();
	loadpresentacion();

	$('#img_present_guardar').click(function(){
		guardar_presentacion();
	});

	var urlactual=$('.now').val();

});



function loadpresentacion(){

	e = "";
	$.get($('.now').val()+"index.php/api/backend/listpresentacion/format/json")
	.done(function(tabla){
		for(var fila=0;fila<tabla.length;fila++){
			agregar_presentacion(tabla[fila]);
		}

		$(".editpresentacion").click(editapresentacion);

	})
}



function agregar_presentacion(registro){
	str_reg="<tr>"+
			"<td><a class='editpresentacion' id="+registro.unidad+">"+registro.unidad+"</a></td>"+
			"<td>"+registro.equivalencia+"</td>"+
			"<td>"+registro.factor+"</td>"+
			"<td>"+registro.descripcion+"</td>"+
			"</tr>";
			$('#tbl_presentaciones').append(str_reg);
		
}

function listpresentacion(){
	actual = $(".now").val();	

	var jqxhr = $.ajax({
			type: "GET",
			url: actual+"index.php/api/backend/listpresentacion/format/json",						
			dataType: "json"	

		}).done(function(data) {									
			elementos="<p>List de presentación actual</p>";
			var filas="";
			for (var a = 0; a < data.length; a++) {				
				/*Pasar  a una lista o algo parecido */
				
				elementos+=	a+".- "+data[a].nombre+"<br>";
				filas+="<tr><td>"+data[a].nombre+"</td></tr>";
				//$('#lst_clasif_alim').append("<option value='"+data[a].id+"'>"+data[a].nombre+"</option>");
			}
			$(".listpresentacion").html("<label>"+elementos+"</label>");
			
			//$('#tbl_presentaciones').html(filas);

		}).fail(function() {
			alert( "error en listado de presentacion" );
		}).always(function() {
			//alert( "complete" );
		});

}


function editapresentacion( ew ){
	
	id = ew.target.id;
	$("#idpresentacion").val(id);

	url = $(".now").val()+"index.php/api/backend/getpresentacionbyid/format/json";
	$.get(url ,{ "id": id} )
		.done(function(data){

			unidad= data[0].unidad;
			factor = data[0].factor;
			descripcion = data[0].descripcion;

			$('#unidad').val(unidad);
			$('#factor').val(factor);
			$('#descripcion').val(descripcion);
			$('#pre').val("1");

	}).fail(function(){

	});

}

function guardar_presentacion(){

	
	urlformada= $(".now").val()+"index.php/api/backend/registropresentacion/format/json";

	$.post(urlformada , $("#frm_presentaciones").serialize())
	.done(function(datos){
		
		if (datos !=1 ) {
			alert(datos);
		}
		/*Clean list*/
		$('#tbl_presentaciones').html("");	
		loadpresentacion();
		
	});


}
