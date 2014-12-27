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
		$this->load->view("backendplataforma/pedidos",$data);
		$this->load->view("Template/footer",$data);		
	}

	function principal(){

		$data["titulo"]="Home";		
		$this->load->view("Template/header", $data);
		$this->load->view("backendplataforma/principalmenu",$data);
		$this->load->view("Template/footer",$data);			

	}


	function tipoingrediente(){

		$data["titulo"]="Tipo ingrediente";		
		$this->load->view("Template/header", $data);
		$this->load->view("backendplataforma/tipoingrediente",$data);
		$this->load->view("Template/footer",$data);		
	}

	function presentacion(){

		$data["titulo"]="Tipo ingrediente";		
		$this->load->view("Template/header", $data);
		$this->load->view("backendplataforma/presentaciones",$data);
		$this->load->view("Template/footer",$data);		
	}




	function ingrediente(){

		$data["titulo"]="Alimentos registro";		
		$this->load->view("Template/header", $data);
		$this->load->view("backendplataforma/ingredientes");
		$this->load->view("Template/footer",$data);		
	}


	function platillos(){

		$data["titulo"]="Opciones del menú";		

		$this->load->view("Template/header", $data);
		$this->load->view("backendplataforma/opcionesmenu");
		$this->load->view("Template/footer",$data);		

	}


	function menu(){

		$data["titulo"]="Opciones del menú";		

		$this->load->view("Template/header", $data);
		$this->load->view("backendplataforma/menus");
		$this->load->view("Template/footer",$data);		

	}
	function pedidos(){

		$data["titulo"]="Pedido";		

		$this->load->view("Template/header", $data);
		$this->load->view("backendplataforma/pedido");
		$this->load->view("Template/footer",$data);		

	}

	function alimentacion(){
		date_default_timezone_set('Africa/Lagos');	
		$data["titulo"]="Alimentación";		
		$descripciondia = array();
		/*Número del mes en el que nos encontramos*/
		$añoactual = date("Y");
		$numerodemes =  date("n");
		$numerodiasmes = days_in_month( $numerodemes , $añoactual);

		$a=1; 
		while ($a <= $numerodiasmes) {
			
			
			$descripciondia[$a] = $a ;			
			$a++;
		}					
		//$e= $this->name();
		$this->load->library('calendar');
		$calendario = $this->calendar->generate($añoactual, $numerodemes , $descripciondia);

		$data["calendario"] = $calendario;
		$data["añoactual"] = $añoactual;
		$data["numerodemes"] = $numerodemes;
		

		$this->load->view("Template/header", $data);
		$this->load->view("menu/home");
		$this->load->view("Template/footer",$data);		


	}
	

	


}