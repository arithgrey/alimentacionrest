<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class backendmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();
        

    }

    function registrapresentacion($nombre , $descripcion){
  
      $this->load->database();
      
      $query_insert="INSERT INTO presentacion (nombre, descripcion, status) VALUES('".$nombre."' , '".$descripcion."', '1'  ) ";     
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

  		$this->load->database();
  		
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



