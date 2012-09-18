<?php
    session_start();
    $me=$this->session->userdata('username');
    $_SESSION['username'] = $me; // Must be already set
?>
<div>
    <h2>Users</h2>
    <hr/>
</div>

<div>
    <ol>
    <?php foreach($all_users->result() as $user):?>
    <?php if($user->username==$me){continue;}?>
        <li><a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $user->username;?>')">
            <strong><?php echo $user->username;?></strong>
        </a></li>
    <br/>
    <?php endforeach;?>
    </ol>
</div>