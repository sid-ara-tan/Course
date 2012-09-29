<?php class Course_model extends CI_Model{
    function  __construct() {
        parent::__construct();
    }

    function get_all_course(){
        $query=$this->db->get('course');
        return $query;
    }

    function get_course_by_dept($dept_id){
        $this->db->where('Dept_id',$dept_id);
        $query=$this->db->get('course');
        return $query;
    }

    function update_info($config,$id){
        $this->db->where('CourseNo',$id);
        $update=$this->db->update('course',$config);
        return $update;
    }

    function check_course_exists($id) {
        $this->db->where('CourseNo',$id);
        $query=$this->db->get('course');

        if($query->num_rows==1){
            return $query;
        }
        return FALSE;
    }

    function create_course($config){
        $insert=$this->db->insert('course',$config);
        return $insert;
    }

    function delete_info($id=NULL){
        $this->db->where('CourseNo',$id);
        $delete=$this->db->delete('course');
        return $delete;
    }

    function get_course_by_level_term($sLevel=NULL,$Term=NULL) {
        $this->db->where('sLevel',$sLevel);
        $this->db->where('Term',$Term);

        $result=$this->db->get('course');
        return $result;
       
    }

    function get_course_by_level_term_dept($config=NULL){
        $this->db->where($config);
        $result=$this->db->get('course');
        return $result;
    }

    function get_course_by_query($config=NULL){
        $this->db->where($config);
        $result=$this->db->get('course');
        return $result;
    }

    function get_credit_by_course_no($courseno=NULL){
        $this->db->where('CourseNo',$courseno);
        $result=$this->db->get('course');
        return $result;
    }

     function get_course_by_courseno($courseno=NULL){
        $this->db->where('CourseNo',$courseno);
        $result=$this->db->get('course');
        return $result;
    }

    function get_current_assigned_teacher($courseno=NULL){
        $this->db->select('*');
        $this->db->where('CourseNo',$courseno);
        $this->db->from('assignedcourse');
        $this->db->join('teacher', 'teacher.T_Id=assignedcourse.T_Id');
        $query = $this->db->get();
        return $query;
    }

     function get_same_course_teachers($config=NULL){
        $this->db->select('*');
        $this->db->where($config);
        $this->db->from('assignedcourse');
        $this->db->join('teacher', 'teacher.T_Id=assignedcourse.T_Id');
        $query = $this->db->get();
        return $query;
    }

    function is_this_course_already_assigned($config=NULL){
        $this->db->where($config);
        $check=$this->db->get('assignedcourse');

        if($check->num_rows==1){
            return TRUE;
        }
        return FALSE;
    }

    function assigned_course($config=NULL){
        if($config==NULL){
            return FALSE;
        }
        $insert=$this->db->insert('assignedcourse',$config);
        if($insert){
            return $insert;
        }
        else{
            return FALSE;
        }
    }

    function delete_assign_course($config=NULL){
        $this->db->where($config);
        $delete=$this->db->delete('assignedcourse');
        return $delete;
    }

    function get_assigned_teacher($CourseNo=NULL){
        $this->db->where('CourseNo',$CourseNo);
        $result=$this->db->get('assignedcourse');
        return $result;
    }


    function update_taken_course_status($config=NULL){
        
        

    }
}