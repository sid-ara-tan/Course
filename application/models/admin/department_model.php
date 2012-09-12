<?php class Department_model extends CI_Model{
    function  __construct() {
        parent::__construct();
    }

    function get_all_department(){
        $query=$this->db->get('department');
        return $query;
    }

    function update_info($config,$id){
        $this->db->where('Dept_id', $id);
        $update=$this->db->update('department', $config);
        return $update;
    }

    function delete_info($id=NULL){
        $this->db->where('Dept_id',$id);
        $delete=$this->db->delete('department');
        return $delete;
    }

    function check_department_exists($id){
        $this->db->where('Dept_id',$id);
        $query=$this->db->get('department');

        if($query->num_rows==1){
            return $query;
        }
        return FALSE;
    }

    function create_department($config){
        $query=$this->db->insert('department', $config);
        return $query;
    }

    function get_department_info($id=NULL) {
        $this->db->where('Dept_id',$id);
        $query=$this->db->get('department');
        return $query;
    }

    function get_all_classinfo($config=NULl){
        $this->db->where($config);
        $result=$this->db->get('classinfo');
        return $result;
    }

    function add_classinfo_entry($config=NULL){
        $insert=$this->db->insert('classinfo',$config);
        return $insert;
    }

    function check_consistency($config=NULL){
        $this->db->where($config);
        $check=$this->db->get('classinfo');

         if($check->num_rows>0){
            return TRUE;
        }
        else{
            return FALSE;
        }
        
    }
}
