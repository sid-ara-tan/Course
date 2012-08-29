<?php

class Comment extends CI_model {
    
    //msg_no foreign key constraint

    function insert($body, $courseno, $msgno) {

        $user_id = $this->session->userdata['ID'];

        $uptime = strftime("%Y-%m-%d %H:%M:%S", time());

        if ($this->session->userdata['type'] == 'teacher') {
            $query = $this->db->query("
            SELECT Name
            FROM teacher
            WHERE T_Id='$user_id'
            ");
            $result = $query->row();
            $name = $result->Name;
        } else {
            $query = $this->db->query("
            SELECT Name
            FROM student
            WHERE S_Id='$user_id'
            ");
            $result = $query->row();
            $name = $result->Name;
        }


        $data = array(
            'CourseNo' => $courseno,
            'msg_no' => $msgno,
            'commentBy' => $name,
            'senderType' => $this->session->userdata['type'],
            'body' => $body,
            'status' => 1,
            'time' => $uptime
        );
        $this->db->insert('comment', $data);
    }

    function getall($courseno,$msg_id,$limit,$offset) {
        $query = $this->db->query("
                select * 
                from comment 
                where CourseNo='$courseno' and msg_no='$msg_id' and status=1
                order by time asc
                LIMIT $limit OFFSET $offset");

        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }

    function delete($id) {
        $user_id = $this->session->userdata['ID'];

        $query = $this->db->query("
            SELECT Name
            FROM student
            WHERE S_Id='$user_id'
            ");
        $result = $query->row();
        $name = $result->Name;

        $query = $this->db->query("
            UPDATE comment 
            SET status=0
            where id=$id and commentBy='$name'
            ");

    }
    
    function comment_number($courseno,$msgno)
    {
        $query = $this->db->query("
        select * 
        from comment 
        where CourseNo='$courseno' and msg_no='$msgno' and status=1");

        return $query->num_rows();


    }

}