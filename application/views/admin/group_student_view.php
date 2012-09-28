<?php include 'script_student_view.php';?>

<article class="module width_full shadow " id="page_tabs">
    <div>
        <div>
            <div id="div_search_result">
                  <table id="id_datatable" cellpadding="0" cellspacing="0" border="0" class="display">
                    <thead>
                        <tr>
                            <th>Student ID.</th>
                            <th>Name.</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>Term</th>
                            <th>Section</th>
                            <th>Advisor</th>
                            <th>Curriculum</th>
                            <th>Password</th>
                            <th>Fathers Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($all_students):?>
                        <?php foreach($all_students->result()as $single_student):?>
                        <tr id="<?php echo $single_student->S_Id;?>">
                            <td><?php echo $single_student->S_Id;?></td>
                            <td><?php echo $single_student->Name;?></td>
                            <?php if($single_student->Dept_id):?>
                            <?php
                                $one_department_info=$this->department_model->get_department_info($single_student->Dept_id);
                                if($one_department_info){
                                    $just_one_dept=$one_department_info->row();
                                    echo "<td>$single_student->Dept_id - $just_one_dept->Name</td>";
                                }
                                else{
                                    echo "<td>Currently unavailable</td>";
                                }
                             ?>
                            <?php else:?>
                            <td>Currently unavailable</td>
                            <?php endif;?>
                            <td><?php echo $single_student->sLevel;?></td>
                            <td><?php echo $single_student->Term;?></td>
                            <td><?php echo $single_student->Sec;?></td>
                            <td id="<?php echo $single_student->Dept_id;?>">
                            <?php
                                if($single_student->Advisor){
                                    $single_techer_info=$this->teacher_model->get_teacher_by_id($single_student->Advisor);
                                    if($single_techer_info){
                                        $a_teacher=$single_techer_info->row();
                                        echo $single_student->Advisor.'-('.$a_teacher->Designation.')-'.$a_teacher->Name;
                                    }
                                    else{
                                        echo 'Currently unavailable';
                                    }
                                }
                                else{
                                        echo 'Currently unavailable';
                                }
                            ?>
                            </td>
                            <td><?php echo $single_student->Curriculam;?></td>
                            <td><?php echo $single_student->Password;?></td>
                            <td><?php echo $single_student->father_name;?></td>
                            <td><?php echo $single_student->email;?></td>
                            <td><?php echo $single_student->address;?></td>
                            <td><?php echo $single_student->phone;?></td>

                        </tr>
                        <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                     <tfoot>
                       <tr>
                            <th>Student ID.</th>
                            <th>Name.</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>Term</th>
                            <th>Section</th>
                            <th>Advisor</th>
                            <th>Curriculum</th>
                            <th>Password</th>
                            <th>Fathers Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                       </tr>
                    </tfoot>
                </table>
            </div>
            <script type="text/javascript" charset="utf-8">
                $(document).ready(function(){
                    $('#show_hide_image').click(function(){
                        $('#div_search_result').toggle('slow');
                    });
                });
            </script>
            <div id="button_bar">
            <table cellpadding="0" cellspacing="30" border="0"  class="ui-widget" align="center">
                <tr>
                    <td>
                        <img src="<?php echo base_url();?>images/admin/icon/updown.png" id="show_hide_image" alt="hide" height="30px" title="click to show or hide the contents"/>
                    </td>
                </tr>
            </table>
          </div>
       </div>
    </div>
</article>