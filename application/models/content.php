<?php
class Content extends CI_model{
    
    function insert_content($courseno,$author,$topic,$description,$filename){
        
        $query=$this->db->query("
                SELECT MAX(ID) as ID
                FROM content
                WHERE CourseNo='$courseno'
                ");
        
        if($query->num_rows()==1){
            $row=$query->row();
            $id=$row->ID+1;
        }else{
            $id=1;
        }
        
        $uptime=strftime("%Y-%m-%d %H:%M:%S",time());
        $data=array(
            'CourseNo'=>$courseno,
            'ID'=>$id,
            'Uploader'=>$author,
            'Topic'=>$topic,
            'Description'=>$description,
            'File_Path'=>$filename,
            'Upload_Time'=>$uptime
        );
        $this->db->insert('Content',$data);
    }
    
    
    function get_content($courseno,$limit,$offset){
        $query=$this->db->query("
                SELECT * FROM Content
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
    
    
    function delete_content($courseno,$id){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('ID',$id);
        $this->db->delete('content');
        
    }
}