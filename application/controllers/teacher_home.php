<?php
class Teacher_home extends CI_controller{
    
    private $name='';
    private $designation='';
    function __construct(){
        parent::__construct();
        $this->load->library(array('session','table'));
        $this->my_library->is_logged_in();
       
        $this->load->model('teacher');
        $row=$this->teacher->get_info();
        $this->name=$row->Name;
        $this->designation=$row->Designation;
    }
    
    function index(){
        $data['name']=$this->name;
        $data['designation']=$this->designation;
        $this->load->model('teacher');
        $this->load->model('classinfo');
        
        $this->load->view('classroutine_view',$data);
        
    }
    
    function class_content($course,$message=''){
        
        $this->load->model('teacher');
        $this->load->model('content');
        $this->load->library('pagination');
	$this->load->helper('url');
          
        $record=$this->content->get_content($course,$this->uri->segment(4,0));
        $data['record']=$record;
        $data['name']=$this->name;
        $data['designation']=$this->designation;
        $data['message']=$message;
           
        // for pagination
        $this->db->where('CourseNo',$course);
        $this->db->from('Content');
        $config['total_rows'] =$this->db->count_all_results();
        $config['base_url'] = base_url().'index.php/teacher_home/class_content/'.$course.'/';
        $config['per_page'] ='2';
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';      
	$this->pagination->initialize($config);
        
       /* $this->load->view('header');
        $this->load->view('teacher_view',$data);
        $this->load->view('footer');*/
        $this->load->view('course_view',$data);
        
    }

    function upload_file($courseno){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Topic','Topic','required');
        
        $author=$this->input->post('Author');
        $topic=$this->input->post('Topic');
        $description=$this->input->post('Description');


        if($this->form_validation->run() == FALSE){
           $this->class_content($courseno,'Uploading Failed');
           
        }
        else{

            $config['upload_path'] = './uploads/'.$courseno;
            $config['allowed_types'] = 'txt|docx|pptx|gif|jpg|png|pdf';
            $config['max_size']	= '1000';
            $config['max_filename']='28';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("somefile")){
                    $message =$this->upload->display_errors();
                    $this->class_content($courseno,$message);                    
            }
            else{
                $data=$this->upload->data();
                $message='File:'.$data['file_name'].' is successfully Uploaded'.'<br />';
                $this->load->model('content');
                $this->content->insert_content($courseno,$author,$topic,$description,$data['file_name']);
                $this->class_content($courseno,$message);             
	    }
        }
    }


    function download_content($courseno,$filename){
        $this->load->helper('download');
        $this->load->helper('url');
        $data = file_get_contents("uploads/$courseno/$filename");
        $name = $filename;
       
        force_download($name, $data);
        
        
    }
    
    function delete_content($courseno,$id,$filename){
        echo $courseno.'|'.$id.'|'.$filename;
        $this->load->helper('file');
        $this->load->model('content');
        $this->content->delete_content($courseno,$id);
        unlink("uploads/$courseno/$filename");
        redirect("teacher_home/class_content/$courseno");
         
        
    }

    function show_profile(){
        $query=$this->db->get('department');
        $data['department']=$query->result();
        $this->load->model('teacher');

        $data['teacher']=$this->teacher->get_info();
        $data['valid_message']="";
        $this->load->view('teacher_profile',$data);
    }
    
    function edit_profile($task='blank'){
        if($task=='blank'){
            $query=$this->db->get('department');
            $data['department']=$query->result();
            $this->load->model('teacher');

            $data['teacher']=$this->teacher->get_info();
            $data['valid_message']="";
            $this->load->view('header');
            $this->load->view('teacher_edit',$data);
            $this->load->view('footer');
        }
        else{
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[32]');
                $this->form_validation->set_rules('password2','Password Confirm','trim|matches[password]');
                $this->form_validation->set_rules('name','Name','trim|required|max_length[40]');

                if($this->form_validation->run()==FALSE)
                {
                    $this->show_profile();
                }
                else{
                    $this->load->model('teacher');
                    if($this->teacher->edit_info()){
                        redirect('teacher_home/show_profile');
                    }else{
                        $this->show_profile();
                    }
                }
        }
    }
}