<?php
$data['title'] = "Student Group Page";
$this->load->view('header/style_demo_header',$data);
?>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.button.js"></script>

        <script>
        $(document).ready(function(){
    
        $("div#tabs-4").ajaxStart(function(){
            $(this).html("<img src='<?php echo base_url().'/images/wait.gif';?>' />");
        });
        $("div#tabs-2").ajaxStart(function(){
            $(this).html("<img src='<?php echo base_url().'/images/wait.gif';?>' />");
        });
        $("div#tabs-3").ajaxStart(function(){
            $(this).html("<img src='<?php echo base_url().'/images/wait.gif';?>' />");
        });

        $("a#file").click(function(){
                                        //alert("ddd");
                                $.ajax({
                                        type: "POST",
                                        data: "courseno=" + $("input#courseno_hidden").val(),

                                        url: "<?php echo site_url('student_home_group/load_file');?>",
                                        success: function(msg){

                                                $("div#tabs-4").html(msg);

                                        }

                                });


        });
        
        $("a#c_content").click(function(){
                                        //alert("ddd");
                                $.ajax({
                                        type: "POST",
                                        data: "courseno=" + $("input#courseno_hidden").val(),

                                        url: "<?php echo site_url('student_home_group/load_content');?>",
                                        success: function(msg){

                                                $("div#tabs-2").html(msg);

                                        }

                                });


        });
        
        $("a#marks").click(function(){
                                        //alert("ddd");
                                $.ajax({
                                        type: "POST",
                                        data: "courseno=" + $("input#courseno_hidden").val(),

                                        url: "<?php echo site_url('student_home_group/load_marks');?>",
                                        success: function(msg){

                                                $("div#tabs-3").html(msg);

                                        }

                                });


        });
        
        });
    
	$(function() {

		$( "input:submit, button,input:button", ".demo" ).button();

		//$( "a", ".demo" ).click(function() { return false; });

	});

        function myfunction(){

            var $tabs = $('#tabs').tabs();
            var selected = $tabs.tabs('option', 'selected');
            //$('#tabs').tabs('select', selected).trigger("click");
            if(selected==3)$("a#file").click();
            else if(selected==1)$("a#c_content").click();
            else if(selected==2)$("a#marks").click();

        }

	</script>
<?php
$row_std = $query_student_info->row();
?>

<body id="top" onload="myfunction()">
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
    
            <p><b><?php echo $coursename; ?> Group</b></p>
            <div id="tabs">

                <ul>

                    <li><a href="#tabs-1">Message Board</a></li>

                    <li><a id="c_content" href="#tabs-2">Course Content</a></li>

                    <li><a id="marks" href="#tabs-3">View Marks</a></li>
                    
                    <li><a id="file" href="#tabs-4">All Files</a></li>
                    
                    <li><a id="members" href="#tabs-5">Group Members</a></li>

                </ul>

                <div id="tabs-1">
                     <div class="demo">
                        <?php 
                        { ?>

                                <b><font color="red"><?php echo $notification; ?></font></b>
                                <?php echo form_open('student_home_group/group_message/post');?>

                                <br><h1><?php echo ' Wall';?></h1><br>
                                <p>
                                    <?php echo form_label('Subject', 'subject_label');?>
                                    <br>
                                    <input type="text" name="subject" id="subject" value="" size="50" />
                                    <div id="subject_div"></div>
                                    <br>
                                    <?php echo form_label('Message', 'message_label');?>
                                    <br>
                                    <textarea name="message" id="message" rows="5" cols="70" maxlenth="1000" ></textarea>
                                    <div id="message_div"></div>
                                </p>

                                <p>
                                    <input type="button" id="msgPost" value="Post" onclick="checkNull(this.form)" />
                                </p>
                                <?php 
                                //echo form_hidden('courseno',$courseno);
                                echo "<input type='hidden' id='courseno_hidden' name='courseno' value='$courseno' />";
                                echo form_close(); ?>

                                <hr />
                                <hr /><hr />
                                <?php
                                $row_std_name=$query_student->row();
                                if($querymsg!=FALSE)
                                {

                                foreach ($querymsg as $row)
                                    {
                                    echo '<b>'.$row->SenderInfo.'</b>'.' says :';
                                    echo '('.$row->mTime.')';
                                    echo br(2);;
                                    echo "<font color='blue'><h3><b>".$row->Subject.'</b></h3></font><br>';
                                    echo $row->mBody.'<br><br>';
                                    if($row->SenderInfo==$row_std_name->Name)
                                    {
                                        //echo '<br>< '.anchor('student_home_group/group_message/delete/'.urlencode($this->encrypt->encode($row['MessageNo'])).'/'.$this->uri->segment(3),'Delete','onclick=" return check()"').' >';
                                        echo '<br> '.anchor('student_home_group/group_message/delete/'.$row->MessageNo.'/'.$courseno," <font color='red'>Delete</font> ",'onclick=" return check()"').' ';  
                                    }
                                    
                                    
                                    
                                    echo ' '.anchor('student_home_group/comment/'.$row->MessageNo.'/'.$courseno,"# <font color='red'>".${'commentof'.$row->MessageNo}." Comment</font> ").'<br>';
                                    echo '<hr/>';

                                    }

                                echo $this->pagination->create_links();
                                }
                                
                                else echo "<b><font color='red'>No Post</font></b>";


                        }
                        ?>
                      </div>
                </div>

                <div id="tabs-2"></div>

                <div id = "tabs-3"></div>

                <div id = "tabs-4"></div>
                
                 <div id = "tabs-5"></div>

    </div>
  </div>
</div>
    



                   

        <!-- ####################################################################################################### -->
        <?php $this->load->view('footer/footer'); ?>
