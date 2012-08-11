<?php
    $data['title']=$title;
    $this->load->view('header/admin_header',$data);
?>

<?php
    $this->load->view('header/toolbar/admin_toolbar');
?>

<div>
    <p>This is just a paragraph.</p>
</div>

<?php $this->load->view('footer/admin_footer');?>