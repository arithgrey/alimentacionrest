<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class backendmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    /**/
    function listtipoingrediente(){

      $query_list="SELECT nombre FROM tipoingrediente";     
      $result = $this->db->query($query_list);
      return $result->result_array();

    }

    function listpresentacion(){

      $query_list="SELECT nombre FROM presentacion";     
      $result = $this->db->query($query_list);
      return $result->result_array();
    }

    /**/
    function registrapresentacion($nombre , $descripcion, $unidad, $equivalencia){
              
      $query_insert="INSERT INTO presentacion (nombre, descripcion, status, unidad, equivalencia) 
      VALUES('".$nombre."' , '".$descripcion."', '1' , '". $unidad ."' , '".$equivalencia."' ) ";     
      $result = $this->db->query($query_insert);

      $databasemsj="";

      if ($result == 1) {
        $databasemsj="presentacion registrada con éxito!!";
      }else{
        $databasemsj="Problemas al registrar la presentación  en la base de datos";
      }

      return $databasemsj;      

    }

  	function registratipoingrediente($nombre , $descripcion){
    	
  		$query_insert="INSERT INTO tipoingrediente (nombre, descripcion, status) VALUES('".$nombre."' , '".$descripcion."', '1'  ) ";  		
  		$result = $this->db->query($query_insert);

    		$databasemsj="";

    		if ($result == 1) {
    			$databasemsj="Tipo de ingrediente registrado con éxito!!";
    		}else{
    			$databasemsj="Problemas al registrar en la base de datos";
    		}

    		return $databasemsj;

  	}



    


}



