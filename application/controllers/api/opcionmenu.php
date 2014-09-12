<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Opcionmenu extends REST_Controller{

        function registro_POST(){


            $opcionmenu=$this->input->post("opcionmenu");
            
            $this->load->model("opcionmenumodel");
            $responsedb = $this->opcionmenumodel->registroopcion($opcionmenu);

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
            $responserest="";
            if ($responsedb == true) {
            	
            	$responserest="Registro efectuado con éxito";
            }else{

            	$responserest="El registro fué efectuado con errores";
            }
            $this->response( $responserest);
<<<<<<< HEAD
=======
=======
            $this->response($responsedb);
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad

           
        }

<<<<<<< HEAD
        function listopciones_POST(){
=======
<<<<<<< HEAD
        function listopciones_GET(){
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad

        	$this->load->model("opcionmenumodel");
        	$responsesql = $this->opcionmenumodel->listopciones();
        	$this->response($responsesql);

        }


<<<<<<< HEAD
=======
=======
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad

}
