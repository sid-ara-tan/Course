<?php

class Student_home_group extends CI_controller {

    private $query_student='';
    private $query_taken_course='';
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('student');
        $this->load->model('course');
        $this->my_library->is_logged_in();
        
        $this->query_student = $this->student->get_info();
        $this->query_taken_course=$this->course->get_courses();
    }

    function group() {
        $courseno=$this->uri->segment(3);
        
        if($this->uri->segment(4)=='posted')$data['notification']="Message have been posted";
        elseif($this->uri->segment(4)=='deleted')$data['notification']="Message have been deleted";
        else $data['notification']="";
        
        $this->load->model('content');
        $this->load->model('message');
        
        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        
        $record=$this->content->get_content($courseno,0);
        $data['record']=$record;
        
        foreach ($this->query_taken_course->result_array() as $value) {
            if($courseno==$value['CourseNo'])$data['coursename']=$value['CourseName'];
        }
        //echo $courseno;
        $user_id=$this->session->userdata['ID'];
        $data['query_student']=$this->db->query("select Name from Student where S_Id='$user_id'");
        $data['querymsg'] =$this->message->getallmessage($courseno);
                        
        $this->load->view('student_group_page', $data);
    }
    
    function group_message()
    {
        $this->load->model('message');
        
        if($this->uri->segment(3)=='post')
        {
            $sub=nl2br(strip_quotes($this->input->post('subject')));
            $msg=nl2br(strip_quotes($this->input->post('message')));

            $this->message->insert($sub,$msg,$this->input->post('courseno'));

            //echo $this->input->post('courseno');
            redirect('student_home_group/group/'.$this->input->post('courseno').'/posted');
        }
        
        if($this->uri->segment(3)=='delete')
        {
            //echo $this->encrypt->decode(urldecode($this->uri->segment(4)));
            $msg_id=$this->uri->segment(4);
            $courseno=$this->uri->segment(5);
            $this->message->delete($msg_id,$courseno);
            redirect('student_home_group/group/'.$courseno.'/deleted');
            
        }
    }
    

}