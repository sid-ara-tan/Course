<?php
    $data['title']="Teacher profile";
    $this->load->view('header/full_width_header',$data);
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
      <li  class="active"><a href="<?php echo base_url();?>index.php/teacher_home/show_profile">Profile</a></li>
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
    <?php $row=$this->teacher->get_info();?>
    
    <br /><label for="Name">Name:</label><input type="text" name="Name" value="<?php echo $row->Name;?>" disabled="true"/>
    <br /><br /><label for="Dept">Dept:</label><input type="text" name="Dept" value="<?php echo $row->Dept_Id;?>" disabled="true"/>
    <br /><br /><label for="Designation">Designation:</label><input type="text" name="Designation" value="<?php echo $row->Designation;?>" disabled="true"/>
    
    <!-- ####################################################################################################### -->
    <div class="clear"></div>
  </div>
    <script type="text/javascript">
    $(document).ready(function(){
    $("p.flip").click(function(){
    $("div.panel").slideToggle("slow");
    });
    });
    </script>
    <p class="flip" style="margin:0px;
                padding:5px;
                text-align:center;
                background:#e5eecc;
                border:solid 1px #c3c3c3;">Edit profile</p>
    <div class="panel"align="center" style="display:none">
        <fieldset>
            <legend>Login Info Update :Teacher</legend>


            <?php   echo form_open('teacher_home/edit_profile/edit'); ?>

            <p><label for="name">New Password:</label><?php   echo form_password('password',set_value('password',$teacher->Password)); ?></p>
            <p><?php echo form_error('password','<p class="error">'); ?></p>

            <p><label for="name">Confirm Password:</label><?php   echo form_password('password2',set_value('password2',$teacher->Password)); ?></p>
            <p><?php echo form_error('password2','<p class="error">'); ?></p>

        </fieldset>

        <fieldset>
            <legend>Basic Information Update</legend>

            <P><label for="name">Name:</label><?php  echo form_input('name',set_value('name',$teacher->Name)); ?></P>
            <p><?php echo form_error('name','<p class="error">'); ?></p>


            <?php
                $options=array();
                foreach ($department as $dp) {
                    $options[$dp->Dept_id]=$dp->Dept_id;
            }
            ?>

            <p><label for="name">Department:</label><?php echo form_dropdown('dept_id', $options,set_value('dept_id',$teacher->Dept_Id)); ?></p>
            <?php echo set_select('dept_id',$teacher->Dept_Id);?>

             <?php
                $options=array(
                    'Professor'=>'Professor',
                    'Lecturer'=>'Lecturer',
                    'Associate Professor'=>'Associate Professor',
                    'Assistant Professor'=>'Assistant Professor',
                );
            ?>

            <p><label for="name">Designation:</label><?php echo form_dropdown('designation', $options,set_value('designation',$teacher->Designation)); ?></p>
            <?php echo set_select('designation',$teacher->Designation);?>
            <p><?php   echo form_submit('submit','Edit information');?></p>

        <?php echo form_close();?>


    </fieldset>
    </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<?php $this->load->view('footer/footer');?>