<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Opcionmenu extends REST_Controller{

        function registro_POST(){


            $opcionmenu=$this->input->post("opcionmenu");
            
            $this->load->model("opcionmenumodel");
            $responsedb = $this->opcionmenumodel->registroopcion($opcionmenu);

            $this->response($responsedb);

           
        }


}
