<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<?php include 'template/scr_sty_tab_data.php'; ?>


<style type="text/css" media="screen">
.search_note{
    font-family:Arial,Helvetica,sans-serif;
    font-size: 12px;
    display: table-cell;
}            
</style>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(function(){
            $("#select_form").validate({
                rules:  {
                    Dept_id:{required: true},
                    sLevel:{required:true},
                    Term:{required:true},
                    Sec:{required:true,maxlength:4}
                },
                messages:{
                }
            });
          });
          $(function(){
                $('select').selectmenu({
                    width:300,
                    menuWidth: 300,
                    format: addressFormatting
                });
            });

            $('#submit').click(function(){
                if($('#select_form').valid()){

                }
                else{
                    return false;
                }
            });
    });
</script>
</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='Make Routine';
    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>

<section id="main" class="column">
        <article class="module width_full shadow ">
            <header><h3 class="tabs_involved">Make Routine</h3>
            <ul class="tabs">
                <li><a href="#tab1">Select</a></li>
            </ul>
            </header>
            <div class="tab_container">
                    <div id="tab1" class="tab_content">
                    <?php echo form_open('admin/department/make_routine_for_this','id="select_form" method="GET"');?>
                    <table class="tablesorter" cellspacing="0">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                            $options=array(''=>'Must select..');
                            foreach ($all_departments->result() as $at) {
                                $options[$at->Dept_id]=$at->Dept_id.' - '.$at->Name;
                            }
                        ?>
                        <td><?php echo form_label('Select Department','Dept_id');?></td>
                        <td><?php echo form_dropdown('Dept_id',$options,  set_select('Dept_id'),'id="Dept_id"');?></td>
                        <td class="search_note">Select a department</td>
                    </tr>
                    <tr>
                        <?php
                            $options=array(''=>'Must Select...',
                                '1'=>'1',
                                '2'=>'2',
                                '3'=>'3',
                                '4'=>'4',
                                '5'=>'5'
                            );
                        ?>
                        <td><?php echo form_label('Level','sLevel');?></td>
                        <td><?php echo form_dropdown('sLevel',$options,set_select('sLevel'),'id="sLevel"');?></td>
                        <td class="search_note">Select Level ex 1/2/3/4</td>
                    </tr>

                    <tr>
                        <?php
                        $options=array(''=>'Must Select...',
                                '1'=>'1',
                                '2'=>'2',
                                '3'=>'3',
                                '4'=>'4',
                                '5'=>'5'
                            );
                        ?>
                        <td><?php echo form_label('Term','Term');?></td>
                        <td><?php echo form_dropdown('Term',$options,  set_select('Term'),'id="Term"');?></td>
                        <td class="search_note">Select Term ex 1/2</td>
                    </tr>
                    <tr>
                        <td><?php echo form_label('Section','Sec');?></td>
                        <td><?php echo form_input('Sec',set_value('Sec'),'id="Sec"');?></td>
                        <td class="search_note">Enter Section</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?php echo form_submit('submit','Submit','id="submit"');?></td>
                    </tr>
                    </tbody>
                    </table>
                     <?php echo form_close();?>
                    </div><!-- end of #tab1 -->
            </div>
        </article>
        <?php echo br(200);?>
</section>

<?php $this->load->view('admin/template/footer');?>