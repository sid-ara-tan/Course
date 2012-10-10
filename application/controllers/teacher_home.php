<?php
class Teacher_home extends CI_controller{
    
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

    /**
     * This function load the classroutine view of the the teacher
     * input:null
     * output:ClassRoutineView
     */
    function index(){
        $data['name']=$this->name;
        $data['designation']=$this->designation;
        $this->load->model('teacher');
        $this->load->model('classinfo');
        $this->load->model('teacher');
        $this->load->model('exam');
        $this->load->view('classroutine_view',$data);

    }

    /**
     * This function load the courseview
     * input:CourseNo,Message to print
     * output:CourseView
     */
    function class_content($course,$message=''){

        $this->load->model('teacher');
        $this->load->model('content');
        $this->load->model('student');
        $this->load->model('exam');
        $this->load->model('result');
        $this->load->library('pagination');
	$this->load->helper('url');

        $record=$this->content->get_content($course,4,$this->uri->segment(4,0));
        $data['record']=$record;
        $data['name']=$this->name;
        $data['designation']=$this->designation;
        $data['message']=$message;

        // for pagination
        $this->db->where('CourseNo',$course);
        $this->db->from('Content');
        $config['total_rows'] =$this->db->count_all_results();
        $config['base_url'] = base_url().'index.php/teacher_home/class_content/'.$course.'/';
        $config['per_page'] ='4';
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
	$this->pagination->initialize($config);
        $this->load->view('course_view',$data);

    }
    
    /**
     * This function process the ajax request for a section
     * to load the marks list of a Course
     * input:CourseNo,Section
     * output:MarksList
     */

    function process_form($courseno,$sec){
        $data['sec']=$sec;
        $data['courseno']=$courseno;
        $this->load->model('student');
        $this->load->model('exam');
        $this->load->view('exam_list',$data);
    }

    /**
     * this function uploads the marks of the
     * students of a particular Course
     * input:CourseNo
     * output:Uploading message
     */

    function upload_marks($courseno){
        $this->load->model('exam');
        $this->load->model('student');
        $this->exam->Edit_Total();
        if($this->input->post('task')=='upload'){
            $this->exam->upload_marks();
        }else{
            $this->exam->edit_marks();
        }
        $this->session->set_flashdata('marks_message', 'Marks Uploading Successful');
        redirect('teacher_home/class_content/'.$courseno);
        //$this->class_content($courseno,'Marks Uploading Succesful');
    }

    /**
     * This function process the ajax request for a section and exam
     * to load the marks list of a Course of that exam
     * input:CourseNo,Section,exam_id
     * output:MarksList
     */
    function marks_list($courseno,$sec,$exam_ID){
        $data['sec']=$sec;
        $data['courseno']=$courseno;
        $data['exam_ID']=$exam_ID;
        $this->load->model('student');
        $this->load->model('exam');
        $this->load->view('marks_list',$data);
    }


    /**
     *this function schedule the exam of course taking the form value
     *input:CourseNo
     *output:Message of scheduling
     */
    function schedule_exam($courseno){
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->form_validation->set_rules('Title','Title','required|max_length[30]');
        $this->form_validation->set_rules('Date','Date','required');
        $this->form_validation->set_rules('Duration','Duration','required|numeric|max_length[5]');
        $this->form_validation->set_rules('Location','Location','required|max_length[15]');
        if($this->form_validation->run()== FALSE){
            $message=validation_errors();
            $this->session->set_flashdata('scheduling_message', $message);
            //$this->class_content($courseno,'Exam Scheduling Failed');
            redirect('teacher_home/class_content/'.$courseno);
           
        }
        else{
            $this->load->model('Exam');
            $this->Exam->schedule_exam($courseno);
            $this->session->set_flashdata('scheduling_message', 'Exam Scheduling Succesful');
            //$this->class_content($courseno,'Exam Scheduling Succesful');
            redirect('teacher_home/class_content/'.$courseno);
        }

    }

    /**
     *this function delete a scheduled exam from database
     * if no marks for that exam has been uploaded
     * input:CourseNo,Section,Exam ID
     * output:Delete message
     */
    function delete_scheduled($cousrseno,$sec,$ID){
        $this->load->model('exam');
        $this->exam->delete_scheduled($cousrseno,$sec,$ID);
        $this->session->set_flashdata('scheduling_message', 'Exam Deleted Successfully');
        redirect('teacher_home');
    }

    /**
     *this function add exam type for course
     * input:CourseNo
     * output:Message of exam type add
     */
    function add_exam($courseno){
      $this->load->model('Exam');
      $this->Exam->add_exam($courseno);
      $this->session->set_flashdata('addexam_message', 'Exam added Succesfully');
      redirect('teacher_home/class_content/'.$courseno);
    }

