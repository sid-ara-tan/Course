<?php

class Result_making extends CI_Controller{
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

    function  calculate_marks($S_ID='0805001',$courseno='CSE300'){
        $this->load->model('result');
        $this->load->model('exam');
        $marks=$this->result->get_Marks_by_Course($courseno,$S_ID);
        foreach ($marks as $mark) {
            echo $mark->Marks.'<br/>';
        }
    }
}
