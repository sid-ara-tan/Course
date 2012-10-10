<?php
    $data['title']="Login view";
    $this->load->view('header/three_header',$data);
?>

<body id="top" class="login_member">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1>Course Management System</h1>
    </div>
  </div>
</div>
    <div align="center">
<div id="login_div_size">
    <div id="login_form">
        <h2>Login</h2>
        <?php echo $message;?>
        <div style="color:red;">
            <?php echo validation_errors();?>
        </div>
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
        <?php echo form_close();?>
        <?php echo anchor("",'Can\'t access your account?','onclick="return contact_admin();"');?>
        <script>
        function contact_admin(){
            alert("Contact your system administrator.");
            return false;
        }
        </script>
    </div>        
  </div>
</div>

<?php $this->load->view('footer/footer');?>

