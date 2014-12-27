<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class Pedidomodel extends CI_Model {
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->database();
 	}

 	function delegaciones()
 	{
 		$sql="SELECT cvedelegacion id, delegacion nombre FROM delegaciones";
 		$consulta=$this->db->query($sql);
 		return $consulta->result_array();
 	}
 	function lst_ccds($cvedelegacion){
 		$sql="SELECT cveccdi id,ccdi nombre FROM ccds where cvedelegacion='$cvedelegacion'";
 		$registros=$this->db->query($sql);

 		return $registros->result_array();

 	}
 	function lst_casas($id){
 		$sql="SELECT id,localidad nombre,modalidad as func 
 		FROM casas 
 		WHERE ccdi='$id'";
 		$registros=$this->db->query($sql);
 		return $registros->result_array();

 	}
 	function listado_presentaciones_pedido($dias)
 	{
 		$dias=implode(",", $dias);
 		$sql="SELECT i.idingrediente as id,i.nombre alim,oi.unidad,i.clasificacion as tipo,0 as costo,
	 		sum(adoles_h) adolesh, sum(adoles_m) adolesm,sum(escolar) esc
	 		FROM menu m 
	 		inner join opcionmenu om on m.id_opcion=om.idopcionmenu
	 		inner join opcionmenuingrediente oi on om.idopcionmenu=oi.idopcionmenu
	 		inner join ingrediente i on oi.idingrediente=i.idingrediente
	 		where m.dia in($dias)
	 		GROUP BY i.idingrediente";

 		$consulta=$this->db->query($sql);

 		return $consulta->result_array();
 	}



 	function listado_menu_reportecsv($idpedido ){

 		$query ="SELECT menu.dia , tiempo  ,id_opcion  , pedido_menu.idmenu , pedido_menu.fecha , 
 		 opcionmenu.nombre , opcionmenu.tipo  , desayuno , comida, cena , veces_mes FROM 
 		 menu , pedido_menu , opcionmenu  WHERE  pedido_menu.idpedido = '".$idpedido."' AND  pedido_menu.idmenu =  menu.idmenu
		 AND menu.id_opcion =  opcionmenu.idopcionmenu";
		 $queryresponse =  $this->db->query( $query );
		 return $queryresponse ->result_array();
 	}





	function getmenubyday_r($idpedido){
        
        $menu=[];	
        $registros=$this->db->query("select  count(distinct fecha) fecha FROM  pedido_menu WHERE idpedido = '".$idpedido."' ");
        $dias=$registros->result_array()[0]["fecha"];

    	   
        for ($i=0; $i < $dias; $i++) 
        	$dia= $i+1;	
            $menu[$i]=$this->list_menu_r($dia  , $idpedido );
            

		return $menu; 


        //return $dias;  

	}

 	function list_menu_r( $dia , $idpedido ){

 		 $menu=[]; 
 		 $menu["dia"]=$dia;
 		 
 		 $querydesayuno ="SELECT opcionmenu.tipo ,  id_opcion AS id , opcionmenu.nombre AS opcionmenu ,
 		   pedido_menu.idmenu  FROM 
 		 menu , pedido_menu , opcionmenu  WHERE  pedido_menu.idpedido = '".$idpedido."' AND  pedido_menu.idmenu =  menu.idmenu
		 AND menu.id_opcion =  opcionmenu.idopcionmenu AND menu.tiempo = 'Desayuno' AND menu.dia = '".$dia."' ";

		 $menu["desayuno"]=$this->db->query( $querydesayuno )->result_array();


 		 $querycomida ="SELECT opcionmenu.tipo ,  id_opcion AS id , opcionmenu.nombre AS opcionmenu ,
 		 pedido_menu.idmenu  FROM 
 		 menu , pedido_menu , opcionmenu  WHERE  pedido_menu.idpedido = '".$idpedido."' AND  pedido_menu.idmenu =  menu.idmenu
		 AND menu.id_opcion =  opcionmenu.idopcionmenu AND menu.tiempo = 'Comida' AND menu.dia = '".$dia."' ";
		 $menu["comida"]=$this->db->query( $querycomida )->result_array();


	
		$querycomida ="SELECT opcionmenu.tipo  ,  id_opcion AS id , opcionmenu.nombre AS opcionmenu 
		, pedido_menu.idmenu   FROM menu , pedido_menu , opcionmenu  WHERE  pedido_menu.idpedido = '".$idpedido."' AND  pedido_menu.idmenu =  menu.idmenu
		 AND menu.id_opcion =  opcionmenu.idopcionmenu AND menu.tiempo = 'Cena'  AND menu.dia = '".$dia."' ";
		 $menu["cena"]=$this->db->query( $querycomida )->result_array();		 
		 
		 return $menu;

 	}


 	function listmenubyidpedido($idpedido){

 		
 		$query ="SELECT menu.dia , tiempo  ,id_opcion  , pedido_menu.idmenu , pedido_menu.fecha , 
 		 opcionmenu.nombre , opcionmenu.tipo  , desayuno , comida, cena , veces_mes FROM 
 		 menu , pedido_menu , opcionmenu  WHERE  pedido_menu.idpedido = '".$idpedido."' AND  pedido_menu.idmenu =  menu.idmenu
		 AND menu.id_opcion =  opcionmenu.idopcionmenu";
		 $queryresponse =  $this->db->query( $query );
		 return $queryresponse ->result_array();	
 	}

 	

 	function listado_pedido($idpedido,$tipo,$semana,$detalle){

 		$ofset =  "SELECT week(fecha_inicio, 1) AS inicio  FROM pedido WHERE idpedido =$idpedido "; 
 		$ofset = $this->db->query($ofset)->result_array()[0]["inicio"];
 		for ($i=0; $i < count($semana); $i++) { 
 			
 			$semana[$i] = $semana[$i] + $ofset -1;
 		}
 		//$ofsetresponse= ; 
		 


 		$semanas = implode("," , $semana);	

 		$where="p.idpedido=$idpedido";
 		$where.=$tipo!=""?" and i.clasificacion='$tipo' ":"";
 		$where.=count($semana)>0?" and week(pa.fecha,1) in ( $semanas ) ":"";

 		$agrupado=$detalle>0?"d.cvedelegacion,":"";
 		$agrupado.=$detalle>1?"c.cveccdi,":"";
 		$agrupado.=$detalle>2?"p.idcasa,":"";


 		$sql="SELECT d.delegacion,c.ccdi, pa.idcasa,ca.localidad,ca.modalidad,i.nombre ingrediente,
			pa.unidad,pa.cantidad
			FROM pedido_casas_alimentos_diario pa
			inner join ingrediente i on i.idingrediente=pa.idingrediente
			inner join pedido p on p.idpedido=pa.idpedido
			inner join casas ca on ca.id=pa.idcasa
			inner join ccds c on c.cveccdi=ca.ccdi
			inner join delegaciones d on d.cvedelegacion=c.cvedelegacion
			WHERE $where
			GROUP BY $agrupado pa.idingrediente";

			

		/*$sql="SELECT delegaciones.delegacion ,  ccds.ccdi, 
		pedido_casas_alimentos_diario.idcasa, unidad, cantidad , costou , ingrediente.nombre ingrediente,			
			FROM pedido_casas_alimentos_diario, ingrediente , casas , ccds , delegaciones
			where idpedido=$idpedido $tipo AND 
			ingrediente.idingrediente= pedido_casas_alimentos_diario.idingrediente AND 
			casas.id = pedido_casas_alimentos_diario.idcasa AND 
			ccds.cveccdi = casas.ccdi ANd 
			delegaciones.cvedelegacion = ccds.cvedelegacion";
		*/	

 		$pedido=$this->db->query($sql);
 		return $pedido->result_array();
 		//return $ofsetresponse;
 	}
 	public function nuevo_pedido($fechas)
 	{
 		$num_dias=count($fechas);
 		$finicio=$fechas[0];
 		$ftermino=$fechas[$num_dias-1];
 		$this->db->query("INSERT INTO  pedido(dias,fecha_inicio,fecha_termino,fecha_elab) 
 			VALUES($num_dias,'$finicio','$ftermino',curdate())");
 		return $this->db->insert_id();
 	}
 
 	public function guardar_pedido_casas_alim($idpedido,$fechas,$casas){
 		$dias=count($fechas);
 		$casas="'".implode("','", $casas)."'";
 
 		$sql="INSERT INTO pedido_casas_alimentos_diario(idcasa,fecha,idingrediente,idpedido,cantidad,unidad,dia)
 		SELECT c.id idcasa,fecha,i.idingrediente,i.idpedido,
			if( c.modalidad='comedor',esc2*escolares+adolesh2*jovenesh+adolesm2*jovenesm+adolesh2*adultos,
			esc*escolares+adolesh*jovenesh+adolesm*jovenesm+adolesh*adultos
  			) as cantidad,i.unidad,i.dia
			FROM 
			(SELECT dia,pm.fecha,i.idingrediente,i.nombre alim,pm.idpedido,
 				oi.unidad,i.clasificacion as tipo,0 as costo,
	 			sum(adoles_h) adolesh, 
      			sum(adoles_m) adolesm,
      			sum(escolar) esc,
		 		sum(if(m.tiempo<>'cena',adoles_h,0)) adolesh2,
		 		sum(if(m.tiempo<>'cena',adoles_m,0)) adolesm2,
		 		sum(if(m.tiempo<>'cena',escolar,0)) esc2
		 		FROM pedido_menu pm
	            inner join menu m on m.idmenu=pm.idmenu
		 		inner join opcionmenu om on m.id_opcion=om.idopcionmenu
		 		inner join opcionmenuingrediente oi on om.idopcionmenu=oi.idopcionmenu
		 		inner join ingrediente i on oi.idingrediente=i.idingrediente
		 		where m.dia <=$dias and idpedido=$idpedido 
		 		GROUP BY  pm.fecha,i.idingrediente,i.unidad
		 	) AS i
            inner join casas c
            where c.id in($casas)";
            return $this->db->query($sql);
 	}
 	//se utiliza internamente para registro de pedido por casa
 	public function listado_alimentos_dias($dias)
 	{
 		$sql="SELECT dia,i.idingrediente as id,i.nombre alim,
 			oi.unidad,i.clasificacion as tipo,0 as costo,
	 		sum(adoles_h) adolesh, sum(adoles_m) adolesm,sum(escolar) esc,
	 		sum(if(m.tiempo<>'cena',adoles_h,0)) adolesh2,
	 		sum(if(m.tiempo<>'cena',adoles_m,0)) adolesm2,
	 		sum(if(m.tiempo<>'cena',escolar,0)) esc2
	 		FROM menu m 
	 		inner join opcionmenu om on m.id_opcion=om.idopcionmenu
	 		inner join opcionmenuingrediente oi on om.idopcionmenu=oi.idopcionmenu
	 		inner join ingrediente i on oi.idingrediente=i.idingrediente
	 		where m.dia <=$dias
	 		GROUP BY dia,i.idingrediente,unidad";

 		$alimentos=$this->db->query($sql);
 		return $alimentos->result_array();
 	}
 	
 	//se utiliza solamente para registrar pedidos
 	public function listado_casas_pedido($casas){
 		$casas="'".implode("','", $casas)."'";
 		$sql="SELECT id,modalidad,escolares,jovenesh,jovenesm,adultos 
 			FROM casas a
 			WHERE id in($casas)";
 		$casas=$this->db->query($sql);
 		return $casas->result_array();
 	}
//se utiliza solamente para relacionar el menú  seleccionado con el pedido
 	public function guardar_pedido_menu($pedido,$fechas,$prestablecido=1)
 	{
 		$dias=count($fechas);
 		//verificar si es menu prestablecido
 		if($prestablecido)
 		{
 		//asociar pedido, fechas y menu x dia
 			for ($i=0; $i <count($fechas) ; $i++) { 
 				# code...
	 		$this->db->query(
	 			"INSERT INTO pedido_menu(idpedido,idmenu,fecha) 
	 			SELECT $pedido as idpedido, idmenu,'".$fechas[$i]."'
	 			FROM menu 
	 			WHERE dia =$i+1");
 			}
 		}
 	}
}
?>