<?php

class Student_home_group extends CI_controller {

    private $query_student='';
    private $query_taken_course='';
    //private $notification_file='';
    //private $notification='';
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('student');
        $this->load->model('course');
        $this->my_library->is_logged_in();
        $this->session->keep_flashdata('notification_file');
        $this->query_student = $this->student->get_info();
        $this->query_taken_course=$this->course->get_courses();
    }

    function group($course='') {
        if($this->uri->segment(3)!=null)$courseno=$this->uri->segment(3);
        else $courseno=$course;
  
        $data['notification']=$this->session->flashdata('notification');
        
        $offset=$this->uri->segment(4,0);
        $this->load->model('message');
        $this->load->model('comment');
        $this->load->model('student');
        $this->load->model('teacher');

        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        
        $user_id=$this->session->userdata['ID'];
        //$data['query_student']=$this->db->query("select Name from Student where S_Id='$user_id'");
      
        //Pagination
        $config['total_rows'] =$this->message->count_results($courseno);
        $config['base_url'] = base_url().'index.php/student_home_group/group/'.$courseno;
        $config['per_page'] ='5';
        $config['uri_segment'] = 4;
        //$config['full_tag_open'] = '<p>';
        //$config['full_tag_close'] = '</p>'; 
	$this->pagination->initialize($config);
        
        //message
        $data['querymsg'] =$this->message->getallmessage($courseno,$config['per_page'],$offset);
        //comment
        if($data['querymsg']!=FALSE)
        {
            foreach ($data['querymsg'] as $row)
            {
                
                $msgno=$row->MessageNo;
                $data['commentof'.$msgno]=$this->comment->comment_number($courseno,$msgno);
                if($row->senderType=='student')$data['nameof'.$msgno]=$this->student->get_name($row->SenderInfo);
                elseif($row->senderType=='teacher')$data['nameof'.$msgno]=$this->teacher->get_name($row->SenderInfo);
            }
            //var_dump($data);               
        }
        
        foreach ($this->query_taken_course->result_array() as $value) {
            if($courseno==$value['CourseNo'])
            {
                $data['coursename']=$value['CourseName'];
                $data['courseno']=$courseno;
                $this->load->view('student_group_page', $data);
            }
            

        }

    }
    
    function group_message()
    {
        $this->load->model('message');
        
        if($this->uri->segment(3)=='post')
        {
            $sub=nl2br(strip_quotes($this->input->post('subject')));
            $msg=nl2br(strip_quotes($this->input->post('message')));

            $this->message->insert($sub,$msg,$this->input->post('courseno'));

            $this->session->set_flashdata('notification',"Message has been posted successfully");
            redirect('student_home_group/group/'.$this->input->post('courseno'));
        }
        
        if($this->uri->segment(3)=='delete')
        {
            //echo $this->encrypt->decode(urldecode($this->uri->segment(4)));
            $msg_id=$this->uri->segment(4);
            $courseno=$this->uri->segment(5);
            $this->message->delete($msg_id,$courseno);
            $this->session->set_flashdata('notification',"Message has been deleted successfully");
            redirect('student_home_group/group/'.$courseno);
            
        }
    }
    
    function comment()
    {
        $this->load->model('message');
        $this->load->model('comment');
        $this->load->model('student');
        $this->load->model('teacher');
        $this->load->model('file');
        
        //$user_id=$this->session->userdata['ID'];
        //$data['query_student_name']=$this->db->query("select Name from Student where S_Id='$user_id'");
        
        $data['notification']=$this->session->flashdata('notification');;
        $offset=$this->uri->segment(5,0);
        
        $data['query_student_info'] = $this->query_student;
        $msg_id=$this->uri->segment(3);
        $courseno=$this->uri->segment(4);
        
        
        //Pagination
        $config['total_rows'] =$this->comment->comment_number($courseno,$msg_id);
        $config['base_url'] = base_url().'index.php/student_home_group/comment/'.$msg_id.'/'.$courseno;
        $config['per_page'] ='10';
        $config['uri_segment'] = 5;
        //$config['full_tag_open'] = '<p>';
        //$config['full_tag_close'] = '</p>'; 
	$this->pagination->initialize($config);
        
        
        $data['querycomment'] =$this->comment->getall($courseno,$msg_id,$config['per_page'],$offset);
        
        if($data['querycomment']!=FALSE)
        {
            foreach ($data['querycomment']->result_array() as $row)
            {
                
                $commentno=$row['id'];
                if($row['senderType']=='student')$data['nameof'.$commentno]=$this->student->get_name($row['commentBy']);
                elseif($row['senderType']=='teacher')$data['nameof'.$commentno]=$this->teacher->get_name($row['commentBy']);
            }
            //var_dump($data);               
        }
        
        $data['isfile']=false;
        $data['query_post']=$this->message->get($msg_id,$courseno);
 
        
        if($data['query_post']==FALSE)
        {
            $data['query_post']=$this->file->get($msg_id,$courseno);
            $data['isfile']=true;
            $row=$data['query_post']->row();
            if($row->senderType=='student')$data['nameof']=$this->student->get_name($row->uploader);
            elseif($row->senderType=='teacher')$data['nameof']=$this->teacher->get_name($row->uploader);
        }
        
        else
        {
            $row=$data['query_post']->row();
            if($row->senderType=='student')$data['nameof']=$this->student->get_name($row->SenderInfo);
            elseif($row->senderType=='teacher')$data['nameof']=$this->teacher->get_name($row->SenderInfo);   
        }
        
        $this->load->view('student_group_page_comment', $data);
    }
    
    function comment_post()
    {
        $this->load->model('comment');
        $body=nl2br(strip_quotes($this->input->post('comment')));

        $this->comment->insert($body,$this->input->post('courseno'),$this->input->post('msg_no'));

        $this->session->set_flashdata('notification',"Comment has been posted successfully");

        redirect('student_home_group/comment/'.$this->input->post('msg_no').'/'.$this->input->post('courseno')); 
    }
    
    function comment_delete()
    {
        $this->load->model('comment');
        
        $msg_id=$this->uri->segment(3);
        $courseno=$this->uri->segment(4);
        $comment_id=$this->uri->segment(5);

        $this->comment->delete($comment_id);
        $this->session->set_flashdata('notification',"Comment has been deleted successfully");
        redirect('student_home_group/comment/'.$msg_id.'/'.$courseno);
    }
    
    function do_upload()
    {
       // $author=$this->session->userdata['ID'];
        $topic=$this->input->post('topic');
        $description=$this->input->post('description');
        $courseno=$this->input->post('courseno');
        //var_dump($courseno);
        $config['upload_path'] = './uploads/'.$courseno;
        $config['remove_spaces'] =TRUE;
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|ppt|pptx|xls|xlsx|zip|rar';
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload("file_upload"))
        {
            //$this->notification_file=$this->upload->display_errors();
            //$this->group($courseno);
            $this->session->set_flashdata('notification_file',$this->upload->display_errors());
            //$this->session->keep_flashdata('notification_file');
            redirect('student_home_group/group/'.$courseno);
        }
        
        else
        {
            $file_info=$this->upload->data();
            //$file_notification='File:'.$file_info['file_name'].' is successfully Uploaded';
            $this->load->model('file');
            $this->file->insert_file($courseno,$topic,$description,$file_info['file_name'],1);
            $this->session->set_flashdata('notification_file',"File : ".$file_info['file_name']. " has been uploaded successfully");
           // $this->session->keep_flashdata('notification_file');
            redirect('student_home_group/group/'.$courseno);
        }
    }
    
    function download_file(){
        $this->load->helper('download');
        $this->load->helper('url');
        
        $courseno=$this->uri->segment(3);
        $filename=$this->uri->segment(4);
        
        $data = file_get_contents("uploads/$courseno/$filename");
        $name = $filename;
       
        force_download($name, $data);
        
    }
    
    function delete_file(){
        
        //echo $courseno.'|'.$id.'|'.$filename;
        $courseno=$this->uri->segment(3);
        $filename=$this->uri->segment(4);
        
        $this->load->helper('file');
        $this->load->model('file');
        $this->file->delete_file($courseno,$filename);
        unlink("uploads/$courseno/$filename");
        
        $this->session->set_flashdata('notification_file',"File : ".$filename. " has been deleted successfully");
        redirect('student_home_group/group/'.$courseno);
         
        
    }
    
    function load_file()
    {
        $this->load->model('file');
        $this->load->model('comment');
        $this->load->model('student');
        $this->load->model('teacher');
        
        $user_id=$this->session->userdata['ID'];
        //$data['query_student']=$this->db->query("select Name from Student where S_Id='$user_id'");
        
        $courseno=$this->input->post('courseno');
        $data['courseno']=$courseno;
        
        $record_file=$this->file->get_file($courseno,100,0);
        $data['record_file']=$record_file;
        
        if($data['record_file']!=FALSE)
        {
            foreach ($data['record_file'] as $row)
            {
                $fileid=$row->file_id;
                $data['commentoffile'.$fileid]=$this->comment->comment_number($courseno,$fileid);
                if($row->senderType=='student')$data['nameof'.$fileid]=$this->student->get_name($row->uploader);
                elseif($row->senderType=='teacher')$data['nameof'.$fileid]=$this->teacher->get_name($row->uploader);
            }
            //var_dump($data);               
        }
        $data['notification_file']=$this->session->flashdata('notification_file');
        
        $msg=$this->load->view('student_group_page_file', $data,TRUE);
        
        echo $msg;
    }
    
    function load_content()
    {
       $this->load->model('content');
      
       $courseno=$this->input->post('courseno');
       $data['courseno']=$courseno;
       
       $record=$this->content->get_content($courseno,100,0);
       $data['record_content']=$record;
       
       $msg=$this->load->view('student_group_page_content', $data,TRUE);
        
       echo $msg;
    }
    
    function load_marks()
    {
         $this->load->model('marks'); 
            $courseno=$this->input->post('courseno');
            $data['courseno']=$courseno;
            $data['query_student_info'] = $this->query_student;
            $data['taken_course_query'] = $this->query_taken_course;
            $data['query_marks']=$this->marks->get_all($courseno);
            
         foreach ($this->query_taken_course->result_array() as $value) {
            if($courseno==$value['CourseNo'])
            {
                $data['coursename']=$value['CourseName'];
                $data['courseno']=$courseno;
                $msg=$this->load->view('student_group_page_marks', $data,TRUE);
                echo $msg;
                break;
            }
            

        }
    }
    
    function load_members()
    {
        $this->load->model('student');
        
        $query_std_list=$this->student->get_std_list($this->input->post('courseno'));
        
        $data['query_std_list']=$query_std_list;
        $data['courseno']=$this->input->post('courseno');
        $msg=$this->load->view('student_group_page_members', $data,TRUE);
        echo $msg;
    }

}