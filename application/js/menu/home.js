$(document).on("ready", function(){
    
    $("#btn_mostrar_panel_casas").hide();
    $("#btn_mostrar_opciones_pedido").hide();

    semana1 = 0; 
    semana2 = 0; 
    semana3 = 0; 
    semana4 = 0;     
	
	$("#radio_definirmenu").attr('checked', true);
    $("body").ready(loadnumdias);
    $("#calendario_general td a").click(getday);
    $('#cbo_delegs').change(upd_ccds);
    
    $('#cbo_ccds').change(upd_casas);



    $('#panel_casas').hide();
    $('#panel_opciones_pedido').hide();
    $("#btn_menu_imprimir").click(generatecsv);
    $("#btn_abarrotes").click(listabarroresperiod);
    $("#btn_frescos").click(listapedidosfrescos);
    $("#section_denifininuevo").hide();



    $('#btn_mostrar_panel_casas').click(function(evt){
        //guardar fechas en el servidor
        var dias=$('.cal_dia_seleccionado').toArray();
        var fecha="";
        for (var i = 0; i < dias.length; i++) 
        {
            //fecha=$("#a_actual").val()+"-"+$("#mesactual").val()+"-"+dias[i].text;
            $('#lst_fechas_sel').append("<input type='hidden' name='dia[]' value='"+dias[i].text+"'>");
        };
        $.post($('.now').val()+"index.php/api/pedidos/guardar_fechas/format/json",
            $('#frm_sel_fechas').serialize())
        .done(function(datos){
        
        }).fail(function(){alert("error")});

        $('#panel_casas').show();
        $('#section_establecido').hide();
        upd_delegs();




        return false;
    });
    $('#btn_mostrar_opciones_pedido').click(function(evt){
    

      //guardar pedido
        $.post($('.now').val()+"index.php/api/pedidos/registrocasas/format/json",$('#form_sel_casas').serialize())
        .done(function(datos){
            
        }).fail(function(){alert("error al registrar pedido")});
        //guardar pedido
        $.post($('.now').val()+"index.php/api/pedidos/registropedido/format/json")
        .done(function(datos){
            //obtener idpedido
            $("#frm_opciones_pedido input[name='idpedido']").prop("value",datos.id);
            
            getpedidonewform();

            




        })
        .fail(function(){})
        $('#panel_casas').hide();
        $('#panel_opciones_pedido').show();

        return false;
    });
    $('#sel_todas_casas').click(function(evt){
        var sel=$(evt.target).prop("checked");
        $("#form_sel_casas input[name='casas[]']").prop("checked",sel);



                

    });

    $('.btn_pedidos').click(function(evt){

        switch(evt.target.id){
            case "btn_abarrotes":
            $('#frm_opciones_pedido input[name=tipo]').prop("value","abarrotes");

                break;
            case "#btn_frescos":
            $('#frm_opciones_pedido input[name=tipo]').prop("value","frescos");
                break;
            case "btn_menu":

                break;
        }
        var url=$('.now').val()+"index.php/api/pedidos/pedido_productos/format/json?"+
        $('#frm_opciones_pedido').serialize();
        var ventana=window.open(url,"_blank");


        return false;
    });


    $("#btn_mostrar_regresar_calendario").click(registropedido);


});

var fechas_list = [];
var b = 0; 

function getday(evento){
        dia = evento.target.text;
        if($(evento.delegateTarget).attr("class")=="cal_dia_seleccionado")
            $(evento.delegateTarget).attr("class","");
        else
            $(evento.delegateTarget).attr("class","cal_dia_seleccionado");
        fechas_list[b]= dia;
        $('#txt_dias_sel').attr("value",$('.cal_dia_seleccionado').length);

        if ($('.cal_dia_seleccionado').length ==  0 ) {

            $("#btn_mostrar_panel_casas").hide();

        }else{
            $("#btn_mostrar_panel_casas").show();

            



        }


        return false;
}

function listafechas(){
    
    repo ="";
    a=0;
    a_actual = $("#a_actual").val();
    mesactual = $("#mesactual").val();

    while(a<fechas_list.length){
            repo +="<br><div class='large-6 columns'>"+ a_actual+"-"+mesactual+"-"+fechas_list[a]+"</div>";
            repo +="<div class='large-6 columns'>";
            repo += "<span  class='label Descripcion_dtalle' id='"+fechas_list[a]+"'>Descripción</span></div>"; 
        a++;
    }

    $("#fechas_asignadas").html(repo); 
    $('.Descripcion_dtalle').click(verdetalledia);
}

function verdetalledia(evt){
    diaevt = evt.target.id;    
    
}

function loadnumdias(){    
    a=1;
    e="";
    while(a<=40){

        e += "<option value='"+a+"'> "+a+"</option>";        
        a++;
    }
    $("#num_dias").html(e);

}

