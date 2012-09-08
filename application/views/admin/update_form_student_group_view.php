<script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
           $('#update_submit').click(function(){
               if ($("#group_student_form").valid()){

                    if ($("#update_group_form").valid()){
                      var form_data ={
                            Dept_id: $('#Dept_id').val(),
                            sLevel:$('#sLevel').val(),
                            Term:$('#Term').val(),
                            Sec:$('#Sec').val(),
                            Advisor:$('#Advisor').val(),
                            Curriculam:$('#Curriculam').val(),
                            std_code:$('#std_code').val(),
                            start_code:$('#start_code').val(),
                            end_code:$('#end_code').val(),

                            update_sLevel:$('#update_sLevel').val(),
                            update_Term:$('#update_Term').val(),
                            update_Sec:$('#update_Sec').val(),
                            update_Advisor:$('#update_Advisor').val(),
                            update_Curriculam:$('#update_Curriculam').val()
                        };


                        $.ajax({
                            url:"<?php echo site_url('admin/student/ajax_update_group'); ?>",
                            type:'POST',
                            data:form_data,
                            success:function(msg){
                                $('#group_update_result').html(msg);
                            }
                        });
                    }
                    else{
                        return false;
                    }
               }
               else{
                   $('#search_group_bar').show('slow');
               }
               return false;
           });
        
            $('#update_hide_image').click(function(){
                $('#update_form_bar').toggle('slow');
            });

        $(function(){
            $('select#update_Curriculam').selectmenu({
                        //style:'popup',
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });

        $(function(){
            $('select#update_sLevel').selectmenu({
                        //style:'popup',
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });
        $(function(){
            $('select#update_Term').selectmenu({
                        //style:'popup',
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });
        $(function(){
            $('select#update_Advisor').selectmenu({
                        //style:'popup',
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });
         $(function(){
                $("#update_group_form").validate({
                    rules:  {
                       update_Sec: {
                           maxlength:4
                       }
                    },
                    messages:{

                    }
                });
         });
});
</script>

<article class="module width_full shadow">
    <div id="update_form_bar">
    <?php echo form_open('','id="update_group_form"');?>
    <table cellpadding="0" cellspacing="20" border="0"  class="ui-widget" align="center">

         <?php
            $options=array(''=>'Change level',
                '1'=>'1',
                '2'=>'2',
                '3'=>'3',
                '4'=>'4',
                '5'=>'5'
            );
        ?>

        <tr>
            <td><?php echo form_label('Level','update_sLevel');?></td>
            <td><?php echo form_dropdown('update_sLevel',$options,set_select('update_sLevel'),'id="update_sLevel"');?></td>
            <td class="search_note">Default will not asign any at any level</td>
        </tr>
        <?php
        $options=array(''=>'Change Term',
                '1'=>'1',
                '2'=>'2',
                '3'=>'3',
                '4'=>'4'
            );
        ?>
        <tr>
            <td><?php echo form_label('Term','update_Term');?></td>
            <td><?php echo form_dropdown('update_Term',$options,set_value('update_Term'),'id="update_Term"');?></td>
            <td class="search_note">Default will not not asign any term</td>
        </tr>
        <tr>
            <td><?php echo form_label('Section','update_Sec');?></td>
            <td><?php echo form_input('update_Sec',set_value('update_Sec'),'id="update_Sec"');?></td>
            <td class="search_note">Section ex. A, B, A1, B1</td>
        </tr>

        <?php
            $options=array(''=>'Change advisor');
            foreach($all_teachers->result() as $single_teacher){
                $options[$single_teacher->T_Id]=$single_teacher->T_Id.' - '.$single_teacher->Name;
            }
        ?>
        <tr>
           <td><?php echo form_label('Advisor','update_Advisor');?></td>
            <td><?php echo form_dropdown('update_Advisor',$options,set_value('update_Advisor'),'id="update_Advisor"');?></td>
            <td class="search_note">Change advisor</td>
        </tr>
        <?php
             $options=array(''=>'Change curriculum');
             for ($i = 2000; $i < 2021; $i++) {
                $options[$i]=$i;
             }
        ?>
        <tr>
            <td><?php echo form_label('Select Curriculam','update_Curriculam');?></td>
            <td><?php echo form_dropdown('update_Curriculam',$options,set_select('update_Curriculam'),'id="update_Curriculam"');?></td>
            <td class="search_note">ex 2005 those who studying under same curriculum</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?php echo form_submit('update_submit','Update','id="update_submit"');?></td>
        </tr>
    </table>
    <?php echo form_close();?>
</div>
    
 <div id="button_bar">
    <table cellpadding="0" cellspacing="30" border="0"  class="ui-widget" align="center">
        <tr>
            <td>
                <img src="<?php echo base_url();?>images/admin/icon/updown.png" id="update_hide_image" alt="hide" height="30px" title="click to show or hide the contents"/>
            </td>
        </tr>
    </table>
</div>
    
</article>

