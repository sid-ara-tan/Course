<?php class Teacher extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
        $this->load->library('form_validation');
        $this->load->model('admin/course_model');
        $this->load->model('admin/department_model');
        $this->load->model('admin/teacher_model');
    }

     public function index($param=NULL){

    }

    public function view_teacher() {
        $data=array(
            'msg'=>'Teacher Information',
            'info'=>'',
            'title'=>'View Teachers'
        );
        
        $this->load->view('admin/view_teacher',$data);
    }
}