function generatecalendar(){
    url =$(".now").val()+"index.php/api/calendario/generate/format/json";
    $.get(url , $("#form_dias").serialize() ).done(function(data){
    }).fail(function(){
        alert("Error");
    });
}

<!---->
/*Función para el menu */
function section(elemento){

	switch (elemento){
    
    case "e_platillos":
        //$("#calendario_general").hide();
        alert("trabajando .... .");

        break;
    case "e_menu":
       	$("#seccion_principal").hide();	 	
       	$("#seccion_nuevomenu").show();	
       	        
        break;
    case "e_alimentacion":
		alert("trabajando .... .");        
    	//$("#seccion_nuevomenu").hide(); //$("#seccion_principal").hide();	  	//$("#calendario_general").hide();
        break;
    
    case "e_definiestablecido": 	
    
    	$("#section_establecido").show();
        $("#section_denifininuevo").hide();
    	break;

    case "e_definirnuevo":    	
    	
		$("#radio_definirmenu").attr('checked', false);	    	
    	$("#section_establecido").hide();
        $("#section_denifininuevo").show();
        $(document).foundation('joyride', 'start');

        $("#endbutton").click(function(){

            

        });

    	break;        
	}
}

function upd_delegs(){
    $.get($('.now').val()+"index.php/api/pedidos/lstdelegaciones/format/json")
    .done(function(datos){
        upd_select('#cbo_delegs',datos);
        
        
        $('#cbo_delegs').change();

    }) .fail(function(){});
}
function upd_ccds(evt){
    $.get($('.now').val()+"index.php/api/pedidos/listadoccds/format/json",{'cvedeleg':evt.target.value})
    .done(function(datos){
        upd_select('#cbo_ccds',datos);
        
        /**/
        
        listfirst ($("#cbo_ccds").val());



    }).fail(function(){});
}




function upd_casas(evt){


    $.get($('.now').val()+"index.php/api/pedidos/listadocasas/format/json",{'cveccdi':evt.target.value})
    .done(function(datos){
        var strfila="";
        for (var i = 0; i < datos.length; i++) {
            strfila+="<tr>"+
                "<td><label><input name='casas[]' class='casas_c' type='checkbox' value='"+datos[i].id+"'>"+
                datos[i].nombre+"</label></td>"+
                "<td>"+datos[i].func+"</td></tr>";


        };



        $('#tbl_sel_casas').html(strfila);
        $(".casas_c").click(shownextgeneratepedido);

    }).fail(function(){});
}

function listfirst (e) {


    $.get($('.now').val()+"index.php/api/pedidos/listadocasas/format/json",{'cveccdi':e})
    .done(function(datos){
        var strfila="";
        for (var i = 0; i < datos.length; i++) {
            strfila+="<tr>"+
                "<td><label><input name='casas[]' class='casas_c' type='checkbox' value='"+datos[i].id+"'>"+
                datos[i].nombre+"</label></td>"+
                "<td>"+datos[i].func+"</td></tr>";


        };



        $('#tbl_sel_casas').html(strfila);
        $(".casas_c").click(shownextgeneratepedido);

    }).fail(function(){});

    
}



function generatecsv(){

        var url=$('.now').val()+"index.php/api/pedidos/listado_menureportecsv/format/json?"+
        $('#frm_opciones_pedido').serialize();
        var ventana=window.open(url,"_blank");
}
function listabarroresperiod(){
        
   var url=$('.now').val()+"index.php/api/pedidos/pedido_productos/format/json?"+
        $('#frm_opciones_pedido').serialize();
    var ventana=window.open(url,"_blank");


}

function listapedidosfrescos(){

    var url=$('.now').val()+"index.php/api/pedidos/pedido_productos_frescos/format/json?"+
        $('#frm_opciones_pedido').serialize();
        

    var ventana=window.open(url,"_blank");
}

function semana(e){

        switch (e){

           case 1:

                if (semana1 == 0 ) {
                    semana1=1;    
                }else{
                    semana1=0;    
                }                
                
                break;
            case 2 : 
                
                if (semana2 == 0 ) {
                    semana2=1;    
                }else{
                    semana2=0;    
                }

                break; 
            case 3:
                
                if (semana3 == 0 ) {
                    semana3=1;    
                }else{
                    semana3=0;    
                }
                break; 
            case 4:
                
                if (semana4 == 0 ) {
                    semana4=1;    
                }else{
                    semana4=0;    
                }
                break; 
                                
            default:     
                break;



        }

}





function registropedido(){

        $('#panel_casas').hide();
        $('#section_establecido').show();

        return false;
}

function shownextgeneratepedido () {
    $("#btn_mostrar_opciones_pedido").show();
}


