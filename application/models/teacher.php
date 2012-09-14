<?php
class Teacher extends CI_model{
    
    function verify_ID_password($id,$password){
        /*$query=$this->db->query(
            "SELECT T_ID,Password
            FROM teacher
            WHERE T_ID='$id' and password='$password'"
        );*/
        
        //$sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
        //$this->db->query($sql, array(3, 'live', 'Rick'));   
        
        
        $sql="SELECT T_ID,Password
            FROM teacher
            WHERE T_ID= ? and password= ?"
        ;
        
        $query=$this->db->query($sql, array($id,$password)); 
        if($query->num_rows()==1){
            return TRUE;
        }else{
            return FALSE;
        }    
        
    }
    
    function get_info(){
        
        $ID=$this->session->userdata['ID'];
        $query=$this->db->query("
                SELECT Name,Designation,Password,Dept_Id
                FROM teacher
                WHERE T_Id='$ID' LIMIT 1
                ");
        if($query->num_rows()==1){
            return $query->row();
        }
        else return FALSE;
    }

    function edit_info(){
        $ID=$this->session->userdata['ID'];
        

        $data = array(
               'Name' => $this->input->post('name'),
               'Designation' => $this->input->post('designation'),
               'Dept_Id' => $this->input->post('dept_id'),
               'Password' => $this->input->post('password')
            );

        $this->db->where('T_ID', $ID);
        $update=$this->db->update('teacher', $data);
        if($update){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
    
    function get_courses(){
        
        $ID=$this->session->userdata['ID'];
        $query=$this->db->query("
                SELECT distinct CourseName,C.CourseNo
                FROM Course C,AssignedCourse A
                WHERE C.CourseNo=A.CourseNo and A.T_ID='$ID'
                ");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else return FALSE;
    }
    
    
    function get_name($id){

        $result=$this->db->query("
                                    select Name from teacher
                                    where T_Id='$id';
                                    ");
        if($result){
            $row=$result->row();
            return $row->Name;
        }else{
            return null;
        }
        
    }

    function get_assigned_sec($courseno){
       $T_ID=$this->session->userdata['ID'];
       $query=$this->db->query("
            SELECT Sec
            FROM AssignedCourse
            WHERE CourseNo='$courseno' AND T_Id='$T_ID'
            ");
              
        if($query->num_rows()>0){
            foreach($query->result() as $row ){
                $data[]=$row;
            }
            return $data;
        }
    }
}