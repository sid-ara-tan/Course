<?php class Admin extends CI_Model{
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
}
