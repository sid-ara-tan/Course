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
     
        if(!isset($is_logged_in) || $is_logged_in!=TRUE){
            echo 'You don\'t have permission to access this page :) ';
            echo anchor(base_url(), "HOME");
            die();
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
       
        redirect($link);
    }
}

/* End of file Someclass.php */