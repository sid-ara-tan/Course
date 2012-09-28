<?php class Student_model extends CI_Model{
    function  __construct() {
        parent::__construct();
    }

    function is_student_Exists($S_Id=NULL){
        $this->db->where('S_Id',$S_Id);
        $query=$this->db->get('student');
        if($query->num_rows==1){
            return TRUE;
        }
        return FALSE;
    }

    function get_student_by_id($id=NULL){
        $this->db->where('S_Id',$id);
        $result=$this->db->get('student');

        if($result->num_rows==1){
            return $result;
        }
        return FALSE;
    }
    function get_student_by_like_id($id=NULL) {
        $this->db->like('S_Id',$id,'after');
        $result=$this->db->get('student');
        if($result->num_rows>0){
            return $result;
        }
        return FALSE;
    }

    function get_student_by_like_name($name=NULL){
        $this->db->like('Name',$name);
        $result=$this->db->get('student');

        if($result->num_rows>0){
            return $result;
        }
        return FALSE;
    }

    function get_student_by_name($name=NULL)
    {
        $this->db->where('Name',$name);
        $result=$this->db->get('student');

        if($result->num_rows>0){
            return $result;
        }
        return FALSE;
    }

    function get_search_result($data=NULL,$S_Id=NULL,$Name=NULL){
        if($S_Id){
            $this->db->like('S_Id',$S_Id,'after');
        }
        if($Name){
            $this->db->like('Name',$Name);
        }
        $this->db->where($data);
        $result=$this->db->get('student');

        if($result->num_rows>0){
            return $result;
        }
        return FALSE;
    }

     function update_info($config,$id){
        $this->db->where('S_Id',$id);
        $update=$this->db->update('student',$config);
        return $update;
    }

    function delete_info($id=NULL){
        $this->db->where('S_Id',$id);
        $delete=$this->db->delete('student');
        return $delete;
    }

    function create_student($config=NULL){
        $insert=$this->db->insert('student',$config);
        if($insert){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function get_range_of_student($Data=NULL,$start=NULL,$end=NULL){
        $config=array(
            'S_id >='=>$start,
            'S_id <='=>$end
        );

        $this->db->where($Data);
        $this->db->where($config);
        $result=$this->db->get('student');

        if($result->num_rows>0){
            return $result;
        }
        return FALSE;

    }

    function get_valid_student_from_query($config=NULL,$s_id=NULL){
        $this->db->where($config);
        $this->db->where('S_Id',$s_id);
        $delete=$this->db->delete('student');
        if($delete){
            return $delete;
        }
        else{
            return FALSE;
        }
    }

    function is_group_student_Exists($config=NULL,$s_id=NULL){
        $this->db->where($config);
        $this->db->where('S_Id',$s_id);
        
        $result=$this->db->get('student');
        if($result->num_rows==1){
            return $result;
        }
        return FALSE;
    }

    function update_student_group($where=NULL,$data=NULL,$start=NULL,$end=NULL){

        $config=array(
            'S_id >='=>$start,
            'S_id <='=>$end
        );

        $this->db->where($where);
        $this->db->where($config);
        $update=$this->db->update('student',$data);

        return $update;
    }

    function is_already_course_taken($S_id=NULL,$CourseNo=NULL){
            $this->db->where('S_Id',$S_id);
            $this->db->where('CourseNo',$CourseNo);
            $result=$this->db->get('takencourse');

            if($result->num_rows==1){
                return $result;
            }
            return FALSE;
    }

    function take_course($data=NULL){
        if($data){
            $insert=$this->db->insert('takencourse', $data);
            return $insert;
        }
        else{
            return FALSE;
        }
    }

    function get_pending_request(){
        
        $this->db->like('Status','Pending','after');
        $this->db->group_by('S_Id');
        $result=$this->db->get('takencourse');

        return $result;
    }

    function get_all_pending_request_by_id($id=NULL){
        $this->db->where('S_Id',$id);
        $this->db->like('Status','Pending','after');
        $result=$this->db->get('takencourse');
        return $result;
    }

    function running_course($CourseNo=NULL,$S_Id=NULL){

        $this->db->where('CourseNo',$CourseNo);
        $this->db->where('S_Id',$S_Id);
        $data = array(
               'Status' =>'Running'
         );
        $update= $this->db->update('takencourse',$data);
        return $update;
    }
    
    function drop_course($CourseNo=NULL,$S_Id=NULL){

        $this->db->where('CourseNo',$CourseNo);
        $this->db->where('S_Id',$S_Id);
        $data = array(
               'Status' =>'Dropped'
        );
        $update= $this->db->update('takencourse',$data);
        return $update;
    }

    function get_all_running_course($S_Id=NULL){
        $this->db->where('S_Id', $S_Id);
        $this->db->where('Status','Running');
        $result=$this->db->get('takencourse');
        return $result;
    }
}