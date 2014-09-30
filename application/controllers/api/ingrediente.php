<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Ingrediente extends REST_Controller{
    

    function filtro_GET(){

            $this->load->model("ingredientemodel");        
            $this->ingredientemodel->filtro("agua");
            $this->response($lista);          
    }


    function listingrediente_POST(){


        $idtipoingrediente =$this->input->post("idtipoingrediente");
        
        if (strlen($idtipoingrediente) >0) {


            $this->load->model("ingredientemodel");        
            $lista = $this->ingredientemodel->listingrediente($idtipoingrediente); 
            $this->response($lista);  

        }else{

            $this->load->model("ingredientemodel");        
            $lista = $this->ingredientemodel->listingrediente();
            $this->response($lista);
            
        }
        
    }
    

    function registroingrediente_POST(){

        $this->load->model("ingredientemodel");

        $nombre= $this->input->post("nombreingrediente");
        $idtipoingrediente= $this->input->post("tipoingrediente");
        $idpresentacion= $this->input->post("presentacion");
        $clasificacion= $this->input->post("clasificacion");

        $ingretiente = $this->ingredientemodel->insertingrediente($nombre, $idtipoingrediente, $idpresentacion , $clasificacion );       

        $dataresponse="";
        if ($ingretiente == true) {
            $dataresponse  ="éxito en el registro";
        }else{
            $dataresponse = "Falla al intentar registrar";
        }

        $this->response($dataresponse);

    }

    
}
