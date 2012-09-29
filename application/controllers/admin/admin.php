<?php
class Admin extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
        $this->load->model('admin/admin_model','admin');
    }
    /**
     *Showing home page after logged in
     * @param <type> $param
     */
    public function index($param=NULL) {        
        $data=array(
            'msg'=>'Welcome to Admin Panel',
            'info'=>$param,
            'title'=>'Home'
        );
        $this->load->view('admin/home',$data);
    }
    /**
     * Logout is done here
     */
    function logout(){
        $this->my_library->logout();
    }
    /**
     * Loading template page
     */
    public function template($param=NULL) {
        $data['title']='template page';
        $this->load->view('admin/template',$data);
    }

    public function chat_index(){
        $this->load->view('admin/chat/startChat');
    }

    function chat($you='admin'){
        $data['me'] = $this->session->userdata('username');
        $data['you'] = $you;
        $this->load->view('admin/chat/chatty', $data);
    }

    function get_all_chat_users(){
        $data['all_users']=$this->admin->get_all_users();
        $msg=$this->load->view('admin/chat/get_users_view',$data,TRUE);
        echo $msg;
    }

    function on_chat_session(){
        $this->session->set_userdata('chating_state',TRUE);
        session_start();
        $_SESSION['username']=$this->session->userdata('username');
        redirect('admin/admin');
    }

    function off_chat_session(){
        $this->session->set_userdata('chating_state',FALSE);

         session_start();

        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
        redirect('admin/admin');
    }

}
