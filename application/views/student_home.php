<?php
    $data['title']="Student Home Page";
    $this->load->view('header/index_header',$data);
?>

<?php echo anchor('course/logout','Log Out');?>

<?php $this->load->view('footer/footer');?>
