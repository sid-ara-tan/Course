<?php
    $data['title']="Course Content";
    $this->load->view('header/style_demo_header',$data);
?>

<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1>Course Management System</h1>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li><a href="<?php echo base_url();?>index.php/teacher_home">Class Routine</a></li>

      <li><a href="<?php echo base_url();?>index.php/teacher_home/show_profile">Profile</a></li>
      <li  class="active"><a href="#">Assigned Course</a>
        <ul>
          <?php
                $course_record=$this->teacher->get_courses();

                foreach($course_record as $row){
                    echo "<li>";
                    echo anchor("teacher_home/class_content/{$row->CourseNo}",$row->CourseName)."</li>" ;
                }
        ?>
        </ul>
      </li>
      <li><a href="<?php echo base_url();?>index.php/course/logout">Logout</a></li>

    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <div >
        
     <div class="demo">

        <div id="tabs">
                <ul>
                        <li><a href="#tabs-1">Course Content</a></li>
                        <li><a href="#tabs-2">Upload Marks</a></li>
                        <li><a href="#tabs-3">Schedule Exam</a></li>
                        <li><a href="#tabs-4">Exam settings</a></li>
                        
                </ul>
                <div id="tabs-1">
                        <div id="comments">

                            <h1><?php $courseno=$this->uri->segment(3); echo $courseno;?></h1>
                            <h2>Course Contents</h2>
                            <ul class="commentlist">
                            <?php
                                $courseno=$this->uri->segment(3);
                                $T_ID=$this->session->userdata['ID'];

                                if($record!=FALSE){

                                        foreach($record as $row){
                                 ?>
                                    <li class="comment_even">
                                        <div class="author">
                                            <span class="name"><?php echo anchor('teacher_home/download_content/'.$courseno.'/'.$row->File_Path,$row->Topic);?></span>
                                            <span class="wrote"><?php echo "<br />uploaded by ".$row->Uploader?></span>
                                        </div>
                                        <div class="submitdate"><?php echo $row->Upload_Time;?></div>
                                        <p><pre><?php echo $row->Description;?></pre></p>
                                        <p><?php if($T_ID==$row->Uploader_ID)echo anchor('teacher_home/delete_content/'.$courseno.'/'.$row->ID.'/'.$row->File_Path,' [Delete]').'<br />';?></p>
                                    </li>
                                <?php
                                               /* echo "<fieldset>";
                                                echo "<legend><h3>".strtoupper($row->Topic)."</h3></legend>";
                                                echo "<pre>".$row->Description."</pre>";
                                                echo "<strong>Content    : </strong>{$row->File_Path} ".anchor('teacher_home/download_content/'.$courseno.'/'.$row->File_Path,' [Download]').'  ';
                                                echo anchor('teacher_home/delete_content/'.$courseno.'/'.$row->ID.'/'.$row->File_Path,' [Delete]').'<br />';*/

                                        }
                                }

                                echo $this->pagination->create_links();
                            ?>


                            </ul>
                          </div>
                          <h2>Upload Content</h2>
                          <div id="respond">
                                <?php
                               // echo '<font color="red">'.$message."</font><br />";
                                echo '<font color="red">'.$this->session->flashdata('content_message')."</font><br />";
                                
                                echo form_open_multipart('teacher_home/upload_file/'.$courseno);
                                ?>
                                 <input type="text" name="Topic" id="Topic" maxlength="30" size="40" style="width:20%" />
                                 <label for="Topic"><small>Topic (required)</small></label><br />
                                 <div id="content_error"></div>
                                <textarea name="Description" rows="10" cols="60"></textarea>
                                <label for="Description"><small>Description</small></label><br/>
                                <?php

                                        echo form_hidden('Author',$name);

                                ?>
                                <br />
                                <input type="file" name="somefile" size="50" />
                                <label for="somefile"><small>File (required)</small></label><br/>
                                <input type="button"  value="Upload" onclick="check_content(this.form);"/>
                                <?php  echo form_close();?>
                          </div>
                </div>
                <div id="tabs-2">
                       <h1><?php echo $courseno;?></h1>
                       <h2>Upload or Update Marks</h2>
                       <?php echo '<font color="red">'.$this->session->flashdata('marks_message')."</font><br />";?>
                       <div id="marks_form">
                       <?php

                       $T_ID=$this->session->userdata['ID'];
                       $query=$this->db->query("
                            SELECT Sec
                            FROM AssignedCourse
                            WHERE CourseNo='$courseno' AND T_Id='$T_ID'
                            ");
                        $options=array(''=>'Select a section');
                        $options['all']='ALL';
                        if($query->num_rows()>0){
                            foreach($query->result() as $row ){
                                $options[$row->Sec]=$row->Sec;
                            }

                        }
                        $js='onchange="load_student(this.value);"';
                        echo form_dropdown('Sec', $options,'',$js);


                       ?>
                       <input type="hidden" value="<?php echo $courseno;?>" id="courseno">
                       </div>
                </div>
                <div id="tabs-3">
                    <h1><?php $courseno=$this->uri->segment(3); echo $courseno;?></h1>
                    <?php $T_ID=$this->session->userdata['ID'];?>
                    <h2>Schedule Exam</h2>
                    <?php
                        $rows=$this->exam->get_exam_type($courseno);
                        if($rows==FALSE){
                            echo 'No Exam Type Added';
                        }else{
                            echo form_open_multipart('teacher_home/schedule_exam/'.$courseno);

                                    //echo '<font color="red">'.$message."</font><br />";
                                    echo '<font color="red">'.$this->session->flashdata('scheduling_message')."</font><br />";
                                    //echo validation_errors();
                            $query=$this->db->query("
                                SELECT Sec
                                FROM AssignedCourse
                                WHERE CourseNo='$courseno' AND T_Id='$T_ID'
                                ");
                            $options=array('all'=>'ALL');
                            if($query->num_rows()>0){
                                foreach($query->result() as $row ){
                                    $options[$row->Sec]=$row->Sec;
                                }

                            }
                            echo form_dropdown('Sec', $options);

                         ?>
                        <label for="Sec"><small>Section</small></label><br/>
                        <?php
                            $query=$this->db->query("
                                SELECT etype
                                FROM exam_type
                                WHERE CourseNo='$courseno'
                                ");
                            $options=array();
                            if($query->num_rows()>0){
                                foreach($query->result() as $row ){
                                    $options[$row->etype]=$row->etype;
                                }

                            }
                            echo form_dropdown('Type', $options);
                        ?>
                        <label for="Type"><small>Type</small></label><br/>
                        <input type="text" name="Title" maxlength="30" size="50" style="width:40%" />
                        <label for="Title"><small>Title</small></label><br/>
                        <?php echo form_error('Title','<font color="red">', '</font><br />');?>
                        <textarea name="Syllabus" rows="10" cols="60"></textarea>
                        <label for="Syllabus"><small>Syllabus</small></label><br/>
                        <input type="text" name="Date" id="datepicker">
                        <label for="Date"><small>Date</small></label><br/>
                        <?php echo form_error('Date','<font color="red">', '</font><br />');?>
                        <?php
                        $options=array();
                        for($i=1;$i<=12;$i++){
                            if($i<10)$t='0'.$i;
                            else $t=$i;
                            $options[$t]=$t;
                        }
                        echo form_dropdown('hour',$options);

                        $options=array();
                        for($i=0;$i<=59;$i++){
                            if($i<10)$t='0'.$i;
                            else $t=$i;
                            $options[$t]=$t;
                        }
                        echo form_dropdown('minute',$options);

                        $options=array('AM'=>'am','PM'=>'pm');
                        echo form_dropdown('meridian', $options);

                        ?>
                        <label for="Time"><small>Time</small></label><br/>
                        <input type="text" name="Duration" maxlength="30" />
                        <label for="Duration"><small>Duration(minute)</small></label><br/>
                        <?php echo form_error('Duration','<font color="red">', '</font><br />');?>
                        <input type="text" name="Location" maxlength="30" />
                        <label for="Location"><small>Location</small></label><br/>
                        <?php echo form_error('Location','<font color="red">', '</font><br />');?>
                        <input type="submit" value="Sumbit" />

                        <?php
                        echo form_close();
                    }
                    ?>

                </div>
               
            <div id="tabs-4">
                <h1>Add a new exam</h1>
                <?php
                     echo '<font color="red">'.$this->session->flashdata('addexam_message')."</font><br />";
                    echo form_open('teacher_home/add_exam/'.$courseno);
                ?>
                <input type="text" name="exam_type" id="exam_type" maxlength="20"/>
                <label for="Location"><small>Name of Exam</small></label><br/>
                <div id="addexam_error"></div>
                <textarea name="Description" rows="10" cols="60"></textarea>
                <label for="Description"><small>Description</small></label><br/>
                <input type="button" value="Add Exam" onclick="check_addexam(this.form);" />
                <?php echo form_close();?>
                <br/>
                <h1>Available Exam</h1>                
                <?php
                $rows=$this->exam->get_exam_type($courseno);
                echo '<ul class="commentlist">';
                if($rows!=FALSE){
                    foreach ($rows as $row) {
                        echo "<fieldset>";
                        echo '<li class="comment_even">'.$row->etype;
                        if($this->exam->is_scheduled($courseno,$row->etype)==FALSE) echo anchor('teacher_home/delete_exam/'.$courseno.'/'.$row->etype,'   [Delete]');
                        echo '<p><pre>'.$row->Description.'</pre></p></li>';                                              
                    }
                }else{
                    echo 'No Exam Added';
                }
                echo '</ul>';
                ?>
            </div>
        </div>

        </div>

    </div>

    <!-- ####################################################################################################### -->
    <div class="clear"></div>
  </div>
</div>


<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
