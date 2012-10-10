<?php
//echo $courseno; echo $sec; echo $exam_ID;
$total_marks=$this->exam->total_marks($courseno,$sec,$exam_ID);
echo validation_errors();
?>
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
        if($total_marks==0){
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
    if($total_marks==FALSE){
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