<?php
    $data['title']="Teacher Home Page";
    $this->load->view('header/index_header',$data);
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
        <li class="active"><a href="<?php echo base_url();?>index.php/teacher_home">Class Routine</a></li>
      <li><a href="style-demo.html">Style Demo</a></li>
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
      <li><a href="3-columns.html">3 Columns</a></li>
      <li class="last"><a href="gallery.html">Gallery</a></li>
    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div id="featured_slide">
    <!-- ####################################################################################################### -->
    <dl class="slidedeck">
      <dt>Saturday</dt>
      <dd>
          <div style="height:360px; background-color:#494949">
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
                $record=$this->classinfo->get_routine('Saturday');
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->CourseNo,$row->Sec,$row->Period,$row->cTime,$row->Duration,$row->Location);
                            }
                        }
                echo $this->table->generate();
            ?>
          </div>
      </dd>
      <dt>Sunday</dt>
      <dd>
          <div style="height:360px; background-color:#494949">
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
                $record=$this->classinfo->get_routine('Sunday');
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->CourseNo,$row->Sec,$row->Period,$row->cTime,$row->Duration,$row->Location);
                            }
                        }
                echo $this->table->generate();
            ?>
          </div>
      </dd>
      <dt>Monday</dt>
      <dd>
          <div style="height:360px; background-color:#494949">
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
                $record=$this->classinfo->get_routine('Monday');
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->CourseNo,$row->Sec,$row->Period,$row->cTime,$row->Duration,$row->Location);
                            }
                        }
                echo $this->table->generate();
            ?>
          </div>
      </dd>
      <dt>Tuesday</dt>
      <dd>
          <div style="height:360px; background-color:#494949">
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
                $record=$this->classinfo->get_routine('Tuesday');
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->CourseNo,$row->Sec,$row->Period,$row->cTime,$row->Duration,$row->Location);
                            }
                        }
                echo $this->table->generate();
            ?>
          </div>
      </dd>
      <dt>Wednessday</dt>
      <dd>
          <div style="height:360px; background-color:#494949">

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
                $record=$this->classinfo->get_routine('Wednessday');
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->CourseNo,$row->Sec,$row->Period,$row->cTime,$row->Duration,$row->Location);
                            }
                        }
                echo $this->table->generate();
            ?>
          </div>
      </dd>
    </dl>
  </div>
  <!-- ####################################################################################################### -->
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<?php $this->load->view('footer/footer');?>