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
                                echo form_hidden('courseno',$this->uri->segment(3));
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
                                    echo '<h3><b>'.$row->Subject.'</b></h3><br>';
                                    echo $row->mBody.'<br><br>';
                                    if($row->SenderInfo==$row_std_name->Name)
                                    {
                                        //echo '<br>< '.anchor('student_home_group/group_message/delete/'.urlencode($this->encrypt->encode($row['MessageNo'])).'/'.$this->uri->segment(3),'Delete','onclick=" return check()"').' >';
                                        echo '<br>< '.anchor('student_home_group/group_message/delete/'.$row->MessageNo.'/'.$this->uri->segment(3),"< <font color='red'>Delete</font> >",'onclick=" return check()"').' >';  
                                    }
                                    
                                    
                                    
                                    echo ' '.anchor('student_home_group/comment/'.$row->MessageNo.'/'.$this->uri->segment(3),"< <font color='red'>".${'commentof'.$row->MessageNo}." Comment</font> >").'<br>';
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

                    <p> <b>All Course content :- </b><br></p>
                    <?php
                    if($record!=FALSE){

                    foreach($record as $row_record){
                    ?>
                    <h3><?php echo anchor('teacher_home/download_content/'.$this->uri->segment(3).'/'.$row_record->File_Path, $row_record->Topic); ?></h3>
                    <?php echo "<br />uploaded by ".$row_record->Uploader ?>
                    <?php echo $row_record->Upload_Time; ?>
                    <?php echo $row_record->Description.'<hr>';

                    }
                    }
                    ?>
                    </div>

                    <div id = "tabs-3">

                    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>

                    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>

                    </div>

                    <div id = "tabs-4">

                    <p>All Course files will be here.</p>
                        <hr /><hr />

                        <?php echo form_open_multipart('student_home_group/do_upload');?>

                        <input type="file" name="file_upload" size="20" id="file_upload" />

                        <br /><br />

                        <input type="submit" value="upload" />

                        </form>


                    </div>

                    </div>
                    </div>
                    </div>


                   

        <!-- ####################################################################################################### -->
        <?php //$this->load->view('footer/footer'); ?>
