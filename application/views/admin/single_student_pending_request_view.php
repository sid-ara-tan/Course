<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<?php include 'template/scr_sty_tab_data.php'; ?>

<style type="text/css" media="screen">
.group_button{
    cursor:pointer;
    background:#adb6aa;
    width: 75px;
    height: 25px;
    color: white;
    border: 1px solid azure;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
}
.group_button:hover {
    background:#9ba399;
        border: 1px solid azure;
}
</style>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin'),
    );
    $data['current']='Pending request';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>
<?php $the_student_info=$student_info->row();?>

<section id="main" class="column">
<article class="module width_3_quarter shadow ">
    <header><h3 class="tabs_involved">Pending Requests</h3>
    <ul class="tabs">
        <li><a href="#tab1">Requests</a></li>
        <li><a href="#tab2">Currently assigned.</a></li>
    </ul>
    </header>
    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0">
            <thead>
                <th>Course No</th>
                <th>Request Type</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php foreach($all_pending_requsts->result() as $pending_request):?>
                <tr>
                    <td><?php echo $pending_request->CourseNo;?></td>

                    <td>
                        <?php echo $pending_request->Status;?>
                    </td>
                    <td>
                        <?php if($pending_request->Status=="Pending_for_registration"):?>
                        <button class="group_button" id="assign" onclick="assign_course(
                            '<?php echo $pending_request->CourseNo;?>',
                            '<?php echo $the_student_info->S_Id;?>'
                        )">Assign</button>
                        <?php elseif($pending_request->Status=="Pending_for_drop"):?>
                        <button class="group_button" id="drop"onclick="drop_course(
                            '<?php echo $pending_request->CourseNo;?>',
                            '<?php echo $the_student_info->S_Id;?>'
                        )">Drop</button>
                        <?php endif;?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            </table>
        </div>

        <script type="text/javascript" charset="utf-8">
        function drop_course(CourseNo,S_Id){
            var form_data ={
                CourseNo: CourseNo,
                S_Id:S_Id
            };
            $.ajax({
                url:"<?php echo site_url('admin/student/drop_course'); ?>",
                type:'POST',
                data:form_data,
                success:function(msg){
                    $('#drop').replaceWith(msg);
                }
            });

        }
        function assign_course(CourseNo,S_Id){
            var form_data ={
                CourseNo: CourseNo,
                S_Id:S_Id
            };
            $.ajax({
                url:"<?php echo site_url('admin/student/assign_course'); ?>",
                type:'POST',
                data:form_data,
                success:function(msg){
                    $('#assign').replaceWith(msg);
                }
            });
            
        }
        </script>

        <div id="tab2" class="tab_content">
            <table class="tablesorter" cellspacing="0">
            <thead>
                <th>Course No</th>
                <th>Course Name</th>
                <th>Level/Term</th>
                <th>Credit</th>
                <th>Type</th>
            </thead>
            <tbody>
                <?php foreach ($all_running_course->result() as $running_course):?>
                <tr>
                    <td><?php echo $running_course->CourseNo;?></td>
                    <?php $get_running_course_info=$this->course_model->get_course_by_courseno($running_course->CourseNo);?>
                    <?php $the_running_course_info=$get_running_course_info->row();?>
                    <td><?php echo $the_running_course_info->CourseName;?></td>
                    <td>
                        <?php echo $the_running_course_info->sLevel;?>
                        <?php echo '/';?>
                        <?php echo $the_running_course_info->Term;?>
                    </td>
                    <td><?php echo $the_running_course_info->Credit;?></td>
                    <td>
                        <?php if($the_running_course_info->Type=='TT'):?>
                        Theory
                        <?php elseif($the_running_course_info->Type=='S'):?>
                        Sessional
                        <?php else:?>
                        Unknown
                        <?php endif;?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            </table>
        </div>
    </div>
</article>
<article class="module width_quarter shadow">
<div>
    <header><h3><?php echo $the_student_info->S_Id;?></h3></header>
    <div class="message_list">
        <div class="module_content">
            <div class="message">
                <p><strong>Department</strong></p>
                <p>
                    <?php echo $the_student_info->Dept_id;?>
                </p>
           </div>
            <div class="message">
                <p><strong>Name</strong></p>
                <p><?php echo $the_student_info->Name;?></p>
            </div>

            <div class="message">
                <p><strong>Level/Term</strong></p>
                <p>
                    <?php echo $the_student_info->sLevel;?>
                    <?php echo '/';?>
                    <?php echo $the_student_info->Term;?>
                </p>
            </div>


            <div class="message">
                <p><strong>Advisor</strong></p>
                <p>
                    <?php echo $the_student_info->Advisor;?>
                </p>
            </div>
        </div>
    </div>
</div>
</article>
<?php echo br(200);?>
</section>

<?php $this->load->view('admin/template/footer');?>