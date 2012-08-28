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
        
        if($this->uri->segment(4)=='posted')$data['notification']="Message has been posted";
        elseif($this->uri->segment(4)=='deleted')$data['notification']="Message has been deleted";
        else $data['notification']="";
        
        $this->load->model('content');
        $this->load->model('message');
        $this->load->model('comment');
        
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
        
        if($data['querymsg']!=FALSE)
        {
            foreach ($data['querymsg']->result_array() as $row)
            {
            $msgno=$row['MessageNo'];
            $data['commentof'.$msgno]=$this->comment->comment_number($courseno,$msgno);
            }
            //var_dump($data);               
        }
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
    
    function comment()
    {
        $this->load->model('message');
        $this->load->model('comment');
        
        $user_id=$this->session->userdata['ID'];
        $data['query_student_name']=$this->db->query("select Name from Student where S_Id='$user_id'");
        
        if($this->uri->segment(5)=='posted')$data['notification']="Comment has been posted";
        elseif($this->uri->segment(5)=='deleted')$data['notification']="Comment has been deleted";
        else $data['notification']="";
        
        $data['query_student_info'] = $this->query_student;
        $msg_id=$this->uri->segment(3);
        $courseno=$this->uri->segment(4);
        
        $data['querycomment'] =$this->comment->getall($courseno,$msg_id);
        
        $data['query_post']=$this->message->get($msg_id,$courseno);
        
        $this->load->view('student_group_page_comment', $data);
    }
    
    function comment_post()
    {
        $this->load->model('comment');
        $body=nl2br(strip_quotes($this->input->post('comment')));

        $this->comment->insert($body,$this->input->post('courseno'),$this->input->post('msg_no'));

        //echo $this->input->post('courseno');
        redirect('student_home_group/comment/'.$this->input->post('msg_no').'/'.$this->input->post('courseno').'/posted'); 
    }
    
    function comment_delete()
    {
        $this->load->model('comment');
        
        $msg_id=$this->uri->segment(3);
        $courseno=$this->uri->segment(4);
        $comment_id=$this->uri->segment(5);

        $this->comment->delete($comment_id);
        redirect('student_home_group/comment/'.$msg_id.'/'.$courseno.'/deleted');
    }
    

}