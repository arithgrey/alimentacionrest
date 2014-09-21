<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class opcionmenumodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
	
	function registroopcion($nombre){
	  
	    $data = array('nombre' => $nombre, 'status'=> '1' );
		$responsemysql= $this->db->insert('opcionmenu', $data); 

	   	return $responsemysql; 
	      
	 }   
	 function listopciones(){
	 	
	 	$this->db->select('idopcionmenu, nombre');
	 	$query = $this->db->get_where('opcionmenu', array('status' => "activo"));
	 	return $query->result_array();
	 }
	 function ediataopcionmenuingrediente($opcionmenu , $ingrediente){

	 	$query_exist= "SELECT * FROM opcionmeningrediente WHERE  idopcionmenu='".$opcionmenu."' AND idingrediente='".$ingrediente."'   "; 
	 	$result_existe = $this->db->query($query_exist);
	 	$existente= $result_existe->num_rows();
	 	
	 	if ($existente == 0){
	 		
	 		$registro = "INSERT INTO opcionmeningrediente (idopcionmenu, idingrediente) VALUES('".$opcionmenu."' ,  '".$ingrediente."')";	
	 		$result_registro = $this->db->query($registro);
	 		return $result_registro;

	 	}else{

	 		$delete = "DELETE FROM  opcionmeningrediente WHERE  idopcionmenu='".$opcionmenu."' AND idingrediente='".$ingrediente."'";	
	 		$result_delete = $this->db->query($delete);
	 		return $result_delete;
	 	}
	 
	 }


}

