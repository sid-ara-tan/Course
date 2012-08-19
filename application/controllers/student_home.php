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
        if($this->uri->segment(3)=='updated')$data['notification']="Profile Information Is Updated";
        else $data['notification']="";
        
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
        if($update)redirect('student_home/profile/updated');
        else echo "error";
    }
    
    function course_registration()
    {
        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        $this->load->view('student_course_registration', $data);
    }
    
    function result()
    {

    }
    

}