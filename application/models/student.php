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

}