<?php
class Admin extends CI_Controller{
    public function index(){
        $data['title']='Admin Home page';
        $this->load->view('admin_home',$data);
    }
}