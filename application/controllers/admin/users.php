<?php class Users extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
        $this->load->library('form_validation');
        $this->load->model('admin/admin_model','admin');
    }

    function index($param=NULL){
           
    }

    function add_user() {
        $data=array(
            'msg'=>'Remember this account will given administrative priveleges',
            'info'=>'',
            'title'=>'Add user'
        );


        $query=$this->admin->get_all_users();
        $data['all_users']=$query;
        
        $this->load->view('admin/add_user',$data);
    }

    function validate(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[25]|xss_clean|is_unique[authentication.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->add_user();
        }
        else
        {
            $this->_create_user();
            redirect('admin/users/view_users');
        }

    }

    function _create_user(){
        $insert=$this->admin->create_user();
        if(!$insert){
            $this->add_user();
        }
    }

    function view_users(){
        $data=array(
            'msg'=>'Users Information',
            'info'=>'',
            'title'=>'View user'
        );
        $username=  $this->session->userdata['username'];
        $data['current_user_info']=$this->admin->get_user_info($username);
        
        $query=$this->admin->get_all_users();
        $data['all_users']=$query;
        $this->load->view('admin/view_users',$data);
    }

    function getUserInformation(){
        $this->load->library('table');

        $username=$this->input->post('username');
        $user_info=$this->admin->get_user_info($username);
        $data['user_info']=$user_info;
        $this->load->view('admin/user_profile',$data);
    }

    function update_validate() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors('<div id="error_message" class="sid_error">','</div><br/>');
        }
        else
        {
            if($this->update_user()){
                echo '<div class="sid_success">Successfully Updated.</div>';
            }
            else{
                echo '<div class="sid_error">Update failed.</div>';
            }
            
        }
    }

    function update_user() {
        $data=array(
          'username'=>$this->session->userdata('username'),
          'email'=>  $this->input->post('email'),
          'password'=>md5($this->input->post('password'))
        );

        return $this->admin->update_info($data);
    }

    function delete_account() {
        $username=$this->session->userdata('username');
        $delete=$this->admin->delete_account($username);
        if($delete){
            $this->my_library->logout();
        }else {
            echo 'error deleting account';
            die();
        }
    }
    
}
