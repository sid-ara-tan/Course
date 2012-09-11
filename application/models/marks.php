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
                    marks.CourseNo=exam.CourseNo and Exam_ID=ID
                    and
                    marks.CourseNo='$courseno' and S_Id='$user_id'
                    ORDER BY eDate
                     ");

        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }

}