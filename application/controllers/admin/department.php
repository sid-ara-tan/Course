<?php class Department extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
        $this->load->model('admin/department_model');
        $this->load->model('admin/teacher_model');
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

    function load_teacher_info(){
        $query= $this->teacher_model->get_all_teacher();
        $options=array();
        $options['99999']='99999 - Currently Unavailable...';
        foreach ($query->result() as $row) {            
            $options[$row->T_Id]=$row->T_Id.'-('.$row->Designation.')-'.$row->Name;
        }
        echo json_encode($options);
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
}
