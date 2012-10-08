<?php
    $data['title']="Student Home Page";
    $this->load->view('header/index_header',$data);
?>

<?php
    $row_std=$query_student_info->row();
?>
<script>
        $.fx.speeds._default = 1000;

        $(document).ready(function(){
            
            
        $( "#dialog-message" ).dialog({

                        minWidth:720,
                        modal:true,
			autoOpen: false,

			show: "blind",

			hide: "explode"

		});

        $('.calender .day').click(function(){
             
             date=$(this).find('.day_num').html();
             //ddd=document.getElementById('linku').innerHTML;

                if(date!=null){  
                        $.ajax({
                                type: "POST",
                                data: {
                                    year: "<?php echo $this->uri->segment(5);?>",
                                    month: "<?php echo $this->uri->segment(6);?>",
                                    date: date
                                },

                                url: "<?php echo site_url('student_home/load_exam_calender');?>",
                                success: function(msg){
                                        //document.getElementById('data_in_dialog').innerHTML="<span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span>\n\
                                                                   //  Your selected : "+msg;
                                        document.getElementById('data_in_dialog').innerHTML=msg;
                                        $( "#dialog-message" ).dialog( "open" );

                                        return false;

                                }

                        });

                }
              });
        });
       
</script>
<style>
    .calender .highlight{
        font-weight: bold;color:#00F;
    }
    .calender .days td:hover{
        background-color: #FFF;
    }
</style>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="index.html">Course Management System</a></h1>
      <p>Student Panel of <b><?php echo "* ".$row_std->Name." *";?></b>
          <br>
          <?php echo anchor('logout','Log Out');?>
      </p>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li class="active"><a href="<?php echo base_url();?>index.php/student_home">Home</a></li>
      <li><a href=""><?php echo $row_std->S_Id;?></a>
         <ul>
            <?php
                    echo "<li>";
                    echo anchor("student_home/profile","Edit Profile")."</li>" ;
             ?>
        </ul>
      </li>
      <li><?php echo anchor("student_home/course_registration","Course Registration")?></li>
      <li><a href="#">Course Group</a>
        <ul>
            <?php
            if($taken_course_query!=FALSE)
            {
                $course_taken=$taken_course_query->result_array();

                foreach($course_taken as $row){
                    echo "<li>";
                    echo anchor("student_home/group/{$row['CourseNo']}",$row['CourseName'])."</li>" ;
                }
            }
            else echo "<li>No Course Taken</li>";
             ?>
        </ul>
      </li>
      <li class="last"><?php echo anchor("student_home/result","Result")?></li>
    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->

<div class="wrapper row3">
  <div id="featured_slide">
    <!-- ####################################################################################################### -->
    <p><b>Daily Class Schedule</b></p>
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
                $this->table->set_heading('Period','Course No','Course Name', 'Teacher', 'Time','Duration','Location');
                //$this->load->model('classinfo');
                $record=$this->classinfo->get_routine_student('Saturday',$row_std->Sec);
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->Period,$row->CourseNo,$row->CourseName,$row->Name,$row->cTime,$row->Duration,$row->Location);
                            }
                            echo $this->table->generate();
                        }
            
                
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
                $this->table->set_heading('Period','Course No','Course Name', 'Teacher', 'Time','Duration','Location');
                //$this->load->model('classinfo');
                $record=$this->classinfo->get_routine_student('Sunday',$row_std->Sec);
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->Period,$row->CourseNo,$row->CourseName,$row->Name,$row->cTime,$row->Duration,$row->Location);
                            }
                            echo $this->table->generate();
                        }
            
                
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
                $this->table->set_heading('Period','Course No','Course Name', 'Teacher', 'Time','Duration','Location');
                //$this->load->model('classinfo');
                $record=$this->classinfo->get_routine_student('Monday',$row_std->Sec);
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->Period,$row->CourseNo,$row->CourseName,$row->Name,$row->cTime,$row->Duration,$row->Location);
                            }
                            echo $this->table->generate();
                        }
            
                
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
                $this->table->set_heading('Period','Course No','Course Name', 'Teacher', 'Time','Duration','Location');
                //$this->load->model('classinfo');
                $record=$this->classinfo->get_routine_student('Tuesday',$row_std->Sec);
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->Period,$row->CourseNo,$row->CourseName,$row->Name,$row->cTime,$row->Duration,$row->Location);
                            }
                            echo $this->table->generate();
                        }
            
                
            ?>
          </div>
      </dd>
      
      <dt>Wednesday</dt>
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
                $this->table->set_heading('Period','Course No','Course Name', 'Teacher', 'Time','Duration','Location');
                //$this->load->model('classinfo');
                $record=$this->classinfo->get_routine_student('Wednesday',$row_std->Sec);
                if($record!=FALSE){
                            foreach($record as $row){
                                $this->table->add_row($row->Period,$row->CourseNo,$row->CourseName,$row->Name,$row->cTime,$row->Duration,$row->Location);
                            }
                            echo $this->table->generate();
                        }
            
                
            ?>
          </div>
      </dd>
      
    </dl>
  </div>
  <!-- ####################################################################################################### -->
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
    <br><br><br>
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
      <div class="fl_left">
        <h2 class="title">Exam Calender</h2>
        <div id="hpage_quicklinks">
            <?php echo $my_calender;?>
                    <p>
                        <span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span>
                        Click On A date To see the exam list on that day..
                        
                    </p>
            <div id="dialog-message" title="Exam Schedule">

                    <p id="data_in_dialog">



                    </p>



            </div>

        
        </div>
      </div>
      <!-- ############### -->
      <div class="fl_right">
        <h2 class="title">Latest News</h2>
        <div id="hpage_latestnews">
          <ul>
            <li>
              <div class="imgl"><img src="<?php echo base_url();?>template/images/demo/160x80.gif" alt="" /></div>
              <p class="latestnews">This is a W3C compliant free website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. This template is distributed using a <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>.</p>
              <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
            </li>
            <li>
              <div class="imgl"><img src="<?php echo base_url();?>template/images/demo/160x80.gif" alt="" /></div>
              <p class="latestnews">You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files. For more CSS templates visit <a href="http://www.os-templates.com/">Free Website Templates</a>.</p>
              <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
            </li>
            <li class="last">
              <div class="imgl"><img src="<?php echo base_url();?>template/images/demo/160x80.gif" alt="" /></div>
              <p class="latestnews">Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis. Maecenaset adipiscinia tellentum nullam velit et a convallis curabitae vitae laoreet niseros ligula sem sed susp en at.</p>
              <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
            </li>
          </ul>
        </div>
    </div>
    <!-- ####################################################################################################### -->
  </div>
</div>
</div>

<!-- ####################################################################################################### -->
<?php $this->load->view('footer/footer');?>
