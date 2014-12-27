<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Menumodel extends CI_Model {

    function __construct(){

        parent::__construct();        
        $this->load->database();
        
    }

    /*Registra cada uno de los platillos en el sistema para un menú*/
    function registraplatillomenu( $dia ,  $tiempo,   $id_opcion , $tipo,$idmenu="" ){

            if($idmenu)
            {
                $sql="UPDATE menu SET
                 id_opcion=$id_opcion
                 WHERE idmenu=$idmenu";
                $this->db->query($sql);
            }
            else
            {
                $sql="INSERT INTO menu (dia, tiempo , id_opcion , tipo ) VALUES($dia,'$tiempo',$id_opcion,'$tipo') ";
                $this->db->query($sql);
                $idmenu= $this->db->insert_id();
            }
    		return $this->menu_dia($dia,$tiempo,$idmenu);
    }	
    function obtener_dia()
    {
        $dia=0;
            $result = $this->db->query("SELECT MAX(dia)+1 AS dia FROM menu");
            $dia=$result->result_array()[0]["dia"];
            if($dia<1)
                $dia=1;
            return $dia;
    }
    
	function getmenubyday($day=0,$tiempo="",$id=''){
        $menu=[];
		//$this->db->where("dia" , $day);
        $registros=$this->db->query("select  count(distinct dia) dias FROM menu");

        //obtener el número de días
        $dias=$registros->result_array()[0]["dias"];
        if($day || $id)
            $menu=$this->menu_dia($day,$tiempo,$id);
        else
        for ($i=0; $i < $dias; $i++) 
            $menu[$i]=$this->menu_dia($i+1);
		return $menu; 
	}




    /**/
    function menu_dia($dia,$tiempo="",$id=""){
        $tabla="menu";
            $menu=[];
           $menu["dia"]=$dia;
           if($id!=""){
             $registros=$this->db->query("select o.tipo,o.idopcionmenu id,nombre opcionmenu,m.tipo,idmenu,dia,tiempo
                from $tabla m inner join 
                opcionmenu o on o.idopcionmenu=m.id_opcion
                where idmenu=$id");
            $menu=$registros->result_array();
           }
           elseif($tiempo!=""){
            $registros=$this->db->query("select o.tipo,o.idopcionmenu id,nombre opcionmenu,m.tipo,idmenu
                from $tabla m inner join 
                opcionmenu o on o.idopcionmenu=m.id_opcion
                where m.tiempo='$tiempo' and dia=".($dia));
            $menu[$tiempo]=$registros->result_array();
           }
           else
           {

            $registros=$this->db->query("select o.tipo,o.idopcionmenu id,nombre opcionmenu,m.tipo,idmenu
                from $tabla m inner join 
                opcionmenu o on o.idopcionmenu=m.id_opcion
                where m.tiempo='desayuno' and dia=".($dia));
            $menu["desayuno"]=$registros->result_array();
            
            $registros=$this->db->query("select o.tipo,o.idopcionmenu id,nombre opcionmenu,m.tipo,idmenu
                from $tabla m inner join 
                opcionmenu o on o.idopcionmenu=m.id_opcion
                where m.tiempo='comida' and dia=".($dia));
            $menu["comida"]=$registros->result_array();

            $registros=$this->db->query("select o.tipo,o.idopcionmenu id,nombre opcionmenu,m.tipo,idmenu
                from $tabla m inner join 
                opcionmenu o on o.idopcionmenu=m.id_opcion
                where m.tiempo='cena' and dia=".($dia));
            $menu["cena"]=$registros->result_array();
           }
            return $menu;
    }
    
    /**/

    function menu_diapedido($tiempo="",$id=""){

                $menu=[];                   

                $registros=$this->db->query("select o.tipo,o.idopcionmenu id,nombre opcionmenu,m.tipo,idmenu
                    from menu m inner join 
                    opcionmenu o on o.idopcionmenu=m.id_opcion
                    where m.tiempo='desayuno' and dia=".($i));
                $menu["desayuno"]=$registros->result_array();
                
                $registros=$this->db->query("select o.tipo,o.idopcionmenu id,nombre opcionmenu,m.tipo,idmenu
                    from menu m inner join 
                    opcionmenu o on o.idopcionmenu=m.id_opcion
                    where m.tiempo='comida' and dia=".($i));
                $menu["comida"]=$registros->result_array();

                $registros=$this->db->query("select o.tipo,o.idopcionmenu id,nombre opcionmenu,m.tipo,idmenu
                    from menu m inner join 
                    opcionmenu o on o.idopcionmenu=m.id_opcion
                    where m.tiempo='cena' and dia=".($i));
                $menu["cena"]=$registros->result_array();
            return $menu;

    }


}

