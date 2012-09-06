<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<?php include 'template/scr_sty_tab_data.php'; ?>
<style type="text/css" media="screen">
.search_form input[type=text]{
    width: 298px;
    height: 20px;
}

.search_form textarea{
    width: 298px;
    height:20px;
}

.search_form textarea:focus{
    width: 298px;
    height:100px;
}


#create_table td{
    vertical-align: top;
}

.search_note{
    font-family:Arial,Helvetica,sans-serif;
    font-size: 12px;
    display: table-cell;
}
.search_header{
    border: 1px ridge white;background:#666666;text-align: center;color: white;padding:5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
}
</style>
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

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(function(){
            $('select#Dept_id').selectmenu({
                        width:300,
                        menuWidth: 300,
                        style:'popup',
                        format: addressFormatting,
                        select: function(event, options) {
                             $.ajax({
                                        data: "Dept_id=" + options.value,
                                        type: "POST",
                                        url: "<?php echo site_url('admin/student/teacher_by_dept_id');?>",
                                        success: function(value) {
                                                $("#extra_dropdown").html(value);
                                        }
                            });
                        }
            });
        });

        $(function(){
            $('select#Curriculam').selectmenu({
                        //style:'popup',
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });

        $(function(){
            $('select#sLevel').selectmenu({
                        //style:'popup',
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });
        $(function(){
            $('select#Term').selectmenu({
                        //style:'popup',
                        width:300,
                        menuWidth: 300,
                        format: addressFormatting
            });
        });
    });
</script>

<script type="text/javascript" charset="utf-8">
 $(function(){
        $("#create_student_form").validate({
            rules:  {
                S_Id:    {
                                required:true,
                                digits: true,
                                maxlength: 10,
                                remote: {
                                            url:"<?php echo site_url('admin/student/validate_student_exist_unique');?>",
                                            type:"post"
                                        }
                            },
                Name:  {
                                maxlength: 49
                            },
               Sec: {
                   maxlength:4
               },
               Password:{
                   required:true,
                   minlength:5,
                   maxlength:25
               },
               father_name:{
                        maxlength:49
               },
               email:{
                    email:true,
                    maxlength:49
               },
               phone:{
                    digits:true,
                    maxlength:49
               }

            },
            messages:{
                S_Id:    {
                                remote:"Error this ID alredy exists"
                }
            }
        });
  });
</script>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin'),
        'View student'=>  site_url('admin/student/view_student')
    );
    $data['current']='Create a  Student';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>

<section id="main" class="column">
        <?php echo validation_errors('<article class="module width_full shadow "><div class="full_width_sid_error" style="text-align:center;">','</div></article>');?>
        <?php if($info):?>
            <article class="module width_full shadow ">
                <div  style="text-align:center;font-size: 1.1em;font-family:Verdana,Arial,sans-serif;">
                    <?php if($info=='success'):?>
                    <div class="full_width_sid_success"><img src="<?php echo base_url();?>/template/admin/images/icn_alert_success.png"/>  student created successfully</div>
                    <?php elseif($info=='error'):?>
                    <div class="full_width_sid_error">student creation failed</div>
                    <?php else:?>
                    <div class="full_width_sid_success"><?php echo $info;?></div>
                    <?php endif;?>
                </div>
            </article>
        <?php endif;?>  

        <article class="module width_full shadow " id="page_tabs">
        <div>
               <div id="search_div">
                <div align="center" class="search_header">
                    <span style="font-size: 24px;">Create a Student</span>
                </div>
                <div class="search_form">
                     <?php echo form_open('admin/student/create_a_student','id="create_student_form"');?>
                       <table cellpadding="0" cellspacing="20" border="0"  class="ui-widget" align="center" id="create_table">
                            <tr>
                                <td><?php echo form_label('Student ID','S_Id');?></td>
                                <td><?php echo form_input('S_Id',set_value('S_Id'),'id="S_Id"');?></td>
                                <td class="search_note">Enter student ID
                                    <br/>year-department code-roll number ex 0805047
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo form_label('Name','Name');?></td>
                                <td><?php echo form_input('Name',set_value('Name'),'id="Name"');?></td>
                                <td class="search_note">Enter your name ex. Siddhartha Shankar Das
                                </td>
                            </tr>
                            <?php
                                $options=array();
                                foreach ($all_departments->result() as $at) {
                                    $options[$at->Dept_id]=$at->Dept_id.' - '.$at->Name;
                                }
                            ?>
                            <tr>
                                <td><?php echo form_label('Select Department','Dept_id');?></td>
                                <td><?php echo form_dropdown('Dept_id',$options, set_select('Dept_id'),'id="Dept_id"');?></td>
                                <td class="search_note">Select a department</td>
                            </tr>

                             <?php
                                $options=array(''=>'Please Select...',
                                    '1'=>'1',
                                    '2'=>'2',
                                    '3'=>'3',
                                    '4'=>'4',
                                    '5'=>'5'
                                );
                            ?>

                            <tr>
                                <td><?php echo form_label('Level','sLevel');?></td>
                                <td><?php echo form_dropdown('sLevel',$options,set_select('sLevel'),'id="sLevel"');?></td>
                                <td class="search_note">Default will not asign any at any level</td>
                            </tr>
                            <?php
                            $options=array(''=>'Please Select...',
                                    '1'=>'1',
                                    '2'=>'2',
                                    '3'=>'3',
                                    '4'=>'4'
                                );
                            ?>
                            <tr>
                                <td><?php echo form_label('Term','Term');?></td>
                                <td><?php echo form_dropdown('Term',$options,set_value('Term'),'id="Term"');?></td>
                                <td class="search_note">Default will not not asign any term</td>
                            </tr>
                            <tr>
                                <td><?php echo form_label('Section','Sec');?></td>
                                <td><?php echo form_input('Sec',set_value('Sec'),'id="Sec"');?></td>
                                <td class="search_note">Section ex. A, B, A1, B1</td>
                            </tr>

                            <tr id="extra_dropdown">
                                <!--row for advisor-->
                            </tr>
                            <?php
                                 $options=array(''=>'Select...');
                                 for ($i = 2000; $i < 2021; $i++) {
                                    $options[$i]=$i;
                                 }
                            ?>
                            <tr>
                                <td><?php echo form_label('Select Curriculam','Curriculam');?></td>
                                <td><?php echo form_dropdown('Curriculam',$options,set_select('Curriculam'),'id="Curriculam"');?></td>
                                <td class="search_note">ex 2005 those who studying under same curriculum</td>
                            </tr>
                            <tr>
                                <td><?php echo form_label('Password','Password');?></td>
                                <td><?php echo form_input('Password',set_value('Password'),'id="Password"');?></td>
                                <td class="search_note">Set a password</td>
                            </tr>

                            <tr>
                                <td><?php echo form_label('Fathers Name','father_name');?></td>
                                <td><?php echo form_input('father_name',set_value('father_name'),'id="father_name"');?></td>
                                <td class="search_note">Enter your father name</td>
                            </tr>

                            <tr>
                                <td><?php echo form_label('Email Address','email');?></td>
                                <td><?php echo form_input('email',set_value('email'),'id="email"');?></td>
                                <td class="search_note">Enter a valid  email address</td>
                            </tr>

                            <tr>
                                <td><?php echo form_label('Address','address');?></td>
                                <td><?php echo form_textarea('address',set_value('address'),'id="address"');?></td>
                                <td class="search_note">Enter Your  address within 50 letters</td>
                            </tr>


                            <tr>
                                <td><?php echo form_label('Phone No','phone');?></td>
                                <td><?php echo form_input('phone',set_value('phone'),'id="phone"');?></td>
                                <td class="search_note">Your contact info Ex 01729192319</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td><?php echo form_submit('submit','Create','id="create_submit"');?></td>
                            </tr>
                        </table>

                       <?php echo form_close();?>
                </div>
           </div>
        </div>
        </article>
        <?php echo br(20);?>
</section>

<?php $this->load->view('admin/template/footer');?>