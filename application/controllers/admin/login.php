<?php
class Login extends CI_Controller{
    public function  __construct() {
        parent::__construct();
        $this->my_library->logged_in();
        $this->load->library('form_validation');
        $this->load->model('admin/admin_model','admin');
        $this->load->helper('string');
    }

    public function index($param=NULL) {
        $data=array(
            'msg'=>'Login to proced',
            'info'=>$param,
            'title'=>'Login'
        );

        $this->load->view('admin/login_view',$data);
    }

    function validate(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[25]|xss_clean|callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $data=array(
                'username'=>  $this->input->post('username'),
                'logged_in' => TRUE,
                'chating_state'=>FALSE
            );
            
            $this->session->set_userdata($data);
            //session_start();
            //$_SESSION['username']=$this->session->userdata('username');
            redirect('admin/admin');
        }

    }

    public function username_check($str){
        $query=$this->admin->validate();
        if($query){
            return TRUE;
        }
        else{
            $this->form_validation->set_message('username_check', 'Username Password Combination did not match');
            return FALSE;
        }
    }

    public function forget_password(){
        $data=array(
            'msg'=>'Give your Username. Password will be send to your mail account.',
            'info'=>'',
            'title'=>'Forget Password'
        );

        $this->load->view('admin/forget_password',$data);
    }

    public function reset_password(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[25]|xss_clean|callback_username_exist_check');

        if ($this->form_validation->run() == FALSE)
        {
            $this->forget_password();
        }
        else
        {
            $username=$this->input->post('username');
            $password=random_string('alnum',10);

            $this->update_password($username,md5($password));
            $this->send_password($username,$password);
            redirect('admin/login');
        }
    }


    public function username_exist_check($str){
        $query=$this->admin->check_user_info($str);
        if($query){
            return TRUE;
        }
        else{
            $this->form_validation->set_message('username_exist_check', '%s "'.$str.'" don\'t exist');
            return FALSE;
        }
    }

    function send_password($username,$password){

            $query=$this->admin->get_user_info($username);
            foreach($query->result()as $row){
                    $email=$row->email;
                    $subject='password reseted';
                    $message='Username: '.
                              $username.
                              ' Password: '.
                              $password.
                              ' Click the following link '.
                              site_url("admin/login");
            
                $this->my_library->sendEmali($email,$message,$subject);
            }
    }

    function update_password($username,$password) {
        $data['username']=$username;
        $data['password']=$password;
        $query=$this->admin->update_info($data);
    }
}