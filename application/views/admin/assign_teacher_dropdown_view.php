<?php
    if($all_teachers){
        $options=array(''=>'Must Select...');
        foreach($all_teachers->result() as $single_teacher){
            $get_teacher_info=$this->teacher_model->get_teacher_by_T_id($single_teacher->T_Id);
            $teacher_info=$get_teacher_info->row();
            $options[$single_teacher->T_Id]=$single_teacher->T_Id.' - '.$teacher_info->Designation.' '.$teacher_info->Name;
        }
    }
    else{
        $options=array(''=>'No one currently available');
    }
?>

<td><?php echo form_label('Select Teacher','by_teacher');?></td>
<td><?php echo form_dropdown('by_teacher',$options,  set_select('by_teacher'),'id="by_teacher"');?></td>
<td class="search_note">Select a advisor to show his under supervision student</td>

<script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $(function(){
                    $('select#by_teacher').selectmenu({
                                width:300,
                                menuWidth: 300,
                                format: addressFormatting
                    });
                });
            });
</script>