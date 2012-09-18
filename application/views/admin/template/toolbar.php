<script type="text/javascript" charset="utf-8">
    function show_users(){
        $.ajax({
                url:"<?php echo site_url('admin/admin/get_all_chat_users');?>",
                type:'POST',
                success:function(result){
                   $('#show_chat_users').toggle('slow');
                   $('#show_chat_users').html(result);
                }
            });
        return false;
    }
</script>

<header id="header">
    <hgroup>
            <h1 class="site_title"><a href="index.html">Website Admin</a></h1>
            <h2 class="section_title">Course Management System(CMS)</h2>
            <div style="top:15px;position:relative;">
                <button onclick="return show_users();">Chat</button>
                <div id="show_chat_users" class="chat_users" style="display:none;"></div>
            </div>
            
    </hgroup>
</header> <!-- end of header bar -->

<section id="secondary_bar">
    <div class="user">
        <p>
            <?php
                $username=$this->session->userdata('username');
                echo $username;
            ?> (<a href="#">No Messages</a>)
            (<a href="<?php echo site_url('admin/admin/logout');?>"><span><i>Logout</i></span></a>)
        </p>
            <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
    </div>
    <div class="breadcrumbs_container">
            <article class="breadcrumbs">
                <?php foreach ($toolbar as $key=>$value):?>
                <a href="<?php echo $value ?>"><?php echo $key; ?></a>
                <div class="breadcrumb_divider"></div>
                <?php endforeach;?>
                <a class="current"><?php echo $current;?></a>
            </article>
    </div>
</section><!-- end of secondary bar -->
