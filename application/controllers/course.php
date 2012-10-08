<?php
class Course extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->my_library->not_logged_in();
        $this->load->helper('url');
        $this->load->helper('form');
    }
    
    function index($message=''){
        $data['message']=$message;
        
        $this->load->view('login_view',$data);
        //$this->load->view('temphome');
        
    }
    
    function verify_id(){
        
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('ID','ID','required');
        $this->form_validation->set_rules('password','Password','required');
        $id=$this->input->post('ID');
        $type=$this->input->post('type');
        $password=$this->input->post('password');
        
        if($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            if($type=='teacher'){
                $this->load->model('teacher');
                
                if($this->teacher->verify_ID_password($id,$password)==TRUE){
                    $data=array(
                            'ID'=>$id,
                            'type'=>'teacher',
                            'is_logged_in'=>TRUE
                        );
                    $this->session->set_userdata($data);
                    redirect('teacher_home');
                }
                else{
                    $this->index('Teacher ID and Password do not match');
                }
            }
            else{
                $this->load->model('student');
                
                if($this->student->verify_ID_password($id,$password)==TRUE){
                    $data=array(
                            'ID'=>$id,
                            'type'=>'student',
                            'is_logged_in'=>TRUE
                        );
                    $this->session->set_userdata($data);
                    redirect('student_home');
                }
                else{
                    $this->index('Student ID and Password do not match');;
                }
            }
            
            
        }
        
    }

    function logout(){
        $this->load->library('session');
        $this->session->sess_destroy();
        $this->index();
    }
}