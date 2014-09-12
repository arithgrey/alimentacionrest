<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Opcionmenu extends REST_Controller{

        function registro_POST(){


            $opcionmenu=$this->input->post("opcionmenu");
            
            $this->load->model("opcionmenumodel");
            $responsedb = $this->opcionmenumodel->registroopcion($opcionmenu);

            $responserest="";
            if ($responsedb == true) {
            	
            	$responserest="Registro efectuado con éxito";
            }else{

            	$responserest="El registro fué efectuado con errores";
            }
            $this->response( $responserest);

           
        }

        function listopciones_POST(){

        	$this->load->model("opcionmenumodel");
        	$responsesql = $this->opcionmenumodel->listopciones();
        	$this->response($responsesql);

        }



}
