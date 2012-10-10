<div>

    <?php
    
    echo form_open('teacher_home/upload_marks/'.$courseno);
    $rows=$this->exam->get_exam($courseno,$sec);
    $options=array();
    if($rows!=FALSE){
        $exam_ID=$rows[0]->ID;
        $total_marks=$this->exam->total_marks($courseno,$sec,$exam_ID);
        foreach ($rows as $row) {
            $options[$row->ID]=$row->eType.'('.$row->eDate.'):'.$row->Topic;
        }
    }else{
        $options['noexam']='No exam available';
    }
    $js='onchange="load_marks(this.value);"';
    echo form_dropdown('Exam_ID',$options,'',$js);
    if($rows!=FALSE):
    ?>

    <label for="Exam_ID"><small>Exam</small></label><br/><br />

    <input type="hidden" name="CourseNo" id="CourseNo" value="<?php echo $courseno?>" />
    <input type="hidden" name="Sec" id="Sec" value="<?php echo $sec?>" />
    
    <div id="marks_list">
    <div id="error_div"></div>
    <input type="text" name="total" id="total"
       value="<?php if($total_marks!=FALSE)echo $total_marks;?>" />
    <label for="total"><small>Total Marks</small></label><br/><br />

    <?php
    $rows=$this->student->get_studentformarks($courseno,$sec);
    $student_array=array();
    if($rows!=FALSE){
        $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" style="width:50%">',
                        'heading_row_start'   => '<tr class="dark">',
                        'heading_row_end'     => '</tr>',
                        'row_start'           => '<tr class="light">',
                        'row_end'             => '</tr>',
                        'row_alt_start'       => '<tr class="dark">',
                        'row_alt_end'         => '</tr>');
        $this->table->set_template($tmpl);
        $this->table->set_heading('Student_ID','Name','Marks');
        if($total_marks==FALSE){
            foreach ($rows as $row) {
                $student_array[]=$row->S_Id;
                
                $this->table->add_row($row->S_Id,$row->Name,
                        '<input type="text" name="'.$row->S_Id.'" id="'.$row->S_Id.'" value="0" size="10px"/>');
            }
        }else{
            foreach ($rows as $row) {

                $student_array[]=$row->S_Id;
                if($this->exam->get_marks($courseno,$sec,$exam_ID,$row->S_Id)==NULL)$mark_value=0;
                else $mark_value=$this->exam->get_marks($courseno,$sec,$exam_ID,$row->S_Id);
                $this->table->add_row($row->S_Id,$row->Name,
                        '<input type="text" name="'.$row->S_Id.'" id="'.$row->S_Id.'"
                          value="'.$mark_value.'"  size="10px"/>');
            }
        }
        echo $this->table->generate();
    }

    $student_str=  implode(',',$student_array);
    if($total_marks==0){
        echo form_hidden('task','upload');
        //echo form_submit('','Upload Marks');
        ?>
        <input type="button" value="Upload" onclick="check_marks(this.form,'<?php echo $student_str; ?>');" />
        <?php
    }else{
        echo form_hidden('task','edit');
        //echo form_submit('','Update Marks');        
        ?>
        <input type="button" value="Update" onclick="check_marks(this.form,'<?php echo $student_str; ?>');" />
        <?php
    }
    echo form_close();
    ?>
    </div>
    <?php endif;?>
    <?php
    echo '<br /><h1>';
    echo anchor('teacher_home/class_content/'.$courseno, 'Back');
    echo '</h1>';
    ?>

</div>
