<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ingredientemodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    function listingrediente(){

        $querylist="select ingrediente.nombre as nombreingrediente , idingrediente , unidad, 
        ingrediente.status as estado, tipoingrediente.nombre,  tipoingrediente.descripcion , 
        presentacion.nombre as nombrepresentacion from ingrediente, tipoingrediente,
        presentacion where ingrediente.idtipoingrediente=tipoingrediente.idtipoingrediente
        and ingrediente.idpresentacion = presentacion.idpresentacion";

        $result = $this->db->query($querylist);
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


 
