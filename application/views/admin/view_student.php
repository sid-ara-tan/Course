<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<?php include 'template/scr_sty_tab_data.php'; ?>
<style type="text/css" media="screen">
.search_form input[type=text]{
    width: 298px;
    height: 20px;
}
.search_note{
    font-family:Arial,Helvetica,sans-serif;
    font-size: 12px;
    display: table-cell;
}
#search_tool_show{
    border: 1px ridge white;background:#666666;height:20px;text-align: center;color: white;padding:5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    cursor: pointer;
}
#toggle_search_result{
    border: 1px ridge white;background:#666666;height:20px;text-align: center;color: white;padding:5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    cursor: pointer;
    /*font-size: 1.1em;*/
}
.search_header{
    border: 1px ridge white;background:#666666;text-align: center;color: white;padding:5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
}
</style>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $('#search_tool_show').click(function(){
            $('#search_div').toggle('slow');
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(function() {
                $( "#Name" ).autocomplete({
                    source: function( request, response ) {
                        $.getJSON( "<?php echo site_url('admin/student/autocomplete_name');?>", {
                                term: request.term
                        }, response );
                    },
                    minLength:3
                });
        });

        $(function() {
                $( "#S_Id" ).autocomplete({
                    source: function( request, response ) {
                        $.getJSON( "<?php echo site_url('admin/student/autocomplete_id');?>", {
                                term: request.term
                        }, response );
                    },
                    minLength:4
                });
        });
    });
</script>

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
        $("#searh_student_form").validate({
            rules:  {
                S_Id:    {
                                digits: true,
                                maxlength: 10
                               /* remote: {
                                            url:"<?php echo site_url('admin/student/validate_student_exist');?>",
                                            type:"post"
                                        }*/
                            },
                Name:  {
                                maxlength: 49
                               /* remote: {
                                            url:"<?php echo site_url('admin/student/validate_student_name');?>",
                                            type:"post"
                                        }*/
                            },
               Sec: {
                   maxlength:4
               }
            },
            messages:{
                S_Id:    {
                                //remote:"Error this ID not found",
                                maxlength: "Enter at most 10 characters"
                },
                Name:  {
                                //remote:"No with this name..",
                                maxlength: "You can Enter at most 50 characeters"
                            },
                Sec: {
                   maxlength:"You can enter at most 4 characters"
               }
            }
        });
  });
</script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
            $('#search_submit').click(function(){
               if ($("#searh_student_form").valid()){
                       var form_data ={
                        Dept_id: $('#Dept_id').val(),
                        S_Id: $('#S_Id').val(),
                        Name:$('#Name').val(),
                        sLevel:$('#sLevel').val(),
                        Term:$('#Term').val(),
                        Sec:$('#Sec').val(),
                        Advisor:$('#Advisor').val(),
                        Curriculam:$('#Curriculam').val()
                    };

                    $.ajax({
                        url:"<?php echo site_url('admin/student/search_result'); ?>",
                        type:'POST',
                        data:form_data,
                        success:function(msg){
                            $('#search_result_show').html(msg);
                        }
                    });
                    $('#search_div').hide();
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
    $data['current']='View Student';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>

<section id="main" class="column">
        <article class="module width_full shadow " id="page_tabs">
        <div>
              <div id="search_div">
                <div align="center" class="search_header">
                    <span style="font-size: 24px;">Search Student Information</span>
                </div>
                <div class="search_form">
                     <?php echo form_open('admin/student/search_result','id="searh_student_form"');?>
                       <table cellpadding="0" cellspacing="20" border="0">
                            <tr class="ui-widget">
                                <td><?php echo form_label('Student ID','S_Id');?></td>
                                <td><?php echo form_input('S_Id',set_value('S_Id'),'id="S_Id"');?></td>
                                <td class="search_note">For exact match enter just student ID number
                                    <br/>Searching will start after 4 characters
                                </td>
                            </tr>
                            <tr class="ui-widget">
                                <td><?php echo form_label('Name','Name');?></td>
                                <td><?php echo form_input('Name',set_value('Name'),'id="Name"');?></td>
                                <td class="search_note">Enter your name ex. Siddhartha Shankar Das
                                    <br/>Searching through database will start after 3 character.
                                </td>
                            </tr>
                            <?php
                                $options=array(''=>'Please select..');
                                foreach ($all_departments->result() as $at) {
                                    $options[$at->Dept_id]=$at->Dept_id.' - '.$at->Name;
                                }
                            ?>
                            <tr>
                                <td><?php echo form_label('Select Department','Dept_id');?></td>
                                <td><?php echo form_dropdown('Dept_id',$options,  set_select('Dept_id'),'id="Dept_id"');?></td>
                                <td class="search_note">Select a department</td>
                            </tr>

                             <?php
                                $options=array(''=>'Please Select...',
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
                                <td class="search_note">Default will search through all Level</td>
                            </tr>
                            <?php
                            $options=array(''=>'Please Select...',
                                    '1'=>'1',
                                    '2'=>'2',
                                    '3'=>'3',
                                    '4'=>'4',
                                    '5'=>'5'
                                );
                            ?>
                            <tr>
                                <td><?php echo form_label('Term','Term');?></td>
                                <td><?php echo form_dropdown('Term',$options,set_value('Term'),'id="Term"');?></td>
                                <td class="search_note">Default will search through all term</td>
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
                                 $options=array(''=>'Select...');
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
                                <td></td>
                                <td></td>
                                <td><?php echo form_submit('submit','Advanced Search','id="search_submit"');?></td>
                            </tr>
                        </table>

                       <?php echo form_close();?>
                </div>
           </div>
            <div id="search_tool_show" class="shadow" title="click to show or hide the content">
                search options
           </div>
        </div>
        </article>

        <div id="search_result_show"></div>
        
        <?php echo br(200);?>
</section>

<?php $this->load->view('admin/template/footer');?>