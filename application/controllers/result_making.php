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

    function make_result_for_course($courseno){
        $this->load->model('result');
        $rows=$this->result->get_result($courseno);
        foreach ($rows as $row) {
            $this->calculate_marks($row->S_Id,$courseno);
        }

        redirect('teacher_home/class_content/'.$courseno);
    }

    function  calculate_marks($S_ID='0805001',$courseno='CSE300'){
        $this->load->model('result');
        $this->load->model('exam');
        $this->load->model('student');
        
        $sec=$this->student->get_sec($S_ID);        
        $exam_types=$this->exam->get_exam_type($courseno);
        $total=0;
        if($exam_types!=FALSE){
            foreach ($exam_types as $exam_type) {
                $exams=$this->result->get_exam($courseno,$sec,$exam_type->etype);
                if($exams!=FALSE){
                    if($exam_type->Marks_Type=='Percentage'){                        
                            $inside_total=0;
                            foreach ($exams as $exam){
                                $marks=$this->result->get_Marks($courseno,$exam->Sec,$exam->ID,$S_ID);
                                if($exam->Total>0)
                                $inside_total+=($marks*$exam->Percentage)/($exam->Total*100);
                            }                            
                    }else{                        
                            $marks_array=array();
                            $best=0;
                            $inside_total=0;;
                            foreach ($exams as $exam){
                                $best=$exam->Best;
                                if($exam->Total>0)
                                    $marks_array[]=$this->result->get_Marks($courseno,$exam->Sec,$exam->ID,$S_ID)/$exam->Total;
                                else
                                    $marks_array[]=0;
                            }
                            rsort($marks_array);
                            for($i=0;$i<$best;$i++){
                                $inside_total+=$marks_array[$i];
                                echo $marks_array[$i];
                            }
                            if($best>0)$inside_total/=$best;                          
                    }
                    $total+=$inside_total*$exam_type->Percentage;                       
                }
            }
        }

        $gpa=0;
        if($total>79.5){
            $gpa=4.00;
        }  elseif ($total>74.5) {
            $gpa=3.75;
        }  elseif ($total>69.5) {
            $gpa=3.50;
        }  elseif ($total>64.5) {
            $gpa=3.25;
        }  elseif ($total>59.5) {
            $gpa=3.00;
        } elseif ($total>54.5) {
            $gpa=2.75;
        }elseif ($total>49.5) {
            $gpa=2.50;
        }elseif ($total>44.5) {
            $gpa=2.25;
        }elseif ($total>39.5) {
            $gpa=2.00;
        }else{
            $gpa=0.00;
        }

       $this->result->set_GPA($courseno,$S_ID,$gpa);


    }
}
