<?php
    $data['title']="Teacher profile";
    $this->load->view('header/full_width_header',$data);
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

      <li  class="active"><a href="<?php echo base_url();?>index.php/teacher_home/show_profile">Profile</a></li>
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
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <?php $row=$this->teacher->get_info();?>
     <h1>Information</h1>
     <?php $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" style="width:50%">',
                        'heading_row_start'   => '<tr class="dark">',
                        'heading_row_end'     => '</tr>',
                        'row_start'           => '<tr class="light">',
                        'row_end'             => '</tr>',
                        'row_alt_start'       => '<tr class="dark">',
                        'row_alt_end'         => '</tr>');
        $this->table->set_template($tmpl);
        $this->table->add_row('Name',$row->Name);
        $this->table->add_row('Department',$row->Dept_Id);
        $this->table->add_row('Designation',$row->Designation);
        echo $this->table->generate();
    ?>
    <!-- ####################################################################################################### -->
    <div class="clear"></div>
  
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
                border:solid 1px #c3c3c3;
                height: 100px;
                width: 50px;
                right:0px;
                position: fixed;
                ">Edit profile</p>
    <div class="panel" style="display:none">
        <h1>Edit Information</h1>
        <?php   echo form_open('teacher_home/edit_profile/edit'); ?>
        <table border="1" cellpadding="2" cellspacing="1" style="width:50%">
            <tr class="dark">
                <td><label for="name">New Password:</label></td>
                <td>
                    <?php   echo form_password('password',set_value('password',$teacher->Password)); ?>
                    <?php echo form_error('password','<p class="error">'); ?>
                </td>
            </tr>
            <tr class="light">
                <td><label for="name">Confirm Password:</label></td>
                <td>
                    <?php   echo form_password('password2',set_value('password2',$teacher->Password)); ?>
                    <?php echo form_error('password2','<p class="error">'); ?>
                </td>
            </tr>

            <tr class="dark">
                <td><label for="name">Name:</label></td>
                <td>
                    <?php  echo form_input('name',set_value('name',$teacher->Name)); ?>
                    <?php echo form_error('name','<p class="error">'); ?>
                </td>
            </tr>

            <?php
                $options=array();
                foreach ($department as $dp) {
                    $options[$dp->Dept_id]=$dp->Dept_id;
            }
            ?>

            <tr class="light">
                <td><label for="name">Department:</label></td>
                <td>
                    <?php echo form_dropdown('dept_id', $options,set_value('dept_id',$teacher->Dept_Id)); ?>
                    <?php echo set_select('dept_id',$teacher->Dept_Id);?>
                </td>
            </tr>
            <?php
                $options=array(
                    'Professor'=>'Professor',
                    'Lecturer'=>'Lecturer',
                    'Associate Professor'=>'Associate Professor',
                    'Assistant Professor'=>'Assistant Professor',
                );
            ?>
            <tr class="dark">
                <td><label for="name">Designation:</label></td>
                <td>
                    <?php echo form_dropdown('designation', $options,set_value('designation',$teacher->Designation)); ?>
                    <?php echo set_select('designation',$teacher->Designation);?>
                </td>
            </tr>

             <tr class="light">
                <td></td>
                <td>
                 <?php   echo form_submit('submit','Edit information');?>
                </td>
            </tr>
        </table>

         <?php echo form_close();?>

       <!-- <fieldset>
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
       -->
    </div>
    </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<?php $this->load->view('footer/footer');?>