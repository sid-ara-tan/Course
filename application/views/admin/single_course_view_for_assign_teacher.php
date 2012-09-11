<script type="text/javascript" charset="utf-8">
       $(document).ready(function() {
           

            $('#id_datatable').dataTable({
		"aaSorting": [[ 0, "asc" ]],
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
                "aLengthMenu": [[5,10,15, 25, 50, -1], [5,10,15, 25, 50, "All"]],

                "aoColumnDefs": [ {
				"sClass": "center",
				"aTargets": [ 0,3,4,5,6,7 ]
		} ],

                "bStateSave": true,
                "iDisplayLength":15,
                "sDom": '<"top"iflp<"clear">>rt<"bottom"ifp<"clear">>',

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
            });
} );
</script>

<div>
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

                        <td>
                            <a href="<?php
                                echo site_url('admin/course/assign_teacher_for_this_course');
                                echo '?CourseNo=';
                                echo $single_course->CourseNo;
                                echo '&';
                                echo 'Dept_id=';
                                echo $single_course->Dept_ID;
                                ?>" title="Click here">
                                <?php echo $single_course->CourseNo; ?>
                            </a>

                        </td>
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
