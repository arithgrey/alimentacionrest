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
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde
            $responserest="";
            if ($responsedb == true) {
            	
            	$responserest="Registro efectuado con éxito";
            }else{

            	$responserest="El registro fué efectuado con errores";
            }
            $this->response( $responserest);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
            $this->response($responsedb);
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde

           
        }

<<<<<<< HEAD
        function listopciones_POST(){
=======
<<<<<<< HEAD
        function listopciones_POST(){
=======
<<<<<<< HEAD
        function listopciones_POST(){
=======
<<<<<<< HEAD
        function listopciones_POST(){
=======
<<<<<<< HEAD
        function listopciones_GET(){
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde

        	$this->load->model("opcionmenumodel");
        	$responsesql = $this->opcionmenumodel->listopciones();
        	$this->response($responsesql);

        }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde
        function relacionaopcioningrediente_POST(){

            $opcionmenu = $this->input->post("opcionmenu");    
            $ingrediente = $this->input->post("ingrediente");
            
            $this->load->model("opcionmenumodel");
            $datareponse = $this->opcionmenumodel->ediataopcionmenuingrediente($opcionmenu , $ingrediente);
            if ($datareponse ==1 ) {
                $datareponse ="Movimiento exitoso";
            }else{
                $datareponse ="Movimiento Fallido";
            }
            $this->response($datareponse);            
        }


<<<<<<< HEAD

=======
=======

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> e1a461b9cbeec6a3acba695ce7a1531308ea65bf
>>>>>>> 2e0fcf702d99f5b81cfd49e162676a191427b6ad
>>>>>>> 36ecdae996985f1e7a575e130763e1d696ba3eee
>>>>>>> 8cfe4435da34a089fc4147ddcf74339330108ed4
>>>>>>> bcc3e010af37d046f2f3a6d7507b0d5296117bde

}
