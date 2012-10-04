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
       // $this->load->library('unit_test');
    }

    function make_result_for_course($courseno){
        $this->load->model('result');
        $rows=$this->result->get_result($courseno);
        foreach ($rows as $row) {
            $this->calculate_marks($row->S_Id,$courseno);
        }

        redirect('teacher_home/class_content/'.$courseno);
    }

/**
 * this function test calculate_marks() function
 */
    function result_making_unit_test(){
        $config=array(
            '0805001'=>'CSE303',
            '0805002'=>'CSE303',
            '0805048'=>'CSE303',
            '0805049'=>'CSE303',
        );
        $expected=array(
            '0805001'=>75.33,
            '0805002'=>75.33,
            '0805048'=>75,
            '0805049'=>77,
        );
        foreach($config as $key=>$item){
            echo $this->unit->run(round($this->calculate_marks($key,$item),2),$expected[$key],'Get expected '.$expected[$key].' total marks for '.$key.' - '.$item,'Calculate_Marks()');
        }        
    }

    /**
     * this function test the get_marks function
     */
    function model_get_marks_unit_test(){
        $this->load->model('result');
        $test=$this->result->get_Marks('CSE303','A',1,'0805001');
        $expected=20;
        echo $this->unit->run($test,$expected,'Expected getting marks '.$expected. ' for 0805001','result->get_marks()');

        $test=$this->result->get_Marks('CSE303','A',1,'0805002');
        $expected=15;
        echo $this->unit->run($test,$expected,'Expected getting marks '.$expected. ' for 0805002','result->get_marks()');

        $test=$this->result->get_Marks('CSE303','A',1,'0805048');
        $expected=18;
        echo $this->unit->run($test,$expected,'Expected getting marks '.$expected. ' for 0805048','result->get_marks()');

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
                                //echo $marks_array[$i];
                            }
                            if($best>0)$inside_total/=$best;                          
                    }
                    $total+=$inside_total*$exam_type->Percentage;                       
                }
            }
        }

        
       $gpa=$this->return_gpa_from_marks($total);

       $this->result->set_GPA($courseno,$S_ID,$gpa);

       return $total;
    }

    /**
     * this function test the calculate_gpa() function
     */
    function gpa_unit_test(){

        $config=array(
            '75.33'=>3.75,
            '85'=>4.00,
            '87'=>4.00,
            '0'=>0.00,
            '50.0'=>2.5

        );

        foreach($config as $mark=>$gpa){
            echo $this->unit->run($this->return_gpa_from_marks($mark),$gpa,'Expected gpa for marks '.$mark.' gpa '.$gpa,'Calculate_GPA()');
        }
    }

    function return_gpa_from_marks($total=NULL){
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

        return $gpa;
    }
}
