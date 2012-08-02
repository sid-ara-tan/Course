<?php
class Student_home extends CI_controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->is_logged_in();
    }
    
    function is_logged_in(){
        $is_logged_in=$this->session->userdata('is_logged_in');
        
        if(!isset($is_logged_in) || $is_logged_in!=TRUE){
            echo 'Please <a href="course">login </a>';
            die();
        }
    }
    
    function index(){
        echo "hello student";
    }
}