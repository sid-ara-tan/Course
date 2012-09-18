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
        $this->db->order_by('cDay');
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

    function delete_courseinfo($config=NULL){
        if($config!=NULL){
            $this->db->where($config);
            $delete=$this->db->delete('classinfo');
            return $delete;
        }
        return false;
    }

    function get_all_schedule(){
        $result=$this->db->get('schedule');
        return $result;
    }

    function update_schedule_info($config=NULL,$data=NULL){
        $this->db->where($config);
        $update=$this->db->update('schedule',$data);
        return $update;
    }

    function delete_schedule($config=NULL){
        $this->db->where($config);
        $delete=$this->db->delete('schedule');
        return $delete;
    }

    function add_schedule($data=NULL){
        $insert=$this->db->insert('schedule',$data);
        return $insert;
    }

    function get_department_by_id($id=NULL){
        $this->db->where('Dept_id', $id);
        $result=$this->db->get('department');
        return $result;
    }

    function check_schedule($config=NULL){
        $this->db->where($config);
        $result=$this->db->get('schedule');
        
        if($result->num_rows==1){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function get_daily_course($config=NULL){
        $this->db->where($config);
        $result=$this->db->get('classinfo');

        return $result;
    }
}