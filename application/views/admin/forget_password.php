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
                    <article class="breadcrumbs"><a href="<?php echo site_url('admin/login');?>">Login</a> <div class="breadcrumb_divider"></div> <a class="current">Forget Password</a></article>
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
                        <li class="icn_security"><a href="<?php echo site_url('admin/login');?>">Login Here.</a></li>
		</ul>

		<footer>
			<hr />
			<p><strong></strong></p>
		</footer>
	</aside><!-- end of sidebar -->

	<section id="main" class="column">

            <h4 class="alert_info"><?php echo $msg; ?></h4>

		<article class="module width_half">
                    <header>
                        <h3>Login.</h3>
                    </header>

                    <div id="login_form">

                        <?php echo validation_errors('<div id="error_message" class="sid_error">','</div><br/>');?>

                        <?php echo form_open(site_url('admin/login/reset_password'));?>

                            <p>
                                <?php echo form_label('Username','username');?>
                                <br/>
                                <br/>
                                <?php echo form_input('username',set_value('username'),'id="username"');?>
                            </p>


                            <p>
                                <?php echo form_submit('submit','Reset Password','id="submit"');?>
                            </p>

                        <?php echo form_close();?>
                    </div>

		</article>
	</section>

<?php $this->load->view('admin/template/footer');?>