<?php class Department extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
    }

    public function index($param=NULL) {
       
    }

    function view_department(){
        $data=array(
            'msg'=>'Departments Information',
            'info'=>'',
            'title'=>'View Department'
        );

        $this->load->view('admin/view_department',$data);
    }

    function check_ajax(){
        echo 'it works';
    }
}
