<script type="text/javascript" charset="utf-8">
 $(function(){
        $("#formAddNewRow").validate({
            rules:  {
                T_Id:    {
                                required: true,
                                digits:true,
                                minlength:5,
                                maxlength: 9,
                                remote: {
                                            url:"<?php echo site_url('admin/teacher/form_is_unique_teacher_id');?>",
                                            type:"post"
                                        }
                            },
                Name:  {
                                required: true,
                                maxlength: 49
                            },
               Password:   {
                                required: true,
                                minlength:5,
                                maxlength: 25
                            },
               Designation:  {
                                required: true,
                                maxlength: 19
                            }

            },
            messages:{
                T_Id:    {
                                remote:"Error this ID already exists",
                                maxlength: "Enter at most 9 characters"
                            },

                Name: {
                                maxlength: "Enter at most 49 characters"
                            },
                Password:   {
                                minlength: "Enter at least 5 characters",
                                maxlength: "Enter at most 25 characters"
                            },
                Designation: {
                                maxlength: "Enter at most 19 characters"
                            }
            }
        });
  });
</script>
<script type="text/javascript" charset="utf-8">
       $(document).ready(function() {
            $('#id_datatable').dataTable({
		"aaSorting": [[ 0, "asc" ]],
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
                "aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],

                "aoColumnDefs": [ {
				"sClass": "center",
				"aTargets": [ 0,2,3 ]
		} ],
                "aoColumns" : [
                                {
                                    sName: "T_Id"
                                },
                                {
                                    sName: "Name"
                                },
                                {
                                    sName: "Password"
                                },
                                {
                                    sName: "Dept_Id"
                                },
                                {
                                    sName: "Designation"
                                }
                              ] ,

                "oLanguage": {
			"sLengthMenu": "Display _MENU_ records per page",
			"sZeroRecords": "Nothing found - sorry",
			"sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
			"sInfoEmpty": "Showing 0 to 0 of 0 records",
			"sInfoFiltered": "(filtered from _MAX_ total records)"
		}
            }).makeEditable({

             sUpdateURL: "<?php echo site_url('admin/teacher/update_information');?>",
             sDeleteURL: "<?php echo site_url('admin/teacher/delete_information');?>",
             sAddURL:    "<?php echo site_url('admin/teacher/add_information');?>",

             "aoColumns": [
                 {
                      indicator : 'Saving..',
                            tooltip: 'Click to edit the ID of Teacher',
                            onblur: 'cancel',
                            cancel  : 'Back',
                            submit: 'Ok',

                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
                                                        digits:true,
                                                        minlength:5,
                                                        required:true,
                                                        maxlength: 9,
                                                        remote:{
                                                                url:"<?php echo site_url('admin/teacher/is_unique_teacher_id');?>",
                                                                type:"post"
                                                            }
                                                      }
                                       },
				       messages: {
                                               value:{
                                                        remote:"Error this ID already exists",
                                                        maxlength: "Enter at most 9 characters"
                                                      }
                                       }
                                   }

                 },
                 {
                            indicator : 'Saving..',
                            tooltip: 'Click to edit Name of Teacher',
                            onblur: 'cancel',
                            cancel    : 'Cancel',
                            type: 'textarea',
                            submit:'Save changes',
                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
                                                        required:true,
                                                        maxlength: 49
                                                      }
                                       },
				       messages: {
                                               value:{
                                                        maxlength: "Enter at most 49 characters"
                                                     }
                                       }
                                   }
                 },
                        
                 {
                            tooltip: 'Click to change password',
                            onblur: 'cancel',
                            cancel  : 'Back',
                            submit: 'Ok',

                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
                                                        required:true,
                                                        minlength: 5,
                                                        maxlength: 25
                                                      }
                                       },
				       messages: {
                                               value:{
                                                        minlength: "Enter at least 5 characters" ,
                                                        maxlength: "Enter at most 25 characters"
                                                      }
                                       }
                                   }
                },
                 {
                    tooltip: 'Click to change department ',
                    loadtext: 'loading...',
                    type: 'select',
                    onblur: 'cancel',
                    cancel  : 'Cancel',
                    submit: 'Ok',
                    loadtype: 'GET',
                    loadurl: "<?php echo site_url('admin/course/load_department_info');?>"
                },
                  {
                            tooltip: 'Click to edit designation',
                            onblur: 'cancel',
                            cancel  : 'Back',
                            submit: 'Ok',

                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
                                                        required: true,
                                                        maxlength: 19
                                                      }
                                       },
				       messages: {
                                               value:{
                                                        maxlength: "Enter at most 19 characters"
                                                      }
                                       }
                                   }
                }
             ],

            oAddNewRowButtonOptions: {
                                            label: "Add...",
                                            icons: {primary:'ui-icon-plus'}
            },

            oDeleteRowButtonOptions: {
                                            label: "Remove",
                                            icons: {primary:'ui-icon-trash'}
            },

            oAddNewRowFormOptions: {
                                            title: 'Add a new teacher',
                                            show: "blind",
                                            hide: "explode",
                                            modal: true,
                                            width: "auto"

            },
            sAddDeleteToolbarSelector: ".dataTables_length"
});
} );
</script>

