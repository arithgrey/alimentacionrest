$(document).on("ready", function(){

		/*Listar unidades disponibles*/
		urlpost = "index.php/api/backend/listunidades/format/json";
		$.get(urlpost,{dataType:'json'})
		.done(function(data){
			for (var a = 0; a < data.length; a++) {
				
				nombre = data[a].nombre;
				idunidad = data[a].idunidad;

				$('#lst_unidades_pres').append("<option value='"+idunidad+"'>"+nombre+"</option>");
			}
			
		}).fail(function() {
				alert( "Falla al cargar las unidades" );
		});

		/*Registrar prensetacion*/
		$('#guardarpresentacion').click(function(){
			
			$.post("index.php/api/backend/registropresentacion/format/json",$('#frm_presentaciones').serialize())
			.done(function(datos){
				
				$('#reporte_presentacion').append("<p>"+datos+"<p>");

			});

		});


		/*Listar  las unidades*/
		$.post("index.php/api/backend/listunidades/format/json",{dataType:'json'})
		.done(function(data){
			for (var a = 0; a < data.length; a++) {
				
				nombre = data[a].nombre;
				idunidad = data[a].idunidad;

				$('#lst_unidades_pres').append("<option value='"+idunidad+"'>"+nombre+"</option>");
			}
			
		}).fail(function() {
				//alert( "Falla al cargar las unidades" );
		});


		/*Listar las presentaciones actuales*/	
		$.post("index.php/api/backend/listapresentacionesdeldia/format/json",{dataType:'json'})
		.done(function(data){
			for (var a = 0; a < data.length; a++) {
				
				idpresentacion = data[a].idpresentacion;
				nombre = data[a].nombre;
				descripcion = data[a].descripcion;
				fecharegistro = data[a].fecharegistro;
				equivalencia = data[a].equivalencia;

				elemtos = "<tr><td>"+idpresentacion+"<td><td>"+nombre+"</td><td>"+descripcion+"</td><td>"+fecharegistro+"</td> <td>"+equivalencia+"</td> </tr>";
				$('#tbl_presentaciones').append(elemtos);

				
			}
			
		}).fail(function() {
				
		});



		/*//////////////////////////////////////////////////////////*/

		/*Listar tipos de ingredientes*/

		$.post("index.php/api/backend/listtipos/format/json",{dataType:'json'})
		.done(function(data){
		
			for (var a = 0; a<= data.length; a++) {				
				
				idtipoingrediente = data[a].idtipoingrediente;
				nombre = data[a].nombre;
				descripcion = data[a].descripcion;
				fecharegistro = data[a].fecharegistro;

				$("#tbl_tipos_alimentos").append("<tr><td>"+idtipoingrediente+"</td><td>"+nombre+"</td><td>"+descripcion+"<td>"+fecharegistro+"</td></td></tr>");
			}
		}).fail(function() {
				
		});

		/*Gusrdar nuevos tipos de ingredientes*/

		$('#guardartipos').click(function(){
			alert($('#formulariotipos').serialize());
			$.post("index.php/api/backend/registro/format/json", $('#formulariotipos').serialize())
			.done(function(data){
			}).fail(function() {
					
			});


		});
			


	

});

