<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/admin/admin.css" type="text/css" media="screen" />

</head>

<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="#">Website Admin</a></h1>
                        <h2 class="section_title">Administration Login</h2><div class="btn_view_site"><a href="<?php echo site_url();?>">Main Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->

	<section id="secondary_bar">
		<div class="user">
			<p>Guest</p>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="#">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Guest</a></article>
		</div>
	</section><!-- end of secondary bar -->

	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Guest</h3>
		<ul class="toggle">
                        <li class="icn_categories"><a href="<?php echo site_url();?>">Member site</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong></strong></p>
		</footer>
	</aside><!-- end of sidebar -->

	<section id="main" class="column">                
		<article class="module width_half">
                    <header>
                        <h3>Login.</h3>
                    </header>

                    <div id="login_form">
                        
                        <?php echo validation_errors('<div id="error_message" class="sid_error">','</div><br/>');?>
                        
                        <?php echo form_open(site_url('admin/login/validate'));?>

                            <p>
                                <?php echo form_label('Username','username');?>
                                <br/>
                                <br/>
                                <?php echo form_input('username',set_value('username'),'id="username"');?>
                            </p>

                            <p>
                                <?php echo form_label('Password','password');?>
                                <br/>
                                <br/>
                                <?php echo form_password('password',set_value('password'),'id="password"');?>
                            </p>
                            
                            <p style="color:rgb(102,102,102); font-weight: normal;line-height: 0;">
                                <?php echo form_submit('submit','Sign in','id="submit"');?>
                                <?php echo nbs(10);?>
                                <input type="checkbox" name="stay" id="stay" value="1" <?php echo set_checkbox('stay', '1'); ?> /> Stay signed in
                            </p>

                            <?php echo anchor(site_url('admin/login/forget_password'),'Can\'t access your account?');?>

                        <?php echo form_close();?>
                    </div>
                    
		</article>
	</section>
        
<?php $this->load->view('admin/template/footer');?>