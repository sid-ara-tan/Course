<?php
class Course extends CI_model {

    function get_courses() {

        $ID = $this->session->userdata['ID'];
        $query = $this->db->query("
                SELECT CourseName,C.CourseNo
                FROM Course C,takencourse A
                WHERE C.CourseNo=A.CourseNo and A.S_ID='$ID' order by coursename
                ");
        if ($query->num_rows() > 0) {

            return $query;
        }
        else
            return FALSE;
    }

}