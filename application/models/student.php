<?php

class Student extends CI_model {

    function verify_ID_password($id, $password) {
        /* $query=$this->db->query(
          "SELECT S_ID,Password
          FROM student
          WHERE S_ID='$id' and password='$password'"
          ); */

        $sql = "SELECT S_ID,Password
            FROM Student
            WHERE S_ID= ? and password= ?"
        ;

        $query = $this->db->query($sql, array($id, $password));

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_info() {

        $ID = $this->session->userdata['ID'];
        $query = $this->db->query("
                SELECT *
                FROM student
                WHERE S_Id='$ID' LIMIT 1
                ");
        if ($query->num_rows() == 1) {
            return $query;
        }
        else
            return FALSE;
    }
    
    function edit_profile()
    {
        $ID=$this->session->userdata['ID'];
        

        $data = array(
               'father_name' => $this->input->post('Fname'),
               'email' => $this->input->post('user_email'),
               'address' => $this->input->post('user_address'),
               'phone' => $this->input->post('user_phone'),
               'Password' => $this->input->post('password1')
            );

        $this->db->where('S_Id', $ID);
        $update=$this->db->update('student', $data);
        if($update){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    function get_studentformarks($courseno,$sec){
        if($sec=='all'){
            $query=$this->db->query("
                select s.S_Id,Name
                from takencourse t,student s
                where t.CourseNo='$courseno'and status='Running'
                    and t.S_Id=s.S_Id
                ");
        }else{
            $sec.='%';
            $query=$this->db->query("
                select s.S_Id,Name
                from takencourse t,student s
                where t.CourseNo='$courseno'and status='Running'
                    and Sec like '$sec' and t.S_Id=s.S_Id
                ");
        }

        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }else{
            return FALSE;
        }
    }

}