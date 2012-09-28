<?php
    header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
    header('Pragma: no-cache'); // HTTP 1.0.
    header('Expires: 0'); // Proxies.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">

    <title><?php echo $title; ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />

<link rel="stylesheet" href="<?php echo base_url();?>template/styles/layout.css" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/scripts/jquery-slidedeck.pack.lite.js"></script>

<!--************************************************************************************************************* -->
	<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/sunny/jquery.ui.all.css"/>

	

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.core.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.tabs.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.mouse.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.button.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.accordion.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.draggable.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.position.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.resizable.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.dialog.js"></script>
        
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.effects.core.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.effects.blind.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.effects.explode.js"></script>
                
        <script src="<?php echo base_url();?>jqueryUI/external/jquery.cookie.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/external/jquery.bgiframe-2.1.2.js"></script>
        <script>
	$(function() {
		$( "#tabs" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});
	});
        

	$(function() {

		$( "input:submit, button,input:button", ".demo" ).button();

		//$( "a", ".demo" ).click(function() { return false; });

	});

	</script>

<script type="text/javascript" src="<?php echo base_url();?>jquery/form_valid.js"></script>

        <script>
	$(function() {
		$( "#accordion" ).accordion({

                        collapsible: true,
                        fillSpace: true
		});
	});
	</script>


<!--************************************************************************************************************* -->
<link rel="Stylesheet" type="text/css" href="<?php echo base_url();?>images/admin/slideshow/css/smoothDivScroll.css" />



<script src="<?php echo base_url();?>images/admin/slideshow/js/jquery.mousewheel.min.js" type="text/javascript"></script>
<!-- jQuery Kinectic (1.5) used for touch scrolling -->
<script src="<?php echo base_url();?>images/admin/slideshow/js/jquery.kinetic.js" type="text/javascript"></script>
<!-- Smooth Div Scroll 1.3 minified-->
<script src="<?php echo base_url();?>images/admin/slideshow/js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>images/admin/slideshow/js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>

<!-- If you want to look at the uncompressed version you find it at
	     js/jquery.smoothDivScroll-1.3.js -->

	<!-- Plugin initialization -->
    <script type="text/javascript">
            // Initialize the plugin with no custom options
            $(document).ready(function () {
                    // None of the options are set
                    $("div#makeMeScrollable").smoothDivScroll({
                            autoScrollingMode: "onStart"
                    });
            });
    </script>


<style type="text/css">

		#makeMeScrollable
		{
			width:100%;
			height: 330px;
			position: relative;
		}

		/* Replace the last selector for the type of element you have in
		   your scroller. If you have div's use #makeMeScrollable div.scrollableArea div,
		   if you have links use #makeMeScrollable div.scrollableArea a and so on. */
		#makeMeScrollable div.scrollableArea img
		{
			position: relative;
			float: left;
			margin: 0;
			padding: 0;
			/* If you don't want the images in the scroller to be selectable, try the following
			   block of code. It's just a nice feature that prevent the images from
			   accidentally becoming selected/inverted when the user interacts with the scroller. */
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-o-user-select: none;
			user-select: none;
		}
	</style>
</head>