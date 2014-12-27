<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Opcionmenu extends REST_Controller{

    function registro_POST(){

        $cve=$this->input->post("cve");
        $tipo_platillo=$this->input->post("tipo_platillo");
        $desayuno=$this->input->post("desayuno");
        $comida=$this->input->post("comida");
        $cena=$this->input->post("cena");
        $platillo=$this->input->post("platillo");
        $status=$this->input->post("status")|| 1;
        $receta = $this->input->post("receta") || ""; 

        $this->load->model("opcionmenumodel");
        $responsedb = $this->opcionmenumodel->registroopcion($platillo,$tipo_platillo,$desayuno,$comida,$cena,$cve , $receta);
        return $this->response($responsedb);
/*        
        $responserest="";
        if ($responsedb == true) {
        	$responserest="Registro efectuado con éxito";
        }else{
        	$responserest="El registro fué efectuado con errores";
        }
        $this->response( $responserest);
        */
    }

           function listopciones_GET(){
            $this->load->model("opcionmenumodel");            
            $filtro = $this->input->get("filtro");
            $tipo =  $this->input->get("tipo");
            $tipo=strtolower($tipo);
            if($tipo=="guarnicion1" || $tipo=="guarnicion2")
                $tipo="guarnicion";

            //$filtro = "Desayuno";
            //$tipo = "BEBIDA";
            $responsesql = $this->opcionmenumodel->listopcionesporfiltro($filtro , $tipo );



            $this->response($responsesql);

        }
        function list_tipo_GET(){

        }   
            
        function getelementbyid_GET(){
            
            $this->load->model("opcionmenumodel");
            $opcionmenuid = $this->input->get("opcionmenuid");
            $elemento = $this->opcionmenumodel->getopcionmenubyid($opcionmenuid);
            $this->response($elemento);

         }   
         
        function listatabla_GET(){

            $this->load->model("opcionmenumodel");
            
            $tipo=$this->input->get("tipo_platillo");
            $platillo=$this->input->get("platillo");

            $responsesql = $this->opcionmenumodel->listado_tabla($platillo,$tipo);
            $this->response($responsesql);

        }

        function listaingredienteporplatillo_GET(){

            $this->load->model("opcionmenumodel");
            $idplatillo= $this->input->get("idplatillo");
            $idingredopcion= $this->input->get("idingredopcion");
            $responsesql = $this->opcionmenumodel->listaingredienteporplatillo($idplatillo,$idingredopcion);
            $this->response($responsesql);

        }


        function registroingrediente_POST(){

            $id = $this->input->post("idplatillo"); 

            $this->load->model("opcionmenumodel");
            
                $datareponse = $this->opcionmenumodel->registroingrediente(
                $this->input->post("idplatillo") ,
                $this->input->post("ingrediente") ,
                $this->input->post("unidad") ,
                $this->input->post("cant_escolar") ,
                $this->input->post("cant_adoles_h"),
                $this->input->post("cant_adoles_m")
                );

                $this->response($datareponse);        
            
            
            
        }




}
