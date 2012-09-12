<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<?php include 'template/scr_sty_tab_data.php'; ?>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin'),
        'View students'=>  site_url('admin/view_student')
    );
    $data['current']='Pending request';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>

<section id="main" class="column">
        <article class="module width_full shadow ">
            <header><h3 class="tabs_involved">Pending Requests</h3>
            <ul class="tabs">
                <li><a href="#tab1">Currently assigned</a></li>
                <li><a href="#tab2">Check for Any</a></li>
            </ul>
            </header>
            <div class="tab_container">
                    <div id="tab1" class="tab_content">
                    <table class="tablesorter" cellspacing="0">
                    <thead>
                            <tr>
                                <th>Student Id</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Level/Term</th>

                            </tr>
                    </thead>
                    <tbody>
                        <?php foreach($all_students->result() as $pending_student):?>
                        <?php $get_single_student_info=$this->student_model->get_student_by_id($pending_student->S_Id);?>
                        <?php $single_student=$get_single_student_info->row();?>
                        <tr>
                            <td>
                                <a href="<?php 
                                    echo site_url('admin/student/student_pending_request');
                                    echo '?';
                                    echo 'id=';
                                    echo $single_student->S_Id;
                                    ?>">
                                    <?php echo $single_student->S_Id;?>
                                </a>
                            </td>
                            <td><?php echo $single_student->Name;?></td>
                            <td><?php echo $single_student->Dept_id;?></td>
                            <td>
                                <?php echo $single_student->sLevel;?>
                                <?php echo '/';?>
                                <?php echo $single_student->Term;?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    </table>
                    </div><!-- end of #tab1 -->

                    <script>
                    $(document).ready(function(){
                            $(function() {
                                    $( "#S_Id" ).autocomplete({
                                        source: function( request, response ) {
                                            $.getJSON( "<?php echo site_url('admin/student/autocomplete_id');?>", {
                                                    term: request.term
                                            }, response );
                                        },
                                        minLength:4
                                    });
                            });
                        });
                    </script>

                     <div id="tab2" class="tab_content">
                         <div align="center">
                            <?php echo form_open('admin/student/student_pending_request','method="GET"');?>
                             <table>
                                 <tr>
                                     <td>
                                        <?php echo form_label('Enter Student No:','S_Id');?>
                                     </td>
                                     <td>
                                         <?php echo form_input('id','','id="S_Id"')?>
                                     </td>
                                     <td>
                                         <?php echo form_submit('submit_search','','class="btn_post_message"');?>
                                     </td>
                                 </tr>
                             </table>
                            <?php echo form_close();?>
                         </div>
                         <?php echo br(20);?>
                     </div>
                        </div>
        </article>
        <?php echo br(200);?>
</section>

<?php $this->load->view('admin/template/footer');?>