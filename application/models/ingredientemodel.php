<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ingredientemodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    function listingrediente($idtipoingrediente ='' ){

        $querylist="select ingrediente.nombre as nombreingrediente , idingrediente , unidad, 
        ingrediente.status as estado, tipoingrediente.nombre,  tipoingrediente.descripcion , 
        presentacion.nombre as nombrepresentacion from ingrediente, tipoingrediente,
        presentacion where ingrediente.idtipoingrediente=tipoingrediente.idtipoingrediente
        and ingrediente.idpresentacion = presentacion.idpresentacion";

        $querylistid="SELECT idingrediente , nombre as nombreingrediente FROM ingrediente  WHERE idtipoingrediente='".$idtipoingrediente."'";

        if (strlen($idtipoingrediente)>0) {
            $result = $this->db->query($querylistid);    
        }else{
            $result = $this->db->query($querylist);    
        }

        return $result->result_array();

    }

    /*Inserta ingredienten en la db*/
    function insertingrediente($nombre, $idtipoingrediente, $idpresentacion, $clasificacion ){

        $status=1;

        $query_insert="INSERT INTO ingrediente(nombre, idtipoingrediente, idpresentacion, clasificacion, status)
         VALUES('".$nombre."' , '".$idtipoingrediente."', '".$idpresentacion."',  '".$clasificacion."', '". $status."'  ) ";     

        $result = $this->db->query($query_insert);
        return $result;
        


    }

 }


 
