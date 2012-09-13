<?php

class Schedule extends CI_Model {


    function get_schedule_student() {
        $ID = $this->session->userdata['ID'];
        $this->db->where('S_Id',$ID);
        $query_std=$this->db->get('student');
        $row_std=$query_std->row();
        
        $this->db->where('sLevel',$row_std->sLevel);
        $this->db->where('Term',$row_std->Term);
        $this->db->where('Dept_id',$row_std->Dept_id);
        $query=$this->db->get('schedule');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        else
            return false;
    }

}