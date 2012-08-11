<?php

class Student_home extends CI_controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->my_library->is_logged_in();
    }

    function index() {
        $this->load->model('student');
        $this->load->model('classinfo');
        
        $query_student = $this->student->get_info();
        $data['query_student_info'] = $query_student;
        
        $taken_crs=$this->student->get_courses();
        $data['taken_course_query'] = $taken_crs;
        
        $this->load->view('student_homepage', $data);
    }

}