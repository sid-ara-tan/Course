<?php

class Marks extends CI_model {
    
    function get_all($courseno) {
        
        $user_id = $this->session->userdata['ID'];
        
        $query_student = $this->db->query("
        select Sec
        from student 
        where S_Id='$user_id'
        ");
       
        $row=$query_student->row();
        
        $query = $this->db->query("
                    select *
                    from marks,exam
                    where
                    marks.CourseNo=exam.CourseNo and eType=exam_type
                    and
                    marks.CourseNo='$courseno' and S_Id='$user_id'
                    AND (
                    Sec = '$row->Sec'
                    OR Sec=substr('$row->Sec',1,1)
                    )
                ");

        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }

}