<?php
$data['title'] = "Student Group Page";
$this->load->view('header/index_header', $data);
?>

<?php
$row_std = $query_student_info->row();
?>

<body id="top">
    <div class="wrapper row1">
        <div id="header" class="clear">
            <div class="fl_left">
                <h1><a href="index.html">Course Management System</a></h1>
                <p>Student Panel of <b><?php echo "* " . $row_std->Name . " *"; ?></b>
                    <br>
                    <?php echo anchor('course/logout', 'Log Out'); ?>
                </p>
            </div>
        </div>
    </div>
    <!-- ####################################################################################################### -->
    <div class="wrapper row2">
        <div id="topnav">
            <ul>
                <li class="active"><a href="<?php echo base_url(); ?>index.php/student_home">Home</a></li>
                <li><a href=""><?php echo $row_std->Name; ?></a>
                    <ul>
                        <?php
                        echo "<li>";
                        echo anchor("student_home/profile", "Edit Profile")."</li>";
                        ?>
                    </ul>
                </li>
                <li><?php echo anchor("student_home/course_registration", "Course Registration") ?></li>
                <li><a href="#">Course Group</a>
                    <ul>
                        <?php
                        if($taken_course_query!=FALSE)
                        {
                        $course_taken = $taken_course_query->result_array();

                        foreach($course_taken as $row){
                        echo "<li>";
                        echo anchor("student_home/group/{$row['CourseNo']}", $row['CourseName'])."</li>";
                        }
                        }
                        else echo "<li>No Course Taken</li>";
                        ?>
                    </ul>
                </li>
                <li class="last"><?php echo anchor("student_home/result", "Result") ?></li>
            </ul>
            <div  class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->


    <div class="wrapper row3">
        <div id="featured_slide">
            <p><b><?php echo $coursename; ?> Group</b></p>
            <div id="tabs">

                <ul>

                    <li><a href="#tabs-1">Message Board</a></li>

                    <li><a href="#tabs-4">All Files</a></li>

                    <li><a href="#tabs-2">Course Content</a></li>

                    <li><a href="#tabs-3">View Marks</a></li>

                </ul>

                <div id="tabs-1">
                     <div class="demo">
                        <?php 
                        { ?>

                                <b><font color="red"><?php echo $notification; ?></font></b>
                                <?php echo form_open('student_home_group/group_message/post');?>

                                <br><h1><?php echo ' Wall';?></h1><br>
                                <p>
                                    <?php echo form_label('Subject', 'subject_label');?>
                                    <br>
                                    <input type="text" name="subject" value="" size="50" />
                                    <br>
                                    <?php echo form_label('Message', 'message_label');?>
                                    <br>
                                    <textarea name="message" rows="5" cols="70" maxlenth="1000" ></textarea>
                                </p>

                                <p>
                                    <input type="button" id="msgPost" value="Post" onclick="checkNull(this.form)" />
                                </p>
                                <?php 
                                echo form_hidden('courseno',$courseno);
                                echo form_close(); ?>

                                <hr />
                                <hr /><hr />
                                <?php
                                $row_std_name=$query_student->row();
                                if($querymsg!=FALSE)
                                {

                                foreach ($querymsg as $row)
                                    {
                                    echo '<b>'.$row->SenderInfo.'</b>'.' says :';
                                    echo '('.$row->mTime.')';
                                    echo br(2);;
                                    echo "<font color='blue'><h3><b>".$row->Subject.'</b></h3></font><br>';
                                    echo $row->mBody.'<br><br>';
                                    if($row->SenderInfo==$row_std_name->Name)
                                    {
                                        //echo '<br>< '.anchor('student_home_group/group_message/delete/'.urlencode($this->encrypt->encode($row['MessageNo'])).'/'.$this->uri->segment(3),'Delete','onclick=" return check()"').' >';
                                        echo '<br>< '.anchor('student_home_group/group_message/delete/'.$row->MessageNo.'/'.$courseno,"< <font color='red'>Delete</font> >",'onclick=" return check()"').' >';  
                                    }
                                    
                                    
                                    
                                    echo ' '.anchor('student_home_group/comment/'.$row->MessageNo.'/'.$courseno,"< <font color='red'>".${'commentof'.$row->MessageNo}." Comment</font> >").'<br>';
                                    echo '<hr/>';

                                    }

                                echo $this->pagination->create_links();
                                }
                                
                                else echo "<b><font color='red'>No Post</font></b>";


                        }
                        ?>
                      </div>
                </div>

                <div id="tabs-2">

                    <p> <h1>All Course content :- </h1><br></p>
                    <?php
                    if($record_content!=FALSE){

                        foreach($record_content as $row_record){
                        ?>
                        <h3><?php echo anchor('student_home_group/download_file/'.$courseno.'/'.$row_record->File_Path, $row_record->Topic); ?></h3>
                        <?php echo "<br />uploaded by <font color='red'>".$row_record->Uploader.'</font>' ?>
                        <?php echo $row_record->Upload_Time; ?>
                        <?php echo $row_record->Description.'<hr>';

                        }
                    }
                    
                    else echo "<font color='red'> No Content Available".'</font>';
                    ?>
                </div>

                <div id = "tabs-3">

                    <p><h1>All Given Marks Of <?php echo $coursename; ?></h1></p>
                
                    <?php
                        $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">',
                        'heading_row_start'   => '<tr class="dark">',
                        'heading_row_end'     => '</tr>',
                        'row_start'           => '<tr class="light">',
                        'row_end'             => '</tr>',
                        'row_alt_start'       => '<tr class="dark">',
                        'row_alt_end'         => '</tr>');
                    $this->table->set_template($tmpl);
                    $this->table->set_heading('Exam Type','Section','Exam Date', 'Exam Time','Duration','Location','Topic','Marks');
                    //var_dump($query_marks);
                    if($query_marks!=FALSE){
                                foreach($query_marks->result_array() as $row){
                                    $this->table->add_row($row['exam_type'],$row['Sec'],$row['eDate'],$row['eTime'],$row['Duration'],$row['Location'],$row['Topic'],$row['marks']);
                                }
                            echo $this->table->generate();
                            }
                    else echo "<font color='red'> No Data Available".'</font>';      
                    
                    ?>
                </div>

                <div id = "tabs-4">
                    <div class="demo">
                    <b><font color="red"><?php echo $notification_file; ?></font></b>
                    <p><h1>All Course files : </h1></p>
                        <hr /><hr />

                        <?php echo form_open_multipart('student_home_group/do_upload');?>
                        <?php echo form_label('Topic', 'topic_label');?>
                        <br>
                        <input type="text" name="topic" value="" size="50"  />
                        <br>
                        <?php echo form_label('Description', 'description_label');?>
                        <br>
                        <textarea name="description" rows="5" cols="70" maxlenth="1000" ></textarea>
                        <br>
                        <input type="file" name="file_upload" size="20" id="file_upload"  />
                        
                        <?php echo form_hidden('courseno',$courseno);?>
                        <br /><br />

                        <input type="button" value="upload" onclick="checkNull_file(this.form)" />

                        </form>
                        <hr><hr><hr>
                        <?php
                        if($record_file!=FALSE){

                            foreach($record_file as $row_record_file){
                            ?>
                            <h3><?php echo anchor('student_home_group/download_file/'.$courseno.'/'.$row_record_file->filename, $row_record_file->topic); ?></h3>
                            <?php echo $row_record_file->description.'<br>';
                                echo "<br />uploaded by <font color='red'> ".$row_record_file->uploader.'</font>';
                                echo ' '.$row_record_file->time.'<br>';
                                    if($row_record_file->uploader==$row_std_name->Name)
                                    {
                                        //echo '<br>< '.anchor('student_home_group/group_message/delete/'.urlencode($this->encrypt->encode($row['MessageNo'])).'/'.$this->uri->segment(3),'Delete','onclick=" return check()"').' >';
                                        echo '<br>< '.anchor('student_home_group/delete_file/'.$courseno.'/'.$row_record_file->filename,"< <font color='red'>Delete</font> >",'onclick=" return check()"').' >';  
                                    }
                                echo ' '.anchor('student_home_group/comment/'.$row_record_file->file_id.'/'.$courseno,"< <font color='red'>".${'commentoffile'.$row_record_file->file_id}." Comment</font> >").'<br>';
                                  
                                echo '<hr>';

                            }
                        }
                        
                        else echo "<font color='red'> No File".'</font>';
                        ?>
                     </div>
                 </div>

                    </div>
                    </div>
                    </div>


                   

        <!-- ####################################################################################################### -->
        <?php //$this->load->view('footer/footer'); ?>
