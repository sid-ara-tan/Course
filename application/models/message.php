<?php

class Message extends CI_model {

    function insert($subject, $message, $courseno) {

        $user_id = $this->session->userdata['ID'];

        $query1=$this->db->query("
        SELECT MAX(MessageNo) as ID1
        FROM message_group_student
        WHERE CourseNo='$courseno'
        ");
        
        $query2=$this->db->query("
        SELECT MAX(file_id) as ID2
        FROM file
        WHERE CourseNo='$courseno'
        ");
        
        if(($query1->num_rows()==1)||($query2->num_rows()==1))
        {
            $row1=$query1->row();
            $row2=$query2->row();
            if($row1->ID1>$row2->ID2)$id=$row1->ID1+1;
            else $id=$row2->ID2+1;
        }
        else
        {
            $id=1;
        }

        $uptime = strftime("%Y-%m-%d %H:%M:%S", time());


        $data = array(
            'CourseNo' => $courseno,
            'MessageNo' => $id,
            'SenderInfo' => $user_id,
            'senderType' => $this->session->userdata['type'],
            'Subject' => $subject,
            'Mbody' => $message,
            'status' => 1,
            'mTime' => $uptime
        );
        $this->db->insert('message_group_student', $data);
    }

    function getallmessage($courseno,$limit,$offset) {
        $query = $this->db->query("
                select * 
                from message_group_student
                where CourseNo='$courseno' and status=1
                order by mTime desc
                LIMIT $limit OFFSET $offset");

        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }

    function delete($msg_id, $courseno) {
        $user_id = $this->session->userdata['ID'];

        $query = $this->db->query("
            UPDATE message_group_student 
            SET status=0
            where CourseNo='$courseno' and MessageNo=$msg_id and SenderInfo='$user_id'
            ");

    }
    
    function get($msg_id,$courseno)
    {
        $query = $this->db->query("
        select * 
        from message_group_student 
        where CourseNo='$courseno' and MessageNo='$msg_id'
        and status=1");
        

        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }
    
    function count_results($courseno)
    {
        $query = $this->db->get_where('message_group_student', array('CourseNo' => $courseno,'status'=>1));
        return $query->num_rows();
    }

    function get_message_for_all($limit,$offset) {
        $T_ID=$this->session->userdata('ID');
        $query = $this->db->query("
                select *
                from message_group_student
                where CourseNo in (Select a.CourseNo from assignedcourse a where a.T_ID='$T_ID') and status=1
                order by mTime desc
                LIMIT $limit OFFSET $offset");

        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }

    function get_message_count_for_all() {
        $T_ID=$this->session->userdata('ID');
        $query = $this->db->query("
                select CourseNo
                from message_group_student
                where CourseNo in (Select a.CourseNo from assignedcourse a where a.T_ID='$T_ID') and status=1
                ");

        if($query->num_rows()>0){
            return $query->num_rows();
        }
        else{
            return FALSE;
        }
    }

}