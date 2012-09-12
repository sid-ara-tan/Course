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