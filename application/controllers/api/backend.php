<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Backend extends REST_Controller{

        function registro_POST(){


            $this->load->model("backendmodel");
            $nombre = $this->input->post("tipo");
            $descripcion = $this->input->post("descrip");
            $idtipoingrediente = $this->post("idtipoingrediente");


            if (strlen($idtipoingrediente) > 0 ) {

                   $databasemsj = $this->backendmodel->updatetipoingrediente($idtipoingrediente , $nombre , $descripcion); 
                   $this->response($databasemsj);

            }else{

                
                $databasemsj = $this->backendmodel->registratipoingrediente($nombre , $descripcion);

                $data["nombre"]=$nombre;
                $data["descripcion"]=$descripcion;
                $data["databasemsj"]=$databasemsj;

                $this->response($data);

            }

            
    }

    /*Registro de las presentaciones */

    function listapresentacionesdeldia_GET(){
        
        $this->load->model("backendmodel");        
        $data=$this->backendmodel->listapresentacionesdeldia();
        $this->response($data);
    }



    function registropresentacion_POST(){

            $this->load->model("backendmodel");
            $pre = $this->input->post("pre");
            $unidad =$this->input->post("unidad");    
            $presentacion = $this->input->post("presentacion");        
            $factor = $this->input->post("factor");
            $descripcion = $this->input->post("descripcion");
            
            if ($pre == "1") {
                
                $msj = $this->backendmodel->updatepresentacion( $unidad, $presentacion , $factor , $descripcion );
                $this->response($msj);

            }else{

            $databasemsj = $this->backendmodel->registrapresentacion($unidad , $presentacion , $factor , $descripcion );

                if ($databasemsj == 1  ) {
                    
                    $this->response($databasemsj);    
                }else{
                    $this->response("Falla en registro");
                }   

            }

    }
    
   function getpresentacionbyid_GET(){

            $id= $this->input->get("id"); 
            $this->load->model("backendmodel");            
            $data = $this->backendmodel->getpresentacionbyid($id);
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
    /*Listar las unidades del sistema*/
    function listunidades_GET(){

        $this->load->model("backendmodel");
        $data = $this->backendmodel->listarunidades();
        $this->response($data);

    }
    function gettipoalimentobyid_GET(){

        $id= $this->input->get("edit_id");
        $this->load->model("backendmodel");
        $data = $this->backendmodel->getTipoalimentoById($id);
        $this->response($data);

    }
    /*Actualiza los datos en la base de datos de los tipos de alimentos */    



}
