<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<link rel="stylesheet" href="<?php echo base_url();?>css/admin/admin.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/base/jquery.ui.all.css" type="text/css" media="screen" />

<script src="<?php echo base_url();?>/jqueryUI/ui/jquery.ui.core.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/jqueryUI/ui/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/jqueryUI/ui/jquery.ui.mouse.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/jqueryUI/ui/jquery.ui.selectable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/jqueryUI/ui/jquery.ui.tabs.js" type="text/javascript"></script>

<style>
#feedback { }
#selectable .ui-selecting {/*background: #FECA40;*/ background: #666666;}
#selectable .ui-selected { /*background: #F39814;*/background:#333333;color: white; }
#selectable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
#selectable li { margin: 3px; padding: 0.4em; height: 18px; }
</style>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(function() {
		$( "#user_info_tabs" ).tabs();
	});
    });
</script>

<script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
                $(function() {
                    $( "#selectable" ).selectable({
                         selecting: function (event, ui) {
                            $(event.target).children('.ui-selecting').not(':first').removeClass('ui-selecting');
                         },

                         selected: function(event, ui) {
                            var sid_data={
                                username:$('.ui-selected').text()
                            };

                            $.ajax({
                                url:"<?php echo site_url('admin/users/getUserInformation');?>",
                                type:'POST',
                                data:sid_data,
                                success:function(result){
                                   // alert("oh yeah");
                                    $("#show_user_information").html(result);
                                }
                            });
                         }
                    });
            });
        });
	
</script>


<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $('#edit_submit').click(function(){
            var form_data ={
          email: $('#edit_email').val(),
          password:$('#edit_password').val(),
          password2:$('#edit_password2').val()
        };

        $.ajax({
            url:"<?php echo site_url('admin/users/update_validate'); ?>",
            type:'POST',
            data:form_data,
            success:function(msg){
                $('#show_edit_information').html(msg);
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
        'Home'=>  site_url('admin/admin'),
        'Add User'=>  site_url('admin/users/add_user')
    );
    $data['current']='View Users';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>

<?php $username=$this->session->userdata('username');?>

<section id="main" class="column">
        <article class="module width_full shadow" id="user_info_tabs">
            <div>
                <ul>
                        <li><a href="#user_info_tabs_1">Profile</a></li>
                        <li><a href="#user_info_tabs_2">Edit Information</a></li>
                </ul>
                <?php $current_user=$current_user_info->row();?>

                <div id="user_info_tabs_1">
                    <?php echo img(base_url('images/admin/no_profile.jpg','Picture havent given yet'));?>
                    <p><strong>Name:</strong><br/><?php echo $current_user->username;?></p>
                    <p><strong>Email:</strong><br/><?php echo $current_user->email;?></p>
                </div>
                <div id="user_info_tabs_2">
                     <div id="login_form" style="width:30%;">
                            <div id="show_edit_information"></div>

                            <?php echo form_open();?>

                                <p>
                                    <strong><?php echo form_label('Email','edit_email');?></strong>
                                    <br/>
                                    <br/>
                                    <?php echo form_input('email',set_value('email',$current_user->email),'id="edit_email" title="incase you forget password reseted password will be sent here."');?>
                                </p>

                                <p>
                                    <strong><?php echo form_label('Password','edit_password');?></strong>
                                    <br/>
                                    <br/>
                                    <?php echo form_password('password',set_value('password'),'id="edit_password" title="Password should be at least 5 chars."');?>
                                </p>

                                <p>
                                    <strong><?php echo form_label('Confirm Password','edit_password2');?></strong>
                                    <br/>
                                    <br/>
                                    <?php echo form_password('password2',set_value('password2'),'id="edit_password2"');?>
                                </p>

                                <p>
                                <?php echo form_submit('submit','Edit Account','id="edit_submit"');?>
                                <a href="<?php echo site_url('admin/users/delete_account');?>" title="Delete your existing account." onclick="if (!confirm('Are you sure?')) return false" >Delete Account.</a>
                                </p>
                            <?php echo form_close();?>
                        </div>
                </div>
        </div>
        </article>

        <article class="module width_quarter">
                <header><h3>Administrators</h3></header>
                <div class="module_content">
                    <ol id="selectable" title="select an account name to view its profile">
                        <?php if($all_users):?>
                        <?php foreach($all_users->result() as $row):?>
                        <?php if($row->username==$username){continue;}?>
                        <li class="ui-widget-content shadow"><?php echo $row->username;?></li>
                        <?php endforeach;?>
                        <?php else:?>
                            <li>No Users available.</li>
                        <?php endif;?>
                    </ol>


                </div>
        </article><!-- end of stats article -->
        <article class="module width_3_quarter">
                <header><h3>Profile Information</h3></header>
                <div class="module_content">
                    <div id="show_user_information"><p>Select any user to view profile Information.</p></div>
                </div>
        </article><!-- end of stats article -->
        <?php echo br(200);?>
</section>

<?php $this->load->view('admin/template/footer');?>