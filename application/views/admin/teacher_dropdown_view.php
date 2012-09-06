<?php
    if($all_teachers){
        $options=array(''=>'Please Select...');
        foreach($all_teachers->result() as $single_teacher){
            $options[$single_teacher->T_Id]=$single_teacher->T_Id.' - '.$single_teacher->Name;
        }
    }
    else{
        $options=array(''=>'No one currently available');
    }
?>

<td><?php echo form_label('Select Advisor','Advisor');?></td>
<td><?php echo form_dropdown('Advisor',$options,  set_select('Advisor'),'id="Advisor" rel="6"');?></td>
<td class="search_note">Select a advisor to show his under supervision student</td>

<script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $(function(){
                    $('select#Advisor').selectmenu({
                                width:300,
                                menuWidth: 300,
                                style:'popup',
                                format: addressFormatting
                    });
                });
            });
</script>