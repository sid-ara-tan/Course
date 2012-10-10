<?php
    $data['title']="Teacher Home Page";
    $this->load->view('header/index_header',$data);
    $T_ID=$this->session->userdata['ID'];
    $info=$this->teacher->get_info();
?>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1>Course Management System</h1>
      <h3><font color="azure"><?php echo $info->Name;?></font></h3>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2" >
  <div id="topnav" >
    <ul>
        <li class="active"><a href="<?php echo base_url();?>index.php/teacher_home">Class Routine</a></li>

      <li><a href="<?php echo base_url();?>index.php/teacher_home/show_profile">Profile</a></li>
      <li><a href="#">Assigned Course</a>
        <ul>
          <?php
                $T_ID=$this->session->userdata['ID'];
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
<div class="wrapper row3" >
  
</div>
<div id="featured_slide">
    <!-- ####################################################################################################### -->
    <dl class="slidedeck">
      <?php $rows=$this->teacher->get_courses(); ?>
      <?php if(!$rows):?>
        <dt></dt>
        <dd>
        <div align="center">
            <h1>No Course to show</h1>
        </div>
        </dd>
      <?php endif;?>

      <?php $record=$this->classinfo->get_routine('Saturday'); ?>
      <?php if($record):?>
      <dt>Saturday</dt>
      <dd>
          <div style="height:360px; background-color:#ffffff">
            <?php
                $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">',
                                'heading_row_start'   => '<tr class="dark">',
                                'heading_row_end'     => '</tr>',
                                'row_start'           => '<tr class="light">',
                                'row_end'             => '</tr>',
                                'row_alt_start'       => '<tr class="dark">',
                                'row_alt_end'         => '</tr>');
                $this->table->set_template($tmpl);
                $this->table->set_heading('CourseNo', 'Sec','Period', 'Time','Duration','Location');
                $this->load->model('classinfo');
                
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->CourseNo,$row->Sec,$row->Period,$row->cTime,$row->Duration,$row->Location);
                            }
                        }
                echo $this->table->generate();
            ?>
          </div>
      </dd>
      <?php endif;?>
      <?php $record=$this->classinfo->get_routine('Sunday');?>
      <?php if($record):?>
      <dt>Sunday</dt>
      <dd>
          <div style="height:360px; background-color:#ffffff">
          <?php
                $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">',
                                'heading_row_start'   => '<tr class="dark">',
                                'heading_row_end'     => '</tr>',
                                'row_start'           => '<tr class="light">',
                                'row_end'             => '</tr>',
                                'row_alt_start'       => '<tr class="dark">',
                                'row_alt_end'         => '</tr>');
                $this->table->set_template($tmpl);
                $this->table->set_heading('CourseNo', 'Sec','Period', 'Time','Duration','Location');
                
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->CourseNo,$row->Sec,$row->Period,$row->cTime,$row->Duration,$row->Location);
                            }
                        }
                echo $this->table->generate();
            ?>
          </div>
      </dd>
      <?php endif;?>
      <?php $record=$this->classinfo->get_routine('Monday');?>
      <?php if($record):?>
      <dt>Monday</dt>
      <dd>
          <div style="height:360px; background-color:#ffffff">
          <?php
                $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">',
                                'heading_row_start'   => '<tr class="dark">',
                                'heading_row_end'     => '</tr>',
                                'row_start'           => '<tr class="light">',
                                'row_end'             => '</tr>',
                                'row_alt_start'       => '<tr class="dark">',
                                'row_alt_end'         => '</tr>');
                $this->table->set_template($tmpl);
                $this->table->set_heading('CourseNo', 'Sec','Period', 'Time','Duration','Location');
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->CourseNo,$row->Sec,$row->Period,$row->cTime,$row->Duration,$row->Location);
                            }
                        }
                echo $this->table->generate();
            ?>
          </div>
      </dd>
      <?php endif;?>
      <?php $record=$this->classinfo->get_routine('Tuesday');?>
      <?php if($record):?>
      <dt>Tuesday</dt>
      <dd>
          <div style="height:360px; background-color:#ffffff">
          <?php
                $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">',
                                'heading_row_start'   => '<tr class="dark">',
                                'heading_row_end'     => '</tr>',
                                'row_start'           => '<tr class="light">',
                                'row_end'             => '</tr>',
                                'row_alt_start'       => '<tr class="dark">',
                                'row_alt_end'         => '</tr>');

                $this->table->set_template($tmpl);
                $this->table->set_heading('CourseNo', 'Sec','Period', 'Time','Duration','Location');
                
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->CourseNo,$row->Sec,$row->Period,$row->cTime,$row->Duration,$row->Location);
                            }
                        }
                echo $this->table->generate();
            ?>
          </div>
      </dd>
      <?php endif;?>
      <?php $record=$this->classinfo->get_routine('Wednesday');?>
      <?php if($record):?>
      <dt>Wednesday</dt>
      <dd>
          <div style="height:360px; background-color:#ffffff">

          <?php
                $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">',
                                'heading_row_start'   => '<tr class="dark">',
                                'heading_row_end'     => '</tr>',
                                'row_start'           => '<tr class="light">',
                                'row_end'             => '</tr>',
                                'row_alt_start'       => '<tr class="dark">',
                                'row_alt_end'         => '</tr>');
                $this->table->set_template($tmpl);
                $this->table->set_heading('CourseNo', 'Sec','Period', 'Time','Duration','Location');
                //$record=$this->classinfo->get_routine('Wednesday');
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->CourseNo,$row->Sec,$row->Period,$row->cTime,$row->Duration,$row->Location);
                            }
                        }
                echo $this->table->generate();
            ?>
          <?php endif;?>
          
          </div>
      </dd>
    </dl>
  </div>
  <!-- ####################################################################################################### -->
