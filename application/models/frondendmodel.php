<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Frondendmodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
	function regtiposingredientes(){
	    
	     // $query_gettipos="select  idtipoingrediente , nombre, status  from tipoingrediente where status ='1'";    	      
	      $this->db->select('idtipoingrediente , nombre');
	      $this->db->where('status', '1'); 
	      $queryresult = $this->db->get('tipoingrediente');

	      return $queryresult->result_array(); 
	      

	    }
	function regresentacion(){
	    
	
	      $this->db->select('idpresentacion , nombre');
	      $this->db->where('status', '1'); 
	      $queryresult = $this->db->get('presentacion');
	      return $queryresult->result_array(); 
	      
	    }   

}

