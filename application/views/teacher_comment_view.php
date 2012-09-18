<?php
$data['title'] = "Teacher Comment";
$this->load->view('header/style_demo_header', $data);
?>

<?php
$row_std = $query_student_info;
?>

<body id="top">
    <div class="wrapper row1">
        <div id="header" class="clear">
            <div class="fl_left">
                <h1><a href="index.html">Course Management System</a></h1>
                <p>Teacher Panel of <b><?php echo "* " . $row_std->Name . " *"; ?></b>
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
                <li class="active"><a href="<?php echo base_url().'index.php/teacher_message/index';?>">Back To Group</a></li>

            </ul>
            <div  class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <div class="wrapper row4">
        <div id="container" class="clear">
            <!-- ####################################################################################################### -->
            <?php $row_post=$query_post->row();?>
            <div id="content">
                <b><font color="red"><?php echo $notification; ?></font></b>
                <?php
                if($isfile==false)
                {
                    ?>
                    <h1><?php echo $row_post->Subject;?></h1>
                    <p><?php echo $row_post->mBody;?></p>
                    <hr>
                    <p><?php echo "by ".$nameof.' at '.$row_post->mTime;?></p>
                    <hr>
                    <?php
                }
                else
                {
                    ?>
                    <h3><?php echo anchor('student_home_group/download_file/'.$this->uri->segment(4).'/'.$row_post->filename, $row_post->topic); ?></h3>
                    <p><?php echo $row_post->description;?></p>
                    <hr>
                    <p><?php echo "by ".$nameof.' at '.$row_post->time;?></p>
                    <hr>
                    <?php
                }
?>

                <div id="comments">
                    <h2>Comments</h2>
                    <ul class="commentlist">
                    <?php
                    if($querycomment!=FALSE)
                    {
                        foreach ($querycomment->result_array() as $row)
                        {?>
                            <li class="comment_even">
                                <div class="author"><img class="avatar" src="images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#"><?php echo ${'nameof'.$row['id']};?></a></span> <span class="wrote">wrote:</span></div>
                                <?php if($row['senderType']=='teacher')echo " (admin)<br>" ?>
                                <div class="submitdate"><a href="#"><?php echo $row['time'];?></a></div>
                                <p><?php echo $row['body'].'</p>';
                                    //$row_name_std=$query_student_name->row();
                                    if($row['commentBy']==$this->session->userdata['ID'])
                                    {
                                        echo '<br>< '.anchor('teacher_message/comment_delete/'.$row['msg_no'].'/'.$row['CourseNo'].'/'.$row['id'],'Delete','onclick=" return check()"').' >';
                                    }?>
                            </li>
                        <?php

                        }
                        echo $this->pagination->create_links();
                    }
                    else echo 'no comment';
                     ?>
                    </ul>
                </div>
                <h2>Write A Comment</h2>
                <div id="respond">
                    <?php echo form_open('teacher_message/comment_post');?>
                        <p>
                            <textarea name="comment" id="comment" cols="100%" rows="10"></textarea>
                            <label for="comment" style="display:none;"><small>Comment (required)</small></label>
                            <?php
                                    if($isfile==false)echo form_hidden('msg_no',$row_post->MessageNo);
                                    else echo form_hidden('msg_no',$row_post->file_id);
                                    echo form_hidden('courseno',$row_post->CourseNo);
                            ?>
                        </p>
                        <p>
                            <input type="button" id="cmntPost" value="Post" onclick="checkNullComment(this.form)" />
                            &nbsp;
                            <input name="reset" type="reset" id="reset" tabindex="5" value="Reset" />
                        </p>
                    </form>
                </div>
            </div>
            <!-- ####################################################################################################### -->
            <div class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->

    <?php $this->load->view('footer/footer'); ?>
