<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Menu extends REST_Controller{

        function registro_POST(){


            $tiempo =$this->input->post("tiempo");
            $platillo=$this->input->post("platillo");
            $this->load->model("menumodel");

            $fechaprogramada ="";
            $diafijo = "";
            $fechafestivo ="";
            $nombre ="";



            $e= $this->menumodel->registramenu( $fechaprogramada, $diafijo,  $tiempo, $fechafestivo, $nombre , $platillo);

            $this->response($e);

            

        }
}
