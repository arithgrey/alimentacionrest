<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{

		$data["titulo"]="Registro de tipos de alimentos y presentación";		
		$this->load->view("Template/header", $data);
		$this->load->view("backendplataforma/alimentos",$data);
		$this->load->view("Template/footer",$data);		
	}

	function ingrediente(){

		$data["titulo"]="Registro de ingredientes";		

		$this->load->view("Template/header", $data);
		$this->load->view("Frondend/menuregistro");
		$this->load->view("Template/footer",$data);		
	}

}