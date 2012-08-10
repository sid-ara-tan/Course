<?php
class Student_home extends CI_controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->my_library->is_logged_in();
    }
    
    function index(){
        $this->load->view('student_home');
    }
}