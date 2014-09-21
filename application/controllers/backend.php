<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{

		$data["titulo"]="Panel de administración";		
		$this->load->view("Template/header", $data);
		$this->load->view("backendplataforma/alimentos",$data);
		$this->load->view("Template/footer",$data);		
	}

	function ingrediente(){

		$data["titulo"]="Alimentos registro";		

		$this->load->view("Template/header", $data);
		$this->load->view("Frondend/menuregistro");
		$this->load->view("Template/footer",$data);		
	}
	function opcionesmenu(){

		$data["titulo"]="Opciones del menú";		

		$this->load->view("Template/header", $data);
		$this->load->view("Frondend/menu");
		$this->load->view("Template/footer",$data);		

	}
	function asignaringredientes(){

		$data["titulo"] = "Asignar ingredientes a las opciones de menú";
		
		$this->load->view("Template/header", $data);
		$this->load->view("Frondend/asignar");
		$this->load->view("Template/footer",$data);		

	}


}