<?php class Admin_model extends CI_Model{
    function  __construct() {
        parent::__construct();
    }

    function validate(){
            $this->db->where('username',  $this->input->post('username'));
            $this->db->where('password',md5($this->input->post('password')));

            $query=$this->db->get('authentication');

            if($query->num_rows==1)
            {
                return TRUE;
            }
    }

    function check_user_info($str){
         $this->db->where('username',$str);
         $query=$this->db->get('authentication');

         if($query->num_rows==1){
            return TRUE;
         }
         return FALSE;

    }

    function get_user_info($str){
        $this->db->where('username',$str);
        $query=$this->db->get('authentication');
        if($query->num_rows==1){
            return $query;
        }
        
    }

    function update_info($data) {
        $this->db->where('username', $data['username']);
        return $this->db->update('authentication', $data);
    }

    function create_user(){
        $data=array(
            'username'=>  $this->input->post('username'),
            'email'=> $this->input->post('email'),
            'password'=>  md5($this->input->post('password'))
        );

        $insert=$this->db->insert('authentication',$data);
        return $insert;

    }

    function get_all_users(){
        $query=$this->db->get('authentication');
        if ($query->num_rows()>0) {
            return $query;
        }
        else
            return FALSE;
    }

    function delete_account($username){
        $this->db->where('username', $username);
        $delete=$this->db->delete('authentication');
        return $delete;
    }
}
