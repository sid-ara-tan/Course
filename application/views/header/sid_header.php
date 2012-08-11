<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="icon" href="<?php echo base_url();?>static/images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/css/admin.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/css/lightbox.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/css/datepicker.css" media="screen" />
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>static/js/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>static/js/jquery.lightbox.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>static/js/default.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>static/js/admin.js"></script>

	<script language="JavaScript">			
		$(function(){
			$('ul#menubar li').hover(
				function() { $('ul', this).css('display', 'block').parent().addClass('hover'); },
				function() { $('ul', this).css('display', 'none').parent().removeClass('hover'); }
			);			
		});		
	</script>		
	
	<title>Sid</title>
	
</head>
<body>

<div class="bg">
	
	<div class="container">

                
		<div id="header">
                    
			<div id="logo">
			
                           <img style="opacity:.2;" src="<?php echo base_url();?>/images/cms_logo.png" alt="cms Logo"/>
                            <h2 style="font-size:3em;text-align: center;">Course Management System</h2>
                            
			</div>

                        
                        
			<div id="siteinfo">
				<ul id="toolbar">
					<li><a href="<?php echo site_url('/'); ?>">View Site</a></li>				
				</ul>
				
			</div>

		</div>
		
		<div id="navigation">
			<ul id="menubar">
			
                                <li><?php echo anchor("","home page");?>
                                        <ul class="subnav">
                                            <li><?php echo anchor("","Link");?></li>
                                        </ul>
                                </li>
                            
                                <li><?php echo anchor("","ABOUT");?>
                                        <ul class="subnav">
                                            <li><?php echo anchor("","Link");?></li>
                                        </ul>
                                </li>
			</ul>
			
		</div>
		
		<div id="content" class="content">
	