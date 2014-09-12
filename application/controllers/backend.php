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

<<<<<<< HEAD
		$data["titulo"]="Opciones del menú";		
=======
<<<<<<< HEAD
		$data["titulo"]="Opciones del menú";		
=======
<<<<<<< HEAD
		$data["titulo"]="Opciones del menú";		
=======
		$data["titulo"]="opciones del menú";		
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee

		$this->load->view("Template/header", $data);
		$this->load->view("Frondend/menu");
		$this->load->view("Template/footer",$data);		

	}
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
	function asignaringredientes(){

		$data["titulo"] = "Asignar ingredientes a las opciones de menú";
		
		$this->load->view("Template/header", $data);
		$this->load->view("Frondend/asignar");
		$this->load->view("Template/footer",$data);		

	}

<<<<<<< HEAD
=======
=======
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee

}