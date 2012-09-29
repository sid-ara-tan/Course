<?php
$data['title'] = "Student Group Page Comment";
$this->load->view('header/style_demo_header', $data);
?>

<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.button.js"></script>>
<script>
    $(function() {

		$( "input:submit, button,input:button", ".demo" ).button();

		//$( "a", ".demo" ).click(function() { return false; });

	});
</script>


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
                <li><a href="<?php echo base_url(); ?>index.php/student_home">Home</a></li>
                <li><a href=""><?php echo $row_std->S_Id; ?></a>
                    <ul>
                        <?php
                        echo "<li>";
                        echo anchor("student_home/profile", "Edit Profile")."</li>";
                        ?>
                    </ul>
                </li>
                <li><?php echo anchor("student_home/course_registration", "Course Registration") ?></li>
                <li class="active"><a href="#">Course Group</a>
                    <ul>
                        <?php
                        if($taken_course_query!=FALSE)
                        {
                        $course_taken = $taken_course_query->result_array();

                        foreach($course_taken as $row){
                        echo "<li>";
                        echo anchor("student_home/group/{$row['CourseNo']}", $row['CourseName'])."</li>";
                        }
                        }
                        else echo "<li>No Course Taken</li>";
                        ?>
                    </ul>
                </li>
                <li class="last"><?php echo anchor("student_home/result", "Result") ?></li>
            </ul>
            <div  class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->
    <div class="wrapper row4">
        <div id="container" class="clear">
            <!-- ####################################################################################################### -->
            <div id="content">
                    
                    <?php
                    if($query_result_list!=FALSE)
                        {
                        echo '<div class="demo" align="center" style="border:solid">';
                        echo "<br><h2>Select Level/Term</h2>";
                        echo form_open('student_home/result_show');
                        ?>
                        
                        <select name="selectlt">
                            <option value="" selected="selected">Select an Option</option>
                            <?php  foreach ($query_result_list->result_array() as $row)
                            { ?>
                                    <option value="<?php echo $row['sLevel'].$row['Term']?>"><?php echo 'Level '.$row['sLevel'].'/Term '.$row['Term'];?></option>

                            <?php } ?>
                        </select>
                        
                        <?php echo '<br><br>'.form_submit('mysubmit', 'Show!'); 
                        echo '<br><br></div>';
                        }
                    else echo heading('-No Result To Show !-',3);?>
            </div>
            <!-- ####################################################################################################### -->
            <div class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->

    <?php $this->load->view('footer/footer'); ?>
