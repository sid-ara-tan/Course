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
       <li><a href="<?php echo base_url();?>index.php/teacher_message">Message</a></li>
       <li class="active"><a href="#">File</a>
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
                        <li><a href="#tabs-1">File from student</a></li>
                </ul>
            <script>

            </script>
                <div id="tabs-1">
                     <div class="demo">
                    <b><font color="red"><?php echo $notification_file; ?></font></b>
                    <h1>Files From Student : </h1>
                        <?php
                        if($record_file!=FALSE){

                            foreach($record_file as $row_record_file){
                            ?>
                            <h3><?php echo anchor('teacher_message/download_file/'.$courseno.'/'.$row_record_file->filename, $row_record_file->topic); ?></h3>
                            <?php echo $row_record_file->description.'<br>';
                                if($row_record_file->senderType=='student')echo "<br />uploaded by <font color='green'> ".${'nameof'.$row_record_file->file_id}.'</font>';
                                elseif($row_record_file->senderType=='teacher')echo "<br />uploaded by <font color='red'> ".${'nameof'.$row_record_file->file_id}.'</font>';
                                echo ' '.$row_record_file->time.'<br>';
                                    if($row_record_file->uploader==$this->session->userdata['ID'])
                                    {
                                        //echo '<br>< '.anchor('student_home_group/group_message/delete/'.urlencode($this->encrypt->encode($row['MessageNo'])).'/'.$this->uri->segment(3),'Delete','onclick=" return check()"').' >';
                                        echo '<br> '.anchor('student_home_group/delete_file/'.$courseno.'/'.$row_record_file->filename," <font color='red'>Delete</font> ",'onclick=" return check()"').' #';
                                    }
                                echo ' '.anchor('teacher_message/comment/'.$row_record_file->file_id.'/'.$courseno," <font color='red'>".${'commentoffile'.$row_record_file->file_id}." Comment</font> ").'<br>';

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

    <div class="clear"></div>
  </div>
</div>


