<?php /*well using json data for ajax table sow.*/?>
<style type="text/css" title="currentStyle">
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_page.css";
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_table.css";
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_table_jui.css";
        @import "<?php echo base_url();?>jqueryUI/themes/smoothness/jquery-ui-1.8.23.custom.css";
        @import "<?php echo base_url();?>css/admin/highlight_row.css";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/DataTables/media/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">
       $(document).ready(function() {
            $('.datatable').dataTable({
		"aaSorting": [[ 0, "asc" ]],
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
                "sDom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
                "aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],

                "aoColumnDefs": [ {
				"sClass": "center",
				"aTargets": [ 0, 2, 3 ]
		} ],
                "bProcessing": true,
		"sAjaxSource": '<?php echo site_url('admin/department/department_info_json');?>',
                "aoColumns": [
                                { "mData": "Dept_id" },
                                { "mData": "Name" },
                                { "mData": "Head_of_dept_id" },
                                { "mData": "Password" }
                            ],
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


<?php /*corresponding table to show that information*/?>

 <table cellpadding="0" cellspacing="0" border="0" class="display datatable">
    <thead>
        <tr>
            <th>Department ID</th>
            <th>Department Name</th>
            <th width="15%">Head of Department ID</th>
            <th>Password</th>
        </tr>
    </thead>

    <tbody>
       <!-- <?php foreach($all_departments->result() as $single_department):?>
        <tr>
            <td><?php echo $single_department->Dept_id;?></td>
            <td title="click to edit information"><?php echo $single_department->Name;?></td>
            <td><?php echo $single_department->Head_of_dept_id;?></td>
            <td><?php echo $single_department->Password;?></td>
        </tr>
        <?php endforeach;?>-->
    </tbody>

     <tfoot>
        <tr>
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Head of Department ID</th>
            <th>Password</th>
        </tr>
    </tfoot>
</table>

<?php /*controller meathod for getting the jason data*/?>
<?php
function department_info_json(){
        $query= $this->department_model->get_all_department();

        $row_set=array();
        $options=array();

        foreach ($query->result() as $row) {
            $options['Dept_id']=$row->Dept_id;
            $options['Name']=$row->Name;
            $options['Head_of_dept_id']=$row->Head_of_dept_id;
            $options['Password']=$row->Password;
            $row_set[]=$options;
        }


        echo '{ "aaData":';
        echo json_encode($row_set);
        echo '}';
    }
?>



<script type="text/javascript" charset="utf-8">
       $(document).ready(function() {
            $('.datatable').dataTable({
		"aaSorting": [[ 0, "asc" ]],
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
                "sDom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
                "aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
                "aoColumnDefs": [ {
				"sClass": "center",
				"aTargets": [ 0, 2, 3 ]
		} ],

                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "<?php echo site_url('admin/department/listener');?>",
                'fnServerData': function(sSource, aoData, fnCallback)
                {
                  $.ajax
                  ({
                    'dataType': 'json',
                    'type'    : 'POST',
                    'url'     : sSource,
                    'data'    : aoData,
                    'success' : fnCallback
                  });
                },


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

<?php
    function listener(){
         $table = "department";
         $columns = array("Dept_id","Name","Head_of_department_id", "Password");
         $index = "Dept_id";

         $this->load->library("Datatables");
         $this->datatables->from('department');
         echo $this->datatables->generate();

    }
    ?>


<?php
 /*echo 'id-';
          echo $id;
          echo '||value-';
          echo $value;
          echo '||column-';
          echo $column;
          echo '||culumnposition-';
          echo $columnPosition;
          echo '||columnId-';
          echo $columnId;
          echo '||rowId-';
          echo $rowId;*/

      /*    $id = $_REQUEST['id'] ;
          $value = $_REQUEST['value'] ;
          $column = $_REQUEST['columnName'] ;
          $columnPosition = $_REQUEST['columnPosition'] ;
          $columnId = $_REQUEST['columnId'] ;
          $rowId = $_REQUEST['rowId'] */
?>



<script type="text/javascript" charset="utf-8">
$(document).ready( function () {
    var id = -1;//simulation of id
    $('#id_datatable').dataTable({
            bJQueryUI: true,
            "sPaginationType": "full_numbers",
            "aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
            "aoColumnDefs": [ {
                            "sClass": "center",
                            "aTargets": [ 0, 3 ]
            } ],

            "aoColumns" : [
                                {
                                    sName: "Dept_id"
                                },
                                {
                                    sName: "Name"
                                },
                                {
                                    sName: "Head_of_dept_id"
                                },
                                {
                                    sName: "Password"
                                }
                              ] ,

            "oLanguage": {
			"sZeroRecords": "Nothing found - sorry",
			"sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
			"sInfoEmpty": "Showing 0 to 0 of 0 records",
			"sInfoFiltered": "(filtered from _MAX_ total records)"
            }
    }).makeEditable({

        sUpdateURL: "<?php echo site_url('admin/department/update_information');?>",
        sDeleteURL: "<?php echo site_url('admin/department/delete_information');?>",
        sAddURL:    "<?php echo site_url('admin/department/add_information');?>",
        "aoColumns": [
                        {
                            cssclass:"required",
                            fnOnCellUpdated: function(sStatus, sValue, settings){
                              alert("(Cell Callback): Cell is updated with value " + sValue);
                            }
                        },
                        {
                            indicator : 'Saving..',
                            tooltip: 'Click to edit Name of Department',
                            onblur: 'cancel',
                            cancel    : 'Cancel',
                            submit    : 'OK',

                            cssclass:"required"

                        },

                        {
                            tooltip: 'Click to change departmental head',
                            loadtext: 'loading...',
                            type: 'select',
                            onblur: 'cancel',
                            cancel  : 'Cancel',
                            submit: 'Ok',
                            loadtype: 'GET',
                            loadurl: "<?php echo site_url('admin/department/load_teacher_info');?>"
                        },
                        {
                            oValidationOptions : {
                                                    rules:{ value: {minlength: 5 }  },
                                                    messages: { value: {minlength: "Enter at least 5 characters"} } }}
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

<script type="text/javascript" charset="utf-8">

    /*  "aoColumns": [
                        {

                        },
                        {
                            indicator : 'Saving..',
                            tooltip: 'Click to edit Name of Department',

                            type: 'textarea',
                            submit:'Save changes',

                            onblur: 'cancel',
                            cancel    : 'Cancel',

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
                            tooltip: 'Click to change departmental head',
                            loadtext: 'loading...',
                            type: 'select',
                            onblur: 'cancel',
                            cancel  : 'Cancel',
                            submit: 'Ok',
                            loadtype: 'GET',
                            loadurl: "<?php echo site_url('admin/department/load_teacher_info');?>"
                        },

                        {
                            tooltip: 'Click to change password',
                            onblur: 'cancel',
                            cancel  : 'Cancel',
                            submit: 'Ok',

                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
                                                        minlength: 5,
                                                        maxlength: 20
                                                      }
                                       },
				       messages: {
                                               value:{
                                                        minlength: "Enter at least 5 characters" ,
                                                        maxlength: "Enter at most 20 characters"
                                                      }
                                       }
                                   }
                        }

                        ]*/
</script>