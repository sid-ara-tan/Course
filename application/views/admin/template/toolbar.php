	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">Website Admin</a></h1>
                        <h2 class="section_title">Course Management System(CMS)</h2><div class="btn_view_site"><a href="<?php echo site_url();?>">Main Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->

	<section id="secondary_bar">
		<div class="user">
                    <p>
                        <?php
                            $username=$this->session->userdata('username');
                            echo $username;
                        ?> (<a href="#">No Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs">
                            <?php foreach ($toolbar as $key=>$value):?>
                            <a href="<?php echo $value ?>"><?php echo $key; ?></a>
                            <div class="breadcrumb_divider"></div>
                            <?php endforeach;?>
                            <a class="current"><?php echo $current;?></a>
                        </article>
		</div>
	</section><!-- end of secondary bar -->
