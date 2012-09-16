<?php
class Teacher_message extends CI_Controller{
    private $name='';
    private $designation='';
    function __construct(){
        parent::__construct();
        $this->load->library(array('session','table'));
        $this->my_library->is_logged_in();

        $this->load->model('teacher');
        $row=$this->teacher->get_info();
        $this->name=$row->Name;
        $this->designation=$row->Designation;
    }

    function index(){
        $data['name']=$this->name;
        $data['designation']=$this->designation;
        $this->load->model('teacher');
        $this->load->model('message');
        $this->load->model('comment');
        $this->load->model('teacher');
        $this->load->model('student');
        $this->load->model('exam');
        
        $data['querymsg']=$this->message->get_message_for_all(10,$this->uri->segment(3,0));
       // $this->load->view('message_view',$data);
       //$data['querymsg'] =$this->message->getallmessage($courseno,$config['per_page'],$offset);
        //comment
       
        // for pagination

        $config['total_rows'] =  $this->message->get_message_count_for_all();
        $config['base_url'] = base_url().'index.php/teacher_message/index/';
        $config['per_page'] ='10';
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
	$this->pagination->initialize($config);
        $this->load->view('message_view',$data);

    }
}