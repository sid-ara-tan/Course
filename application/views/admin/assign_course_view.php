<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<?php include 'template/scr_sty_tab_data.php'; ?>

<style type="text/css" media="screen">
    .search_note{
    font-family:Arial,Helvetica,sans-serif;
    font-size: 12px;
    display: table-cell;
}

#assign_form input[type=text]{
    width: 298px;
    height: 20px;
}
</style>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(function(){
            $('select#T_Id').selectmenu({
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });

         $("#assign_form").validate({
            rules:  {
               Sec: {
                   required:true,
                   maxlength:4
               },
               
               T_Id:{
                   required:true
               },
               CourseNo:{
                   required:true
               }
            },
            messages:{

            }
        });

          $("#add_assign").click(function() {
             if ($("#assign_form").valid()){
                 
                var form_data ={
                    T_Id: $('#T_Id').val(),
                    Sec:$('#Sec').val(),
                    CourseNo:$('#CourseNo').val()
                };

                $.ajax({
                    url:"<?php echo site_url('admin/course/assign_course_to_teacher'); ?>",
                    type:'POST',
                    data:form_data,
                    dataType: 'json',
                    success:function(msg){
                        $('#add_error_message').html(msg['output']);
                        if(msg['success']){
                            window.location.reload();
                        }
                    }
                });
             }
             return false;
        });

        $(".delete_this").click(function(){
            var x=confirm('Are you sure');
            var url='#';
            if(x){
                url=$(this).attr('href');
                
                $.ajax({
                    url:url,
                    success:function(msg){
                        $('#delete_success_message').html(msg);
                    }
                });

                $(this).parent().parent().hide('slow');
                
            }
            return false;
        });
    });
</script>


</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='Assign Course to teacher';
    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>
<section id="main" class="column">
<?php if($assign_course_info && $department_info):?>
<?php $the_course_info=$assign_course_info->row();?>
<?php $the_department_info=$department_info->row();?>

<article class="module width_3_quarter">
<div id="delete_success_message" align="center"></div>
</article>

<article class="module width_3_quarter">
<header><h3 class="tabs_involved">Assigned Course to teacher</h3>
<ul class="tabs">
        <li><a href="#tab1">Currently assigned</a></li>
<li><a href="#tab2">Add</a></li>
</ul>
</header>
<div class="tab_container">
        <div id="tab1" class="tab_content">       
        <table class="tablesorter" cellspacing="0">
        <thead>
                <tr>
                        <th>Teacher ID</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Section</th>
                        <th>Actions</th>
                </tr>
        </thead>
        <tbody>

            <?php foreach($currently_assigned_teacher->result() as $current_teacher):?>
                 <tr>
                        <td><?php echo $current_teacher->T_Id;?></td>
                        <td><?php echo $current_teacher->Name;?></td>
                        <td><?php echo $current_teacher->Designation;?></td>
                        <td><?php echo $current_teacher->Sec;?></td>
                        <td>
                            <a href="<?php
                                echo site_url('admin/course/delete_assign_course');
                                echo '?';
                                echo 'T_Id=';
                                echo $current_teacher->T_Id;
                                echo '&';
                                echo 'Sec=';
                                echo $current_teacher->Sec;
                                echo '&';
                                echo 'CourseNo=';
                                echo $the_course_info->CourseNo;
                            ?>" class="delete_this" ><img  src="<?php echo base_url();?>template/admin/images/icn_trash.png" title="Trash"/></a>
                        </td>
                 </tr>
            <?php endforeach;?>
        </tbody>
        </table>
        </div><!-- end of #tab1 -->

        <div id="tab2" class="tab_content">
            <div>
                
                <?php echo form_open('','id="assign_form"');?>
                <table class="tablesorter" cellspacing="0">
                    <tr>
                        <td></td>
                        <td id="add_error_message"></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><?php echo form_label('Course No','CourseNo');?></td>
                        <td><?php echo form_input('CourseNo',$the_course_info->CourseNo,'id="CourseNo" readonly="readonly"')?></td>
                        <td class="search_note">Readonly Item</td>
                    </tr>
                    <?php
                        $options=array(''=>'Must Select...');
                        foreach ($all_teachers->result() as $single_teacher)
                        {
                            $options[$single_teacher->T_Id]=$single_teacher->T_Id.' - '.$single_teacher->Designation.' '.$single_teacher->Name;
                        }
                    ?>

                    <tr>
                        <td><?php echo form_label('Teacher','T_Id');?></td>
                        <td><?php echo form_dropdown('T_Id',$options,  set_select('T_Id'),'id="T_Id"');?></td>
                        <td class="search_note">Select a Teacher to assign course</td>
                    </tr>

                    <tr>
                        <td><?php echo form_label('Section','Sec');?></td>
                        <td><?php echo form_input('Sec',set_value('Sec'),'id="Sec"');?></td>
                        <td class="search_note">Assign to a Section</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?php echo form_submit('add_assign','Add','id="add_assign"')?></td>
                    </tr>
                </table>
                <?php echo form_close();?>
            </div>
        </div>
</div>
</article>

<article class="module width_quarter shadow">
<div>
    <header><h3><?php echo $the_course_info->CourseNo;?></h3></header>
    <div class="message_list">
        <div class="module_content">
            <div class="message">
                <p><strong>Department</strong></p>
                <p>
                <?php echo $the_department_info->Dept_id;?>
                <?php echo '/';?>
                <?php echo $the_department_info->Name;?>
                </p>
           </div>

            <div class="message">
                <p><strong>Course Number</strong></p>
                <p><?php echo $the_course_info->CourseNo;?></p>
            </div>
            <div class="message">
                <p><strong>Course Name</strong></p>
                <p><?php echo $the_course_info->CourseName;?></p>
            </div>
            <div class="message">
                <p><strong>Level/Term</strong></p>
                <p>
                <?php echo $the_course_info->sLevel;?>
                <?php echo '/';?>
                <?php echo $the_course_info->Term;?>
                </p>
           </div>
            <div class="message">
                <p><strong>Type/Credit</strong></p>
                <p>
                <?php echo $the_course_info->Type;?>
                <?php echo '/';?>
                <?php echo $the_course_info->Credit;?>
                </p>
           </div>

            <div class="message">
                <p><strong>Curriculum</strong></p>
                <p>
                <?php echo $the_course_info->Curriculam;?>
                </p>
           </div>
        </div>
    </div>
</div>
</article>
<?php else:?>
Invalid Course information
<?php endif;?>
<?php echo br(75);?>
</section>

<?php $this->load->view('admin/template/footer');?>