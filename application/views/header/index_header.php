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

</head>