    /**
     *this function delete exam type for course
     * input:CourseNo,Exam type to delete
     * output:Message of exam type delete
     */
    function delete_exam($courseno,$exam_type){
      $this->load->model('Exam');
      $this->Exam->delete_exam($courseno,$exam_type);
      $this->session->set_flashdata('addexam_message', 'Exam deleted Succesfully');
      redirect('teacher_home/class_content/'.$courseno);
    }

    /**
     * this function upload file for a course
     * taking input from courseview form
     * input:CourseNo
     * output:Message of file uploading
     */    
    function upload_file($courseno){
        $author=$this->input->post('Author');
        $topic=$this->input->post('Topic');
        $description=$this->input->post('Description');
        $config['upload_path'] = './uploads/'.$courseno;
        $config['allowed_types'] = '*';
        $config['max_size']	= '3000';
        $config['max_filename']='28';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("somefile")){
                $message =$this->upload->display_errors();
                $this->session->set_flashdata('content_message', $message);
                //$this->class_content($courseno,$message);
                redirect('teacher_home/class_content/'.$courseno);
        }
        else{
            $data=$this->upload->data();
            $message='File:'.$data['file_name'].' is successfully Uploaded'.'<br />';
            $this->load->model('content');
            $this->content->insert_content($courseno,$author,$topic,$description,$data['file_name']);
            $this->session->set_flashdata('content_message',$message);
            //$this->class_content($courseno,$message);
            redirect('teacher_home/class_content/'.$courseno);
        }
        
    }


    /**
     *this function download a file when it is clicked
     * on course view
     * input:CourseNo,Filename
     * output:Message of downloading
     */
    function download_content($courseno,$filename){
        $this->load->helper('download');
        $this->load->helper('url');
        $data = file_get_contents("uploads/$courseno/$filename");
        $name = $filename;

        force_download($name, $data);


    }

    /**
     *this function delete a course content when it is asked
     * to delete from course view
     * input:CourseNo,id,filename
     * output:message of deletion
     */
    function delete_content($courseno,$id,$filename){
        echo $courseno.'|'.$id.'|'.$filename;
        $this->load->helper('file');
        $this->load->model('content');
        $this->content->delete_content($courseno,$id);
        unlink("uploads/$courseno/$filename");
        redirect("teacher_home/class_content/$courseno");


    }
    
    /**
     * this function loads the profile view of the teacher
     * input:void
     * output:teacher_profile view
     */
    function show_profile(){
        $query=$this->db->get('department');
        $data['department']=$query->result();
        $this->load->model('teacher');

        $data['teacher']=$this->teacher->get_info();
        $data['valid_message']="";
        $this->load->view('teacher_profile',$data);
    }

    /**
     *this function edit the profile of teacher
     * by taking form value of teacher profile
     */

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

    /**
     * this function loads the message view
     * input: void
     * output:message_view
     */
    function message(){
        $this->load->view('message_view');
    }

    function marks_distribution($courseno){
        $this->load->model('exam');
        $total=$this->exam->get_exam_type($courseno);
        foreach($total as $row){
            $this->exam->edit_marks_distribution($courseno,$row->etype);
        }
        $this->session->set_flashdata('addexam_message', 'Marks distributed Succesfully');
        redirect("teacher_home/class_content/$courseno");
        
    }

    /**
     * this function loads the ajax request for loading the
     * form for setting percentage
     * input:void
     * output:percentage form
     */
    function view_percentage_form(){
        $this->load->model('exam');
        $this->load->view('percentage_form');
    }

    function set_individual_percentage($courseno,$sec){     
        $exam_array=explode(",", $this->input->post('Exam_ID'));
        $this->load->model('exam');
        foreach ($exam_array as $Exam_ID) {
            $this->exam->set_individual_percentage($courseno,$sec,$Exam_ID);
        }
        $this->session->set_flashdata('addexam_message', 'Percentage set Succesfully');
        redirect("teacher_home/class_content/$courseno");
    }

    function set_best_count($courseno,$sec,$etype){
        $this->load->model('exam');
        $this->exam->set_best_count($courseno,$sec,$etype);
        $this->session->set_flashdata('addexam_message', 'Best count set Succesfully');
        redirect("teacher_home/class_content/$courseno");
    }

    function unitTest(){
        $this->load->library('unit_test');
        $test=$this->squire(4);
        $expected=17;

        echo $this->unit->run($test,$expected);

        }

    function squire($id=5){
        return $id*$id;
    }
    
}