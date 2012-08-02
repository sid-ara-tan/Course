<?php
class Student extends CI_model{
    
    function verify_ID_password($id,$password){
        /*$query=$this->db->query(
            "SELECT S_ID,Password
            FROM student
            WHERE S_ID='$id' and password='$password'"
        );*/
        
        $sql="SELECT S_ID,Password
            FROM Student
            WHERE S_ID= ? and password= ?"
        ;
        
        $query=$this->db->query($sql, array($id,$password)); 
        
        if($query->num_rows()==1){
            return TRUE;
        }else{
            return FALSE;
        }    
        
    }
}