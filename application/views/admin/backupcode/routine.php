 <div>
                             <?php echo form_open();?>
                             <?php echo form_label('Course No','CourseNo');?>
                             <?php echo form_input('CourseNo',set_value('CourseNo'),'id="CourseNo"');?>
                             <?php $options=array(
                                 'Sunday'=>'Sunday',
                                 'Monday'=>'Monday',
                                 'Tuesday'=>'Tuesday',
                                 'Wednesday'=>'Wednesday',
                                 'Thursday'=>'Thursday',
                                 'Friday'=>'Friday',
                                 'Saturday'=>'Saturday'
                             );
                             ?>
                             <?php echo form_label('Day','cDay');?>
                             <?php echo form_dropdown('cDay',$options,'','id="cDay"');?>

                             <?php echo form_label('Period','Period')?>
                             <?php echo form_input('Period',set_value('Period'),'id="Period"');?>

                             <?php echo form_label('Section','Sec');?>
                             <?php echo form_input('Sec',set_value('Sec'),'id="Sec"');?>

                             <?php echo form_label('Time','cTime');?>
                             <?php echo form_input('cTime',set_value('cTime'),'id="cTime"');?>

                             <?php echo form_label('Location','Location');?>
                             <?php echo form_input('Location',set_value('Location'),'id="Location"');?>

                             <?php echo form_label('Duration','Duration');?>
                             <?php echo form_input('Duration',set_value('Duration'),'id="Duration"');?>

                             <?php echo form_label('Teacher ID','by_teacher');?>
                             <?php echo form_input('by_teacher',set_value('by_teacher'),'id="by_teacher"');?>

                             <?php echo form_close();?>
                         </div>
/*
<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>


<div class="add_delete_toolbar"></div>
                        <div>
                            <script>
                                function normal(){
                                    var form_data ={
                                            Dept_id: $('#Dept_id').val(),
                                            sLevel:$('#sLevel').val(),
                                            Term:$('#Term').val()
                                        };
                                        $.ajax({
                                            url:"<?php echo site_url('admin/department/check_unique_schedule'); ?>",
                                            type:'POST',
                                            data:form_data,
                                            success:function(msg){
                                                if(msg='yes'){
                                                    return false;
                                                }
                                                else{
                                                    return true;
                                                }
                                            }
                                        });
                                }
                            </script>
                        <form id="formAddNewRow" action="#" title="Add a new department" onsubmit="return normal();">
                            <table>
                                <?php
                                    $options=array();
                                    foreach ($all_departments->result() as $at) {
                                        $options[$at->Dept_id]=$at->Dept_id.' - '.$at->Name;
                                    }
                                ?>

                                <tr>
                                    <td><?php echo form_label('Department ID','Dept_id');?></td>
                                    <td><?php echo form_dropdown('Dept_id',$options,  set_select('Dept_id'),'id="Dept_id" rel="0"');?></td>
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
                                    <td><?php echo form_dropdown('sLevel',$options,  set_select('sLevel'),'id="sLevel" rel="1"');?></td>
                                </tr>
                                <?php
                                    $options=array(
                                        '1'=>'1',
                                        '2'=>'2',
                                        '3'=>'3',
                                        '4'=>'4',
                                    );
                                ?>
                                <tr>
                                    <td><?php echo form_label('Term','Term');?></td>
                                    <td><?php echo form_dropdown('Term',$options,  set_select('Term'),'id="Term" rel="2"');?></td>
                                </tr>

                                <?php
                                    $options=array(
                                        'registration_request'=>'registration_request',
                                        'drop_request'=>'drop_request',
                                        'term_final_period'=>'term_final_period',
                                        'result_show_period'=>'result_show_period',
                                        'idle'=>'idle'
                                    );
                                ?>
                                <tr>
                                    <td><?php echo form_label('period','period');?></td>
                                    <td><?php echo form_dropdown('period',$options,  set_select('period'),'id="period" rel="3"');?></td>
                                </tr>

                            </table>
                        </form>
                        </div>