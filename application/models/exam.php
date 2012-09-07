<?php

class Exam extends CI_Model{

    function schedule_exam($courseno){
        $query=$this->db->query("
                SELECT MAX(ID) as ID
                FROM exam
                WHERE CourseNo='$courseno'
                ");

        if($query->num_rows()==1){
            $row=$query->row();
            $id=$row->ID+1;
        }else{
            $id=1;
        }
        $time=$this->input->post('hour');
        $time.=':';
        $time.=$this->input->post('minute');
        $time.=$this->input->post('meridian');
        $unparsed_date=$this->input->post('Date');
        $date=substr($unparsed_date, 6, 4);
        $date.='-';
        $date.=substr($unparsed_date, 0, 2);
        $date.='-';
        $date.=substr($unparsed_date, 3, 2);
        $data=array(
            'CourseNo'=>$courseno,
            'ID'=>$id,
            'Sec'=>$this->input->post('Sec'),
            'Topic'=>$this->input->post('Title'),
            'Syllabus'=>$this->input->post('Syllabus'),
            'Location'=>$this->input->post('Location'),
            'Duration'=>$this->input->post('Duration'),
            'eDate'=>$date,
            'eTime'=>$time,
            'FileLocation'=>NULL,
            'eType'=>$this->input->post('Type')
        );
        
        $this->db->insert('exam',$data);
    }

    function  get_routine($courseno){
        $query=$this->db->query("
            select Sec,eDate,eTime,eType,Duration,Location,Topic,Syllabus
            from exam
            where CourseNo='$courseno'
            ");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else return FALSE;

    }

    function get_exam($courseno,$sec){
        $query=$this->db->query("
            select Topic,ID,eDate,eType
            from exam
            where CourseNo='$courseno' and Sec='$sec'
            ");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else return FALSE;
    }

    function upload_marks(){
        $rows=$this->student->get_studentformarks($this->input->post('CourseNo'),$this->input->post('Sec'));
        foreach ($rows as $row) {
            $data=array(
                'CourseNo'=>$this->input->post('CourseNo'),
                'Sec'=>$this->input->post('Sec'),
                'Exam_ID'=>$this->input->post('Exam_ID'),
                'Total'=>$this->input->post('total'),
                'Marks'=>$this->input->post($row->S_Id),
                'S_ID'=>$row->S_Id
            );
            $this->db->insert('marks',$data);
        }
    }
    function edit_marks(){
        $rows=$this->student->get_studentformarks($this->input->post('CourseNo'),$this->input->post('Sec'));
        foreach ($rows as $row) {
            $data=array(                
                'Total'=>$this->input->post('total'),
                'Marks'=>$this->input->post($row->S_Id)
                
            );
            $this->db->where('CourseNo', $this->input->post('CourseNo'));
            $this->db->where('Sec', $this->input->post('Sec'));
            $this->db->where('Exam_ID',$this->input->post('Exam_ID'));
            $this->db->where('S_ID',$row->S_Id);
            $this->db->update('marks',$data);
        }
    }

    function get_marks($courseno,$sec,$exam_ID,$s_ID){
        $query=$this->db->query("
            select Marks
            from marks
            where CourseNo='$courseno' and Sec='$sec' and Exam_ID='$exam_ID'
                and S_ID='$s_ID'
            ");
        if($query->num_rows()==1){
            return $query->row()->Marks;
        }else{
            return FALSE;
        }
    }

    function total_marks($courseno,$sec,$exam_ID){
        $query=$this->db->query("
            select Total
            from marks
            where CourseNo='$courseno' and Sec='$sec' and Exam_ID='$exam_ID'
            ");
        if($query->num_rows()>0){
            return $query->row()->Total;
        }else{
            return FALSE;
        }
    }
}
