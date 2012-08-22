<div class="shadow" style="padding:30px"><?php $current_user=$user_info->row();?>
<?php echo img(base_url('images/admin/no_profile.jpg','Picture havent given yet'));?>
<h3>Name:</h3><?php echo $current_user->username;?>
<h3>Email:</h3><?php echo $current_user->email;?>
</div>
