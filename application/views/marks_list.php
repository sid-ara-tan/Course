<?php
//echo $courseno; echo $sec; echo $exam_ID;
$total_marks=$this->exam->total_marks($courseno,$sec,$exam_ID);
?>
<input type="text" name="total" 
       value="<?php if($total_marks!=FALSE)echo $total_marks;?>" />
    <label for="total"><small>Total Marks</small></label><br/><br />

    <?php
    $rows=$this->student->get_studentformarks($courseno,$sec);
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
                $this->table->add_row($row->S_Id,$row->Name,
                        '<input type="text" name="'.$row->S_Id.'" size="10px"/>');
            }
        }else{
            foreach ($rows as $row) {
                $this->table->add_row($row->S_Id,$row->Name,
                        '<input type="text" name="'.$row->S_Id.'"
                          value="'.$this->exam->get_marks($courseno,$sec,$exam_ID,$row->S_Id).'"  size="10px"/>');
            }
        }
        echo $this->table->generate();
    }
    if($total_marks==FALSE){
        echo form_hidden('task','upload');
        echo form_submit('','Upload Marks');
    }else{
        echo form_hidden('task','edit');
        echo form_submit('','Update Marks');
    }
    echo form_close();
    ?>
    