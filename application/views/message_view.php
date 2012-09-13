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
<!-- ####################################################################################################### -->
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
       <li class="active"><a href="<?php echo base_url();?>index.php/teacher_home/message">Message</a></li>
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
                                        <pre><?php echo $row->Description;?></pre>
                                        <p><?php if($T_ID==$row->Uploader_ID)echo anchor('teacher_home/delete_content/'.$courseno.'/'.$row->ID.'/'.$row->File_Path,' [Delete]','onclick=" return check()"').'<br />';?></p>
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

