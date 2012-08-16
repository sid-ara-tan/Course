<?php
class Admin extends CI_Controller{
    public function index($param=NULL) {
        $data['title']='Home page';
        $this->load->view('admin/home',$data);
    }
}
