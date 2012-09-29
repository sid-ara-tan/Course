<?php class Teacher extends CI_Controller{
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

    public function view_teacher() {
        $data=array(
            'msg'=>'Teacher Information',
            'info'=>'',
            'title'=>'View Teachers'
        );
        
        $data['all_departments']= $this->department_model->get_all_department();
        $this->load->view('admin/view_teacher',$data);
    }

    public function view_all_teacher_by_dept_id($param='ALL') {
        $Dept_id=$this->input->post('Dept_id');
        if($Dept_id){
            $param=$Dept_id;
        }

        $data['all_departments']= $this->department_model->get_all_department();

        if($Dept_id=='ALL'){
            $data['all_teachers']= $this->teacher_model->get_all_teacher();
        }
        else{
            $data['all_teachers']= $this->teacher_model->get_teacher_by_dept_id($param);
        }

        $msg=$this->load->view('admin/single_teacher_view',$data,TRUE);

        echo $msg;
    }

    /**
     *  get 5 parameters from datatable-jeditable features
     *  update them to database accordingly
     *  value - contains new text value of the cell that user edited
     *  id - id of the updated record (id is placed in the tag that surrounds the cell)
     *  columnId - position of the column of the cell that has been edited (hidden columns are counted also)
     *  columnPosition - position of the column of the cell that has been edited (hidden columns are not counted)
     *  rowId - id of the row containing the cell that has been edited
     * @author siddharth
     */
    
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

          $update=$this->teacher_model->update_info($config,$id);
          if($update){
              echo $value;
          }
          else{
              echo "Database update falied";
          }
    }

    function is_unique_teacher_id(){
        $new_id=$this->input->post('value');

        if($this->is_teacher_exists($new_id)){
            echo 'false';
        }
        else{
            echo 'true';
        }
    }
    
    
    function form_is_unique_teacher_id(){
        $new_id=$this->input->post('T_Id');

        if($this->is_teacher_exists($new_id)){
            echo 'false';
        }
        else{
            echo 'true';
        }
    }


    function is_teacher_exists($id=NULL){
        $check=$this->teacher_model->check_teacher_exists($id);
        if($check){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function add_information(){

        $T_Id=$this->input->post('T_Id');

        $data=array(
            'T_Id'=>$this->input->post('T_Id'),
            'Name'=>$this->input->post('Name'),
            'Password'=>$this->input->post('Password'),
            'Dept_Id'=>$this->input->post('Dept_Id'),
            'Designation'=>$this->input->post('Designation')
        );

        $insert=$this->teacher_model->create_teacher($data);
        if($insert){
            echo $T_Id;
        }
        else{
            echo 'Database insertion failed';
        }
    }

    function delete_information(){
        $id = $this->input->post('id');
        /*further deletion task will be done here.*/
        $teachers=$this->teacher_model->check_assigned_course_by_teacher_id($id);
        if($teachers){
            echo "Unassigned currenly assigned Course first";
            return;
        }

        $delete=$this->teacher_model->delete_info($id);
        if($delete){
            echo "ok";
        }
        else{
            echo "Database deletion failed";
        }
    }
}

