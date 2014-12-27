<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class backendmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    /**/
    function listtipoingrediente(){

      $query_list="SELECT * FROM tipoingrediente";     
      $result = $this->db->query($query_list);
      return $result->result_array();

    }

    function listpresentacion(){

      $query_list="SELECT * FROM presentacion";     
      $result = $this->db->query($query_list);
      return $result->result_array();
    }


    function listapresentacionesdeldia(){


      $query_list="SELECT * FROM presentacion";     
      $result = $this->db->query($query_list);
      return $result->result_array();
    }

   function getpresentacionbyid($id){

      $query_list="SELECT * FROM presentacion WHERE unidad='".$id."'";     
      $result = $this->db->query($query_list);
      return $result->result_array();

   }
    /**/
    function registrapresentacion($unidad , $presentacion , $factor , $descripcion ){
              
      $query_insert="INSERT INTO presentacion (unidad, equivalencia ,  factor , descripcion ) 
      VALUES('".$unidad."' , '".$presentacion."', '". $factor ."' , '".$descripcion."')";     

      $result = $this->db->query($query_insert);

      $databasemsj="";

      if ($result == 1) {
        $databasemsj="1";
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

    /*Regresa tipo alimento mediante el id*/
    function getTipoalimentoById($id){

      $query = $this->db->get_where('tipoingrediente', array('idtipoingrediente' => $id));
      return $query->result_array();

    } 

    function updatetipoingrediente($idtipoingrediente , $nombre , $descripcion){

      $data = array(
               'nombre' => $nombre,
               'descripcion' => $descripcion          
            );
      $this->db->where('idtipoingrediente', $idtipoingrediente);
      $result = $this->db->update('tipoingrediente', $data); 
      return $result;

    }

   function updatepresentacion( $unidad , $presentacion , $factor , $descripcion ){


        $data = array(
               'equivalencia' => $presentacion,
               'factor' => $factor, 
               'descripcion' => $descripcion          
            );

      $this->db->where('unidad', $unidad);
      $result = $this->db->update('presentacion', $data); 
      return $result;

    }

    function listarunidades(){

        $query = $this->db->get('unidad');
        return $query->result_array();        

    }


  

}