<div>
    <div class="add_delete_toolbar"></div>
    <div>
        <form id="formAddNewRow" action="#" title="Add a new Teacher">
             <table>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="0"');?></td>
            </tr>
             <tr>
                <td><?php echo form_label('Name','Name');?></td>
                <td><?php echo form_input('Name',set_value('Name'),'id="Name" rel="1"');?></td>
            </tr>
             <tr>
                <td><?php echo form_label('Password','Password');?></td>
                <td><?php echo form_input('Password',set_value('Password'),'id="" rel="2"');?></td>
            </tr>
             
            <?php
                $options=array();
                foreach ($all_departments->result() as $at) {
                    $options[$at->Dept_id]=$at->Dept_id.' - '.$at->Name;
                }
            ?>

            <tr>
                <td><?php echo form_label('Department ID','Dept_Id');?></td>
                <td><?php echo form_dropdown('Dept_Id',$options,  set_select('Dept_Id'),'id="Dept_Id" rel="3"');?></td>
            </tr>
            
            <tr>
                <td><?php echo form_label('Designation','Designation');?></td>
                <td><?php echo form_input('Designation',set_value('Designation'),'id="Designation" rel="4"');?></td>
            </tr>

            </table>
        </form>
    </div>

      <table id="id_datatable" cellpadding="0" cellspacing="0" border="0" class="display">
        <thead>
            <tr>
                <th>Teacher Id.</th>
                <th>Teacher Name.</th>
                <th>Password</th>
                <th>Department Id</th>
                <th>Designation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($all_teachers->result() as $single_teacher):?>
                <tr id="<?php echo $single_teacher->T_Id; ?>">
                    
                    <td><?php echo $single_teacher->T_Id; ?></td>
                    <td><?php echo $single_teacher->Name;?></td>
                    <td><?php echo $single_teacher->Password;?></td>
                    <?php
                            $one_department_info=$this->department_model->get_department_info($single_teacher->Dept_Id);
                            if($one_department_info){
                                $just_one_dept=$one_department_info->row();
                                echo "<td>$single_teacher->Dept_Id - $just_one_dept->Name</td>";
                            }
                            else{
                                echo "<td>NONE - Currently Unavailable...</td>";
                            }
                    ?>
                    <td><?php echo $single_teacher->Designation;?></td>                    
                </tr>
            <?php endforeach;?>
        </tbody>
         <tfoot>
           <tr>
                <th>Teacher Id.</th>
                <th>Teacher Name.</th>
                <th>Password</th>
                <th>Department Id</th>
                <th>Designation</th>
           </tr>
        </tfoot>
    </table>
</div>
