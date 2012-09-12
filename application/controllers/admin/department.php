<?php class Department extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
        $this->load->model('admin/department_model');
        $this->load->model('admin/teacher_model');
        $this->load->model('admin/course_model');
        $this->load->library('form_validation');
    }

    public function index($param=NULL) {
        
    }

    function view_department(){
        $data=array(
            'msg'=>'Departments Information',
            'info'=>'',
            'title'=>'View Department'
        );
        $data['all_departments']= $this->department_model->get_all_department();
        $data['all_teacher']= $this->teacher_model->get_all_teacher();

        $this->load->view('admin/view_department',$data);
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

          $update=$this->department_model->update_info($config,$id);
          if($update){
              echo $value;
          }
          else{
              echo "Database update falied";
          }
          

    }

    function delete_information(){
        $id = $this->input->post('id');
        /*further deletion task will be done here.*/
        $delete=$this->department_model->delete_info($id);
        if($delete){
            echo "ok";
        }
        else{
            echo "Database deletion failed";
        }
        
    }

    function add_information(){
        $Dept_id = $this->input->post('Dept_id');
        $Name=$this->input->post('Name');
        $Head_of_dept_id=$this->input->post('Head_of_dept_id');
        $password=$this->input->post('Password');

        $data=array(
            'Dept_id'=>$Dept_id,
            'Name'=>$Name,
            'Head_of_dept_id'=>$Head_of_dept_id,
            'Password'=> $password
        );

        $insert=$this->department_model->create_department($data);
        if($insert){
            echo $Dept_id;
        }
        else{
            echo 'Database insertion failed';
        }
    }

    /*function load_teacher_info(){
        $query= $this->teacher_model->get_all_teacher();
        $options=array();
        $options['99999']='99999 - Currently Unavailable...';
        foreach ($query->result() as $row) {            
            $options[$row->T_Id]=$row->T_Id.'-('.$row->Designation.')-'.$row->Name;
        }
        echo json_encode($options);
    }*/

    function load_teacher_info(){
        $id=$this->input->get('id');
        $id=substr($id, 0, -3);
        $query= $this->teacher_model->bool_get_teacher_by_dept_id($id);

        if($query)
        {
            $options=array(''=>'Please Select...');
            foreach ($query->result() as $row) {
                $options[$row->T_Id]=$row->T_Id.'-('.$row->Designation.')-'.$row->Name;
            }
            echo json_encode($options);
        }
        else{
            $options=array(''=>'Currently unavailable');
            echo json_encode($options);
        }

    }

    function load_single_teacher_info($id=NULL){
        $query=$this->teacher_model->get_teacher_by_id($id);
        if($query){
            return  $query->row();
        }
        else{
            return FALSE;
        }
    }

    function check_dept_id(){

        $new_id=$this->input->post('value');

        if($this->is_department_exists($new_id)){
            echo 'false';
        }
        else{
            echo 'true';
        }
        
    }

    function form_check_dept_id(){

        $new_id=$this->input->post('Dept_id');

        if($this->is_department_exists($new_id)){
            echo 'false';
        }
        else{
            echo 'true';
        }

    }

    function is_department_exists($id){
        $query=$this->department_model->check_department_exists($id);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    function department_info_json(){
        $query= $this->department_model->get_all_department();

        $row_set=array();
        $options=array();

        foreach ($query->result() as $row) {
            $options['Dept_id']=$row->Dept_id;
            $options['Name']=$row->Name;
            $options['Head_of_dept_id']=$row->Head_of_dept_id;
            $options['Password']=$row->Password;
            $row_set[]=$options;
        }


        echo '{ "aaData":';
        echo json_encode($row_set);
        echo '}';
    }

    function make_routine(){
        $data=array(
            'msg'=>'Make Routine',
            'info'=>'',
            'title'=>'Make Routine'
        );
        $data['all_departments']= $this->department_model->get_all_department();
        $this->load->view('admin/view_make_routine',$data);
    }

    function make_routine_for_this(){
        $config=array(
            'Dept_id'=>  $this->input->get('Dept_id'),
            'sLevel'=>  $this->input->get('sLevel'),
            'Term'=>  $this->input->get('Term'),
            'Sec'=>  $this->input->get('Sec')
        );
       
        $current_classinfo=$this->department_model->get_all_classinfo($config);


         $data=array(
            'msg'=>'Departments Information',
            'info'=>'',
            'title'=>'Make Routine'
        );

        $data['current_classinfo']=$current_classinfo;
        $data['Dept_id']=$config['Dept_id'];
        $data['sLevel']=$config['sLevel'];
        $data['Term']=$config['Term'];
        $data['Sec']=$config['Sec'];

        $data['all_teachers']=  $this->teacher_model->get_teacher_by_dept_id($config['Dept_id']);

        $config_course=array(
            'Dept_ID'=>  $this->input->get('Dept_id'),
            'sLevel'=>  $this->input->get('sLevel'),
            'Term'=>  $this->input->get('Term')
        );
        $data['all_courses']=  $this->course_model->get_course_by_query($config_course);

        $this->load->view('admin/view_routine',$data);
    }

    function assigned_teacher_by_course(){
        $CourseNo=$this->input->post('CourseNo');
        $data['all_teachers']=$this->course_model->get_assigned_teacher($CourseNo);
        $msg=$this->load->view('admin/assign_teacher_dropdown_view',$data,TRUE);
        echo $msg;
    }

    function add_classinfo_entry(){
        $config=array(
            'Dept_id'=>  $this->input->post('Dept_id'),
            'CourseNo'=>  $this->input->post('CourseNo'),
            'cDay'=>  $this->input->post('cDay'),
            'Period'=>  $this->input->post('Period'),
            'Sec'=>  $this->input->post('Sec'),
            'cTime'=>  $this->input->post('cTime'),
            'Location'=>  $this->input->post('Location'),
            'Duration'=>  $this->input->post('Duration'),
            'by_teacher'=>  $this->input->post('by_teacher'),
            'sLevel'=>  $this->input->post('sLevel'),
            'Term'=>  $this->input->post('Term')
        );

       $output="";
       $success=FALSE;

       $consist_config=array(
            'CourseNo'=>  $this->input->post('CourseNo'),
            'cDay'=>  $this->input->post('cDay'),
            'Sec'=>  $this->input->post('Sec'),
            'Period'=>  $this->input->post('Period'),
            'by_teacher'=>  $this->input->post('by_teacher'),
       );

       $check= $this->department_model->check_consistency($consist_config);
       
       if($check){
            $output.= '<div class="sid_error">';
            $output.= 'This time slot already assigned';
            $output.= '</div>';
       }
       else{
            $insert=$this->department_model->add_classinfo_entry($config);
           if($insert){
                $output.= '<div class="sid_success">';
                $output.= 'Successfully Added';
                $output.= '</div>';
                $success=TRUE;
            }
            else{
                $output.= '<div class="sid_error">';
                $output.= 'Deletion failed';
                $output.= '</div>';
            }
       }
        
        $Json_Output=array(
          'output'=>$output,
           'success'=>$success
        );

        echo json_encode($Json_Output);
    }
}
