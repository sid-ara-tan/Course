<script type="text/javascript" charset="utf-8">
       $(document).ready(function() {
            $('#id_datatable').dataTable({
		"aaSorting": [[ 0, "asc" ]],
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
                "aLengthMenu": [[5,10,15,30,50,60,100, -1], [5,10,15,30,50,60,100,"All"]],
                 "sScrollX": "100%",
                "sScrollXInner": "150%",
                "bScrollCollapse": true,
                "bStateSave": true,
                "iDisplayLength":15,
                "sDom": '<"top"iflp<"clear">>rt<"bottom"ifp<"clear">>',
                "aoColumnDefs": [ {
				"sClass": "center",
				"aTargets": [ 0,3,4,5,7 ]
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

             sUpdateURL: "<?php echo site_url('admin/student/update_information');?>",
             sDeleteURL: "<?php echo site_url('admin/student/delete_information');?>",

            "aoColumns" : [
                {
                            indicator : 'Saving..',
                            tooltip: 'Click to edit the ID of Student',
                            onblur: 'cancel',
                            cancel  : 'Back',
                            submit: 'Ok',

                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
                                                        required:true,
                                                        digits:true,
                                                        maxlength: 10,
                                                        remote:{
                                                                url:"<?php echo site_url('admin/student/edit_validate_student_exist');?>",
                                                                type:"post"
                                                            }
                                                      }
                                       },
				       messages: {
                                               value:{
                                                        remote:"Error this ID already exists",
                                                        maxlength: "Enter at most 10 characters"
                                                      }
                                       }
                                   }

                 },
                {
                            indicator : 'Saving..',
                            tooltip: 'Click to edit Name of Student',
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
                    indicator: 'Saving Level info...',
                    tooltip: 'Click to select Level',
                    loadtext: 'loading...',
                    type: 'select',
                    onblur: 'cancel',
                    submit: 'Ok',
                    cancel:'Back',
                    data: "{'':'Please select...', '1':'1','2':'2','3':'3','4':'4','5':'5'}"
                },
                {
                    indicator: 'Saving Term info...',
                    tooltip: 'Click to select term',
                    loadtext: 'loading...',
                    type: 'select',
                    onblur: 'cancel',
                    submit: 'Ok',
                    cancel:'Back',
                    data: "{'':'Please select...', '1':'1','2':'2','3':'3','4':'4','5':'5'}"
                },
                 {
                    indicator : 'Saving..',
                    tooltip: 'Click to edit student Section number',
                    onblur: 'cancel',
                    cancel  : 'Back',
                    submit: 'Ok',

                    oValidationOptions :
                           {
                               rules:{
                                       value: {
                                                required:true,
                                                maxlength: 4
                                              }
                               },
                               messages: {
                                       value:{
                                                maxlength: "Enter at most 4 characters"
                                              }
                               }
                           }

                 },

                {
                            tooltip: 'Click to change departmental head',
                            loadtext: 'loading...',
                            type: 'select',
                            onblur: 'cancel',
                            cancel  : 'Cancel',
                            submit: 'Ok',
                            loadtype: 'GET',
                            loadurl: "<?php echo site_url('admin/student/load_teacher_info');?>"
                },
                {
                            tooltip: 'Click to change Curriculam year ',
                            loadtext: 'loading...',
                            type: 'select',
                            onblur: 'cancel',
                            cancel  : 'Cancel',
                            submit: 'Ok',
                            loadtype: 'GET',
                            loadurl: "<?php echo site_url('admin/course/load_curriculam_year');?>"
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
                            indicator : 'Saving..',
                            tooltip: 'Click to edit father name',
                            onblur: 'cancel',
                            cancel    : 'Cancel',
                            type: 'textarea',
                            submit:'Save changes',
                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
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
                            indicator : 'Saving..',
                            tooltip: 'Click to edit email addresss',
                            onblur: 'cancel',
                            cancel    : 'Cancel',
                            type: 'textarea',
                            submit:'Save changes',
                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
                                                        email:true,
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
                            indicator : 'Saving..',
                            tooltip: 'Click to edit addresss',
                            onblur: 'cancel',
                            cancel    : 'Cancel',
                            type: 'textarea',
                            submit:'Save changes',
                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
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
                            tooltip: 'Click to change contact no',
                            onblur: 'cancel',
                            cancel  : 'Back',
                            submit: 'Ok',

                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
                                                        digits:true,
                                                        maxlength: 40
                                                      }
                                       },
				       messages: {
                                               value:{
                                                        minlength: "Enter at least 5 characters" ,
                                                        maxlength: "Enter at most 40 characters"
                                                      }
                                       }
                                   }
                }
            ],

            oDeleteRowButtonOptions: {
                                            label: "Remove",
                                            icons: {primary:'ui-icon-trash'}
            },
            sAddDeleteToolbarSelector: ".dataTables_length"
});
} );
</script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
         $('#toggle_search_result').click(function(){
            $('#div_search_result').toggle('slow');
        });
    });
</script>