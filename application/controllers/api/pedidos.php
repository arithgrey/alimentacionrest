<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
include ('Classes/PHPExcel.php'); 
require 'Classes/PHPExcel/IOFactory.php';

class Pedidos extends REST_Controller{
	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model("pedidomodel");
	}

	function lstdelegaciones_GET()
	{
		$datos=$this->pedidomodel->delegaciones();
		$this->response($datos);
	}
	function listadoccds_GET(){
		$datos=$this->pedidomodel->lst_ccds($this->input->get("cvedeleg"));
		$this->response($datos);
	}
	function listadocasas_GET()
	{
		$datos=$this->pedidomodel->lst_casas($this->input->get("cveccdi"));
		$this->response($datos);
	}

	function listapresentaciones_GET()
	{
		//$dias=$this->input->get("dias");
		$consulta=$this->pedidomodel->listado_presentaciones_pedido($_SESSION["dias"]);
		$this->response($consulta);
	}
	function registromenus_POST(){
		$_SESSION["dias"]=$this->input->post("dia");
		$this->response($_SESSION["dias"]);
	}
	function registrocasas_POST()
	{
		$_SESSION["casas"]=$this->input->post("casas");
		$_SESSION["ccds"]=$this->input->post("ccds");
		$_SESSION["delegaciones"]=$this->input->post("delegaciones");
		$this->response($_SESSION["casas"]);
	}
	function guardar_fechas_POST(){
		$dias=$this->input->post("dia");
		$anio=$this->input->post("year");
		$mes=$this->input->post("month");
		$_SESSION["fechas"]=[];
		for ($i=0; $i <count($dias) ; $i++)
		{ 
			# code...
			 $_SESSION["fechas"][$i]="$anio-$mes-".$dias[$i];
		}

		$this->response(count($_SESSION["fechas"]));
	}
	function registropedido_POST(){
		//return $this->response("guardado");
		$alimentos["alim"]=$this->input->post("alim");
		$alimentos["unidad"]=$this->input->post("unidad");
		$alimentos["costo"]=$this->input->post("costo");
		$menu=$this->input->post("menu");
		$dias =  count($_SESSION["fechas"]);

 		//1. Obtener listado de casas seleccionadas
 		//$casas=$this->pedidomodel->listado_casas_pedido($_SESSION["casas"]);

 		// 2. obtener nuevo número de pedido
 		$idpedido=$this->pedidomodel->nuevo_pedido($_SESSION["fechas"]);

 		//3. asociar menus con pedido.
 		$this->pedidomodel->guardar_pedido_menu($idpedido,$_SESSION["fechas"]);

 		//4. asociar alimentos con casas por dia
 		$this->pedidomodel->guardar_pedido_casas_alim($idpedido,$_SESSION["fechas"],$_SESSION["casas"]);
		$pedido["id"]=$idpedido;
		$pedido["semanas"]=intval($dias)/intval(5);
		//$pedido["semanas"]+=(intval($_SESSION["dias"]) % 5)?1:0;
		$this->response($pedido);
	}
	function datos_pedido_GET(){
		$idpedido=$this->input->get("idpedido");
		$this->response($idpedido);
	}


	function listado_menubyidpedido_GET(){

		$idpedido=$this->input->get("idpedido");		
		$productos =$this->pedidomodel->getmenubyday_r($idpedido);		
		$this->response($productos);

	}





	function listado_menureportecsv_GET(){

		date_default_timezone_set('Africa/Lagos');	
		$idpedido=$this->input->get("idpedido");
		$productos =$this->pedidomodel->listado_menu_reportecsv($idpedido );

		
        $PHPExcel =  new PHPExcel();
        // Propiedades del archivo excel
        $PHPExcel->getProperties()
                ->setTitle("Menu")
                ->setDescription("Descripcion del excel");
        // Setiar la solapa que queda actia al abrir el excel
        $PHPExcel->setActiveSheetIndex(0);
        // Solapa excel para trabajar con PHP
        $sheet = $PHPExcel->getActiveSheet();

        $sheet->setTitle("Menus");
     
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
	
        //$PHPExcel->getActiveSheet()->getColumnDimension("A1:H18")->setAutoSize(true); 	
       	$sheet->getStyle('A1:A20')->getAlignment()->setTextRotation(90);
       	$sheet->getStyle('C1:C20')->getAlignment()->setTextRotation(90);
       	
       	$styleArray = array(
       'borders' => array(
             'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK,
                    'color' => array('argb' => '#000000'),
             ),
       ),
);


