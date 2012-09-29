<?php
    $data['title']="Login view";
    $this->load->view('header/three_header',$data);
?>

<body id="top" class="login_member">
    <div align="center">
<div id="login_div_size">
   <!-- <div id="login_form">

                        <?php echo validation_errors('<div id="error_message" class="sid_error">','</div><br/>');?>
                         <?php echo form_open('course/verify_id');?>
                            <?php
                            $options = array(
                                'teacher'  => 'Teacher',
                                'student'    => 'Student',
                            );?>

                            <p>
                                <?php echo form_label('Select Type','type');?>
                                <br/>
                                <br/>
                                <?php echo  form_dropdown('type', $options);echo set_select('type');?>
                            </p>

                            <p>
                                <?php echo form_label('Id','ID');?>
                                <br/>
                                <br/>
                                <?php echo form_input('ID',set_value('ID'));?>
                            </p>

                            <p>
                                <?php echo form_label('Password','password');?>
                                <br/>
                                <br/>
                                <?php echo form_password('password');?>
                            </p>

                            <p style="color:rgb(102,102,102); font-weight: normal;line-height: 0;">
                                <?php echo form_submit('submit','Sign in','id="submit"');?>
                                <?php echo nbs(10);?>
                                <input type="checkbox" name="stay" id="stay" value="1" <?php echo set_checkbox('stay', '1'); ?> /> Stay signed in
                            </p>

                            <?php echo anchor("",'Can\'t access your account?');?>

                        <?php echo form_close();?>
                    </div>-->

    <div id="login_form">
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
            <tr>
                <td>ID:</td>
                <td><?php echo form_input('ID',set_value('ID'));?></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><?php echo form_password('password');?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_submit('submit','LOGIN');?></td>
            </tr>
        </table>
    </div>        
  </div>
</div>

<?php $this->load->view('footer/footer');?>

