<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class opcionmenumodel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	function registroopcion($nombre,$tipo,$desayuno,$comida,$cena,$id="",$receta=""){
		if($id==""){
	    $data = array('nombre' => $nombre,
	    	 'tipo'=>$tipo,
	    	'desayuno'=>$desayuno,'comida'=>$comida,
	    	'cena'=>$cena);
		$responsemysql= $this->db->insert('opcionmenu', $data); 
		$id=$this->db->insert_id();
	}
	else{
	 	$data = array(
               'nombre' => $nombre,
               'tipo' => $tipo,
               'desayuno'=>$desayuno,'comida'=>$comida,'cena'=>$cena
            );

		$this->db->where("idopcionmenu", $id);
		$result = $this->db->update('opcionmenu', $data);
	}

		$resultado["id"]=$id;
		$resultado["ingreds"]=$this->listaingredienteporplatillo($id);
		return $resultado;
	   	//return $responsemysql; 
	 }   

	 function listopcionesporfiltro($tiempo , $tipo ){

		$query=$this->db->query("SELECT idopcionmenu id , nombre 
			FROM  opcionmenu 
			WHERE $tiempo>0 and tipo='$tipo'");

	 	return $query->result_array();
	 }

	 function listopciones(){
	 	
	 	$this->db->select('idopcionmenu id , nombre');
	 
	 	$query = $this->db->get_where('opcionmenu');
	 	return $query->result_array();
	 }
	  function listado_tabla($platillo="",$tipo=""){
	 	if($tipo)
	 		$this->db->where("tipo",$tipo);
	 	if($platillo)
	 		$this->db->where("nombre like '%$platillo%'");
	 	$this->db->select('idopcionmenu id,tipo,nombre platillo,desayuno des,comida com ,cena');	 
	 	$query = $this->db->get_where('opcionmenu');
	 	return $query->result_array();
	 }

	 function getopcionmenubyid($idopcionmenu){

	 	$this->db->where('idopcionmenu', $idopcionmenu); 
	 	$query = $this->db->get('opcionmenu');
	 	return $query->result_array();

	 }

	
	 /*Registra*/
	 function registroingrediente($idplatillo, $ingrediente , $unidad , $cant_escolar , $cant_adoles_h, $cant_adoles_m){	
			
	 		/*Insertamos elemenentos a la base de datos */
	 	$sql="INSERT INTO opcionmenuingrediente(
	 		idopcionmenu,idingrediente,unidad,
			escolar,adoles_m,adoles_h)
			VALUES
			($idplatillo,$ingrediente,'$unidad',$cant_escolar,$cant_adoles_m,$cant_adoles_h)
			ON DUPLICATE KEY UPDATE
			idingrediente=$ingrediente,unidad='$unidad',
			escolar=$cant_escolar,adoles_m=$cant_adoles_m,adoles_h=$cant_adoles_h";
			$consulta=$this->db->query($sql);

			$consulta=$this->db->query("select oi.*,i.nombre ingred
				from opcionmenu o inner join opcionmenuingrediente oi on oi.idopcionmenu=o.idopcionmenu
				inner join ingrediente i on i.idingrediente=oi.idingrediente
				where oi.idingrediente=$ingrediente and o.idopcionmenu=$idplatillo");
			return $consulta->result_array();	 		

	 }
	 function listaingredienteporplatillo($idplatillo,$idingredopcion=""){
	 	if($idingredopcion)
	 		$where="id=$idingredopcion";
	 	else
	 		$where="o.idopcionmenu=$idplatillo ";

	 		$idingredopcion="and id=$idingredopcion";
	 	$consulta=$this->db->query("SELECT oi.*,i.nombre ingred
				FROM opcionmenu o inner join opcionmenuingrediente oi on oi.idopcionmenu=o.idopcionmenu
				inner join ingrediente i on i.idingrediente=oi.idingrediente
				WHERE $where");
	 	return $consulta->result_array();
	 }


}


