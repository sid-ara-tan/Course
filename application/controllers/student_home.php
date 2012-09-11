<?php

class Student_home extends CI_controller {

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

    function index() {
        $this->load->model('student');
        $this->load->model('classinfo');
        
        $prefs = array (
               'start_day'    => 'saturday',
               'month_type'   => 'long',
               'day_type'     => 'short',
               'show_next_prev'=> TRUE,
               'next_prev_url'   =>base_url().'index.php/student_home/index/calendar/show/'
             );
        
        $this->load->library('calendar',$prefs);
        
        
        $data['query_student_info'] = $this->query_student;
        
        
        $data['taken_course_query'] = $this->query_taken_course;
        
        $this->load->view('student_homepage', $data);
    }
    
    function group()
    {
        $courseno=$this->uri->segment(3);
        redirect('student_home_group/group/'.$courseno);
    }
    
    function profile()
    {
        $data['notification']=$this->session->flashdata('notification');        
        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        $row=$this->query_student->row();
        $this->load->model('teacher');
        $data['advisor_name']=$this->teacher->get_name($row->Advisor);
        $this->load->view('student_profile', $data);
    }
    
    function edit_profile()
    {
        $this->load->model('student');
        $update=$this->student->edit_profile();
        
        if($update)
        {
            $this->session->set_flashdata('notification',"Profile has been updated successfully");
            redirect('student_home/profile');
        }
        else echo "error occured";
    }
    
    function course_registration()
    {
        $this->load->model('course');
        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        
        $isRegiPeriod=false;
        $isDropPeriod=false;
        
        if($isRegiPeriod)
        {
            $data['query_offered']=$this->course->get_offered_courses();
            $data['query_retake']=$this->course->get_retake_courses();
            $data['query_optional']=$this->course->get_optional_courses();
            $data['is_taken_pending']=$this->course->get_taken_courses_pending();
        }
        else $data['query_offered']='Not Period';
        
        if($isDropPeriod)
        {
            $data['query_drop']=$this->course->get_drop_courses();
            $data['is_drop_pending']=$this->course->get_drop_courses_status();
        }
        else $data['query_drop']='Not Period';
        
        $data['notification']=$this->session->flashdata('notification');
        $this->load->view('student_course_registration', $data);
    }
    
    function course_selected()
    {
        $this->load->model('course');
        $this->course->store_selected_courses();
        $this->session->set_flashdata('notification',"Registration Request Submitted Successfully");
        redirect('student_home/course_registration');
    }
    
    function course_dropped()
    {
        $this->load->model('course');
        $this->course->store_dropped_courses();
        $this->session->set_flashdata('notification',"Drop Request Submitted Successfully");
        redirect('student_home/course_registration');  
    }



    function result()
    {
        echo "Under construction";
    }
    

}