<?php
$data['title'] = "Course Regitration Page";
$this->load->view('header/index_header', $data);
?>

<?php
$row_std = $query_student_info->row();
?>

    <script type="text/javascript">
    $(document).ready(function(){
    $("p.flip").click(function(){
    $("div.panel").slideToggle("slow");
    });
    });
    </script>

<body id="top">
    <div class="wrapper row1">
        <div id="header" class="clear">
            <div class="fl_left">
                <h1><a href="index.html">Course Management System</a></h1>
                <p>Student Panel of <b><?php echo "* " . $row_std->Name . " *"; ?></b>
                    <br>
                    <?php echo anchor('course/logout', 'Log Out'); ?>
                </p>
            </div>
        </div>
    </div>
    <!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li class="active"><a href="<?php echo base_url();?>index.php/student_home">Home</a></li>
      <li><a href=""><?php echo $row_std->Name;?></a>
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
            <p><b>Course Registration</b></p>
            <div id="tabs">

                <ul>

                    <li><a href="#tabs-1">My Status</a></li>

                    <li><a href="#tabs-2">Add Course</a></li>

                    <li><a href="#tabs-3">Drop Course</a></li>

                </ul>

                <div id="tabs-1">
                    <?php
                        $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">',
                                'heading_row_start'   => '<tr class="dark">',
                                'heading_row_end'     => '</tr>',
                                'row_start'           => '<tr class="light">',
                                'row_end'             => '</tr>',
                                'row_alt_start'       => '<tr class="dark">',
                                'row_alt_end'         => '</tr>');
                                            
                    if($query_drop!='Not Period')echo "<b><font color='red'>Course Drop Period Is Running</font></b>";
                    elseif($query_offered!='Not Period')echo "<b><font color='red'>Course Registration Period Is Running</font></b>";
                    else
                    {


                         if($taken_course_query!=FAlSE)
                         {
                         
                            $sum_credit=0;
                            $this->table->set_template($tmpl);
                            $this->table->set_heading('Course No','Course Name','Level','Term','Credit Hour', 'Curriculam','Comment');
                            //var_dump($query_marks);
                             foreach($taken_course_query->result_array() as $row_taken_course)
                             {
                                $this->table->add_row($row_taken_course['CourseNo'],$row_taken_course['CourseName'],$row_taken_course['sLevel'],$row_taken_course['Term'],$row_taken_course['Credit'],$row_taken_course['Curriculam'],$row_taken_course['Status']);
                                //echo '<br>';
                                $sum_credit+=$row_taken_course['Credit'];
                                //$i++;
                             }
                             
                             $this->table->add_row('','Total Credit Hour :','','',$sum_credit,'','');
                             echo "<b><font color='red'>For This Level/Term : </font></b>";
                             echo $this->table->generate();
                             
                            // $js = 'onClick="some_function()"';

                             
                         }
                         else echo "<b><font color='red'>No Taken Course Found</font></b>";
                    }
                    ?>
                </div>

                <div id="tabs-2">
                    <div class="demo">
                     <?php 
                     
                        //course registration

                     
                     if($query_offered!='Not Period')
                     {
                         if($is_taken_pending==FALSE)
                         {
                                $i=1;
                                $attributes = array('id' => 'regi_form','name' => 'regi_form');
                                echo form_open('student_home/course_selected',$attributes);
                                if($query_offered!=FAlSE)
                                {

                                    $sum_credit=0;
                                    $this->table->set_template($tmpl);
                                    $this->table->set_heading('Course No','Course Name','Credit Hour', 'Curriculam','Select','Comment');
                                    //var_dump($query_marks);
                                    foreach($query_offered->result_array() as $row_offered_course)
                                    {
                                        $this->table->add_row($row_offered_course['CourseNo'],$row_offered_course['CourseName'],$row_offered_course['Credit'],$row_offered_course['Curriculam'],form_checkbox('selected_course'.$i,$row_offered_course['CourseNo']),'');
                                        //echo '<br>';
                                        $sum_credit+=$row_offered_course['Credit'];
                                        $i++;
                                    }

                                    $this->table->add_row('','Total Credit Hour :',$sum_credit,'','','');
                                    
                                    echo "<b><font color='red'>For Level/Term : ".$row_offered_course['sLevel'].' / '.$row_offered_course['Term']."</font></b>";
                                    echo $this->table->generate();

                                    // $js = 'onClick="some_function()"';


                                }
                                else echo "<b><font color='red'>No Course Offered For Registration</font></b>";
                                //////////////////////////////////////////////////////////////////////////////
                                echo '<hr><hr>';
                                if($query_retake!=FAlSE)
                                {

                                    $this->table->set_template($tmpl);
                                    $this->table->set_heading('Course No','Course Name','Level','Term','Credit Hour', 'Curriculam','Select','Comment');
                                    //var_dump($query_marks);
                                    foreach($query_retake->result_array() as $row_retake_course)
                                    {
                                        $this->table->add_row($row_retake_course['CourseNo'],$row_retake_course['CourseName'],$row_retake_course['sLevel'],$row_retake_course['Term'],$row_retake_course['Credit'],$row_retake_course['Curriculam'],form_checkbox('selected_course'.$i,$row_retake_course['CourseNo']),'');
                                        $i++;
                                    }

                                    echo "<p class='flip'><b><font color='red'>For Retake Course (Click) </font></b></p>";
                                    echo "<div class='panel' style='display:none'>".$this->table->generate().'</div>';



                                }
                                else echo "<b><font color='red'>No Course Offered For ReTake</font></b><br>";
                                //////////////////////////////////////////////////////////////////////////////
                                echo '<hr><hr>';
                                if($query_optional!=FAlSE)
                                {

                                    $this->table->set_template($tmpl);
                                    $this->table->set_heading('Course No','Course Name','Level','Term','Credit Hour', 'Curriculam','Select','Comment');
                                    //var_dump($query_marks);
                                    foreach($query_optional->result_array() as $row_optional_course)
                                    {
                                        $this->table->add_row($row_optional_course['CourseNo'],$row_optional_course['CourseName'],$row_optional_course['sLevel'],$row_optional_course['Term'],$row_optional_course['Credit'],$row_optional_course['Curriculam'],form_checkbox('selected_course'.$i,$row_optional_course['CourseNo']),'');
                                        $i++;
                                    }

                                    echo "<p class='flip'><b><font color='red'>For Optional Course (Click) </font></b></p>";
                                    echo "<div class='panel' style='display:none'>".$this->table->generate().'</div>';



                                }
                                else echo "<b><font color='red'>No Optional Course Offered</font></b><br>";

                                    echo '<hr><hr>';
                                    echo form_hidden('count', $i);
                                    $js = 'onClick="check_selected()"';
                                    if(($query_optional!=FAlSE)||($query_retake!=FAlSE)||($query_offered!=FAlSE))echo form_button('submit_selected', 'Submit',$js);
                                    echo form_close();
                         }
                         
                         else
                         {
                                    $sum_credit=0;
                                    $this->table->set_template($tmpl);
                                    $this->table->set_heading('Course No','Course Name','Level','Term','Credit Hour', 'Curriculam','Comment');
                                    //var_dump($query_marks);
                                    foreach($is_taken_pending->result_array() as $row_taken_course_pending)
                                    {
                                        $this->table->add_row($row_taken_course_pending['CourseNo'],$row_taken_course_pending['CourseName'],$row_taken_course_pending['sLevel'],$row_taken_course_pending['Term'],$row_taken_course_pending['Credit'],$row_taken_course_pending['Curriculam'],$row_taken_course_pending['Status']);                                        //echo '<br>';
                                        $sum_credit+=$row_taken_course_pending['Credit'];
                                        //$i++;
                                    }

                                    $this->table->add_row('','Total Credit Hour :','','',$sum_credit,'','');
                                    echo "<b><font color='blue'>".$notification."</font></b><br>";
                                    echo "<b><font color='red'>Requested Course List</font></b>";
                                    echo $this->table->generate();  
                         }
                         
                     }
                     else echo "<b><font color='red'>This is Not Course Registration Period</font></b>";
                     ?>
                     
                    </div>
                </div>

                <div id="tabs-3">
                    <div class="demo">
                     <?php 
                     
                                  //course drop
                     if($query_drop!='Not Period')
                     {
                        
                         $i=1;
                         $attributes = array('id' => 'regi_form','name' => 'regi_form');
                         echo form_open('student_home/course_dropped',$attributes);
                         if($query_drop!=FAlSE)
                         {

                            $this->table->set_template($tmpl);
                            $this->table->set_heading('Course No','Course Name','Credit Hour', 'Curriculam','Select','Comment');
                            //var_dump($query_marks);
                             foreach($query_drop->result_array() as $row_query_drop)
                             {
                                 if($is_drop_pending==TRUE)$this->table->add_row($row_query_drop['CourseNo'],$row_query_drop['CourseName'],$row_query_drop['Credit'],$row_query_drop['Curriculam'],'',$row_query_drop['Status']);
                                 else $this->table->add_row($row_query_drop['CourseNo'],$row_query_drop['CourseName'],$row_query_drop['Credit'],$row_query_drop['Curriculam'],form_checkbox('selected_course'.$i,$row_query_drop['CourseNo']),$row_query_drop['Status']);
                                $i++;
                             }
                             
                             echo "<b><font color='blue'>".$notification."</font></b><br>";
                             echo "<b><font color='red'>Course For Drop</font></b>";
                             echo $this->table->generate();
                             
                             echo form_hidden('count', $i);
                             echo '<hr><hr>';
                             
                             $js = 'onClick="check_selected()"';
                             if($is_drop_pending==FALSE)echo form_button('submit_drop','SUBMIT',$js);
                                 /*<!--<input type="submit" value="SUBMIT" onclick="check_selected(this.form,<?php echo $i;?>)" />*/
                          
                             echo form_close();

                             
                         }
                         else echo "<b><font color='red'>No Course For Drop</font></b>";
                         //////////////////////////////////////////////////////////////////////////////

                         
                     }
                     else echo "<b><font color='red'>This is Not Course Drop Period</font></b>";
                     ?>
                     
                    </div>
                </div>

            </div>
        </div>
    </div>
