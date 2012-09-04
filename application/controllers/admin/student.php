<?php class Student extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
        $this->load->library('form_validation');
        $this->load->model('admin/course_model');
        $this->load->model('admin/department_model');
        $this->load->model('admin/teacher_model');
        $this->load->model('admin/student_model');
    }

    public function index($param=NULL) {
        
    }

    public function view_student(){
        $data=array(
            'msg'=>'Student Information',
            'info'=>'',
            'title'=>'View Students'
        );

        $data['all_departments']= $this->department_model->get_all_department();
        $this->load->view('admin/view_student',$data);
    }

    function teacher_by_dept_id() {
        $Dept_id=$this->input->post('Dept_id');
        $data['all_teachers']= $this->teacher_model->get_teacher_by_dept_id($Dept_id);

        $msg=$this->load->view('admin/teacher_dropdown_view',$data,TRUE);
        echo $msg;
    }
    
    function  search_result(){
        $Dept_id=$this->input->post('Dept_id');
        $Name=  $this->input->post('Name');
        $sLevel=$this->input->post('sLevel');
        $Term=$this->input->post('Term');
        $Sec=$this->input->post('Sec');
        $S_Id=$this->input->post('S_Id');
        $Advisor=$this->input->post('Advisor');
        $Curriculam=$this->input->post('Curriculam');
        
        $this->form_validation->set_rules('Name', 'Name', 'trim|max_length[49]|xss_clean');
        $this->form_validation->set_rules('S_Id', 'Student ID', 'trim|max_length[10]|xss_clean|callback_digit_check');
        $this->form_validation->set_rules('Sec', 'Section', 'trim|max_length[4]');

        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors('<div class="sid_error shadow search_header" style="text-align:center;width:99%;height:20px;">', '</div>');
        }
        else{
            $data=array();

            if($Dept_id){
                $data['Dept_id']=$Dept_id;
            }
            if($sLevel){
                $data['sLevel']=$sLevel;
            }
            if($Term){
                $data['Term']=$Term;
            }
            if($Sec){
                $data['Sec']=$Sec;
            }
            if($Advisor){
                $data['Advisor']=$Advisor;
            }
            if($Curriculam){
                $data['Curriculam']=$Curriculam;
            }

            /*print_r($data);
            echo $Name;
            echo $S_Id;*/

            $result=$this->student_model->get_search_result($data,$S_Id,$Name);
            /*if($result){
                foreach ($result->result() as $single){
                    echo $single->S_Id;
                    echo br();
                    echo $single->Name;
                    echo br(3);
                }
            }
            else{
                echo 'No match found';
            }*/

            $info['all_students']=$result;
            $msg=$this->load->view('admin/single_student_view',$info,TRUE);
            echo $msg;
        }
    }

    function digit_check($str=NULL){
        if(strlen($str)>0){
            if (!ctype_digit($str))
		{
			$this->form_validation->set_message('digit_check', 'The %s field must contains digit');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
        }
        return TRUE;
    }

    function validate_student_exist(){
        $S_Id=$this->input->post('S_Id');
        if($this->is_student_exists($S_Id)){
            echo 'true';
        }
        else{
            echo 'false';
        }
    }
    function is_student_exists($S_Id=NULL){
        $check=$this->student_model->is_student_exists($S_Id);
        return $check;
    }

    function validate_student_name(){
        $Name=$this->input->post('Name');
        //$Name='Siddhartha Shankar Das';
        if($this->get_student_by_name($Name)){
            echo 'true';
        }
        else{
            echo 'false';
        }
    }

    function get_student_by_name($Name=NULL){
        $student=$this->student_model->get_student_by_name($Name);
        if($student){
            return TRUE;
        }

        else{
            return FALSE;
        }
    }

    function autocomplete_name(){
       $term=$this->input->get('term');
       $data=array();
       if(strlen($term)>40){
           $data[]='You can enter atmost 49 character';
       }
       else{
           $query=$this->student_model->get_student_by_like_name($term);

           if($query){
               foreach($query->result()as $single){
                    $data[]=$single->Name;
               }
           }
           else{
               $data[]='No such entry exists';
           }
       }
       

       echo json_encode($data);
    }

    function autocomplete_id() {
       $term=$this->input->get('term');
       $query=$this->student_model->get_student_by_like_id($term);

       if(strlen($term)>10){
           $data[]='You can enter atmost 10 digits';
       }
       elseif(!ctype_digit($term)){
           $data[]='Enter digits only';
       }
       else{
           if($query){
               foreach($query->result()as $single){
                    $data[]=$single->S_Id;
               }
           }
           else{
               $data[]='No such entry exists';
           }
       }
       
       echo json_encode($data);

    }
}