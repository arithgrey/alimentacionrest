<?php defined('BASEPATH') OR exit('No direct script access allowed');
class usermodel extends CI_Model {

    function __construct(){
        parent::__construct();        
        $this->load->database();
    }

    function validaaccessuser( $emailaccess , $passwordaccess){

        return $emailaccess  . "--->> ". $passwordaccess;

    } 

    function registrousern($pw , $usermail){

        return $pw ."---->".$usermail;
    }

 }


 
