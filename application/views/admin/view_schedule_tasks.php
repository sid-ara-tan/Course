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
                            "aTargets": [ 0,1,2 ]
            } ],
            "sDom": '<"top"iflp<"clear">>rt<"bottom"ifp<"clear">>',
            "aoColumns" : [
                                {sName: "Dept_id"},
                                {sName: "sLevel"},
                                {sName: "Term"},
                                {sName: "period"}
                              ] ,

            "oLanguage": {
			"sZeroRecords": "Nothing found - sorry",
			"sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
			"sInfoEmpty": "Showing 0 to 0 of 0 records",
			"sInfoFiltered": "(filtered from _MAX_ total records)"
            }
    }).makeEditable({

        sUpdateURL: "<?php echo site_url('admin/department/update_schedule');?>",
        sDeleteURL: "<?php echo site_url('admin/department/delete_schedule');?>",
        "aoColumns": [
                        null,
                        null,
                        null,
                         {
                           indicator: 'Saving Period info...',
                            tooltip: 'Click to change period',
                            loadtext: 'loading...',
                            type: 'select',
                            onblur: 'cancel',
                            submit: 'Ok',
                            cancel:'Back',
                            data: "{'registration_request':'registration_request','drop_request':'drop_request','term_final_period':'term_final_period','result_show_period':'result_show_period','idle':'idle'}"
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
        $('#add_schedule').click(function(){
             var form_data ={
                Dept_id: $('#Dept_id').val(),
                sLevel:$('#sLevel').val(),
                Term:$('#Term').val(),
                period:$('#period').val()
             };
             
             $.ajax({
                url:"<?php echo site_url('admin/department/add_schedule'); ?>",
                type:'POST',
                data:form_data,
                dataType: 'json',
                success:function(msg){
                    $('#show_message').html(msg['output']);
                    if(msg['success']){
                            window.location.reload();
                    }
                }
            });

            return false;
        });
    });
</script>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    
    $data['current']='Task Scheduling';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>
	<section id="main" class="column">
		<article class="module width_full shadow" >
                    <header><h3 class="tabs_involved">Make Routine</h3>
    <ul class="tabs">
        <li><a href="#tab1">Current</a></li>
        <li><a href="#tab2">Add </a></li>
    </ul>
    </header>
    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table id="id_datatable" cellpadding="0" cellspacing="0" border="0" class="display datatable">
                <thead>
                    <tr>
                        <th>Department ID</th>
                        <th>Level</th>
                        <th>Term</th>
                        <th>Period</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($all_schedule->result()as $schedule):?>
                    <tr id="<?php echo $schedule->Dept_id.$schedule->sLevel.$schedule->Term;?>">
                        <?php
                            $get_dept=$this->department_model->get_department_by_id($schedule->Dept_id);
                            $the_dept=$get_dept->row();
                        ?>
                        <td>
                            <?php echo $schedule->Dept_id;?>
                            <?php echo ' - ';?>
                            <?php echo $the_dept->Name;?>
                        </td>
                        <td><?php echo $schedule->sLevel;?></td>
                        <td><?php echo $schedule->Term;?></td>
                        <td><?php echo $schedule->period;?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>

                 <tfoot>
                    <tr>
                        <th>Department ID</th>
                        <th>Level</th>
                        <th>Term</th>
                        <th>Period</th>
                    </tr>
                </tfoot>
            </table>
            </div>
        <div id="tab2" class="tab_content">
            <div>
            <form id="schedule_form" action="#" title="Add a new department">
                <table class="tablesorter" cellspacing="0">
                    <tr>
                        <td id="show_message" colspan="2">Message will be shown here</td>
                    </tr>
                    <?php
                        $options=array();
                        foreach ($all_departments->result() as $at) {
                            $options[$at->Dept_id]=$at->Dept_id.' - '.$at->Name;
                        }
                    ?>

                    <tr>
                        <td><?php echo form_label('Department ID','Dept_id');?></td>
                        <td><?php echo form_dropdown('Dept_id',$options,  set_select('Dept_id'),'id="Dept_id" rel="0"');?></td>
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
                        <td><?php echo form_dropdown('sLevel',$options,  set_select('sLevel'),'id="sLevel" rel="1"');?></td>
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
                        <td><?php echo form_dropdown('Term',$options,  set_select('Term'),'id="Term" rel="2"');?></td>
                    </tr>

                    <?php
                        $options=array(
                            'registration_request'=>'registration_request',
                            'drop_request'=>'drop_request',
                            'term_final_period'=>'term_final_period',
                            'result_show_period'=>'result_show_period',
                            'idle'=>'idle'
                        );
                    ?>
                    <tr>
                        <td><?php echo form_label('period','period');?></td>
                        <td><?php echo form_dropdown('period',$options,set_select('period'),'id="period" rel="3"');?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?php echo form_submit('add_schedule','Add','id="add_schedule"');?></td>
                    </tr>
                </table>
            </form>
            </div>
        </div>
</div>
</article><!-- end of stats article -->
</section>

<?php $this->load->view('admin/template/footer');?>