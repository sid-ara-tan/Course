<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<?php include 'template/scr_sty_tab_data.php'; ?>


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
                            onblur: 'cancel',
                            cancel  : 'Back',
                            submit: 'Ok',

                            oValidationOptions :
                                   {
                                       rules:{
                                               value: {
                                                        required:true,
                                                        maxlength: 5,
                                                        remote:{
                                                                url:"<?php echo site_url('admin/department/check_dept_id');?>",
                                                                type:"post"
                                                            }
                                                      }
                                       },
				       messages: {
                                               value:{
                                                        remote:"Error this ID already exists",
                                                         maxlength: "Enter at most 5 characters"
                                                      }
                                       }
                                   }

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

<script type="text/javascript" charset="utf-8">
 $(function(){
        $("#formAddNewRow").validate({
            rules:  {
                Dept_id:    {
                                required: true,
                                maxlength: 5,
                                remote: {
                                            url:"<?php echo site_url('admin/department/form_check_dept_id');?>",
                                            type:"post"
                                        }
                            },
                Name:       {
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
                Dept_id:    {
                                remote:"Error this ID already exists",
                                maxlength: "Enter at most 5 characters"
                            },

                Name:       {
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
		<article class="module width_full shadow" id="page_tabs">
                    <div>
                        <ul>
                            <li><a href="#department_info_tabs_1" title="All available department information">Departments</a></li>
                            <li><a href="#department_info_tabs_2" title="All available department information">Help</a></li>
                        </ul>
                        <div id="department_info_tabs_1">
                            <div class="ex_highlight" style="padding:20px;">
                                <p style="font-weight: bold;">Department Information.</p>
                                
                                <div class="add_delete_toolbar"></div>
                                <div>

                                <form id="formAddNewRow" action="#" title="Add a new department">
                                    <table>
                                    <tr>
                                        <td><?php echo form_label('Department ID','Dept_id');?></td>
                                        <td><?php echo form_input('Dept_id',set_value('Dept_id'),'id="Dept_id" rel="0"');?></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo form_label('Department Name','Name');?></td>
                                        <td><?php echo form_input('Name',set_value('Name'),'id="Name" rel="1"');?></td>
                                    </tr>

                                    <?php
                                        $options=array();
                                        $options['99999']='99999 - Currently Unavailable...';
                                        foreach ($all_teacher->result() as $at) {
                                            $options[$at->T_Id]=$at->T_Id.' -('.$at->Designation.')- '.$at->Name;
                                        }
                                    ?>

                                    <tr>
                                        <td><?php echo form_label('Head of Department ID','Head_of_dept_id');?></td>
                                        <td><?php echo form_dropdown('Head_of_dept_id', $options,  set_select('Head_of_dept_id'),'rel="2"');?></td>
                                    </tr>

                                   <tr>
                                        <td><?php echo form_label('Password','Password');?></td>
                                        <td><?php echo form_input('Password',set_value('Password'),'id="Password" rel="3"');?></td>
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
                                                    <td id="<?php echo $single_department->Dept_id;?>_id"><?php echo $single_department->Head_of_dept_id.'-('.$a_teacher->Designation.')-'.$a_teacher->Name;?></td>
                                                <?php else:?>
                                                    <td id="<?php echo $single_department->Dept_id;?>_id"><?php echo 'Currently unavailable';?></td>
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
                            <div> <div style="padding:20px;">
                            <p style="font-weight: bold;">Note:</p>
                            <p>Here are some information regarding customizing Department information.</p>

                                <ul>
                                    <li>Add button for Creating new Department</li>
                                    <li>Delete for deleting department information</li>
                                    <li>Double click an item for edit.</li>
                                    <li>Click outside or cancel button for cancel update</li>
                                    <li>You can search through your item.</li>
                                    <li>Though pagination and selecting number of entries per page allows you to navigate information nicely.</li>
                                </ul>
                            <p style="font-style: italic;color: rgb(119, 186, 206);">Refresh the page after changing Department ID.</p>
                            </div></div>
                        </div>

                        <div id="department_info_tabs_2">
                           the quick brown fox jumps over the lazy dog.
                           <?php echo br(50);?>
                        </div>


                    </div> 
		</article><!-- end of stats article -->
	</section>

<?php $this->load->view('admin/template/footer');?>