<?php
class Admin extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
        $this->load->model('admin/admin_model','admin');
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
        $this->my_library->logout();
    }

    public function template($param=NULL) {
        $data['title']='template page';
        $this->load->view('admin/template',$data);
    }

    public function chat_index(){
        $this->load->view('admin/chat/startChat');
    }

    function chat($you='admin'){
        $data['me'] = $this->session->userdata('username');
        $data['you'] = $you;
        $this->load->view('admin/chat/chatty', $data);
    }

    function get_all_chat_users(){
        $data['all_users']=$this->admin->get_all_users();
        $msg=$this->load->view('admin/chat/get_users_view',$data,TRUE);
        echo $msg;
    }

}
