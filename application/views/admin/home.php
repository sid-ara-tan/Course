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
        <article class="module width_full"  style="background-color: #39414A;" >
                <div>
                 <div id="container"  style="background: #39414A;">
                    <div id="jslidernews2" class="lof-slidecontent" style="width:980px; height:300px;">
                        <div class="preload"><div></div></div>
                        <div  class="button-previous">Previous</div>
                             <!-- MAIN CONTENT -->
                          <div class="main-slider-content" style="width:684px; height:300px;">
                            <ul class="sliders-wrap-inner">
                                <li>
                                      <img src="<?php echo base_url();?>images/admin/lofslidernews/images/image_1.png" title="Newsflash 2" >
                                      <div class="slider-description">
                                        <div class="slider-meta"><a target="_parent" title="Newsflash 1" href="#Category-1">/ CSE event 1 /</a> <i> — Monday, February 15, 2010 12:42</i></div>
                                        <h4>Event 1</h4>
                                        <p>Any updated event will be shown here...
                                        <a class="readmore" href="#">Read more </a>
                                        </p>
                                     </div>
                                </li>
                               <li>
                                  <img src="<?php echo base_url();?>images/admin/lofslidernews/images/image_2.png" title="Newsflash 1" >
                                     <div class="slider-description">
                                       <div class="slider-meta"><a target="_parent" title="Newsflash 2" href="#Category-2">/ EEE event 2 /</a> 	<i> — Monday, February 15, 2010 12:42</i></div>
                                        <h4>This is Event 2</h4>
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
                                                <img src="" />
                                                <h4> CSE sample event 1 </h4>
                                                <span>11.10.2012</span> The quick brown fox jumps over the lazy dog...
                                            </div>
                                        </li>
                                         <li>
                                            <div>
                                                <img src="" />
                                                <h4> EEE sample event 2</h4>
                                                <span>11.10.2012</span> The another quick brown fox jumps over the lazy dog. ..
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
                        <li><a href="#tab3">Others</a></li>
                        <li><a href="#tab1">Teachers</a></li>
                        <li><a href="#tab2">Students</a></li>
                        
		</ul>
		</header>

		<div class="tab_container">

                     <div id="tab3" class="tab_content">
                            <ul>
                                <li><?php echo anchor("admin/unitTest","Unit testing");?> is done here</li>
                                <li>View teachers information <?php echo anchor("admin/teacher/view_teacher","here");?></li>
                                <li>View departments <?php echo anchor("admin/department/view_department","here");?></li>
                                <li>Make routine for couses <?php echo anchor("admin/department/make_routine","here");?></li>
                                <li>Schedule period <?php echo anchor("admin/department/schedule_period","here");?></li>
                                <li>view couses <?php echo anchor("admin/course/view_course","here");?></li>
                                <li>Assign course to teacher  <?php echo anchor("admin/course/assign_teacher_for_these_course","here");?></li>
                                <li>Manage students in group <?php echo anchor("admin/student/manage_group_of_student","here");?></li>
                                <li>Just add a student  <?php echo anchor("admin/student/add_a_student","here");?></li>
                                <li>Show pending requests <?php echo anchor("admin/student/pending_request","here");?></li>


                            </ul>
			</div><!-- end of #tab2 -->
                        
			<div id="tab1" class="tab_content">
                             <ul>
                                <li> View teachers information <?php echo anchor("admin/teacher/view_teacher","here");?></li>
                                
                            </ul>

			</div><!-- end of #tab1 -->

			<div id="tab2" class="tab_content">
                            <ul>
                                <li>Search students <?php echo anchor("admin/student/view_student","here");?></li>
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