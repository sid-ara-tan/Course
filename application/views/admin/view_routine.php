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
<script type="text/javascript" charset="utf-8">
        $(function(){
            $('select#CourseNo').selectmenu({
                        width:300,
                        menuWidth: 300,
                        style:'popup',
                        format: addressFormatting,
                        select: function(event, options) {
                             $.ajax({
                                        data: "CourseNo=" + options.value,
                                        type: "POST",
                                        url: "<?php echo site_url('admin/department/assigned_teacher_by_course');?>",
                                        success: function(value) {
                                                $("#dropdown_by_teacher").html(value);
                                        }
                            });
                        }
            });
        });
</script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
       $("#add_classinfo_form").validate({
            rules:  {
               CourseNo:{
                   required:true
               },
               by_teacher:{
                   required:true
               },
               Period: {
                   required:true,
                   maxlength:2,
                   digits:true
               },
               cTime:{
                   required:true
               },
               Location:{
                   required:true,
                   maxlength:14
               },
               Duration:{
                   required:true,
                   maxlength:4,
                   digits:true
               }
            },
            messages:{

            }
        });

         $("#add_classinfo").click(function() {
             if ($("#add_classinfo_form").valid()){
                var form_data ={
                    Dept_id:$('#Dept_id').val(),
                    sLevel:$('#sLevel').val(),
                    Term:$('#Term').val(),
                    Sec:$('#Sec').val(),
                    CourseNo:$('#CourseNo').val(),
                    cDay:$('#cDay').val(),
                    Period:$('#Period').val(),
                    cTime:$('#cTime').val(),
                    Location:$('#Location').val(),
                    Duration:$('#Duration').val(),
                    by_teacher:$('#by_teacher').val()
                };

                $.ajax({
                    url:"<?php echo site_url('admin/department/add_classinfo_entry'); ?>",
                    type:'POST',
                    data:form_data,
                    dataType: 'json',
                    success:function(msg){
                        $('#show_error_message').html(msg['output']);
                        if(msg['success']){
                            window.location.reload();
                        }
                    }
                });
             }
             return false;
        });

        $(".delete_this").click(function(){
            var url=$(this).attr('href');
            $.ajax({
                url:url,
                dataType:'json',
                success:function(msg){
                    $('#delete_success_message').html(msg['output']);
                }
            });
            $(this).parent().parent().hide('slow');
            return false;
        });
    });
</script>
<style type="text/css" media="screen">

.routine table{
width: 100%;
margin: -5px 0 0 0;
}

.routine td{
margin: 10px;
padding: 10px;
border: 1px dotted #ccc;
}

.routine thead tr {
height: auto;
text-align: left;
text-indent: 10px;
cursor: pointer;
}

