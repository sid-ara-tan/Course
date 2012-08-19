<?php
class Admin extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
    }

    public function index($param=NULL) {
        
        $data['title']='Home page';
        $this->load->view('admin/home',$data);
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    public function template($param=NULL) {

        $data['title']='template page';
        $this->load->view('admin/template',$data);
    }

}
