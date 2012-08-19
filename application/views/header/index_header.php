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
	<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/base/jquery.ui.all.css">

	

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.core.js"></script>

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.widget.js"></script>

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.tabs.js"></script>
        
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.button.js"></script>

	<script>

	$(function() {

		$( "#tabs" ).tabs();

	});

	</script>
        
        <script>

	$(function() {

		$( "input:submit, button,input:button", ".demo" ).button();

		//$( "a", ".demo" ).click(function() { return false; });

	});

	</script>

	<script>
        function checkNull(frm)
        {
            if((frm.message.value=="")||(frm.subject.value==""))
                {
                }
            else frm.submit();
        }
        
        function check()
        {
            var ans=confirm("Are you sure to delete ?");
            if(ans){return true;}
            else return false;

        }

	</script>
<!--************************************************************************************************************* -->

</head>