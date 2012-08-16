<?php
$data['title'] = "Student Group Page";
$this->load->view('header/index_header', $data);
?>

<?php
$row_std = $query_student_info->row();
?>

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
            <p><b><?php echo $coursename;?> Group</b></p>
            <div id="tabs">

                <ul>

                    <li><a href="#tabs-1">Message Board</a></li>
                    
                    <li><a href="#tabs-4">All Files</a></li>

                    <li><a href="#tabs-2">Course Content</a></li>

                    <li><a href="#tabs-3">View Marks</a></li>

                </ul>

                <div id="tabs-1">

                    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>

                </div>

                <div id="tabs-2">

                    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>

                </div>

                <div id="tabs-3">

                    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>

                    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>

                </div>
                
                <div id="tabs-4">

                    <p>All Course files will be here.</p>

                    

                </div>

            </div>
        </div>
    </div>


    <!-- ####################################################################################################### -->
    <div class="wrapper row4">
        <div id="container" class="clear">
            <!-- ####################################################################################################### -->
            <div id="homepage" class="clear">
                <div class="fl_left">
                    <h2 class="title">Quick Links</h2>
                    <div id="hpage_quicklinks">
                        <ul class="clear">
                            <li><a href="#">Academic departments</a></li>
                            <li><a href="#">Alumni</a></li>
                            <li><a href="#">Business &amp; Enterprise</a></li>
                            <li><a href="#">Departments A-Z</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Graduate Courses</a></li>
                            <li><a href="#">International Students</a></li>
                            <li><a href="#">Job opportunities</a></li>
                            <li><a href="#">Lifelong Learning</a></li>
                            <li><a href="#">Maps and Directions</a></li>
                            <li><a href="#">Online Courses</a></li>
                            <li><a href="#">Parents</a></li>
                            <li><a href="#">Postgraduate research</a></li>
                            <li><a href="#">Postgraduate taught</a></li>
                            <li><a href="#">Prospective Students</a></li>
                            <li><a href="#">Research</a></li>
                            <li><a href="#">Students</a></li>
                            <li><a href="#">Teaching &amp; Learning</a></li>
                            <li><a href="#">Undergraduate Courses</a></li>
                            <li><a href="#">Videos</a></li>
                            <li><a href="#">Visiting the University</a></li>
                            <li><a href="#">What's On</a></li>
                        </ul>
                    </div>
                </div>
                <!-- ############### -->
                <div class="fl_right">
                    <h2 class="title">Latest News</h2>
                    <div id="hpage_latestnews">
                        <ul>
                            <li>
                                <div class="imgl"><img src="<?php echo base_url(); ?>template/images/demo/160x80.gif" alt="" /></div>
                                <p class="latestnews">This is a W3C compliant free website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. This template is distributed using a <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>.</p>
                                <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                            </li>
                            <li>
                                <div class="imgl"><img src="<?php echo base_url(); ?>template/images/demo/160x80.gif" alt="" /></div>
                                <p class="latestnews">You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files. For more CSS templates visit <a href="http://www.os-templates.com/">Free Website Templates</a>.</p>
                                <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                            </li>
                            <li class="last">
                                <div class="imgl"><img src="<?php echo base_url(); ?>template/images/demo/160x80.gif" alt="" /></div>
                                <p class="latestnews">Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis. Maecenaset adipiscinia tellentum nullam velit et a convallis curabitae vitae laoreet niseros ligula sem sed susp en at.</p>
                                <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ####################################################################################################### -->
            </div>
        </div>

        <!-- ####################################################################################################### -->
        <?php $this->load->view('footer/footer'); ?>
