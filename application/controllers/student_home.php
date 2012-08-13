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
        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        
        foreach ($this->query_taken_course->result_array() as $value) {
            if($courseno==$value['CourseNo'])$data['coursename']=$value['CourseName'];
        }
        
        $this->load->view('student_group_page', $data);
    }
    
    function profile()
    {

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