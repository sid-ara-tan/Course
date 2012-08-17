<?php
class Login extends CI_Controller{
    public function  __construct() {
        parent::__construct();
    }

    public function index($param=NULL) {
        $data['title']='Login';
        $this->load->view('admin/login_view',$data);
    }
}