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
        <article class="module width_full">
                <div class="module_content">
                    Nothing here content will be added later.
                    <!--
                    <object width="400" height="40"
                            classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                            codebase="http://fpdownload.macromedia.com/
                            pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0">
                            <param name="SRC" value="universe.swf">
                            <embed src="<?php echo base_url();?>/images/admin/universe.swf" width="100%" height="75%"></embed>
                       </object>
                    -->
                </div>
        </article><!-- end of stats article -->
</section>
	

<?php $this->load->view('admin/template/footer');?>