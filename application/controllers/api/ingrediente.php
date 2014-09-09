<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Ingrediente extends REST_Controller{
    

    function listingrediente_POST(){

        $this->load->model("ingredientemodel");        
        $lista = $this->ingredientemodel->listingrediente();
        $this->response($lista);

    }

    function registroingrediente_POST(){

        $this->load->model("ingredientemodel");

        $nombre= $this->input->post("nombreingrediente");
        $idtipoingrediente= $this->input->post("tipoingrediente");
        $idpresentacion= $this->input->post("presentacion");
        $unidad= $this->input->post("unidad");
        $clasificacion= $this->input->post("clasificacion");


        $ingretiente= $this->ingredientemodel->insertingrediente($nombre, $idtipoingrediente, 
        $idpresentacion, $unidad , $clasificacion );

        $data="";
        if ($ingretiente == 1 ) {
            $data="Éxito al registrar";    
        }else{
            $data="Falla en el registro";   
        }
        $this->response($data);
    }


    
}
