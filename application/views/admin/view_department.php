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

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(function() {
		$( "#department_info_tabs" ).tabs({
                        ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible.");
				}
			}
                });
	});
    });
</script>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='Departments';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>
	<section id="main" class="column">
		<article class="module width_full shadow" id="department_info_tabs">
                    <div>
                        <ul>
                            <li><a href="#department_info_tabs_1" title="All available department information">Departments</a></li>
                            <li><a href="#department_info_tabs_2" title="Add new Department">Add department.</a></li>
                        </ul>
                        <div id="department_info_tabs_1">
                                <p>I havent done anything yet.</p>
                        </div>
                        <div id="department_info_tabs_2">
                                <p>I havent done anything yet2.</p>
                        </div>

                    </div> 
		</article><!-- end of stats article -->
	</section>

<?php $this->load->view('admin/template/footer');?>