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

                foreach($course_record as $row){
                    echo "<li>";
                    echo anchor("teacher_home/class_content/{$row->CourseNo}",$row->CourseName)."</li>" ;
                }
        ?>
        </ul>
      </li>
       <li class="active"><a href="<?php echo base_url();?>index.php/teacher_message">Message</a></li>
      <li><a href="<?php echo base_url();?>index.php/course/logout">Logout</a></li>

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
                <div id="tabs-1">
                     <div class="demo">
                         <div id="filter_by_group">
                     <?php
                        //$row_std_name=$query_student->row();
                        if($querymsg!=FALSE)
                        {

                            foreach ($querymsg as $row)
                            {
                                $name=$this->student->get_name($row->SenderInfo);
                                if($row->senderType=='student')
                                        echo "<b><font color='green'>".$name.'</font></b> Posted in ';
                                elseif($row->senderType=='teacher')
                                        echo "<b><font color='red'>".$name.'</font></b> Posted in ';
                                echo '<b>'.$row->CourseNo.'</b>';
                                echo ' at ('.$row->mTime.')';
                                echo br(2);;
                                echo "<font color='blue'><h3><b>".$row->Subject.'</b></h3></font><br>';
                                echo $row->mBody.'<br><br>';
                                if($row->SenderInfo==$this->session->userdata['ID'])
                                {
                                    //echo '<br>< '.anchor('student_home_group/group_message/delete/'.urlencode($this->encrypt->encode($row['MessageNo'])).'/'.$this->uri->segment(3),'Delete','onclick=" return check()"').' >';
                                    echo '<br> '.anchor('student_home_group/group_message/delete/'.$row->MessageNo.'/'.$row->CourseNo," <font color='red'>Delete</font> ",'onclick=" return check()"').' ';
                                }



                                echo ' '.anchor('student_home_group/comment/'.$row->MessageNo.'/'.$row->CourseNo,
                                        "# <font color='red'>".$this->comment->comment_number($row->CourseNo,$row->MessageNo)." Comment</font> ").'<br>';
                                echo '<hr/>';

                            }

                             echo $this->pagination->create_links();
                        }

                        else echo "<b><font color='red'>No Post</font></b>";
                      ?>
                         </div>
                      </div>
                </div>

            <div id="tabs-2">
                <b><font color="red"><?php //echo $notification; ?></font></b>
                <?php echo form_open('student_home_group/group_message/post');?>

                <br><h1><?php echo ' Wall';?></h1><br>
                     <?php
                     $course_record=$this->teacher->get_courses();
                            $options=array();
                            foreach($course_record as $row){
                                $options[$row->CourseNo]=$row->CourseNo;
                            }
                            echo form_label('Post To ', 'course_label');
                            echo form_dropdown('courseno:',$options).'<br/>';
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
                echo form_close(); ?>
            </div>
                       
        </div>

        </div>

    </div>

    <div class="clear"></div>
  </div>
</div>


