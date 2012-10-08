<?php
class Logout extends CI_Controller{
        function __construct(){
            parent::__construct();
            //$this->my_library->is_logged_in();
            $this->load->helper('url');
            $this->load->helper('form');
        }

        function index(){
            $this->load->library('session');
            $this->session->sess_destroy();
            redirect('Course');
        }
}
