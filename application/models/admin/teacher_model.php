<?php class Teacher_model extends CI_Model{
    function  __construct() {
        parent::__construct();
    }

    function get_all_teacher(){
        $query=$this->db->get('teacher');
        return $query;
    }

    function get_teacher_by_id($id=NULL){
        $this->db->where('T_Id',$id);
        $query=$this->db->get('teacher');

        if($query->num_rows==1){
            return $query;
        }
        return FALSE;
    }

    function get_teacher_by_dept_id($id=NULL){
        $this->db->where('Dept_Id',$id);
        $query=$this->db->get('teacher');
        return $query;
    }

    function bool_get_teacher_by_dept_id($id=NULL){
        $this->db->where('Dept_Id',$id);
        $query=$this->db->get('teacher');
        
        if($query->num_rows>0){
            return $query;
        }
        return FALSE;
    }

    function update_info($config,$id){
        $this->db->where('T_Id',$id);
        $update=$this->db->update('teacher',$config);
        return $update;
    }
    function check_teacher_exists($id){
        $this->db->where('T_Id',$id);
        $query=$this->db->get('teacher');

        if($query->num_rows==1){
            return TRUE;
        }
        return FALSE;
    }

    function create_teacher($data){
        $insert=$this->db->insert('teacher',$data);
        return $insert;
    }

    function delete_info($id=NULL){
        $this->db->where('T_Id',$id);
        $delete=$this->db->delete('teacher');
        return $delete;
    }

    function get_teacher_by_T_id($id=NULL){
        $this->db->where('T_Id',$id);
        $query=$this->db->get('teacher');
        return $query;
    }

    function check_assigned_teacher_by_course_no($CourseNo){
        $this->db->where('CourseNo',$CourseNo);
        $result=$this->db->get('assignedcourse',2);
        if($result->num_rows>0){
            return TRUE;
        }
        else{
            return FALSE;
        }

    }

    function check_assigned_course_by_teacher_id($teacher_id){
        $this->db->where('T_Id',$teacher_id);
        $result=$this->db->get('assignedcourse',2);
        if($result->num_rows>0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}