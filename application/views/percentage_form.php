
    
<?php
$sec=$this->input->post('Sec');
$courseno=$this->input->post('CourseNo');
$etype=$this->input->post('etype');
echo "<hr />Type:<b>    $etype</b><br/>";
echo "Section:<b> $sec</b><hr />";
$Marks_Type=$this->exam->get_Marks_Type($courseno,$etype);
if($Marks_Type=='Percentage'){

    $exams=$this->exam->get_exam($courseno,$sec);
    $marks_given_exams=array();
    $exam_array=array();
    if($exams!=FALSE){
        foreach($exams as $row){
            if($row->eType==$etype && $this->exam->total_marks($courseno,$sec,$row->ID)>0){
                //echo $row->Topic.'<br/>';
                $marks_given_exams[]=$row;
                $exam_array[]=$row->ID;
            }
        }
    }

    if(count($marks_given_exams)>0){
        $exam_str=implode(",", $exam_array);
        echo form_open('teacher_home/set_individual_percentage/'.$courseno.'/'.$sec);
        echo ' <table>';
        foreach ($marks_given_exams as $row) {
            echo '<tr>';
            echo '<td>'.$row->Topic.'</td>';
            echo '<td>'.$row->eDate.'</td>';
            echo '<td>'.$row->eTime.'</td>';
            echo '<td><input type="text" name="'.$row->ID.'" id="'.$row->ID.'"
                    value="'.$row->Percentage.'" size="5px" maxlength="5px"/>%</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<div style="float:right;">
                        <input type="button" value="Set Percentage" onclick="check_individualpercentage(this.form,\''.$exam_str.'\');">
                            </div><br/><br/>';
        echo form_hidden('Exam_ID',$exam_str);
        echo form_close();
        
    }else{
        echo '<font color="red">No exam marks uploaded</font><br />';
    }
    
}else if($Marks_Type=="Best"){
    $best_count=$this->exam->get_best_count($courseno,$sec,$etype);
    $exams=$this->exam->get_exam($courseno,$sec);
    $marks_given_exams=array();
    $exam_array=array();
    if($exams!=FALSE){
        foreach($exams as $row){
            if($row->eType==$etype && $this->exam->total_marks($courseno,$sec,$row->ID)>0){
                //echo $row->Topic.'<br/>';
                $marks_given_exams[]=$row;
                $exam_array[]=$row->ID;
            }
        }
    }
    $total_marks_given_exams=count($marks_given_exams);
    if($total_marks_given_exams>0){
        echo form_open('teacher_home/set_best_count/'.$courseno.'/'.$sec.'/'.$etype);
        echo 'Exam to consider:<input type="text" name="best_count" id="best_count"
                value="'.$best_count.'" size="2px"/> out of <b>'.$total_marks_given_exams.'</b><br/>';

        echo '<div style="float:right;">
                        <input type="button" value="Save change" onclick="check_individualbest(this.form,\''.$total_marks_given_exams.'\');">
                            </div><br/><br/>';
        
        echo form_close();
    }else{
        echo '<font color="red">No exam marks uploaded</font><br />';
    }
}
echo anchor('teacher_home/class_content/'.$courseno,'Back');
?>

