 <div class="add_delete_toolbar"/>
    <div>
        <form id="formAddNewRow" action="#" title="Add a new Teacher" class="search_form">
             <table>
             <tr>
                <td><?php echo form_label('Student ID','S_Id_sid');?></td>
                <td><?php echo form_input('S_Id_sid',set_value('S_Id_sid'),'id="S_Id_sid" rel="0"');?></td>
                <td>Enter student id ex 0805047</td>
             </tr>
             <tr>
                <td><?php echo form_label('Name','Name_sid');?></td>
                <td><?php echo form_input('Name_sid',set_value('Name_sid'),'id="Name_sid" rel="1"');?></td>
                <td>Full name ex. Siddhartha Shankar Das</td>
             </tr>

             <?php
                $options=array(''=>'Please Select');
                foreach ($all_departments->result() as $at) {
                    $options[$at->Dept_id]=$at->Dept_id.' - '.$at->Name;
                }
             ?>

             <tr>
                <td><?php echo form_label('Deptarment ID','Dept_id_sid');?></td>
                <td><?php echo form_dropdown('Dept_id_sid',$options,set_select('Dept_id_sid'),'id="Dept_id_sid" rel="2"');?></td>
                <td>You must select a department Default will will be a student with no dept.</td>
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
                <td><?php echo form_label('Level','sLevel_sid');?></td>
                <td><?php echo form_dropdown('sLevel_sid',$options ,set_select('sLevel_sid'),'id="sLevel_sid" rel="3"');?></td>
                <td>Select Level ex 1/2/3/4 etc.</td>
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
                <td><?php echo form_label('Term','Term_sid');?></td>
                <td><?php echo form_dropdown('Term_sid',$options,  set_select('Term_sid'),'id="Term_sid" rel="4"');?></td>
                <td>Select term ex 1/2</td>
             </tr>

             <tr>
                <td><?php echo form_label('Section','Sec_sid');?></td>
                <td><?php echo form_input('Sec_sid',set_value('Sec_sid'),'id="Sec_sid" rel="5"');?></td>
             </tr>

             <?php $options=array(''=>'Please selecet Deparment first');?>

              <tr id="extra_dropdown_sid">
                  <!--  <td><?php echo form_label('Select Advisor','Advisor');?></td>
                    <td><?php echo form_dropdown('Advisor',$options,  set_select('Advisor'),'id="Advisor" rel="6"');?></td>
                    <td>Select a department first to show it's available teacher</td>-->
              </tr>

             <tr>
                <td><?php echo form_label('Curriculum','Curriculam_sid');?></td>
                <td><?php echo form_input('Curriculam_sid',set_value('Curriculam_sid'),'id="Curriculam_sid" rel="7"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Password','Password_sid');?></td>
                <td><?php echo form_input('Password_sid',set_value('Password_sid'),'id="Password_sid" rel="8"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Father Name','father_name_sid');?></td>
                <td><?php echo form_input('father_name_sid',set_value('father_name_sid'),'id="father_name_sid" rel="9"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Email address','email_sid');?></td>
                <td><?php echo form_input('email_sid',set_value('email_sid'),'id="email_sid" rel="10"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Address','address_sid');?></td>
                <td><?php echo form_input('address_sid',set_value('address_sid'),'id="address_sid" rel="11"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Phone No','phone_sid');?></td>
                <td><?php echo form_input('phone_sid',set_value('phone_sid'),'id="phone_sid" rel="12"');?></td>
             </tr>
            </table>
        </form>
    </div>

 <script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(function(){
            $('select#Dept_id_sid').selectmenu({
                        width:300,
                        menuWidth: 300,
                        style:'popup',
                        format: addressFormatting,
                         select: function(event, options) {
                             $.ajax({
                                        data: "Dept_id=" + options.value,
                                        type: "POST",
                                        url: "<?php echo site_url('admin/student/add_teacher_by_dept_id');?>",
                                        success: function(value) {
                                            $("#extra_dropdown_sid").replaceWith(value);
                                        }
                            });
                        }
            });
        });
        $(function(){
            $('select#sLevel_sid').selectmenu({
                        width:300,
                        menuWidth: 300,
                        style:'popup',
                        format: addressFormatting
            });
        });
         $(function(){
            $('select#Term_sid').selectmenu({
                        width:300,
                        menuWidth: 300,
                        style:'popup',
                        format: addressFormatting
            });
        });
    });
</script>
 <script type="text/javascript" charset="utf-8">
 $(function(){
        $("#formAddNewRow").validate({
            rules:  {
               Name_sid:  {
                                required: true,
                                maxlength: 49
                            },
               Password_sid:   {
                                required: true,
                                minlength:5,
                                maxlength: 25
                            }
            },
            messages:{
                Name_sid: {
                                maxlength: "Enter at most 49 characters"
                            },
                Password_sid:   {
                                minlength: "Enter at least 5 characters",
                                maxlength: "Enter at most 25 characters"
                            }
                        }
        });
  });
</script>