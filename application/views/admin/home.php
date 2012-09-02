<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<link rel="stylesheet" href="<?php echo base_url();?>css/admin/admin.css" type="text/css" media="screen" />

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='home';
    
    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';    
    $this->load->view('admin/template/navigator',$data);
?>
	<section id="main" class="column">
            <h4 class="alert_info"><?php echo $msg;?></h4>
		<article class="module width_full">
			<header><h3>Latest Updates</h3></header>
			<div class="module_content">
				
				
			</div>
		</article><!-- end of stats article -->
	</section>

<?php $this->load->view('admin/template/footer');?>