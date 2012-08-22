<?php
    header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
    header('Pragma: no-cache'); // HTTP 1.0.
    header('Expires: 0'); // Proxies.
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
        <title><?php echo $title;?></title>

        <link rel="stylesheet" href="<?php echo base_url();?>template/admin/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

        <script type="text/javascript" src="<?php echo base_url();?>jquery/jquery-1.7.2.min.js"></script>


	<script src="<?php echo base_url();?>/template/admin/js/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>/template/admin/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/template/admin/js/jquery.equalHeight.js"></script>

        <script src="<?php echo base_url();?>/jquery/admin/jquery.timers.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/jquery/admin/jquery.dropshadow.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/jquery/admin/mbTooltip.js" type="text/javascript"></script>

        <script type="text/javascript">
	$(document).ready(function()
    	{
      	  $(".tablesorter").tablesorter();
   	 }
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>

    <script type="text/javascript">
        $(function(){
            $('.column').equalHeight();
        });
    </script>

        <script type="text/javascript" charset="utf-8">
            $(function(){
                $("[title]").mbTooltip({ // also $([domElement]).mbTooltip  >>  in this case only children element are involved
                  opacity : .97,       //opacity
                  wait:500,           //before show
                  cssClass:"default",  // default = default
                  timePerWord:70,      //time to show in milliseconds per word
                  hasArrow:true,			// if you whant a little arrow on the corner
                  hasShadow:true,
                  imgPath:"<?php echo base_url().'images/admin/';?>",
                  ancor:"mouse", //"parent"  you can ancor the tooltip to the mouse position or at the bottom of the element
                  shadowColor:"black", //the color of the shadow
                  mb_fade:200 //the time to fade-in
                });
              });
        </script>

