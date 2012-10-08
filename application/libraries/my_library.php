<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_library {

    public function sendEmali($email, $message, $subject) {
        $CI = & get_instance();

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'snipperbuet@gmail.com';
        $config['smtp_pass'] = 'admin12345';
        $config['validate'] = TRUE;

        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");

        $CI->email->from('snipperbuet@gmail.com', 'Admin');
        $CI->email->to($email);


        $CI->email->subject($subject);
        $CI->email->message($message);

        //var_dump($email);
        $CI->email->send();

        //$CI->email->print_debugger;
    }

    function is_logged_in() {
        $CI = & get_instance();
        $is_logged_in=$CI->session->userdata('is_logged_in');
        $type=$CI->session->userdata('type');
        if(!isset($is_logged_in) || $is_logged_in!=TRUE || $type!='student'){
            echo 'You don\'t have permission to access this page :) ';
            echo anchor(base_url(), "HOME");
            //die();
            redirect('course');
        }
    }

        function teacher_is_logged_in() {
        $CI = & get_instance();
        $is_logged_in=$CI->session->userdata('is_logged_in');
        $type=$CI->session->userdata('type');
        if(!isset($is_logged_in) || $is_logged_in!=TRUE || $type!='teacher'){
            echo 'You don\'t have permission to access this page :) ';
            echo anchor(base_url(), "HOME");
            //die();
            redirect('course');
        }
    }

    function  not_logged_in(){
        $CI = & get_instance();
        $is_logged_in=$CI->session->userdata('is_logged_in');

        if( $is_logged_in==TRUE){
            //echo 'You don\'t have permission to access this page :) ';
            //echo anchor(base_url(), "HOME");
            //die();
            if($CI->session->userdata('type')=='teacher'){
                redirect('teacher_home');
            }
            elseif($CI->session->userdata('type')=='student'){
                redirect('student_home');
            }
        }
    }

    function logged_in($link='admin/admin') {
        $CI = & get_instance();
        $is_logged_in=$CI->session->userdata('logged_in');

        if($is_logged_in==TRUE){
            redirect($link);
        }
    }

    function check_logged_in($link='admin/login') {
        $CI = & get_instance();
        $is_logged_in=$CI->session->userdata('logged_in');

        if($is_logged_in!=TRUE){
            redirect($link);
        }
    }

    function logout($link='admin/login'){
        $CI = & get_instance();
        $CI->session->sess_destroy();

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
        redirect($link);
    }
}

/* End of file Someclass.php */