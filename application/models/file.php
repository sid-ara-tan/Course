<?php
class File extends CI_model{
    
    function insert_file($courseno,$topic,$description,$filename,$status){
         
        $user_id = $this->session->userdata['ID'];
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
        
        $uptime=strftime("%Y-%m-%d %H:%M:%S",time());
        
        $data=array(
            'CourseNo'=>$courseno,
            'uploader'=>$name,
            'topic'=>$topic,
            'description'=>$description,
            'filename'=>$filename,
            'time'=>$uptime,
            'status'=>$status,
            'file_id'=>$id
        );
        $this->db->insert('file',$data);
    }
    
    
    function get_file($courseno,$limit,$offset){
        $query=$this->db->query("
                SELECT * FROM file
                WHERE CourseNo='$courseno'
                ORDER BY ID desc
                LIMIT $limit OFFSET $offset
                ");
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
    
    
    function delete_file($courseno,$filename){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('filename',$filename);
        $this->db->delete('file');
        
    }
    
    function get($msg_id,$courseno)
    {
        $query = $this->db->query("
        select * 
        from file 
        where CourseNo='$courseno' and file_id='$msg_id'
        and status=1");
        

        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }
}