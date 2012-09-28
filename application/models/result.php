<?php
class Result extends CI_Model{
    function get_Marks_by_Course($courseno,$S_ID) {
        $query=$this->db->query("
                Select *
                From Marks
                Where CourseNo='$courseno' and S_ID='$S_ID'
              ");
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function get_exam($courseno,$sec,$etype){
        $query=$this->db->query("
            Select Sec,ID,Percentage,Best,Total
            From exam
            Where CourseNo='$courseno' and eType='$etype' and (Sec='$sec' or Sec=substr('$sec',1,1))
            ");
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function get_Marks($courseno,$sec,$Exam_ID,$S_ID){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('Sec',$sec);
        $this->db->where('Exam_ID',$Exam_ID);
        $this->db->where('S_ID',$S_ID);
        $this->db->select('Marks');
        $query=$this->db->get('marks');
        if($query->num_rows()==1)return $query->row()->Marks;
        else return FALSE;
    }

    function set_GPA($courseno,$S_ID,$gpa){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('S_Id',$S_ID);
        $data=array(
          'GPA'=>$gpa
        );
        $this->db->update('takencourse',$data);
    }

    function get_result($courseno){
        $query=$this->db->query("
            Select student.S_Id,Name,GPA
            from takencourse,student
            where CourseNo='$courseno' and status='Running' and takencourse.S_Id=student.S_Id
            ");

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return FALSE;
        }
    }
}
