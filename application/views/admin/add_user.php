<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<link rel="stylesheet" href="<?php echo base_url();?>css/admin/admin.css" type="text/css" media="screen" />

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin'),
        'View User'=> site_url('admin/users/view_users')
    );

    $data['current']='Add User';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>
	<section id="main" class="column">
		<article class="module width_half">
			<header><h3>Add User</h3></header>
			<div id="login_form">

                        <?php echo validation_errors('<div id="error_message" class="sid_error">','</div><br/>');?>

                        <?php echo form_open(site_url('admin/users/validate'));?>

                            <p>
                                <?php echo form_label('Username','username');?>
                                <br/>
                                <br/>
                                <?php echo form_input('username',set_value('username'),'id="username"');?>
                            </p>

                            <p>
                                <?php echo form_label('Email','email');?>
                                <br/>
                                <br/>
                                <?php echo form_input('email',set_value('email'),'id="email"');?>
                            </p>

                            <p>
                                <?php echo form_label('Password','password');?>
                                <br/>
                                <br/>
                                <?php echo form_password('password',set_value('password'),'id="password"');?>
                            </p>

                            <p>
                                <?php echo form_label('Confirm Password','password2');?>
                                <br/>
                                <br/>
                                <?php echo form_password('password2',set_value('password2'),'id="password2"');?>
                            </p>

                            <p>
                                <?php echo form_submit('submit','Add User','id="submit"');?>
                            </p>

                        <?php echo form_close();?>
                    </div>
		</article><!-- end of stats article -->

                <article class="module width_half">
			<header><h3>Note</h3></header>
			<div class="module_content">
                            <p>*Make Sure to Change Your Password afterwards</p>
                            <h3>Current Users:</h3>
                            <ol id="selectable" title="select an account name to view its profile">
                                <?php if($all_users):?>
                                <?php foreach($all_users->result() as $row):?>
                                <li class="ui-widget-content shadow" style="padding: 10px;"><?php echo $row->username;?></li>
                                <?php endforeach;?>
                                <?php else:?>
                                    <li>No Users available.</li>
                                <?php endif;?>
                            </ol>
                        </div>
		</article><!-- end of stats article -->
	</section>

<?php $this->load->view('admin/template/footer');?>