.routine td {
padding: 15px 10px;
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

<section id="main" class="column">
<article class="module width_full shadow ">
<div>
    <?php
        $week=array(
             'Saturday'=>'Saturday',
             'Sunday'=>'Sunday',
             'Monday'=>'Monday',
             'Tuesday'=>'Tuesday',
             'Wednesday'=>'Wednesday',
             'Thursday'=>'Thursday',
             'Friday'=>'Friday'
         );

       

        $period=array(
            '1'=>'Period 1',
            '2'=>'Period 2',
            '3'=>'Period 3',
            '4'=>'Period 4',
            '5'=>'Period 5',
            '6'=>'Period 6',
            '7'=>'Period 7'
        );
    ?>
    <table id="routine_day" class="routine">
        <thead>
            <tr>
                <th>Day</th>
                <?php foreach($period as $tm):?>
                <th><?php echo $tm;?></th>
                <?php endforeach;?>
            </tr>
        </thead>

        <tbody>
            <?php foreach($week as $key=>$value):?>
            <tr>
                <td><?php  echo $value;?></td>
                <?php foreach($period as $key_period=>$tm):?>
                <?php

                    $routine_config=array(
                        'Dept_id'=>$Dept_id,
                        'sLevel'=>$sLevel,
                        'Term'=>$Term,
                        'Sec'=>$Sec,
                        'period'=>$key_period,
                        'cDay'=>$key
                    );

                    $the_daily_routine=$this->department_model->get_daily_course($routine_config);
                ?>

                <td>
                    <?php foreach ($the_daily_routine->result() as $daily_routine):?>
                    
                        <?php echo $daily_routine->CourseNo;?><br/>
                        <?php echo $daily_routine->cTime;?><br/>
                        <?php echo $daily_routine->Duration;?> minutes<br/>

                         <?php $config_ara=array(
                            'Sec'=>$Sec,
                            'CourseNo'=>$daily_routine->CourseNo
                        );?>

                        <?php $get_assigned_teachers=$this->course_model->get_same_course_teachers($config_ara);?>

                        <strong>Teachers:</strong><br/>
                        <?php foreach($get_assigned_teachers->result() as $s_teacher):?>
                                <?php echo $s_teacher->T_Id;?>
                                -
                                <?php echo $s_teacher->Name;?>
                                <br/>
                        <?php endforeach;?>
                                
                        <strong>Location:</strong>
                        <?php echo $daily_routine->Location;?><br/>
                        <br/>
                   <?php endforeach;?>
                </td>
                <?php endforeach;?>
            </tr>
            <?php endforeach;?>
        </tbody>
         <tfoot>
        </tfoot>
    </table>
</div>
    
</article>
<article class="module width_full shadow ">
    <div id="delete_success_message" align="center"></div>
    <header><h3 class="tabs_involved">Make Routine</h3>
    <ul class="tabs">
        <li><a href="#tab3">Info</a></li>
        <li><a href="#tab1">Current routine</a></li>
        <li><a href="#tab2">Add entry</a></li>
    </ul>
    </header>

    <div class="tab_container">
        <div id="tab3" class="tab_content">
            <ul><strong>Note:</strong>
                <li>Here you can create routine.</li>
                <li>Delete Routine</li>
                <li>Before Creating routine first assigned teacher</li>
            </ul>
        </div>
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0">
            <thead>
            <th>Department ID</th>
            <th>Level/Term</th>
            <th>Course No</th>
            <th>Day</th>
            <th>Time</th>
            <th>Period</th>
            <th>Section</th>
            <th>Duration</th>
            <th>Location</th>
            <th>Teacher</th>
            <th>Actions</th>
            </thead>
            <tbody>
                <?php foreach($current_classinfo->result()as $the_current_classinfo):?>
                <tr>
                    <td><?php echo $the_current_classinfo->Dept_id;?></td>
                    <td>
                        <?php echo $the_current_classinfo->sLevel;?>
                        <?php echo '/';?>
                        <?php echo $the_current_classinfo->Term;?>
                    </td>
                    <td><?php echo $the_current_classinfo->CourseNo;?></td>
                    <td><?php echo $the_current_classinfo->cDay;?></td>
                    <td><?php echo $the_current_classinfo->cTime;?></td>
                    <td><?php echo $the_current_classinfo->Period;?></td>
                    <td><?php echo $the_current_classinfo->Sec;?></td>
                    <td><?php echo $the_current_classinfo->Duration;?></td>
                    <td><?php echo $the_current_classinfo->Location;?></td>
                    <td><?php echo $the_current_classinfo->by_teacher;?></td>
                    <td>
                            <a href="<?php
                                echo site_url('admin/department/delete_classinfo');
                                echo '?CourseNo=';
                                echo $the_current_classinfo->CourseNo;
                                echo '&cDay=';
                                echo $the_current_classinfo->cDay;
                                echo '&Sec=';
                                echo $the_current_classinfo->Sec;
                                echo '&Period=';
                                echo $the_current_classinfo->Period;
                                echo '&by_teacher=';
                                echo $the_current_classinfo->by_teacher;
                            ?>" class="delete_this" ><img  src="<?php echo base_url();?>template/admin/images/icn_trash.png" title="Trash"/></a>
                        </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            </table>
        </div>
        <div id="tab2" class="tab_content">
            <?php echo form_open('','id="add_classinfo_form"');?>
            <table class="tablesorter" cellspacing="0">
            <thead>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td id="show_error_message"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php echo form_label('Department','Dept_id');?></td>
                    <td><?php echo form_input('Dept_id',$Dept_id,'id="Dept_id" readonly="readonly"');?></td>
                    <td class="search_note">Readonly Item</td>
                </tr>
                <tr>
                    <td><?php echo form_label('Level','sLevel');?></td>
                    <td><?php echo form_input('sLevel',$sLevel,'id="sLevel" readonly="readonly"');?></td>
                    <td class="search_note">Readonly Item</td>
                </tr>
                <tr>
                    <td><?php echo form_label('Term','Term');?></td>
                    <td><?php echo form_input('Term',$Term,'id="Term" readonly="readonly"');?></td>
                    <td class="search_note">Readonly Item</td>
                </tr>
                <tr>
                    <td><?php echo form_label('Section','Sec');?></td>
                    <td><?php echo form_input('Sec',$Sec,'id="Sec" readonly="readonly"');?></td>
                    <td class="search_note">Readonly Item</td>
                </tr>
                <tr>
                    <?php
                        $options=array(''=>'Must Select');
                        foreach($all_courses->result() as $single_course){
                            $options[$single_course->CourseNo]=$single_course->CourseNo.' - '.$single_course->CourseName;
                        }
                    ?>

                    <td><?php echo form_label('Course No','CourseNo');?></td>
                    <td><?php echo form_dropdown('CourseNo',$options,  set_select('CourseNo'),'id="CourseNo"');?></td>
                    <td class="search_note">Select  Course </td>
                </tr>

                <tr>
                     <?php
                        $options=array(
                             'Sunday'=>'Sunday',
                             'Monday'=>'Monday',
                             'Tuesday'=>'Tuesday',
                             'Wednesday'=>'Wednesday',
                             'Thursday'=>'Thursday',
                             'Friday'=>'Friday',
                             'Saturday'=>'Saturday'
                         );
                      ?>
                      <td><?php echo form_label('Day','cDay');?></td>
                      <td><?php echo form_dropdown('cDay',$options,'','id="cDay"');?></td>
                      <td class="search_note">Select Day</td>
                </tr>

                <tr>
                    <td><?php echo form_label('Period','Period');?></td>
                    <td><?php echo form_input('Period',set_value('Period'),'id="Period"');?></td>
                    <td class="search_note">Enter Period number ex 1/7/4</td>
                </tr>

                <tr>
                    <td><?php echo form_label('Time','cTime');?></td>
                    <td><?php echo form_input('cTime',set_value('cTime'),'id="cTime"');?></td>
                    <td class="search_note">Class Time</td>
                </tr>

                <script type="text/javascript">
                        $(document).ready(function() {
                            $('#cTime').timepicker({
                                showPeriod: true,
                                showLeadingZero: true,
                                minutes: {
                                        starts: 0,                // First displayed minute
                                        ends: 60,                 // Last displayed minute
                                        interval:5               // Interval of displayed minutes
                               }
                            });
                        });
                </script>

                 <tr>
                    <td><?php echo form_label('Location','Location');?></td>
                    <td><?php echo form_input('Location',set_value('Location'),'id="Location"');?></td>
                    <td class="search_note">Set Location ex CSE202</td>
                 </tr>
                 <tr>
                    <td><?php echo form_label('Duration','Duration');?></td>
                    <td><?php echo form_input('Duration',set_value('Duration'),'id="Duration"');?></td>
                    <td class="search_note">Duration of class ex 50</td>
                 </tr>
                 <tr id="dropdown_by_teacher">
                     
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td><?php echo form_submit('add_classinfo','Add This Entry','id="add_classinfo"');?></td>
                 </tr>
            </tbody>
            </table>
            <?php echo form_close();?>
        </div>
    </div>
</article>
<?php echo br(200);?>
</section>

<?php $this->load->view('admin/template/footer');?>