<div align="center"  >
        <h1>Exam routine</h1>
        <div class="demo" style="width:800px;height:300px;" align="left">
        <?php
        $rows=$this->teacher->get_courses();
                if($rows!=FALSE){
        ?>
            <div id="accordion">
                <?php
                    foreach($rows as $row){
                        $courseno=$row->CourseNo;
                        echo '<h1><a href="#">'.$row->CourseName.'</a></h1><div>';
                        $rows=$this->exam->get_routine($row->CourseNo);
                        $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">',
                                    'heading_row_start'   => '<tr class="dark">',
                                    'heading_row_end'     => '</tr>',
                                    'row_start'           => '<tr class="light">',
                                    'row_end'             => '</tr>',
                                    'row_alt_start'       => '<tr class="dark">',
                                    'row_alt_end'         => '</tr>');
                        $this->table->set_template($tmpl);

                        if($rows==FALSE){
                            echo '<h1>No exam scheduled</h1>';
                        }else{
                            $this->table->set_heading('Section','Title','Type','Date','Time','Duration','Location','Action');
                            foreach ($rows as $row) {
                                if($T_ID==$row->Scheduler_ID && $this->exam->total_marks($courseno,$row->Sec,$row->ID)==0){
                                    $this->table->add_row($row->Sec,$row->Topic,$row->eType,$row->eDate,$row->eTime,$row->Duration,$row->Location,
                                            anchor('teacher_home/delete_scheduled/'.$courseno.'/'.$row->Sec.'/'.$row->ID,'Delete','onclick=" return check()"'));
                                }else{
                                    $this->table->add_row($row->Sec,$row->Topic,$row->eType,$row->eDate,$row->eTime,$row->Duration,$row->Location,'NA');
                                }
                            }
                            echo $this->table->generate();
                        }
                        echo '</div>';
                    }
                    ?>
            </div>
                <?php
                }
                else{
                    echo '<h1 style="text-align:center;">No course assigned</h1>';
                    echo br(20);
                }
                ?>
          
        </div>
</div>

<!-- ####################################################################################################### -->



<!-- ####################################################################################################### -->
<?php $this->load->view('footer/footer');?>