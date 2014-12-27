<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Calendario extends REST_Controller{


    function generate_GET(){

        $num = $this->input->get("num_dias");
        $this->response($num);
    }
       

}
