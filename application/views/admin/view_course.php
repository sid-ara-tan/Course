<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<?php include 'template/scr_sty_tab_data.php'; ?>

<script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $(function(){
                    $('select#select_dept').selectmenu({
                                style:'popup',
                                width: '50%',
                                format: addressFormatting,
                                select: function(event, options) {
                                    $.ajax({
						data: "Dept_id=" + options.value,
						type: "POST",
						url: "<?php echo site_url('admin/course/view_all_course_by_dept_id');?>",
						success: function(value) {
                                                        //alert(value);
							$("#custom_table").html(value);
						}
                                    });
                                }
                    });
                });
            });
</script>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='Course';

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
                            <li><a href="#course_info_tabs_1" title="All available department information">Course</a></li>
                            <li><a href="#course_info_tabs_2" title="All available department information">Help</a></li>
                        </ul>
                        <div id="course_info_tabs_1">
                            <div >
                                    <?php if($all_departments):?>
                                    <h2>Customize course information.</h2>
                                    <fieldset class="shadow">
                                            <label for="select_dept">Select any Course:</label>
                                            <select name="select_dept" id="select_dept">
                                                <option value="NONE" selected="selected">Please select.. - Please select a department to show it's course</option>
                                                <option value="ALL" >All Courses.. - Show all courses that has been already created.</option>
                                                <?php foreach ($all_departments->result() as $single_department):?>
                                                <option value="<?php echo $single_department->Dept_id;?>">
                                                <?php
                                                                echo $single_department->Dept_id;
                                                                echo ' - ';
                                                                echo $single_department->Name;

                                                                echo ' | ';
                                                                $single_techer_info=$this->teacher_model->get_teacher_by_id($single_department->Head_of_dept_id);

                                                                if($single_techer_info){
                                                                    $a_teacher=$single_techer_info->row();
                                                                    echo $single_department->Head_of_dept_id;
                                                                    echo '-';
                                                                    echo $a_teacher->Name;
                                                                    echo '-';
                                                                    echo $a_teacher->Designation;
                                                                }
                                                                else{
                                                                    echo $single_department->Head_of_dept_id.' - Currently Unavailable... ';
                                                                }
                                                        ?>
                                                </option>
                                                <?php endforeach;?>
                                            </select>
                                    </fieldset>
                                    <?php else:?>
                                    <p>No department currently available add a department first.</p>
                                    <?php endif;?>
                            </div>
                            <div class="ex_highlight shadow">
                                <div id="custom_table">
                                    <fieldset><p style="text-align:center;">Course information will be loaded here.</p></fieldset>
                                </div>
                            </div>
                            
                            <div style="padding:20px;">
                            <p style="font-weight: bold;">Note:</p>
                            <p>Here are some information regarding customizing Course information.</p>

                                <ul>
                                    <li>Add button for Creating new Course</li>
                                    <li>Delete for deleting Course information</li>
                                    <li>Double click an item for edit.</li>
                                    <li>Click outside or cancel button for cancel update</li>
                                    <li>You can search through your item.</li>
                                    <li>Though pagination and selecting number of entries per page allows you to navigate information nicely.</li>
                                </ul>
                            <p style="font-style: italic;color: rgb(119, 186, 206);">Refresh the page after changing Course No.</p>
                            </div>
                        </div>
                        <div id="course_info_tabs_2">
                            the quick brown fox jumps over the lazy dog;
                            <?php echo br(75);?>
                        </div>


                    </div>
		</article><!-- end of stats article -->
	</section>

<?php $this->load->view('admin/template/footer');?>