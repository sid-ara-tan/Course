<?php
    $data['title']="Message";
    $this->load->view('header/style_demo_header',$data);
    $T_ID=$this->session->userdata['ID'];
    $info=$this->teacher->get_info();
?>

<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1>Course Management System</h1>
      <h3><font color="green"><?php echo $info->Name;?></font></h3>
      
    </div>
  </div>
</div>
<!-- --------------------------------------------------------------------------------------------------------- -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li><a href="<?php echo base_url();?>index.php/teacher_home">Class Routine</a></li>

      <li><a href="<?php echo base_url();?>index.php/teacher_home/show_profile">Profile</a></li>
      <li><a href="#">Assigned Course</a>
        <ul>
          <?php
                $course_record=$this->teacher->get_courses();

                if($course_record!=FALSE){
                    foreach($course_record as $row){
                        echo "<li>";
                        echo anchor("teacher_home/class_content/{$row->CourseNo}",$row->CourseName)."</li>" ;
                    }
                }
        ?>
        </ul>
      </li>
       <li class="active"><a href="<?php echo base_url();?>index.php/teacher_message">Message</a></li>
       <li><a href="#">File</a>
        <ul>
          <?php
                $course_record=$this->teacher->get_courses();

                if($course_record!=FALSE){
                    foreach($course_record as $row){
                        echo "<li>";
                        echo anchor("teacher_message/show_file/{$row->CourseNo}",$row->CourseName)."</li>" ;
                    }
                }
        ?>
        </ul>
       </li>
      <li><a href="<?php echo base_url();?>index.php/logout">Logout</a></li>

    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- --------------------------------------------------------------------------------------------------------- -->
<div class="wrapper row4">
  <div id="container" class="clear">
    
    <div >

     <div class="demo">

        <div id="tabs">
                <ul>
                        <li><a href="#tabs-1">Message Inbox</a></li>
                        <li><a href="#tabs-2">Post a message</a></li>

                </ul>
            <script>

            </script>
                <div id="tabs-1">
                     <div class="demo">
                         <div id="filter_by_group">
                             <h1>Showing Messages from <?php echo $show_for; ?></h1>
                            <div class="group_conversation">
                     <?php
                        //$row_std_name=$query_student->row();
                        echo form_open('teacher_message/message_for_group');
                        $course_record=$this->teacher->get_courses();
                        if($course_record!=FALSE){
                            $options=array();
                            $options['ALL']='ALL';

                            foreach($course_record as $row){
                                $options[$row->CourseNo]=$row->CourseNo;
                            }
                            echo form_label('Show for ', 'course_label');                            
                            echo form_dropdown('courseno',$options,$show_for,'id="courseNo" onchange="this.form.submit()"').' ';
                     
                        //echo form_submit('','Filter message');
                        echo form_close();
                        echo '<br/><br/><hr/>';
                        }


                        if($querymsg!=FALSE)
                        {
                            
                            
                            

                            foreach ($querymsg as $row)
                            {
                                echo form_fieldset();
                                
                             /*   if($row->senderType=='student'){
                                        $name=$this->student->get_name($row->SenderInfo);
                                        echo "<b><font color='green'>".$name.'</font></b> Posted in ';
                                }
                                elseif($row->senderType=='teacher'){
                                        $name=$this->teacher->get_name($row->SenderInfo);
                                        echo "<b><font color='red'>".$name.'</font></b> Posted in ';
                                }*/

                                echo "[<font color='#3b5998'>".$row->Subject.'</font>]<br/><br/>';

                                if($row->senderType=='student'){
                                        echo '<b><span style="color:rgb(59, 89, 152);">';
                                        $name=$this->student->get_name($row->SenderInfo);
                                        echo "<b>".$name.'</b>';
                                        echo '</span></b>'.':';
                                    }

                                    if($row->senderType=='teacher'){
                                        echo '<b><span style="color:#1e2c47">';
                                        $name=$this->teacher->get_name($row->SenderInfo);
                                        echo "<b>".$name.'</b>';
                                        echo '</span></b>'.': ';
                                    }
                                    
                                /*echo '<b>'.$row->CourseNo.'</b>';
                                echo ' at ('.$row->mTime.')';*/
                                    
                               // echo '<pre>';
                                echo $row->mBody.'';
                               // echo '</pre>';
                                
                                echo '<div class="comment_value">';
                                echo '<b>'.$row->CourseNo.'</b>';
                                echo ' at ('.$row->mTime.')'; 
                                if($row->SenderInfo==$this->session->userdata['ID'])
                                {
                                    //echo '<br>< '.anchor('student_home_group/group_message/delete/'.urlencode($this->encrypt->encode($row['MessageNo'])).'/'.$this->uri->segment(3),'Delete','onclick=" return check()"').' >';
                                    echo ' '.anchor('teacher_message/group_message/delete/'.$row->MessageNo.'/'.$row->CourseNo," <font color='#3b5998'>Delete</font> ",'onclick=" return check()"').' ';
                                }
                                echo ' '.anchor('teacher_message/comment/'.$row->MessageNo.'/'.$row->CourseNo,
                                        "# <font color='#3b5998'>".$this->comment->comment_number($row->CourseNo,$row->MessageNo)." Comment</font> ").'<br>';
                               // echo '<hr/>';
                                echo '</div>';

                                 echo form_fieldset_close();

                            }
                            
                             echo $this->pagination->create_links();
                        }
                        
                        else{
                            echo "<b><font color='red'>No Post</font></b>";
                            echo br(20);
                        }
                        
                      ?>
                                </div>
                         </div>
                      </div>
                </div>

            <div id="tabs-2">
                <b><font color="red"><?php echo $this->session->flashdata('notification'); ?></font></b>
                <?php echo form_open('teacher_message/group_message/post');?>

                <br><h1><?php echo ' Wall';?></h1><br>
                     <?php
                     $course_record=$this->teacher->get_courses();
                     if($course_record!=FALSE){
                            $options=array();
                            foreach($course_record as $row){
                                $options[$row->CourseNo]=$row->CourseNo;
                            }
                            echo form_label('Post To ', 'course_label');
                            echo form_dropdown('courseno',$options).'<br/>';
                     ?>
                    <?php echo form_label('Subject', 'subject_label');?>
                    <br>
                    <input type="text" name="subject" id="subject" value="" size="50" />
                    <div id="subject_div"></div>
                    <br>
                    <?php echo form_label('Message', 'message_label');?>
                    <br>
                    <textarea name="message" id="message" rows="5" cols="70" maxlenth="1000" ></textarea>
                    <div id="message_div"></div>


                <p>
                    <input type="button" id="msgPost" value="Post" onclick="checkNull(this.form)" />
                </p>
                <?php
                //echo form_hidden('courseno',$courseno);
                //echo "<input type='hidden' id='courseno_hidden' name='courseno' />";
                }
                else{
                    echo '<h1>No Course Assigned</h1>';
                    echo br(20);
                }
                echo form_close(); ?>
            </div>
                       
        </div>

        </div>

    </div>

    <div class="clear"></div>
  </div>
</div>


