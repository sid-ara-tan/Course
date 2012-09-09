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
                        $('select#sel_Dept_id').selectmenu({
                                width:300,
                                menuWidth: 300,
                                format: addressFormatting
                        });

                        $('select#sel_Curriculam').selectmenu({
                                    //style:'popup',
                                    width:300,
                                    menuWidth: 300,
                                    format: addressFormatting
                        });



                        $('select#sel_sLevel').selectmenu({
                                    //style:'popup',
                                    width:300,
                                    menuWidth: 300,
                                    format: addressFormatting
                        });


                        $('select#sel_Term').selectmenu({
                                    //style:'popup',
                                    width:300,
                                    menuWidth: 300,
                                    format: addressFormatting
                        });

                        $('select#sel_Type').selectmenu({
                                    //style:'popup',
                                    width:300,
                                    menuWidth: 300,
                                    format: addressFormatting
                        });

                         $("#view_course_form").validate({
                            rules:  {
                               sel_Dept_id:{
                                   required:true
                               }
                            },
                            messages:{}
                        });

                        $('#sel_course_submit').click(function(){
                            if($('#view_course_form').valid()){
                                 var form_data ={
                                    sel_Dept_id: $('#sel_Dept_id').val(),
                                    sel_sLevel:$('#sel_sLevel').val(),
                                    sel_Term:$('#sel_Term').val(),
                                    sel_Curriculam:$('#sel_Curriculam').val(),
                                    sel_Type:$('#sel_Type').val()
                                };

                                $.ajax({
                                    url:"<?php echo site_url('admin/course/view_all_course_by_dept_id'); ?>",
                                    type:'POST',
                                    data:form_data,
                                    success:function(msg){
                                        $('#custom_table').html(msg);
                                    }
                                });

                            }
                            return false;
                       });

                });
});
</script>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='Course';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>
	<section id="main" class="column">
		<article class="module width_full shadow" id="page_tabs">
                    <div>
                        <ul>
                            <li><a href="#course_info_tabs_1" title="All available department information">Course</a></li>
                            <li><a href="#course_info_tabs_2" title="All available department information">Help</a></li>
                        </ul>
                        <div id="course_info_tabs_1">
                            <div >
                                    <?php if($all_departments):?>
                                    <h2>Customize course information.</h2>
                                         <div id="search_group_bar">
                                                <?php echo form_open('','id="view_course_form"');?>

                                                    <table cellpadding="0" cellspacing="20" border="0"  class="ui-widget" align="center" id="create_table">
                                                    <?php
                                                        $options=array(''=>'Must Select...');
                                                        foreach ($all_departments->result() as $at) {
                                                            $options[$at->Dept_id]=$at->Dept_id.' - '.$at->Name;
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo form_label('Select Department','sel_Dept_id');?></td>
                                                        <td><?php echo form_dropdown('sel_Dept_id',$options, set_select('sel_Dept_id'),'id="sel_Dept_id"');?></td>
                                                        <td class="search_note">Select a department</td>
                                                    </tr>

                                                     <?php
                                                        $options=array(''=>'Please Select',
                                                            '1'=>'1',
                                                            '2'=>'2',
                                                            '3'=>'3',
                                                            '4'=>'4',
                                                            '5'=>'5'
                                                        );
                                                    ?>

                                                    <tr>
                                                        <td><?php echo form_label('Level','sel_sLevel');?></td>
                                                        <td><?php echo form_dropdown('sel_sLevel',$options,set_select('sel_sLevel'),'id="sel_sLevel"');?></td>
                                                        <td class="search_note">Default will not asign any at any level</td>
                                                    </tr>
                                                    <?php
                                                    $options=array(''=>'Please Select',
                                                            '1'=>'1',
                                                            '2'=>'2',
                                                            '3'=>'3',
                                                            '4'=>'4'
                                                        );
                                                    ?>
                                                    <tr>
                                                        <td><?php echo form_label('Term','sel_Term');?></td>
                                                        <td><?php echo form_dropdown('sel_Term',$options,set_value('sel_Term'),'id="sel_Term"');?></td>
                                                        <td class="search_note">Default will not not asign any term</td>
                                                    </tr>
                                   
                                                    <?php
                                                         $options=array(''=>'Please select...');
                                                         for ($i = 2000; $i < 2021; $i++) {
                                                            $options[$i]=$i;
                                                         }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo form_label('Select Curriculam','sel_Curriculam');?></td>
                                                        <td><?php echo form_dropdown('sel_Curriculam',$options,set_select('sel_Curriculam'),'id="sel_Curriculam"');?></td>
                                                        <td class="search_note">ex 2005 those who studying under same curriculum</td>
                                                    </tr>
                                                    <?php $options=array(
                                                        ''=>'Please select',
                                                        'TT'=>'Theory',
                                                        'S'=>'Sessional'
                                                    );?>
                                                    <tr>
                                                        <td><?php echo form_label('Select Type','sel_Type');?></td>
                                                        <td><?php echo form_dropdown('sel_Type',$options,set_select('sel_Type'),'id="sel_Type"');?></td>
                                                        <td class="search_note">Select course type</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo form_submit('sel_course_submit','Search','id="sel_course_submit"');?></td>
                                                    </tr>
                                                </table>
                                                <?php echo form_close();?>
                                            </div>
                                    <?php else:?>
                                    <p>No department currently available add a department first.</p>
                                    <?php endif;?>
                            </div>
                            <div class="ex_highlight shadow">
                                <div id="custom_table">
                                    <fieldset><p style="text-align:center;">Course information will be loaded here.</p></fieldset>
                                </div>
                            </div>
                            
                            <div style="padding:20px;">
                            <p style="font-weight: bold;">Note:</p>
                            <p>Here are some information regarding customizing Course information.</p>

                                <ul>
                                    <li>Add button for Creating new Course</li>
                                    <li>Delete for deleting Course information</li>
                                    <li>Double click an item for edit.</li>
                                    <li>Click outside or cancel button for cancel update</li>
                                    <li>You can search through your item.</li>
                                    <li>Though pagination and selecting number of entries per page allows you to navigate information nicely.</li>
                                </ul>
                            <p style="font-style: italic;color: rgb(119, 186, 206);">Refresh the page after changing Course No.</p>
                            </div>
                        </div>
                        <div id="course_info_tabs_2">
                            the quick brown fox jumps over the lazy dog;
                        </div>
                    </div>
		</article><!-- end of stats article -->
                <?php echo br(75);?>
	</section>

<?php $this->load->view('admin/template/footer');?>