<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Menumodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
	function registramenu( $fechaprogramada , $diafijo,  $tiempo, $fechafestiva, $nombre){
	    

		$query = $this->db->get_where('menu', array('fechaprogramada' => "2014-09-25 19:28:14"));

				
	    return $query->result_array(); 
	     
	 }


}