$sheet->getStyle('D1:H1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '0489B1')
        )
    )
);

$PHPExcel->getActiveSheet()->getStyle('B2:H7')->applyFromArray($styleArray);
$PHPExcel->getActiveSheet()->getStyle('B8:H15')->applyFromArray($styleArray);
$PHPExcel->getActiveSheet()->getStyle('B16:H21')->applyFromArray($styleArray);
$PHPExcel->getActiveSheet()->getStyle('A1:A21')->applyFromArray($styleArray);

        $sheet->setCellValue('A12', 'SEMANA 1');
        $sheet->setCellValue('B1', 'TIEMPO');
        $sheet->setCellValue('C4', 'DESAYUNO');
        $sheet->setCellValue('C12', 'COMIDA');
        $sheet->setCellValue('C19', 'CENA');

        $sheet->setCellValue('D1', 'LUNES');
        $sheet->setCellValue('E1', 'MARTES');
        $sheet->setCellValue('F1', 'MIERCOLES');
        $sheet->setCellValue('G1', 'JUEVES');
        $sheet->setCellValue('H1', 'VIERNES');
   
        $sheet->setCellValue('B2', 'BEBIDA');
        $sheet->setCellValue('B3', 'GUISADO');
        $sheet->setCellValue('B4', 'GUARNICIÓN');
        $sheet->setCellValue('B5', 'TORTILLAS');
        $sheet->setCellValue('B6', 'FRUTA');

        $sheet->setCellValue('B8', 'BEBIDA');
        $sheet->setCellValue('B9', 'SOPA');
        $sheet->setCellValue('B10' , 'GUISADO');
        $sheet->setCellValue('B11' , 'GUARNICIÓN');
        $sheet->setCellValue('B12' , 'TORTILLAS');
        $sheet->setCellValue('B13' , 'FRUTA');

        $sheet->setCellValue('B16' , 'FRUTA');
        $sheet->setCellValue('B17' , 'GUISADO');
        $sheet->setCellValue('B18' , 'GUARNICIÓN');
        $sheet->setCellValue('B19' , 'TORTILLAS');

        for ($a=0; $a < count($productos); $a++) {        
        			/*Para el día uno*/
        			$casilla = "";
	
		        		/**/
			        		 for($a=0; $a < count($productos); $a++) { 

						        	if($productos[$a]["dia"] == 1 ) {
						        		$casilla ="D";
						        	}elseif ($productos[$a]["dia"] == 2) {
						        		$casilla ="E";
						        	}elseif ($productos[$a]["dia"] == 3) {
						        		$casilla ="F";
						        	}elseif ($productos[$a]["dia"] == 4) {
						        		$casilla ="G";
						        	}else{
						        		$casilla ="H";
						        	}

				        		 	/*Para el tiempo desayuno en el día uno*/
					        		if ($productos[$a]["tiempo"] == "Desayuno"){

												if ($productos[$a]["tipo"] == "bebida") {
													
													$registrocasilla = $casilla."2";

													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);        					
												
												}elseif( $productos[$a]["tipo"] == "guisado" ){

													$registrocasilla = $casilla."3";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);

												}elseif( $productos[$a]["tipo"] == "guarnicion" ){
													$registrocasilla = $casilla."4";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);

												}elseif ($productos[$a]["tipo"] == "tortillas") {
													$registrocasilla = $casilla."5";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);

												}elseif ($productos[$a]["tipo"] == "fruta") {
													$registrocasilla = $casilla."6";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);
												}else{}

					        		}/*Para el tiempo comida*/		

					        		elseif ($productos[$a]["tiempo"] == "Comida") {
											
							        			if ($productos[$a]["tipo"] == "bebida") {
													$registrocasilla = $casilla."8";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);        					
												
												}elseif( $productos[$a]["tipo"] == "sopa" ){
													$registrocasilla = $casilla."9";
													$sheet->setCellValue($registrocasilla, $productos[$a]["nombre"]);
												}elseif( $productos[$a]["tipo"] == "guisado" ){
													$registrocasilla = $casilla."10";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);
												}elseif ($productos[$a]["tipo"] == "guarnicion") {
													$registrocasilla = $casilla."11";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);
												}elseif ($productos[$a]["tipo"] == "tortillas") {
													$registrocasilla = $casilla."12";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);
												}elseif ($productos[$a]["tipo"] == "fruta") {
													$registrocasilla = $casilla."13";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);
												}else{}

					        		}/*Para el tiempo cena*/
					        		elseif ($productos[$a]["tiempo"] == "Cena") {
					        				
					        				if ($productos[$a]["tipo"] == "bebida") {
													$registrocasilla = $casilla."16";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);        					
												
												}elseif( $productos[$a]["tipo"] == "sopa" ){
													$registrocasilla = $casilla."17";
													$sheet->setCellValue($registrocasilla, $productos[$a]["nombre"]);
												}elseif( $productos[$a]["tipo"] == "guisado" ){
													$registrocasilla = $casilla."18";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);
												}elseif ($productos[$a]["tipo"] == "guarnicion") {
													$registrocasilla = $casilla."19";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);
												}elseif ($productos[$a]["tipo"] == "tortillas") {
													$registrocasilla = $casilla."20";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);
												}elseif ($productos[$a]["tipo"] == "fruta") {
													$registrocasilla = $casilla."21";
													$sheet->setCellValue($registrocasilla , $productos[$a]["nombre"]);
												}else{}
					        		}else{

					        		}/*Terminan los tiempos posibles*/
			        	}
		  /*Termina el ciclo inicial*/
        }
        header("Content-Type: application/vnd.ms-excel");
        $nombreArchivo = 'menupedidogeneradoel_'.date('YmdHis');
        header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\"");
        header("Cache-Control: max-age=0");
        

        $writer = PHPExcel_IOFactory::createWriter($PHPExcel, "Excel5");
        $writer->save('php://output'); 
        $this->response($productos);

	}



  function getmenubydayidpedido_GET(){

    $idpedido = $this->input->get("idpedido");
    $this->load->model("pedidomodel");
    $data =  $this->pedidomodel->list_menu_r($idpedido);

    $this->response($data);
    
  }



	


	function pedido_productos_GET(){
		date_default_timezone_set('Africa/Lagos');	
		//return $this->response(1);
		$idpedido=$this->input->get("idpedido");
		$tipo="ABARROTES";
		$dias=$this->input->get("dias");
		$semana=$this->input->get("semana");
		$abarrotes = $this->input->get("abarrotes");

		//$nivel=$this->input->get("detalle");
		$nivel=1;
		$productos=$this->pedidomodel->listado_pedido($idpedido,$tipo,$semana,$nivel);

        $PHPExcel =  new PHPExcel();
        // Propiedades del archivo excel
        $PHPExcel->getProperties()
                ->setTitle("Periodo")
                ->setDescription("Descripcion del excel");
        
        $PHPExcel->setActiveSheetIndex(0);
        // Solapa excel para trabajar con PHP
        $sheet = $PHPExcel->getActiveSheet();
       	

$sheet->getStyle('A1:H1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '0489B1')
        )
    )
);
        $sheet->setTitle("Abarrotes");

        
        $sheet2 = $PHPExcel->getActiveSheet();
        $sheet2->setTitle("Periodo");
        $sheet2->getColumnDimension('A')->setWidth(20);
        $sheet2->setCellValue('A1', 'Delegacion');

        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->setCellValue('A1', 'Delegacion');
        $sheet->setCellValue('B1', 'CCDI');
        $sheet->setCellValue('C1', 'Clave');
        $sheet->setCellValue('D1', 'Localidad');
        $sheet->setCellValue('E1', 'modalidad');
        $sheet->setCellValue('F1', 'Producto');
        $sheet->setCellValue('G1', 'Unidad');
        $sheet->setCellValue('H1', 'Cantidad');
  			      

        for ($a=0; $a < count($productos); $a++) {
        	
        	$e=$a+2;
        	$casillaA =  "A".$e;
        	$casillaB =  "B".$e;
        	$casillaC =  "C".$e;
        	$casillaD =  "D".$e;
        	$casillaE =  "E".$e;
        	$casillaF =  "F".$e;
        	$casillaG =  "G".$e;
        	$casillaH =  "H".$e;


        	$sheet->setCellValue($casillaA , $productos[$a]["delegacion"] );
	        $sheet->setCellValue($casillaB, $productos[$a]["ccdi"] );
	        $sheet->setCellValue($casillaC, $productos[$a]["idcasa"]);
	        $sheet->setCellValue($casillaD, $productos[$a]["localidad"]);
	        $sheet->setCellValue($casillaE, $productos[$a]["modalidad"]);
	        $sheet->setCellValue($casillaF , $productos[$a]["ingrediente"] );
	        $sheet->setCellValue($casillaG , $productos[$a]["unidad"]);
	        $sheet->setCellValue($casillaH , $productos[$a]["cantidad"]);


        }

      
        // Salida
        header("Content-Type: application/vnd.ms-excel");
        $nombreArchivo = 'pedidogeneradoel_'.date('YmdHis');
        header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\"");
        header("Cache-Control: max-age=0");
        // Genera Excel
        $writer = PHPExcel_IOFactory::createWriter($PHPExcel, "Excel5");
        // Escribir
        $writer->save('php://output');    
        
		$this->response($productos);
	}


	function pedido_productos_frescos_GET(){

		date_default_timezone_set('Africa/Lagos');	
		
		$idpedido=$this->input->get("idpedido");
		$tipo="FRESCOS";
		$dias=$this->input->get("dias");
		$semana=$this->input->get("semana");
		$abarrotes = $this->input->get("abarrotes");

		//$nivel=$this->input->get("detalle");
		$nivel=1;
		$productos=$this->pedidomodel->listado_pedido($idpedido,$tipo,$semana,$nivel);

        $PHPExcel =  new PHPExcel();
        // Propiedades del archivo excel
        $PHPExcel->getProperties()
                ->setTitle("Periodo")
                ->setDescription("Descripcion del excel");
        
        $PHPExcel->setActiveSheetIndex(0);
        // Solapa excel para trabajar con PHP
        $sheet = $PHPExcel->getActiveSheet();
       	

$sheet->getStyle('A1:H1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '0489B1')
        )
    )
);
        $sheet->setTitle("Abarrotes");

        
        $sheet2 = $PHPExcel->getActiveSheet();
        $sheet2->setTitle("Periodo");
        $sheet2->getColumnDimension('A')->setWidth(20);
        $sheet2->setCellValue('A1', 'Delegacion');

        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->setCellValue('A1', 'Delegacion');
        $sheet->setCellValue('B1', 'CCDI');
        $sheet->setCellValue('C1', 'Clave');
        $sheet->setCellValue('D1', 'Localidad');
        $sheet->setCellValue('E1', 'modalidad');
        $sheet->setCellValue('F1', 'Producto');
        $sheet->setCellValue('G1', 'Unidad');
        $sheet->setCellValue('H1', 'Cantidad');
  			      

        for ($a=0; $a < count($productos); $a++) {
        	
        	$e=$a+2;
        	$casillaA =  "A".$e;
        	$casillaB =  "B".$e;
        	$casillaC =  "C".$e;
        	$casillaD =  "D".$e;
        	$casillaE =  "E".$e;
        	$casillaF =  "F".$e;
        	$casillaG =  "G".$e;
        	$casillaH =  "H".$e;


        	$sheet->setCellValue($casillaA , $productos[$a]["delegacion"] );
	        $sheet->setCellValue($casillaB, $productos[$a]["ccdi"] );
	        $sheet->setCellValue($casillaC, $productos[$a]["idcasa"]);
	        $sheet->setCellValue($casillaD, $productos[$a]["localidad"]);
	        $sheet->setCellValue($casillaE, $productos[$a]["modalidad"]);
	        $sheet->setCellValue($casillaF , $productos[$a]["ingrediente"] );
	        $sheet->setCellValue($casillaG , $productos[$a]["unidad"]);
	        $sheet->setCellValue($casillaH , $productos[$a]["cantidad"]);


        }

      
        // Salida
        header("Content-Type: application/vnd.ms-excel");
        $nombreArchivo = 'pedidogeneradoel_'.date('YmdHis');
        header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\"");
        header("Cache-Control: max-age=0");
        // Genera Excel
        $writer = PHPExcel_IOFactory::createWriter($PHPExcel, "Excel5");
        // Escribir
        $writer->save('php://output');    
        
		$this->response($productos);



	}

