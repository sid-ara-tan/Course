<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/admin/admin.css" type="text/css" media="screen" />
<link rel="Stylesheet" type="text/css" href="<?php echo base_url();?>images/admin/slideshow/css/smoothDivScroll.css" />

<?php include 'template/scr_sty_tab_data.php'; ?>

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
                    <div id="makeMeScrollable">

                       <?php
                            //path to directory to scan. i have included a wildcard for a subdirectory
                            $directory ="images/admin/slideshow/images/demo/";

                            //echo $directory;


                            //get all image files with a .jpg extension.
                            $images = glob($directory ."*.jpg");

                            $imgs = '';
                            // create array
                            foreach($images as $image){
                                $imgs[] = "$image";
                            }

                            //shuffle array
                            shuffle($imgs);

                            //select first 20 images in randomized array
                            $imgs = array_slice($imgs, 0, 20);

                            ?>

                            <?php $i=0;?>
                            <?php foreach ($imgs as $img): ?>
                                <img src="<?php echo base_url().$img;?>" id="sid_<?php $i++;?>"alt="Demo image"/>
                            <?php endforeach; ?>
                    </div>
                </div>
        </article><!-- end of stats article -->

           <article class="module width_full">
                <div class="module_content">
                    Here are some shortcut links.
                    <?php echo anchor("admin/unitTest","Unit Testing page");?>
                </div>
        </article><!-- end of stats article -->
</section>


<?php $this->load->view('admin/template/footer');?>



<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<link rel="stylesheet" href="<?php echo base_url();?>css/admin/admin.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>images/admin/lofslidernews/css/layout.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>images/admin/lofslidernews/css/style2.css" />

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>images/admin/lofslidernews/js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>images/admin/lofslidernews/js/script.js"></script>

<script type="text/javascript">
 $(document).ready( function(){
		var buttons = { previous:$('#jslidernews2 .button-previous') ,
						next:$('#jslidernews2 .button-next') };
		$('#jslidernews2').lofJSidernews(
                {
                    interval:5000,
                    easing:'easeInOutQuad',
                    duration:1200,
                    auto:true,
                    mainWidth:684,
                    mainHeight:300,
                    navigatorHeight		: 100,
                    navigatorWidth		: 310,
                    maxItemDisplay:3,
                    buttons:buttons
                } );
	});

</script>
<style>

	ul.lof-main-wapper li {
		position:relative;
	}
</style>

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
                <div>
                 <div id="container">
                    <div id="jslidernews2" class="lof-slidecontent" style="width:980px; height:300px;">
                        <div class="preload"><div></div></div>
                        <div  class="button-previous">Previous</div>
                             <!-- MAIN CONTENT -->
                          <div class="main-slider-content" style="width:684px; height:300px;">
                            <ul class="sliders-wrap-inner">
                                <li>
                                      <img src="<?php echo base_url();?>images/admin/lofslidernews/images/thumbl_980x340.png" title="Newsflash 2" >
                                      <div class="slider-description">
                                        <div class="slider-meta"><a target="_parent" title="Newsflash 1" href="#Category-1">/ Newsflash 1 /</a> <i> — Monday, February 15, 2010 12:42</i></div>
                                        <h4>Content of Newsflash 1</h4>
                                        <p>The one thing about a Web site, it always changes! content,...
                                        <a class="readmore" href="#">Read more </a>
                                        </p>
                                     </div>
                                </li>
                               <li>
                                  <img src="<?php echo base_url();?>images/admin/lofslidernews/images/thumbl_980x340_002.png" title="Newsflash 1" >
                                     <div class="slider-description">
                                       <div class="slider-meta"><a target="_parent" title="Newsflash 2" href="#Category-2">/ Newsflash 2 /</a> 	<i> — Monday, February 15, 2010 12:42</i></div>
                                        <h4>Content of Newsflash 2</h4>
                                        <p>I will be added content later ...
                                        <a class="readmore" href="#">Read more </a>
                                        </p>
                                     </div>
                                </li>
                              </ul>
                        </div>
                               <!-- END MAIN CONTENT -->
                       <!-- NAVIGATOR -->
                            <div class="navigator-content">
                              <div class="navigator-wrapper">
                                    <ul class="navigator-wrap-inner">
                                      <li>
                                            <div>
                                                <img src="<?php echo base_url();?>images/admin/lofslidernews/images/lofthumbs/791902news3.jpg" />
                                                <h4> NewsFlash 1 </h4>
                                                <span>20.01.2010</span> The quick brown fox jumps over the lazy dog...
                                            </div>
                                        </li>
                                         <li>
                                            <div>
                                                <img src="<?php echo base_url();?>images/admin/lofslidernews/images/lofthumbs/435576news10.jpg" />
                                                <h4> NewsFlash 2 </h4>
                                                <span>20.01.2010</span> The another quick brown fox jumps over the lazy dog. ..
                                            </div>
                                        </li>
                                    </ul>
                              </div>

                         </div>
                      <!----------------- END OF NAVIGATOR --------------------->
                      <div class="button-next">Next</div>
                             <!-- BUTTON PLAY-STOP -->
                      <div class="button-control"><span></span></div>
                      <!-- END OF BUTTON PLAY-STOP -->
                    </div>
                 </div>
               </div>
        </article>

        <article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Content Manager</h3>
		<ul class="tabs">
                        <li><a href="#tab2">Teachers</a></li>
                        <li><a href="#tab3">Students</a></li>
                        <li><a href="#tab3">Others</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
                             <ul>
                                <li> View teachers information <?php echo anchor("admin/teacher/view_teacher","here");?></li>
                            </ul>

			</div><!-- end of #tab1 -->

			<div id="tab2" class="tab_content">

			</div><!-- end of #tab2 -->

                        <div id="tab3" class="tab_content">
                            <ul>
                                <li><?php echo anchor("admin/unitTest","Unit testing");?> is done here</li>
                            </ul>

			</div><!-- end of #tab2 -->

		</div><!-- end of .tab_container -->

		</article><!-- end of content manager article -->

		<article class="module width_quarter">
			<header><h3>Updates</h3></header>
			<div class="message_list">
				<div class="module_content">
					<div class="message"><p>Just created department</p>
					<p><strong>John Doe</strong></p></div>
				</div>

				<div class="module_content">
					<div class="message"><p>just add courses</p>
					<p><strong>Jane Doe</strong></p></div>
				</div>
			</div>
			<footer>
				<form class="post_message">
					<input type="text" value="Message" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
					<input type="submit" class="btn_post_message" value=""/>
				</form>
			</footer>
		</article><!-- end of messages article -->

		<div class="clear"></div>
</section>


<?php $this->load->view('admin/template/footer');?>