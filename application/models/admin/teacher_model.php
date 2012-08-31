<?php class Teacher_model extends CI_Model{
    function  __construct() {
        parent::__construct();
    }

    function get_all_teacher(){
        $query=$this->db->get('teacher');
        return $query;
    }

    function get_teacher_by_id($id){
        $this->db->where('T_Id',$id);
        $query=$this->db->get('teacher');

        if($query->num_rows==1){
            return $query;
        }
        return FALSE;
    }
}
