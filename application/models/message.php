<?php

class Message extends CI_model {

    function insert($subject, $message, $courseno) {

        $user_id = $this->session->userdata['ID'];

        $query = $this->db->query("
        SELECT MAX(MessageNo) as MessageNo
        FROM message
        WHERE CourseNo='$courseno'
        ");

        if ($query->num_rows() == 1) {
            $row = $query->row();
            $id = $row->MessageNo + 1;
        } else {
            $id = 1;
        }

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
            'MessageNo' => $id,
            'SenderInfo' => $name,
            'senderType' => $this->session->userdata['type'],
            'Subject' => $subject,
            'Mbody' => $message,
            'status' => 1,
            'mTime' => $uptime
        );
        $this->db->insert('message', $data);
    }

    function getallmessage($courseno) {
        $query = $this->db->query("
                select * 
                from message 
                where CourseNo='$courseno' and status=1
                order by mTime desc");

        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }

    function delete($msg_id, $courseno) {
        $user_id = $this->session->userdata['ID'];

        $query = $this->db->query("
            SELECT Name
            FROM student
            WHERE S_Id='$user_id'
            ");
        $result = $query->row();
        $name = $result->Name;

        $query = $this->db->query("
            UPDATE message 
            SET status=0
            where CourseNo='$courseno' and MessageNo=$msg_id and SenderInfo='$name'
            ");

    }

}