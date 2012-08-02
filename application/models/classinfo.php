<?php
class Classinfo extends CI_Model{
    
    function  get_routine($day){
        $ID=$this->session->userdata['ID'];
        $query=$this->db->query("
                SELECT C.CourseNo,Period,C.Sec,cTime,Location,Duration
                FROM ClassInfo C,AssignedCourse A
                WHERE cDay='$day' and T_ID='$ID' and C.CourseNo=A.CourseNo and C.sec=A.sec  
             ");
        
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else return false; 
    }
    
}