/*Llenamos el menú de la sección nueva */
function getpedidonewform(){

        idpedido =  $("#idpedido").val();
        url =  $('.now').val()+"index.php/api/pedidos/listado_menubyidpedido/format/json";
        $.get(url , {"idpedido": idpedido})
        .done(function(datos){

        alert(datos);    
        dias=datos.length;    
                  
        var num_semanas=(dias/5)+1 ;
        for (var i = 1; i <= num_semanas; i++) {

                dibuja_semana(i);
        }

            
        
        
        
        

        /*
        for (var i = 0; i < datos.length; i++)
                cargar_menu(i+1,datos[i]);
        //asociar manejador  de evento
        $('.menu_platillos').click(editar_menu);
        */

        }).fail(function(){

            alert("error");

        }) ; 
        
        return false;
}



function dibuja_semana(semana,menu)
{

    var strSemana="<table style='width:100%'>"+
                    "<caption id='lbl_"+semana+"'>MENU SEMANA "+semana+"</caption>"+
                    "<thead>"+
                        "<tr>"+
                            "<th>tiempos</th>"+
                            "<th>Lunes</th>"+
                            "<th>Martes</th>"+
                            "<th>Miercoles</th>"+
                            "<th>Jueves</th>"+
                            "<th>Viernes</th>"+
                        "</tr>"+
                    "</thead>"+
                    "<tr>"+
                        "<th colspan='8' style='text-align:center'>DESAYUNO</th>"+
                    "</tr>"+
                    "<tbody id='des_"+semana+"'></tbody>"+
                    "<tr>"+
                        "<th colspan='8' style='text-align:center'>COMIDA</th>"+
                    "</tr>"+
                    "<tbody id='com_"+semana+"' ></tbody>"+
                    "<tr>"+
                        "<th colspan='8' style='text-align:center'>CENA</th>"+
                    "</tr>"+
                    "<tbody id='cen_"+semana+"' ></tbody>"+                 
                "</table>";
        $('#panel_semanas').append(strSemana);
        agregar_fila('#des_'+semana,semana,'desayuno','Bebida');
        agregar_fila('#des_'+semana,semana,'desayuno','Guisado');
        agregar_fila('#des_'+semana,semana,'desayuno','Guarnicion');
        agregar_fila('#des_'+semana,semana,'desayuno','tortillas');
        agregar_fila('#des_'+semana,semana,'desayuno','Fruta');

        agregar_fila('#com_'+semana,semana,'comida','bebida');
        agregar_fila('#com_'+semana,semana,'comida','sopa');
        agregar_fila('#com_'+semana,semana,'comida','guisado');
        agregar_fila('#com_'+semana,semana,'comida','leguminosa');
        agregar_fila('#com_'+semana,semana,'comida','guarnicion1');
        agregar_fila('#com_'+semana,semana,'comida','guarnicion2');
        agregar_fila('#com_'+semana,semana,'comida','tortillas');
        agregar_fila('#com_'+semana,semana,'comida','postre');

        agregar_fila('#cen_'+semana,semana,'cena','bebida');
        agregar_fila('#cen_'+semana,semana,'cena','guisado');
        agregar_fila('#cen_'+semana,semana,'cena','guarnicion');
        agregar_fila('#cen_'+semana,semana,'cena','verduras');
        agregar_fila('#cen_'+semana,semana,'cena','tortillas');
}
function agregar_fila(contenedor,semana,tiempo,tipo){
var strfila="<tr>";
    strfila+="<th class='h_tipo'>"+tipo+"</th>";
for (var i = 1; i < 6; i++) {
    strfila+="<td><a class='menu_platillos' idmenu='' id='"+tiempo+"_"+tipo+"_"+(((semana-1)*5)+i)+"'><li class='foundicon-plus'></li></a></td>";
};
strfila+="</tr>";
$(contenedor).append(strfila);

};


function editar_menu(evt)
{
    //obtener dia y tiempo
    
    var tiempo=evt.delegateTarget.id.split("_")[0];
    var tipo=evt.delegateTarget.id.split("_")[1];
    var dia_sem=evt.delegateTarget.id.split("_")[2];

    $('#frm_menu_nuevo input[name=tiempo]').attr("value",tiempo);
    $('#frm_menu_nuevo input[name=tipo]').attr("value",tipo);
    $('#frm_menu_nuevo input[name=dia_semana]').attr("value",dia_sem);
    $('#frm_menu_nuevo input[name=dia_semana]').attr("id",evt.delegateTarget.id);
    
        $.get($('.now').val()+"index.php/api/opcionmenu/listopciones/format/json", 
            {'filtro':tiempo,'tipo':tipo})
        .done(function(datos){
            upd_select('#frm_menu_nuevo select[name=platillo]',datos);
        })
        .fail(function(){
            alert("error al obtener opciones de menu");
        });

    var idmenu=$(evt.delegateTarget).attr('idmenu');
    if (idmenu) {
        $.get($('.now').val()+"index.php/api/menu/getmenubyday/format/json",{'id':idmenu})
        .done(function(data){
            
            return false;
        })
        .fail(function(){
            return false;
        });
    }
    
    $('#dlg_new_menu').foundation('reveal','open');
    
    return false;
}
function agregar_menu()
{

}