/*
	function pedido_productos_frescos_GET(){
		date_default_timezone_set('Africa/Lagos');	
		//return $this->response(1);
		$idpedido=$this->input->get("idpedido");
		
		/*
		$semana1  =  $this->input->get("semana1");
		$semana2  =  $this->input->get("semana2");
		$semana3  =  $this->input->get("semana3");
		$semana4  =  $this->input->get("semana4");


		if ($semana1 ==  1) {
			
			$productos=$this->pedidomodel->listado_pedido($idpedido,$tipo, 1 ,$nivel);		
		}elseif ($semana2 ==  1)  {
			$productos=$this->pedidomodel->listado_pedido($idpedido,$tipo, 2 ,$nivel);			
		}elseif ($semana3 ==  1) { 
			$productos=$this->pedidomodel->listado_pedido($idpedido,$tipo, 3 ,$nivel);			
		}elseif ($semana4 == 1 ) {
			$productos=$this->pedidomodel->listado_pedido($idpedido,$tipo, 4 ,$nivel);			
		}else{

		}	
	*/
/*		
		$dias=$this->input->get("dias");
		$semana=$this->input->get("semana");
		$abarrotes = $this->input->get("abarrotes");
		
		$semana = $this->input->get("frescos");




		$tipo="FRESCOS";
		
		$nivel=1;

		$productos=$this->pedidomodel->listado_pedido($idpedido,$tipo, $semana,$nivel);

        $PHPExcel =  new PHPExcel();
        // Propiedades del archivo excel
        $PHPExcel->getProperties()
                ->setTitle("Periodo")
                ->setDescription("Descripcion del excel");
        
        $PHPExcel->setActiveSheetIndex(0);        
        $sheet = $PHPExcel->getActiveSheet();
       

$sheet->getStyle('A1:H1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '0489B1')

        )
    )
);

        $sheet->setTitle("Frescos");


        
        $sheet2 = $PHPExcel->getActiveSheet();
        $sheet2->setTitle("Periodo");
        $sheet2->getColumnDimension('A')->setWidth(20);
        $sheet2->setCellValue('A1', 'Delegacion');

        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->setCellValue('A1', 'Delegacion');
        $sheet->setCellValue('B1', 'CCDI');
        $sheet->setCellValue('C1', 'Clave');
        $sheet->setCellValue('D1', 'Localidad');
        $sheet->setCellValue('E1', 'modalidad');
        $sheet->setCellValue('F1', 'Producto');
        $sheet->setCellValue('G1', 'Unidad');
        $sheet->setCellValue('H1', 'Cantidad');
        $sheet->setCellValue('I1', $productos);
		  			      

        for ($a=0; $a < count($productos); $a++) {
        	
        	$e=$a+2;
        	$casillaA =  "A".$e;
        	$casillaB =  "B".$e;
        	$casillaC =  "C".$e;
        	$casillaD =  "D".$e;
        	$casillaE =  "E".$e;
        	$casillaF =  "F".$e;
        	$casillaG =  "G".$e;
        	$casillaH =  "H".$e;


        	$sheet->setCellValue($casillaA , $productos[$a]["delegacion"] );
	        $sheet->setCellValue($casillaB, $productos[$a]["ccdi"] );
	        $sheet->setCellValue($casillaC, $productos[$a]["idcasa"]);
	        $sheet->setCellValue($casillaD, $productos[$a]["localidad"]);
	        $sheet->setCellValue($casillaE, $productos[$a]["modalidad"]);
	        $sheet->setCellValue($casillaF , $productos[$a]["ingrediente"] );
	        $sheet->setCellValue($casillaG , $productos[$a]["unidad"]);
	        $sheet->setCellValue($casillaH , $productos[$a]["cantidad"]);


        }




        // Salida
        header("Content-Type: application/vnd.ms-excel");
        $nombreArchivo = 'pedidogeneradoel_'.date('YmdHis');
        header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\"");
        header("Cache-Control: max-age=0");
        // Genera Excel
        $writer = PHPExcel_IOFactory::createWriter($PHPExcel, "Excel5");
        // Escribir
        $writer->save('php://output');    
        
		$this->response($productos);

	}
*/



}
?>