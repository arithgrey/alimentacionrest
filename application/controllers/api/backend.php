<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Backend extends REST_Controller{

        function registro_POST(){

            $this->load->model("backendmodel");
            
            $nombre = $this->input->post("nombre");
            $descripcion = $this->input->post("descripcion");

            $databasemsj = $this->backendmodel->registratipoingrediente($nombre , $descripcion);

            $data["nombre"]=$nombre;
            $data["descripcion"]=$descripcion;
            $data["databasemsj"]=$databasemsj;

            $this->response($data);
    }
    function registropresentacion_POST(){

            $this->load->model("backendmodel");
            $nombre = $this->input->post("nombre");
            $descripcion = $this->input->post("descripcion");

            $databasemsj = $this->backendmodel->registrapresentacion($nombre , $descripcion);

            $data["nombre"]=$nombre;
            $data["descripcion"]=$descripcion;
            $data["databasemsj"]=$databasemsj;

            $this->response($data);

    }
    
    function listtipos_GET(){

            $this->load->model("backendmodel");            
            $data = $this->backendmodel->listtipoingrediente();
            $this->response($data);
    }

    function listpresentacion_GET(){

            $this->load->model("backendmodel");            
            $data = $this->backendmodel->listpresentacion();
            $this->response($data);
    }



}
