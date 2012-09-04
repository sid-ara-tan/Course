<script type="text/javascript" charset="utf-8">
 $(function(){
        $("#formAddNewRow").validate({
            rules:  {
                Name:  {
                                required: true,
                                maxlength: 49
                            },
               Password:   {
                                required: true,
                                minlength:5,
                                maxlength: 25
                            }
            },
            messages:{
                Name: {
                                maxlength: "Enter at most 49 characters"
                            },
                Password:   {
                                minlength: "Enter at least 5 characters",
                                maxlength: "Enter at most 25 characters"
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
                 "sScrollX": "100%",
                "sScrollXInner": "150%",
                "bScrollCollapse": true,
                "bStateSave": true,
                "sDom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
                "aoColumnDefs": [ {
				"sClass": "center",
				"aTargets": [ 0 ]
		} ],
                "aoColumns" : [
                               { sName: "S_Id" },
                               { sName: "Name" },
                               { sName: "Dept_id" },
                               { sName: "sLevel" },
                               { sName: "Term" },
                               { sName: "Sec" },
                               { sName: "Advisor" },
                               { sName: "Curriculam" },
                               { sName: "Password" },
                               { sName: "father_name" },
                               { sName: "email" },
                               { sName: "address" },
                               { sName: "phone" }
                              ] ,

                "oLanguage": {
			"sLengthMenu": "Display _MENU_ records per page",
			"sZeroRecords": "Nothing found - sorry",
			"sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
			"sInfoEmpty": "Showing 0 to 0 of 0 records",
			"sInfoFiltered": "(filtered from _MAX_ total records)"
		}
            }).makeEditable({

            "aoColumns" : [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null   
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
                                            title: 'Add a new student',
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
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="1"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="2"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="3"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="4"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="5"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="6"');?></td>
             </tr><tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="7"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="8"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="9"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="10"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="11"');?></td>
             </tr>
             <tr>
                <td><?php echo form_label('Teacher ID','T_Id');?></td>
                <td><?php echo form_input('T_Id',set_value('T_Id'),'id="T_Id" rel="12"');?></td>
             </tr>
            </table>
        </form>
    </div>

      <table id="id_datatable" cellpadding="0" cellspacing="0" border="0" class="display">
        <thead>
            <tr>
                <th>Student ID.</th>
                <th>Name.</th>
                <th>Department</th>
                <th>Level</th>
                <th>Term</th>
                <th>Section</th>
                <th>Advisor</th>
                <th>Curriculum</th>
                <th>Password</th>
                <th>Fathers Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($all_students->result()as $single_student):?>
            <tr id="<?php echo $single_student->S_Id;?>">

                <td><?php echo $single_student->S_Id;?></td>
                <td><?php echo $single_student->Name;?></td>
                <td><?php echo $single_student->Dept_id;?></td>
                <td><?php echo $single_student->sLevel;?></td>
                <td><?php echo $single_student->Term;?></td>
                <td><?php echo $single_student->Sec;?></td>
                <td><?php echo $single_student->Advisor;?></td>
                <td><?php echo $single_student->Curriculam;?></td>
                <td><?php echo $single_student->Password;?></td>
                <td><?php echo $single_student->father_name;?></td>
                <td><?php echo $single_student->email;?></td>
                <td><?php echo $single_student->address;?></td>
                <td><?php echo $single_student->phone;?></td>

            </tr>
            <?php endforeach;?>
        </tbody>
         <tfoot>
           <tr>
                <th>Student ID.</th>
                <th>Name.</th>
                <th>Department</th>
                <th>Level</th>
                <th>Term</th>
                <th>Section</th>
                <th>Advisor</th>
                <th>Curriculum</th>
                <th>Password</th>
                <th>Fathers Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
           </tr>
        </tfoot>
    </table>
</div>
