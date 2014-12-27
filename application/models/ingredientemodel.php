<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ingredientemodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    function filtro($text){


        $queryfind ="SELECT * FROM ingrediente WHERE nombre='".$text."' ";
        $result = $this->db->query($queryfind); 
        return $result->result_array();        

    }


    function listingrediente($corto=false, $ingrediente="",$tipo =''){
if($corto)
        $querylistid="SELECT idingrediente id , nombre 
            FROM ingrediente  
            WHERE nombre like '$ingrediente%'";
    else
        $querylistid="SELECT i.nombre as nombreingrediente , idingrediente , clasificacion , unidad , 
            i.status as estado, t.nombre,  t.descripcion
            FROM ingrediente i inner join tipoingrediente t on i.idtipoingrediente=t.idtipoingrediente";

        $result = $this->db->query($querylistid);    
        return $result->result_array();
    }


    /**/
    function getalimentobyid($alimentoid){
        
        $this->db->where('idingrediente', $alimentoid); 
        $query = $this->db->get('ingrediente');        
        return $query->result_array();
    }

    /*Inserta ingredienten en la db*/
    function insertingrediente($id, $nombre, $tipo, $unidad , $clasif , $status ){

        $checkprev = "SELECT * FROM ingrediente  WHERE idingrediente ='".$id."' ";
        $resultcheck = $this->db->query($checkprev);
        $exist = $resultcheck->num_rows();

        if ($exist == 0) {
            //Registra             
           $data = array(
               'nombre' => $nombre ,
               'idtipoingrediente' => $tipo ,
               'status' => $status,
               'clasificacion' => $clasif,
               'unidad' => $unidad,
            );
            $result = $this->db->insert('ingrediente', $data); 
            return $result;
        }
        else{
            $data = array(
                           'nombre' => $nombre ,
                           'idtipoingrediente' => $tipo ,
                           'status' => $status,
                           'clasificacion' => $clasif,
                           'unidad' => $unidad,
                        );
            $this->db->where("idingrediente",$id);
            $result = $this->db->update('ingrediente', $data); 
                    return $result;
            //Edita
            return "Editando";
        }

    }

    function getunidad(){

        $query ="SELECT unidad FROM  presentacion";     
        $result = $this->db->query($query);
        return $result ->result_array();

    }

 }


 
