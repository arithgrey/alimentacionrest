<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Menu extends REST_Controller{
  function __construct()
  {
    parent::__construct();
   $this->load->model("menumodel");
  }
  function registro_POST(){

    /*Cargamos el modelo menumodel*/
    
    $dia=$this->input->post("dia_semana");
    $idmenu=$this->input->post("idmenu");
    $tipo=$this->input->post("tipo");
    $tiempo=$this->input->post("tiempo");
    $platillo=$this->input->post("platillo");

   if($dia<1)
      $dia=$this->menumodel->obtener_dia();
   $reporte="";
   $reporte = $this->menumodel->registraplatillomenu( $dia ,  $tiempo,   $platillo , $tipo,$idmenu);
   $this->response($reporte);
  }



  function getmenubyday_GET(){

    $dia = $this->input->get("dia");
    $tiempo = $this->input->get("tiempo");
    $id = $this->input->get("id");
    if($id || $dia)
      $data = $this->menumodel->menu_dia($dia,$tiempo,$id);
    else
      $data = $this->menumodel->getmenubyday($dia,$tiempo,$id);

    $this->response($data);
  }



}