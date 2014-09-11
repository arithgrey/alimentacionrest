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
	      
<<<<<<< HEAD
	 }   
	 function listopciones(){
	 	
	 	$this->db->select('idopcionmenu, nombre');
	 	$query = $this->db->get_where('opcionmenu', array('status' => "activo"));
	 	return $query->result_array();
	 	
	 	

	 }

=======
	    }   
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf

}

