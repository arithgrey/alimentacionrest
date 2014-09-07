<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ingredientemodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
    /*Inserta ingredienten en la db*/
    function insertingrediente($nombre, $idtipoingrediente, 
        $idpresentacion, $unidad , $clasificacion ){

        $status=1;

        $query_insert="INSERT INTO ingrediente(nombre, idtipoingrediente, idpresentacion, unidad, clasificacion, status)
         VALUES('".$nombre."' , '".$idtipoingrediente."', '".$idpresentacion."', '".$unidad."', '".$clasificacion."', '". $status."'  ) ";     

        $result = $this->db->query($query_insert);
        $databasemsj="";

        if ($result == 1) {
          $databasemsj="Ingrediente registrado con éxito!!";
        }else{
          $databasemsj="Problemas al registrar el ingrediente en la base de datos";
        }

        return $databasemsj;  


    }

 }


 
