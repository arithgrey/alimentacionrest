<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Frondend extends REST_Controller{


    function listtiposingredientes_POST(){

        $this->load->model("frondendmodel");
        $tipoingretientes = $this->frondendmodel->regtiposingredientes();
        $data = $tipoingretientes;        
        $this->response($data);
    }


    function listpresentacion_POST(){

        $this->load->model("frondendmodel");
        $tipoingretientes = $this->frondendmodel->regresentacion();
        $data = $tipoingretientes;        
        $this->response($data);
    }
    
    
}
