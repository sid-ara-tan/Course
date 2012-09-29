<?php class Course extends CI_model {

    function get_courses() {

        $ID = $this->session->userdata['ID'];
        $query = $this->db->query("
                SELECT *
                FROM Course C,takencourse A
                WHERE C.CourseNo=A.CourseNo
                and A.S_ID='$ID'
                AND Status='Running'
                order by coursename
                ");
        if ($query->num_rows() > 0) {

            return $query;
        }
        else
            return FALSE;
    }

    function get_offered_courses() {
        $ID = $this->session->userdata['ID'];
        $query = $this->db->query("
        SELECT *
        FROM student
        WHERE S_Id='$ID'
        ");
        $result = $query->row();
        //$name = $result->Name;

        $query_offered_course = $this->db->query("
        SELECT *
        FROM course
        WHERE Dept_ID='$result->Dept_id'
        AND sLevel='$result->sLevel'
        AND Term='$result->Term'
        order by CourseNo        
        ");
        // var_dump($query_offered_course->result_array());
        if ($query_offered_course->num_rows() > 0) {

            return $query_offered_course;
        }
        else
            return FALSE;
    }

    function get_retake_courses() {
        $ID = $this->session->userdata['ID'];

        $query_retake_course = $this->db->query("
            SELECT *
            FROM takencourse,course
            WHERE takencourse.CourseNo=course.CourseNo
            AND S_Id='$ID'    
            AND (GPA<3.00 OR GPA<>NULL)
            order by sLevel,Term      
        ");
        // var_dump($query_offered_course->result_array());
        if ($query_retake_course->num_rows() > 0) {

            return $query_retake_course;
        }
        else
            return FALSE;
    }

    function get_optional_courses() {
        $ID = $this->session->userdata['ID'];
        $query = $this->db->query("
        SELECT *
        FROM student
        WHERE S_Id='$ID'
        ");
        $result = $query->row();
        //$name = $result->Name;

        $query_optional_course = $this->db->query("
        SELECT *
        FROM course
        WHERE Dept_ID='$result->Dept_id'
        AND sLevel>'$result->sLevel'
        order by CourseNo        
        ");
        // var_dump($query_offered_course->result_array());
        if ($query_optional_course->num_rows() > 0) {

            return $query_optional_course;
        }
        else
            return FALSE;
    }

    function get_drop_courses() {
        $ID = $this->session->userdata['ID'];

        $query_drop_course = $this->db->query("
            SELECT *
            FROM takencourse,course
            WHERE takencourse.CourseNo=course.CourseNo
            AND S_Id='$ID'    
            AND( Status='Running'
                OR Status='Pending_for_drop'
                OR Status='Dropped')
        ");
        // var_dump($query_offered_course->result_array());
        if ($query_drop_course->num_rows() > 0) {

            return $query_drop_course;
        }
        else
            return FALSE;
    }

    function store_selected_courses() {

        $user_id = $this->session->userdata['ID'];

        for ($i = 0; $i <= $this->input->post('count'); $i++) {
            if ($this->input->post('selected_course' . $i) != '') {
                $courseno=$this->input->post('selected_course' . $i);
                
                $this->db->query("INSERT INTO `takencourse`(`Status`, `GPA`, `CourseNo`, `S_Id`) 
                                        VALUES ('Pending_for_registration',NULL,'$courseno','$user_id')
                                                ON DUPLICATE KEY UPDATE Status ='Pending_for_registration'");
            }
        }
    }

    function store_dropped_courses() {

        $user_id = $this->session->userdata['ID'];

        for ($i = 0; $i <= $this->input->post('count'); $i++) {
            if ($this->input->post('selected_course' . $i) != '') {
                $data = array(
                    'Status' => 'Pending_for_drop',
                    'GPA' => null
                );
                $this->db->where('CourseNo', $this->input->post('selected_course' . $i));
                $this->db->where('S_Id', $user_id);
                $this->db->update('takencourse', $data);
            }
        }
    }

    function get_drop_courses_status() {
        $ID = $this->session->userdata['ID'];

        $this->db->where('S_Id', $ID);
        $this->db->where('Status','Pending_for_drop');
        $this->db->or_where('Status','Dropped');
        $this->db->from('takencourse');

        
        if($this->db->count_all_results()>0)
            return TRUE;
        else return FALSE;
    }
    
    function get_taken_courses_pending() {
        $ID = $this->session->userdata['ID'];

        $query_drop_course = $this->db->query("
            SELECT *
            FROM takencourse,course
            WHERE takencourse.CourseNo=course.CourseNo
            AND S_Id='$ID'    
            AND( Status='Running'
                OR Status='Pending_for_registration')
        ");
        // var_dump($query_offered_course->result_array());
        if ($query_drop_course->num_rows() > 0) {

            return $query_drop_course;
        }
        else
            return FALSE;
    }
    
    function get_std_result_option() {
        $ID = $this->session->userdata['ID'];

        $query_list_result = $this->db->query("
                select distinct sLevel,Term
                from course where CourseNo in
                (   select CourseNo 
                    from takencourse 
                    where S_Id='$ID' 
                    and
                    (Status='Passed' or Status='Failed')
                )
        ");
        
        if ($query_list_result->num_rows() > 0) {

            return $query_list_result;
        }
        else
            return FALSE;
    }
    
    function get_std_grade_sheet($level,$term) {
        $ID = $this->session->userdata['ID'];

        $query_grade_sheet = $this->db->query("
                select a.CourseNo,CourseName,Credit,GPA
                from takencourse a,course b
                where S_Id='$ID' 
                and a.CourseNo=b.CourseNo 
                and (Status='Passed' or Status='Failed') 
                and sLevel=$level and Term=$term
        ");
        
        if ($query_grade_sheet->num_rows() > 0) {

            return $query_grade_sheet;
        }
        else
            return FALSE;
    }    

}