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

    function delete_info($id){
        $this->db->where('CourseNo',$id);
        $delete=$this->db->delete('course');
        return $delete;
    }

}
