<?php
    $data['title']="Login view";
    $this->load->view('header/three_header',$data);
?>

<body id="top">
<div align="center">	
			<h2>Login</h2>
			<?php echo $message;?>
			<?php echo validation_errors();?>
			<?php echo form_open('course/verify_id');?>   
			<p>Select Type</p>
			
			<?php
				$options = array(
					'teacher'  => 'Teacher',
					'student'    => 'Student',
				      );
				echo  form_dropdown('type', $options);
				echo set_select('type');
				
			?>
			 
			<p>Please enter id and password</p>
			<table>
                        <tr><td>ID:</td>
                        <td><?php echo form_input('ID',set_value('ID'));?></td>
                        </tr>
			<tr><td>Password:</td>
                        <td><?php echo form_password('password');?></td>
                        </tr>
			</table>
			<?php echo form_submit('submit','LOGIN');?>
                        <?php   echo anchor('s_login/s_signup','Create Accout'); ?>
</div>
    
<?php $this->load->view('footer/footer');?>

