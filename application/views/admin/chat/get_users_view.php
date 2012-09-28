<?php 
    $me=$this->session->userdata('username');
?>

<div class="total_div">
    <div class="arrow_up"></div>
    <div class="chat_users">
        <ul>
        <?php foreach($all_users->result() as $user):?>
        <?php if($user->username==$me){continue;}?>
            <li><a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $user->username;?>')">
                <strong><?php echo $user->username;?></strong>
            </a></li>
        <br/>
        <?php endforeach;?>
        </ul>
    </div>
</div>