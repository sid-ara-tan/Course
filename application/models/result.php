<?php
class Result extends CI_Model{
    function get_Marks_by_Course($courseno,$S_ID) {
        $query=$this->db->query("
                Select *
                From Marks
                Where CourseNo='$courseno' and S_ID='$S_ID'
              ");
        if($query->num_rows>0){
            return $query->result();
        }else{
            return FALSE;
        }
    }
}
