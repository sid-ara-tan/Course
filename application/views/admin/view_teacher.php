<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<?php include 'template/scr_sty_tab_data.php'; ?>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='View Teacher';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>
    
<section id="main" class="column">
        <article class="module width_full shadow" id="page_tabs">
        <div>
                <ul>
                    <li><a href="#teacher_info_tabs_1" title="All available teacher information">Teacher</a></li>
                    <li><a href="#teacher_info_tabs_2" title="All available department information">Help</a></li>
                </ul>
                <div id="teacher_info_tabs_1">
                    
                </div>
                <div id="teacher_info_tabs_2">
                    the quick brown fox jumps over the lazy dog;
                    <?php echo br(75);?>
                </div>
        </div>
        </article>
</section>

<?php $this->load->view('admin/template/footer');?>