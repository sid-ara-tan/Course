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
      <li><a href="style-demo.html">Style Demo</a></li>
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
      <li><a href="3-columns.html">3 Columns</a></li>
      <li class="last"><a href="gallery.html">Gallery</a></li>
    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <div >
      
     
      <div id="comments">
        
        <h1><?php $courseno=$this->uri->segment(3); echo $courseno;?></h1>
        <h2>Course Contents</h2>
        <ul class="commentlist">
        <?php
            $courseno=$this->uri->segment(3);
            /*echo "<fieldset>";
            echo anchor("upload_content/index/$courseno",'+ Upload new content');
            echo "</fieldset>";*/

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
                    <p><?php echo anchor('teacher_home/delete_content/'.$courseno.'/'.$row->ID.'/'.$row->File_Path,' [Delete]').'<br />';?></p>
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
            echo $message."<br />";
            echo validation_errors();
            echo form_open_multipart('teacher_home/upload_file/'.$courseno);
            ?>
             <input type="text" name="Topic" maxlength="30" size="40" style="width:20%" />
             <label for="Topic"><small>Topic (required)</small></label>
            <textarea name="Description" rows="10" cols="60"></textarea>
            <label for="Description"><small>Description</small></label><br/>
            <?php
                    
                    echo form_hidden('Author',$name);

            ?>
            <br />
            <input type="file" name="somefile" size="50" />
            <label for="somefile"><small>File (required)</small></label><br/>
            <input type="submit" name="submit" value="Upload" />
      </div>
    </div>
    
    <!-- ####################################################################################################### -->
    <div class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<?php $this->load->view('footer/footer');?>