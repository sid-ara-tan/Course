<?php

class Classinfo extends CI_Model {

    function get_routine($day) {
        $ID = $this->session->userdata['ID'];
        $query = $this->db->query("
                SELECT C.CourseNo,Period,C.Sec,cTime,Location,Duration
                FROM ClassInfo C,AssignedCourse A
                WHERE cDay='$day' and T_ID='$ID' and C.CourseNo=A.CourseNo and C.sec=A.sec  
             ");
        // ei query te prob ase
        
        /*
        $query = $this->db->query("
                SELECT C.CourseNo,Period,C.Sec,cTime,Location,Duration
                FROM ClassInfo C
                WHERE cDay='$day' and by_teacher='$ID' order by period
             ");
         * 
         */

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return false;
    }

    function get_routine_student($day,$sec) {
        $ID = $this->session->userdata['ID'];
        $query = $this->db->query("
                    SELECT *
                    FROM takencourse, classinfo, teacher,course
                    WHERE T_Id = by_teacher
                    AND takencourse.courseno = classinfo.courseno
                    AND classinfo.courseno = course.courseno
                    AND takencourse.courseno = course.courseno
                    AND S_Id='$ID'
                    AND takencourse.Status='Running'
                    AND cDay = '$day'
                    AND (
                    sec = '$sec'
                    OR sec = substr( '$sec', 1, 1 )
                    )
                    ORDER BY period
             ");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return false;
    }

}