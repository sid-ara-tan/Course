<?php
class Teacher_message extends CI_Controller{
    private $name='';
    private $designation='';
    function __construct(){
        parent::__construct();
        $this->load->library(array('session','table'));
        $this->my_library->teacher_is_logged_in();

        $this->load->model('teacher');
        $row=$this->teacher->get_info();
        $this->name=$row->Name;
        $this->designation=$row->Designation;
    }

    function index(){
        $data['name']=$this->name;
        $data['designation']=$this->designation;
        $data['show_for']='ALL';
        $this->load->model('teacher');
        $this->load->model('message');
        $this->load->model('comment');
        $this->load->model('teacher');
        $this->load->model('student');
        $this->load->model('exam');
        $config['per_page'] ='5';
        $data['querymsg']=$this->message->get_message_for_all($config['per_page'],$this->uri->segment(3,0));
       // $this->load->view('message_view',$data);
       //$data['querymsg'] =$this->message->getallmessage($courseno,$config['per_page'],$offset);
        //comment
       
        // for pagination

        $config['total_rows'] =  $this->message->get_message_count_for_all();
        $config['base_url'] = base_url().'index.php/teacher_message/index/';        
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
	$this->pagination->initialize($config);
        $this->load->view('message_view',$data);

    }

    function message_for_group($courseno=""){
        if($courseno==""){
            $courseno=$this->input->post('courseno');
        }
        if($courseno=='ALL'){
            $this->index();
        }else{
            $data['name']=$this->name;
            $data['designation']=$this->designation;
            $data['show_for']=$courseno;
            $this->load->model('teacher');
            $this->load->model('message');
            $this->load->model('comment');
            $this->load->model('teacher');
            $this->load->model('student');
            $this->load->model('exam');

            $config['per_page'] ='5';
            $data['querymsg'] =$this->message->getallmessage($courseno,$config['per_page'],$this->uri->segment(4,0));
            

            // for pagination

            $config['total_rows'] =  $this->message->count_results($courseno);
            $config['base_url'] = base_url().'index.php/teacher_message/message_for_group/'.$courseno;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<p>';
            $config['full_tag_close'] = '</p>';
            $this->pagination->initialize($config);
            $this->load->view('message_view',$data);
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
            redirect('teacher_message/index');
        }

        if($this->uri->segment(3)=='delete')
        {
            //echo $this->encrypt->decode(urldecode($this->uri->segment(4)));
            $msg_id=$this->uri->segment(4);
            $courseno=$this->uri->segment(5);
            $this->message->delete($msg_id,$courseno);
            $this->session->set_flashdata('notification',"Message has been deleted successfully");
            redirect('teacher_message/index');

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

        $data['query_student_info'] = $this->teacher->get_info();
        $msg_id=$this->uri->segment(3);
        $courseno=$this->uri->segment(4);


        //Pagination
        $config['total_rows'] =$this->comment->comment_number($courseno,$msg_id);
        $config['base_url'] = base_url().'index.php/teacher_message/comment/'.$msg_id.'/'.$courseno;
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

        $this->load->view('teacher_comment_view', $data);
    }

    function comment_post()
    {
        $this->load->model('comment');
        $body=nl2br(strip_quotes($this->input->post('comment')));

        $this->comment->insert($body,$this->input->post('courseno'),$this->input->post('msg_no'));

        $this->session->set_flashdata('notification',"Comment has been posted successfully");

        redirect('teacher_message/comment/'.$this->input->post('msg_no').'/'.$this->input->post('courseno'));
    }

    function comment_delete()
    {
        $this->load->model('comment');

        $msg_id=$this->uri->segment(3);
        $courseno=$this->uri->segment(4);
        $comment_id=$this->uri->segment(5);

        $this->comment->delete($comment_id);
        $this->session->set_flashdata('notification',"Comment has been deleted successfully");
        redirect('teacher_message/comment/'.$msg_id.'/'.$courseno);
    }

    function show_file($courseno)
    {
        $this->load->model('file');
        $this->load->model('comment');
        $this->load->model('student');
        $this->load->model('teacher');

        $user_id=$this->session->userdata['ID'];
        //$data['query_student']=$this->db->query("select Name from Student where S_Id='$user_id'");

        //$courseno=$this->input->post('courseno');
        $data['courseno']=$courseno;
        $config['per_page'] ='5';        
        $record_file=$this->file->get_file($courseno,$config['per_page'],$this->uri->segment(4,0));
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
         $config['total_rows'] =$this->file->count_result($courseno);
            $config['base_url'] = base_url().'index.php/teacher_home/show_file/'.$courseno.'/';
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<p>';
            $config['full_tag_close'] = '</p>';
            $this->pagination->initialize($config);
        $msg=$this->load->view('teacher_file_view', $data);

        echo $msg;
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
}