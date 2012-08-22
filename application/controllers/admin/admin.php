<?php
class Admin extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
    }

    public function index($param=NULL) {        
        $data=array(
            'msg'=>'Welcome to Admin Panel',
            'info'=>$param,
            'title'=>'Home'
        );
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
