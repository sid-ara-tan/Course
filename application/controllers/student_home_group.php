<?php

class Student_home_group extends CI_controller {

    private $query_student='';
    private $query_taken_course='';
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('student');
        $this->load->model('course');
        $this->my_library->is_logged_in();
        
        $this->query_student = $this->student->get_info();
        $this->query_taken_course=$this->course->get_courses();
    }

    function group($course='',$notification='') {
        if($this->uri->segment(3)!=null)$courseno=$this->uri->segment(3);
        else $courseno=$course;
        
        if($this->uri->segment(4)=='posted')
        {
            $data['notification']="Message has been posted";
            $offset=0;
        }
        elseif($this->uri->segment(4)=='deleted')
        {
            $data['notification']="Has been deleted Successfully";
            $offset=0;
        }
        elseif($this->uri->segment(4)=='uploaded')
        {
            $data['notification']="File : ".$this->uri->segment(5)." Has Been Uploaded Successfully";
            $offset=0;
        }
    /*    elseif($course!='') 
        {
            $data['notification']=$notification;
            $offset=0;
        }
      */  
        else 
        {
            $data['notification']=$notification;
            $offset=$this->uri->segment(4,0);
        }
        
        $this->load->model('content');
        $this->load->model('message');
        $this->load->model('comment');
        $this->load->model('file');        
        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        
        $record=$this->content->get_content($courseno,100,0);
        $data['record_content']=$record;
        
        $record_file=$this->file->get_file($courseno,100,0);
        $data['record_file']=$record_file;
        //file comment
        if($data['record_file']!=FALSE)
        {
            foreach ($data['record_file'] as $row)
            {
            $fileid=$row->file_id;
            $data['commentoffile'.$fileid]=$this->comment->comment_number($courseno,$fileid);
            }
            //var_dump($data);               
        }
        
        foreach ($this->query_taken_course->result_array() as $value) {
            if($courseno==$value['CourseNo'])
            {
                $data['coursename']=$value['CourseName'];
                $data['courseno']=$courseno;
            }
        }
        //echo $courseno;
        $user_id=$this->session->userdata['ID'];
        $data['query_student']=$this->db->query("select Name from Student where S_Id='$user_id'");
        
        

        
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
            }
            //var_dump($data);               
        }
        
        
        $this->load->view('student_group_page', $data);
    }
    
    function group_message()
    {
        $this->load->model('message');
        
        if($this->uri->segment(3)=='post')
        {
            $sub=nl2br(strip_quotes($this->input->post('subject')));
            $msg=nl2br(strip_quotes($this->input->post('message')));

            $this->message->insert($sub,$msg,$this->input->post('courseno'));

            //echo $this->input->post('courseno');
            redirect('student_home_group/group/'.$this->input->post('courseno').'/posted');
        }
        
        if($this->uri->segment(3)=='delete')
        {
            //echo $this->encrypt->decode(urldecode($this->uri->segment(4)));
            $msg_id=$this->uri->segment(4);
            $courseno=$this->uri->segment(5);
            $this->message->delete($msg_id,$courseno);
            redirect('student_home_group/group/'.$courseno.'/deleted');
            
        }
    }
    
    function comment()
    {
        $this->load->model('message');
        $this->load->model('comment');
        $this->load->model('file');
        
        $user_id=$this->session->userdata['ID'];
        $data['query_student_name']=$this->db->query("select Name from Student where S_Id='$user_id'");
        
        if($this->uri->segment(5)=='posted')
        {
            $data['notification']="Comment has been posted";
            $offset=0;
        }
        elseif($this->uri->segment(5)=='deleted')
        {
            $data['notification']="Comment has been deleted";
            $offset=0;
        }
        else 
        {
            $data['notification']="";
            $offset=$this->uri->segment(5,0);
        }
        
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
        
        $data['query_post']=$this->message->get($msg_id,$courseno);
        $data['isfile']=false;
        
        if($data['query_post']==FALSE)
        {
            $data['query_post']=$this->file->get($msg_id,$courseno);
            $data['isfile']=true;
        }
        
        $this->load->view('student_group_page_comment', $data);
    }
    
    function comment_post()
    {
        $this->load->model('comment');
        $body=nl2br(strip_quotes($this->input->post('comment')));

        $this->comment->insert($body,$this->input->post('courseno'),$this->input->post('msg_no'));

        //echo $this->input->post('courseno');
        redirect('student_home_group/comment/'.$this->input->post('msg_no').'/'.$this->input->post('courseno').'/posted'); 
    }
    
    function comment_delete()
    {
        $this->load->model('comment');
        
        $msg_id=$this->uri->segment(3);
        $courseno=$this->uri->segment(4);
        $comment_id=$this->uri->segment(5);

        $this->comment->delete($comment_id);
        redirect('student_home_group/comment/'.$msg_id.'/'.$courseno.'/deleted');
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
            $file_notification=$this->upload->display_errors();
            
            $this->group($courseno, $file_notification);
        }
        
        else
        {
            $file_info=$this->upload->data();
            //$file_notification='File:'.$file_info['file_name'].' is successfully Uploaded';
            $this->load->model('file');
            $this->file->insert_file($courseno,$topic,$description,$file_info['file_name'],1);
            redirect('student_home_group/group/'.$courseno.'/uploaded/'.$file_info['file_name']);
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
        redirect('student_home_group/group/'.$courseno.'/deleted');
         
        
    }

}