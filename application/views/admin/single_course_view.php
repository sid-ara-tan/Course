<script type="text/javascript" charset="utf-8">
 $(function(){
        $("#formAddNewRow").validate({
            rules:  {
                CourseNo:    {
                                required: true,
                                maxlength: 9,
                                remote: {
                                            url:"<?php echo site_url('admin/course/form_is_unique_course_no');?>",
                                            type:"post"
                                        }
                            },
                CourseName:  {
                                required: true,
                                maxlength: 49
                            }

            },
            messages:{
                CourseNo:    {
                                remote:"Error this ID already exists",
                                maxlength: "Enter at most 9 characters"
                            },

                CourseName: {
                                maxlength: "Enter at most 49 characters"
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
				"aTargets": [ 0,3,4,5,6,7 ]
		} ],
                 "aoColumns" : [
                                {
                                    sName: "CourseNo"
                                },
                                {
                                    sName: "CourseName"
                                },
                                {
                                    sName: "Dept_ID"
                                },
                                {
                                    sName: "sLevel"
                                },
                                {
                                    sName: "Term"
                                },
                                {
                                    sName: "Type"
                                },
                                {
                                    sName: "Curriculam"
                                },
                                {
                                    sName: "Credit"
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

            sUpdateURL: "<?php echo site_url('admin/course/update_information');?>",
            sDeleteURL: "<?php echo site_url('admin/course/delete_information');?>",
            sAddURL:    "<?php echo site_url('admin/course/add_information');?>",

            "aoColumns": [
                        {
                            indicator : 'Saving..',
                            tooltip: 'Click to edit the ID of Course',
                            onblur: 'cancel',
                            cancel  : 'Back',
                            submit: 'Ok',

                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
                                                        required:true,
                                                        maxlength: 9,
                                                        remote:{
                                                                url:"<?php echo site_url('admin/course/is_unique_course_no');?>",
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
                            tooltip: 'Click to edit Name of Course',
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
                            indicator: 'Saving Type info...',
                            tooltip: 'Click to select type',
                            loadtext: 'loading...',
                            type: 'select',
                            onblur: 'cancel',
                            submit: 'Ok',
                            cancel:'Back',
                            data: "{'':'Please select...', 'S':'Sessional','TT':'Theory'}"
                        },
                        
                        {
                            tooltip: 'Click to change department ',
                            loadtext: 'loading...',
                            type: 'select',
                            onblur: 'cancel',
                            cancel  : 'Cancel',
                            submit: 'Ok',
                            loadtype: 'GET',
                            loadurl: "<?php echo site_url('admin/course/load_curriculam_year');?>"
                        },
                         {
                            indicator: 'Saving Type info...',
                            tooltip: 'Click to select type',
                            loadtext: 'loading...',
                            type: 'select',
                            onblur: 'cancel',
                            submit: 'Ok',
                            cancel:'Back',
                            data: "{'':'Please select...','0.50':'0.50','0.75':'0.75','1.00':'1.00','1.50':'1.50','2.00':'2.00','2.50':'2.50','3.00':'3.00','3.50':'3.50','4.00':'4.00'}"
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
                                            title: 'Add a new Department',
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

    <form id="formAddNewRow" action="#" title="Add a new Course">
        <table>
            <tr>
                <td><?php echo form_label('Course No','CourseNo');?></td>
                <td><?php echo form_input('CourseNo',set_value('CourseNo'),'id="CourseNo" rel="0"');?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Course Name','CourseName');?></td>
                <td><?php echo form_input('CourseName',set_value('CourseName'),'id="CourseName" rel="1"');?></td>
            </tr>

            <?php
                $options=array();
                foreach ($all_departments->result() as $at) {
                    $options[$at->Dept_id]=$at->Dept_id.' - '.$at->Name;
                }
            ?>

            <tr>
                <td><?php echo form_label('Department ID','Dept_ID');?></td>
                <td><?php echo form_dropdown('Dept_ID',$options,  set_select('Dept_ID'),'id="Dept_ID" rel="2"');?></td>
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
                <td><?php echo form_dropdown('sLevel',$options,  set_select('sLevel'),'id="sLevel" rel="3"');?></td>
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
                <td><?php echo form_dropdown('Term',$options,  set_select('Term'),'id="Term" rel="4"');?></td>
            </tr>
            <?php
                $options=array(
                    'TT'=>'Theory',
                    'S'=>'Sessional',
                );
            ?>
            <tr>
                <td><?php echo form_label('Type','Type');?></td>
                <td><?php echo form_dropdown('Type',$options,  set_select('Type'),'id="Type" rel="5"');?></td>
            </tr>

            <?php
                 $options=array();
                 for ($i = 2000; $i < 2021; $i++) {
                    $options[$i]=$i;
                 }
            ?>
            <tr>
                <td><?php echo form_label('Curriculum','Curriculam');?></td>
                <td><?php echo form_dropdown('Curriculam',$options,  set_select('Curriculam'),'id="Curriculam" rel="6"');?></td>
            </tr>

            <?php
                $options=array(
                    '0.50'=>'0.50',
                    '0.75'=>'0.75',
                    '1.00'=>'1.00',
                    '1.50'=>'1.50',
                    '2.00'=>'2.00',
                    '2.50'=>'2.50',
                    '3.00'=>'3.00',
                    '3.50'=>'3.50',
                    '4.00'=>'4.00'
                );
            ?>
            <tr>
                <td><?php echo form_label('Credit','Credit');?></td>
                <td><?php echo form_dropdown('Credit',$options,  set_select('Credit'),'id="Credit" rel="7"');?></td>
            </tr>


        </table>
    </form>
    </div>

      <table id="id_datatable" cellpadding="0" cellspacing="0" border="0" class="display">
        <thead>
            <tr>
                <th>Course No</th>
                <th>Course Name</th>
                <th>Department ID</th>
                <th>Level</th>
                <th>Term</th>
                <th>Type</th>
                <th>Curriculum</th>
                <th>Credit</th>
            </tr>
        </thead>

        <tbody>
                 <?php foreach($all_course->result() as $single_course):?>
                    <tr id="<?php echo $single_course->CourseNo;?>">
                        <td><?php echo $single_course->CourseNo; ?></td>
                        <td><?php echo $single_course->CourseName; ?></td>

                        <?php 
                            $one_department_info=$this->department_model->get_department_info($single_course->Dept_ID);
                            if($one_department_info){
                                $just_one_dept=$one_department_info->row();
                                echo "<td>$single_course->Dept_ID - $just_one_dept->Name</td>";
                            }
                            else{
                                echo "<td>NONE - Currently Unavailable...</td>";
                            }
                        ?>

                        
                        <td><?php echo $single_course->sLevel; ?></td>
                        <td><?php echo $single_course->Term; ?></td>

                        <?php if($single_course->Type=='S'):?>
                            <td>Sessional</td>
                        <?php elseif($single_course->Type=='TT'):?>
                            <td>Theory</td>
                        <?php else:?>
                            <td>Unknown type</td>
                        <?php endif;?>

                        <td><?php echo $single_course->Curriculam; ?></td>
                        <td><?php echo $single_course->Credit; ?></td>
                    </tr>
                 <?php endforeach;?>
        </tbody>
         <tfoot>
            <tr>
                <th>Course No</th>
                <th>Course Name</th>
                <th>Department ID</th>
                <th>Level</th>
                <th>Term</th>
                <th>Type</th>
                <th>Curriculum</th>
                <th>Credit</th>
            </tr>
        </tfoot>
    </table>
</div>
