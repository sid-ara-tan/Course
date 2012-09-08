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
.group_button{
        cursor:pointer;
	width:150px;
	height: 30px;
	color: white;
	background:#4d90fe;
	border: 1px solid #3079ED;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
}

.group_button:hover {
	background:#357AE8;
	border: 1px solid #2F5BB7;
}
#search_tool_show{
    border: 1px ridge white;background:#666666;height:20px;text-align: center;color: white;padding:5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    cursor: pointer;
}
</style>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(function(){
            $('select#Dept_id').selectmenu({
                        width:300,
                        menuWidth: 300,
                        style:'popup',
                        format: addressFormatting,
                        select: function(event, options) {
                             $.ajax({
                                        data: "Dept_id=" + options.value,
                                        type: "POST",
                                        url: "<?php echo site_url('admin/student/teacher_by_dept_id');?>",
                                        success: function(value) {
                                                $("#extra_dropdown").html(value);
                                        }
                            });
                        }
            });
        });

        $(function(){
            $('select#Curriculam').selectmenu({
                        //style:'popup',
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });

        $(function(){
            $('select#sLevel').selectmenu({
                        //style:'popup',
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });
        $(function(){
            $('select#Term').selectmenu({
                        //style:'popup',
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });
    });
</script>

<script type="text/javascript" charset="utf-8">
 $(function(){
        $("#group_student_form").validate({
            rules:  {
               Dept_id:{
                   required:true
               },
               Sec: {
                   required:true,
                   maxlength:4
               },
               std_code:{
                   required:true,
                   maxlength:4,
                   minlength:4,
                   digits:true
               },
               start_code:{
                   required:true,
                   maxlength:3,
                   digits:true,
                   smaller:true
               },

               end_code:{
                   required:true,
                   maxlength:3,
                   digits:true,
                   greater: true
               }
            },
            messages:{
                
            }
        });

        $.validator.addMethod("greater", function( value, element, param ) {
        var val_a = $("#start_code").val();
        return this.optional(element)
            || (value > val_a);
        },"Must be greater than start code value");

        $.validator.addMethod("smaller", function( value, element, param ) {
        var val_a = $("#end_code").val();
        return this.optional(element)
            || (value < val_a);
        },"Must be smaller than end code value");
  });
</script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){     
        $("#create_group").click(function() {
            if ($("#group_student_form").valid())
             {
                var form_data ={
                    Dept_id: $('#Dept_id').val(),
                    sLevel:$('#sLevel').val(),
                    Term:$('#Term').val(),
                    Sec:$('#Sec').val(),
                    Advisor:$('#Advisor').val(),
                    Curriculam:$('#Curriculam').val(),
                    std_code:$('#std_code').val(),
                    start_code:$('#start_code').val(),
                    end_code:$('#end_code').val()
                };


                $.ajax({
                    url:"<?php echo site_url('admin/student/ajax_create_group'); ?>",
                    type:'POST',
                    data:form_data,
                    success:function(msg){
                        $('#group_update_result').html(msg);
                    }
                });
             }
             else{
                $('#search_group_bar').show('slow');
            }
        });
 
        $("#show_group").click(function() {
            if ($("#group_student_form").valid())
             {
                var form_data ={
                    Dept_id: $('#Dept_id').val(),
                    sLevel:$('#sLevel').val(),
                    Term:$('#Term').val(),
                    Sec:$('#Sec').val(),
                    Advisor:$('#Advisor').val(),
                    Curriculam:$('#Curriculam').val(),
                    std_code:$('#std_code').val(),
                    start_code:$('#start_code').val(),
                    end_code:$('#end_code').val()
                };

                $.ajax({
                    url:"<?php echo site_url('admin/student/ajax_show_group'); ?>",
                    type:'POST',
                    data:form_data,
                    success:function(msg){
                        $('#group_show_result').html(msg);
                    }
                });
             }
             else{
                $('#search_group_bar').show('slow');
            }
        });

        $("#delete_group").click(function() {
            var x1=confirm('Are you sure to delete?');
            if(!x1){
                return false;
            }

            if ($("#group_student_form").valid())
             {
                var form_data ={
                    Dept_id: $('#Dept_id').val(),
                    sLevel:$('#sLevel').val(),
                    Term:$('#Term').val(),
                    Sec:$('#Sec').val(),
                    Advisor:$('#Advisor').val(),
                    Curriculam:$('#Curriculam').val(),
                    std_code:$('#std_code').val(),
                    start_code:$('#start_code').val(),
                    end_code:$('#end_code').val()
                };

                $.ajax({
                    url:"<?php echo site_url('admin/student/ajax_delete_group'); ?>",
                    type:'POST',
                    data:form_data,
                    success:function(msg){
                        $('#group_update_result').html(msg);
                    }
                });
             }
            else{
                $('#search_group_bar').show('slow');
            }
        });
 
         $("#update_group").click(function() {
            if ($("#group_student_form").valid()){
                var form_data ={
                    Dept_id: $('#Dept_id').val()
                };

                $.ajax({
                    url:"<?php echo site_url('admin/student/get_update_form_group'); ?>",
                    type:'POST',
                    data:form_data,
                    success:function(msg){
                        $('#group_update_result').html(msg);
                    }
                });
            }
            else{
                $('#search_group_bar').show('slow');
            }
         });

         $("#assign_course_group").click(function() {
            if ($("#group_student_form").valid()){
                var form_data ={
                    Dept_id: $('#Dept_id').val(),
                    sLevel:$('#sLevel').val(),
                    Term:$('#Term').val()
                };

                $.ajax({
                    url:"<?php echo site_url('admin/student/get_assign_course_group'); ?>",
                    type:'POST',
                    data:form_data,
                    success:function(msg){
                        $('#group_update_result').html(msg);
                    }
                });
            }
            else{
                $('#search_group_bar').show('slow');
            }
         });

        $("#search_hide_image").click(function(){
            $("#search_group_bar").toggle('slow');
        });
        
    });
</script>
</head>

<body>
<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin'),
        'View student'=>  site_url('admin/student/view_student'),
        'Add student'=>  site_url('admin/student/add_a_student')
    );
    $data['current']='Manage group of  Student';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>

<section id="main" class="column">
<article class="module width_full shadow " id="page_tabs">
    <div>
        <?php if($all_departments):?>
        <div >
            <div id="search_group_bar">
            <?php echo form_open('','id="group_student_form"');?>
            <table cellpadding="0" cellspacing="20" border="0"  class="ui-widget" align="center" id="create_table">
                <?php
                    $options=array(''=>'Must Select...');
                    foreach ($all_departments->result() as $at) {
                        $options[$at->Dept_id]=$at->Dept_id.' - '.$at->Name;
                    }
                ?>
                <tr>
                    <td><?php echo form_label('Select Department','Dept_id');?></td>
                    <td><?php echo form_dropdown('Dept_id',$options, set_select('Dept_id'),'id="Dept_id"');?></td>
                    <td class="search_note">Select a department</td>
                </tr>

                 <?php
                    $options=array(
                        '1'=>'1',
                        '2'=>'2',
                        '3'=>'3',
                        '4'=>'4',
                        '5'=>'5'
                    );
                ?>

                <tr>
                    <td><?php echo form_label('Level','sLevel');?></td>
                    <td><?php echo form_dropdown('sLevel',$options,set_select('sLevel'),'id="sLevel"');?></td>
                    <td class="search_note">Default will not asign any at any level</td>
                </tr>
                <?php
                $options=array(
                        '1'=>'1',
                        '2'=>'2',
                        '3'=>'3',
                        '4'=>'4'
                    );
                ?>
                <tr>
                    <td><?php echo form_label('Term','Term');?></td>
                    <td><?php echo form_dropdown('Term',$options,set_value('Term'),'id="Term"');?></td>
                    <td class="search_note">Default will not not asign any term</td>
                </tr>
                <tr>
                    <td><?php echo form_label('Section','Sec');?></td>
                    <td><?php echo form_input('Sec',set_value('Sec'),'id="Sec"');?></td>
                    <td class="search_note">Section ex. A, B, A1, B1</td>
                </tr>

                <tr id="extra_dropdown">
                    <!--row for advisor-->
                </tr>
                <?php
                     $options=array(''=>'Please select...');
                     for ($i = 2000; $i < 2021; $i++) {
                        $options[$i]=$i;
                     }
                ?>
                <tr>
                    <td><?php echo form_label('Select Curriculam','Curriculam');?></td>
                    <td><?php echo form_dropdown('Curriculam',$options,set_select('Curriculam'),'id="Curriculam"');?></td>
                    <td class="search_note">ex 2005 those who studying under same curriculum</td>
                </tr>

                <tr>
                    <td><?php echo form_label('Student code','std_code');?></td>
                    <td><?php echo form_label('Starts with','start_code');?></td>
                    <td><?php echo form_label('Ends with','end_code');?></td>
                    
                </tr>

                <tr>
                    
                    <td><?php echo form_input('std_code',  set_value('std_code'),'id="std_code"');?></td>
                    <td><?php echo form_input('start_code',  set_value('start_code'),'id="start_code"');?></td>
                    <td><?php echo form_input('end_code',  set_value('end_code'),'id="end_code"');?></td>
                    
                </tr>

                <tr>
                    <td class="search_note">ex 0805 prefix of student id</td>
                    <td class="search_note">ex 001 roll no of student id</td>
                    <td class="search_note">ex 120 roll of student id</td>
                </tr>

            </table>
            <?php echo form_close();?>

        </div>

        <div id="button_bar">
            <table cellpadding="0" cellspacing="30" border="0"  class="ui-widget" align="center">
                <tr>
                    <td><?php echo form_button('create_group','Create group','id="create_group" class="group_button"');?></td>
                    <td><?php echo form_button('show_group','Show group','id="show_group" class="group_button"');?></td>
                    <td><?php echo form_button('update_group','Update group','id="update_group" class="group_button"');?></td>
                    <td><?php echo form_button('assign_course_group','Assign course','id="assign_course_group" class="group_button"');?></td>
                    <td><?php echo form_button('delete_group','Delete group','id="delete_group" class="group_button"');?></td>
                </tr>
                <tr>
                    <td colspan="5" align="center">
                        <img src="<?php echo base_url();?>images/admin/icon/updown.png" id="search_hide_image" alt="hide" height="30px" title="click to show or hide the contents"/>
                    </td>
                </tr>
            </table>
        </div>
        </div>
        <?php else:?>
            <h4 class="alert_warning">Please create Department first...</h4>
        <?php endif;?>
    </div>
</article>

<div id="group_update_result"></div>
<div id="group_show_result"></div>

<?php echo br(200);?>
</section>
<?php $this->load->view('admin/template/footer');?>