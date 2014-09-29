<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function principal(){

		$data["titulo"]="Menu";		
		$this->load->view("Template/header", $data);
		$this->load->view("menu/principal",$data);
		$this->load->view("Template/footer",$data);	

	}



}