
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"    "http://www.w3.org/TR/html4/strict.dtd"    >
<html lang="en">
<head>
    <title>Gmail/Facebook Like Chat</title>
    <style type="text/css">
        .wrapper
        {
            width: 390px;
            margin: 100px auto;
            clear: both;
        }

        .head
        {
            float: left;
            display: block;
            width: 100%;
        }

        .box
        {
            float: left;
            width: 100%;
            background-color: #FFF3CE;
            padding: 5px;
            border: #FFC928 1px solid;
        }

        .chat
        {
            padding: 5px;
            background-color: #BFBFBF;
            border: 1px solid #333;
            float: left;
            margin-right: 10px;
            font-size: 10px;
        }
         small
        {
            font-size: 8px;
        }

        h2
        {
            margin:0;
            color: #333;
            float: left;
        }
        a
        {
            font-size: 12px;
            text-decoration: none;
        }
        #red
        {
            color: #f00;
            width: 100%;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="box">
            <div class="head">
                <h2>You are BOB</h2><br>
                <small>Open links in two different browsers</small>
            </div>
            <div class="chat">
                <a href="<?=base_url()?>welcome/chat/Bob/Robert">Chat(You with Robert)</a><br>
                
                Link: <input type="text" name="" readonly="readonly" value="<?php echo site_url('admin/admin/chat/');?><?=base_url()?>welcome/chat/Bob/Robert"><br>

                <small>Open in one browser</small>
            </div>
            <div class="chat">
                <a href="<?=base_url()?>welcome/chat/Robert/Bob">Chat(Robert with You)</a><br>
                Link: <input type="text" name="" readonly="readonly" value="<?=base_url()?>welcome/chat/Robert/Bob"><br>

                <small>Open in one browser</small>
            </div><br>

            <div id="red">There could me more than one instance because someone else might also view this demo at same time.</div>
        </div>
    </div>
</body>
</html>


<!--garbase from chatty-->



<?php
//session_start();
//$_SESSION['username'] = $me; // Must be already set
?>

<!--
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd" >

<html>
<head>
<title>Sample Chat Application</title>
<style>
body {
	background-color: #eeeeee;
	padding:0;
	margin:0 auto;
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:11px;
}
</style>

<link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>chat/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>chat/css/screen.css" />
<script type="text/javascript" src="<?=base_url()?>chat/js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url()?>chat/js/chat.js"></script>


</head>
<body>
<div id="main_container">

    <a href="javascript:void(0)" onclick="javascript:chatWith('<?=$you?>')"><?php echo $me;?>Chat With <?=$you?></a>

</div>



</body>
</html>
-->

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>chat/css/screen_ie.css" />
<![endif]-->
