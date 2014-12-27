<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Ingrediente extends REST_Controller{
    

    function filtro_GET(){

            $this->load->model("ingredientemodel");        
            $this->ingredientemodel->filtro("agua");
            $this->response($lista);          
    }

    function  getunidad_GET(){

        $this->load->model("ingredientemodel");  
        $data = $this->ingredientemodel->getunidad();
        $this->response($data);
    }

    function listingrediente_GET(){


        $idtipoingrediente =$this->input->get("idtipoingrediente");
        $corto =$this->input->get("corto")?true:false;
        $this->load->model("ingredientemodel");
        $lista = $this->ingredientemodel->listingrediente($corto); 
        $this->response($lista); 
    }
    function getalimentobyid_GET(){

        $alimentoid = $this->input->get("idalimento");
        $this->load->model("ingredientemodel");
        $elemento  = $this->ingredientemodel->getalimentobyid($alimentoid); 
        $this->response($elemento);


    }
    

    function registroingrediente_POST(){

        $this->load->model("ingredientemodel");
        

        $id  = $this->input->post("clave");
        $nombre= $this->input->post("nombre");
        $tipo= $this->input->post("tipo");
        $unidad= $this->input->post("unidad");
        $clasif= $this->input->post("clasif");
        $status= $this->input->post("status");

        $ingretiente = $this->ingredientemodel->insertingrediente($id, $nombre, $tipo, $unidad , $clasif , $status );       

        $this->response($ingretiente);
    }
}
