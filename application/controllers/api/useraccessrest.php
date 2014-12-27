<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Useraccessrest extends REST_Controller{

    function __construct(){        

        parent::__construct();
        $this->load->model("usermodel");

  }

    function checkuseraccount_POST(){
            
        $emailaccess = $this->input->post("emailaccess");        
        $passwordaccess = $this->input->post("passwordaccess");
        $rdb =  $this->usermodel->validaaccessuser( $emailaccess , $passwordaccess);



        $this->response( $rdb );


    }
    function validadata_POST(){

         $usermail  = $this->input->post("usermail");
         $pw  =  $this->input->post("pw");   
         $rdb =  $this->usermodel->registrousern($pw , $usermail);

         $this->response($rdb);
    }

}

