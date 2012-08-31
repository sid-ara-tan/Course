<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<link rel="stylesheet" href="<?php echo base_url();?>css/admin/admin.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/base/jquery.ui.all.css" type="text/css" media="screen" />


<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.core.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.mouse.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.selectable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.tabs.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(function() {
		$( "#department_info_tabs" ).tabs({
                        ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible.");
				}
			}
                });
	});
    });
</script>

<!--This style import has been done for datatable-->


<style type="text/css" title="currentStyle">
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_page.css";
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_table.css";
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_table_jui.css";
        @import "<?php echo base_url();?>jquery/admin/Datatables_Editables/media/css/demo_validation.css";
        @import "<?php echo base_url();?>jqueryUI/themes/smoothness/jquery-ui-1.8.23.custom.css";
        @import "<?php echo base_url();?>css/admin/highlight_row.css";
        
</style>

<!--<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/DataTables/media/js/jquery.dataTables.js"></script>-->

<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.jeditable.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.validate.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.DataTables.editable.js"></script>


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
                            indicator : 'Saving..',
                            tooltip: 'Click to edit the ID of Department',
                            onblur: 'cancel'

                        },

                        {
                            indicator : 'Saving..',
                            tooltip: 'Click to edit Name of Department',
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
<style type="text/css" media="screen">
    .error{
            display: block;
        }
</style>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='Departments';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>
	<section id="main" class="column">
		<article class="module width_full shadow" id="department_info_tabs">
                    <div>
                        <ul>
                            <li><a href="#department_info_tabs_1" title="All available department information">Departments</a></li>
                            <li><a href="#department_info_tabs_2" title="All available department information">Data Table Editable.</a></li>
                        </ul>
                        <div id="department_info_tabs_1">
                            <div style="padding:20px;">
                                <p style="font-weight: bold;">Department Information.</p
                                
                                <div class="add_delete_toolbar" />
                                <div>
                                <form id="formAddNewRow" action="#" title="Add a new browser">
                                    <table>
                                    <tr>
                                        <td><?php echo form_label('Department ID','Dept_id');?></td>
                                        <td><?php echo form_input('Dept_id',set_value('Dept_id'),'id="Dept_id" class="required" rel="0"');?></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo form_label('Department Name','Name');?></td>
                                        <td><?php echo form_input('Name',set_value('Name'),'id="Name" class="required" rel="1"');?></td>
                                    </tr>

                                    <?php
                                        $options=array();
                                        foreach ($all_teacher->result() as $at) {
                                            $options[$at->T_Id]=$at->T_Id.' -('.$at->Designation.')- '.$at->Name;
                                    }
                                    ?>

                                   <tr>
                                        <td><?php echo form_label('Head of Department ID','Head_of_dept_id');?></td>
                                        <td><?php echo form_dropdown('Head_of_dept_id', $options,set_value('Head_of_dept_id'),'rel="2"');?></td>
                                   </tr>
                                   
                                   <tr>
                                        <td><?php echo form_label('Password','Password');?></td>
                                        <td><?php echo form_password('Password',set_value('Password'),'id="Password" class="required" minlength="5" rel="3"');?></td>
                                   </tr>

                                   <tr>
                                        <td><?php echo form_label('Confirm Password','Password2');?></td>
                                        <td><?php echo form_password('Password2',set_value('Password2'),'id="Password2" class="required" minlength="5"');?></td>
                                   </tr>


                                    </table>
                                </form>
                                </div>

                                <table id="id_datatable" cellpadding="0" cellspacing="0" border="0" class="display datatable">
                                    <thead>
                                        <tr>
                                            <th>Department ID</th>
                                            <th>Department Name</th>
                                            <th>Head of Department ID</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        <?php foreach($all_departments->result() as $single_department):?>
                                        <tr id="<?php echo $single_department->Dept_id;?>">
                                                <td><?php echo $single_department->Dept_id;?></td>
                                                <td><?php echo $single_department->Name;?></td>

                                                <?php
                                                    $single_techer_info=$this->teacher_model->get_teacher_by_id($single_department->Head_of_dept_id);
                                                ?>
                                                <?php if($single_techer_info):?>
                                                <?php $a_teacher=$single_techer_info->row();?>
                                                    <td><?php echo $single_department->Head_of_dept_id.'-('.$a_teacher->Designation.')-'.$a_teacher->Name;?></td>
                                                <?php else:?>
                                                    <td><?php echo $single_department->Head_of_dept_id.' - No teaching profile found ';?></td>
                                                <?php endif;?>
                                                

                                                <td><?php echo $single_department->Password;?></td>
                                            </tr>
                                         <?php endforeach;?>
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
                            </div>
                            <div></div>
                        </div>

                        <div id="department_info_tabs_2">
                            <td><input type="image" src="<?php echo base_url('template/admin');?>/images/icn_trash.png" title="Trash"></td>
                        </div>


                    </div> 
		</article><!-- end of stats article -->
	</section>

<?php $this->load->view('admin/template/footer');?>