<?php class Course extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
        $this->load->library('form_validation');
        $this->load->model('admin/course_model');
        $this->load->model('admin/department_model');
        $this->load->model('admin/teacher_model');
    }

    public function index($param=NULL){
        
    }

    public function view_course() {
        $data=array(
            'msg'=>'Course Information',
            'info'=>'',
            'title'=>'View Course'
        );

        $data['all_departments']= $this->department_model->get_all_department();
        $data['all_teacher']= $this->teacher_model->get_all_teacher();
        $data['all_courses']=  $this->course_model->get_all_course();
        $this->load->view('admin/view_course',$data);
    }

    public function course_info_json($param='CSE'){
        $query= $this->course_model->get_course_by_dept($param);

        $row_set=array();
        $options=array();

        foreach ($query->result() as $row) {
           $options["DT_RowId"]=$row->CourseNo;
           $options['CourseNo']=$row->CourseNo;
           $options['CourseName']=$row->CourseName;
           $options['Dept_ID']=$row->Dept_ID;
           $options['sLevel']=$row->sLevel;
           $options['Term']=$row->Term;
           $options['Type']=$row->Type;
           $options['Curriculam']=$row->Curriculam;
           $options['Credit']=$row->Credit;
           $row_set[]=$options;
        }
        
        echo '{ "aaData":';
        echo json_encode($row_set);
        echo '}';
    }


    function view_all_course_by_dept_id($param="ALL") {
        $Dept_id=$this->input->post('Dept_id');
        if($Dept_id){
            $param=$Dept_id;
        }

        $data['all_departments']= $this->department_model->get_all_department();

        if($Dept_id=='ALL'){
            $data['all_course']= $this->course_model->get_all_course();
        }
        else{
            $data['all_course']= $this->course_model->get_course_by_dept($param);
        }
        
        $msg=$this->load->view('admin/single_course_view',$data,TRUE);
        
        echo $msg;
    }

    function update_information()
    {
          $id = $this->input->post('id');
          $value = $this->input->post('value');
          $column = $this->input->post('columnName');
          $columnPosition = $this->input->post('columnPosition');
          $columnId = $this->input->post('columnId');
          $rowId = $this->input->post('rowId');

          $config=array(
              $column=>$value
          );

          $update=$this->course_model->update_info($config,$id);
          if($update){
              echo $value;
          }
          else{
              echo "Database update falied";
          }
    }


    function is_unique_course_no(){
        $new_id=$this->input->post('value');

        if($this->is_course_exists($new_id)){
            echo 'false';
        }
        else{
            echo 'true';
        }
    }

    function form_is_unique_course_no(){
        $CourseNo=$this->input->post('CourseNo');

        if($this->is_course_exists($CourseNo)){
            echo 'false';
        }
        else{
            echo 'true';
        }
    }

    function is_course_exists($id=NULL){
        $check=$this->course_model->check_course_exists($id);
        if($check){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function load_department_info(){
        $query= $this->department_model->get_all_department();
        $options=array();
        
        foreach ($query->result() as $row) {
            $options[$row->Dept_id]=$row->Dept_id.'-'.$row->Name;
        }
        echo json_encode($options);
    }

    function load_curriculam_year() {
         $options=array();

         for ($i = 2000; $i < 2021; $i++) {
            $options[$i]=$i;
         }
        echo json_encode($options);
    }

     function add_information(){

        $CourseNo=$this->input->post('CourseNo');

        $data=array(
            'CourseNo'=>$this->input->post('CourseNo'),
            'CourseName'=>$this->input->post('CourseName'),
            'Dept_ID'=>$this->input->post('Dept_ID'),
            'sLevel'=>$this->input->post('sLevel'),
            'Term'=>$this->input->post('Term'),
            'Type'=>$this->input->post('Type'),
            'Curriculam'=>$this->input->post('Curriculam'),
            'Credit'=>$this->input->post('Credit')
        );

        $insert=$this->course_model->create_course($data);
        if($insert){
            echo $CourseNo;
        }
        else{
            echo 'Database insertion failed';
        }
    }

     function delete_information(){
        $id = $this->input->post('id');
        /*further deletion task will be done here.*/
        $delete=$this->course_model->delete_info($id);
        if($delete){
            echo "ok";
        }
        else{
            echo "Database deletion failed";
        }

    }
}