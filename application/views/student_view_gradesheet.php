<?php
    {
    echo br(3);
    echo heading('Result Of Level '.$level.' /Term '.$term,3);

    $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="5" cellspacing="3" class="mytable">' );

    $this->table->set_template($tmpl);?>
    <td><?php echo '<br>'.$this->table->generate($query_grade_sheet);?>
    <?php
    echo '<br><b>Total Credit : '.$credit;
    echo '<br>';
    echo '<br>GPA : <font color="red">'.$gpa.'</font>';
    echo '</td>';

    }
?>