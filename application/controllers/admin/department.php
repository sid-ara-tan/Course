<?php class Department extends CI_Controller{
    /**
     * Department creation edition delete
     * @author siddharth
     */
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
        $this->load->model('admin/department_model');
        $this->load->model('admin/teacher_model');
        $this->load->model('admin/course_model');
        $this->load->model('admin/student_model');
        $this->load->library('form_validation');
    }

    public function index($param=NULL) {
        
    }
    /**
     * This function get all departments information and all teacher information
     * then pass them to view naming view_department
     */
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

          $update=$this->department_model->update_info($config,$id);
          if($update){
              echo $value;
          }
          else{
              echo "Database update falied";
          }
          

    }
    /**
     *id - id of the record that user wants to delete (id is placed in the tag that surrounds the cell).
     * @return <type>
     */
    function delete_information(){
        $id = $this->input->post('id');
        /*further deletion task will be done here.*/
        
        $courses=$this->course_model->get_course_by_dept($id);
        if($courses->num_rows>0){
            echo "Clear undelying courses first";
            return;
        }
        $teachers=$this->teacher_model->get_teacher_by_dept_id($id);
        if($teachers->num_rows>0){
            echo "Modify Underlying teachers information first";
            return;
        }

        $students=$this->student_model->check_student_existence_by_dept($id);
        if($students){
            echo "Clear Underlying Student information first";
            return;
        }


        $delete=$this->department_model->delete_info($id);
        if($delete){
            echo "ok";
        }
        else{
            echo "Database deletion failed";
        }
        
    }
    /**
     * Parameters that are accepted by this page need to match input elements you place in Add new record form.
Page should return id of the new record if row was successfully added. This value will be added as an id of the new row in the table. If page returns error status, response text will be shown as an error message.
     */
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
            'Dept_id'=>  $this->input->post('Dept_id'),
            'sLevel'=>  $this->input->post('sLevel'),
            'Term'=>  $this->input->post('Term'),
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

    function delete_classinfo(){
        $consist_config=array(
            'CourseNo'=>  $this->input->get('CourseNo'),
            'cDay'=>  $this->input->get('cDay'),
            'Sec'=>  $this->input->get('Sec'),
            'Period'=>  $this->input->get('Period'),
            'by_teacher'=>  $this->input->get('by_teacher'),
       );
       
       $check= $this->department_model->check_consistency($consist_config);
       $output='';
       $success=FALSE;

       if($check){
            $delete=$this->department_model->delete_courseinfo($consist_config);

            if($delete){
                $output.= '<div class="sid_success">';
                $output.= 'Successfully deleted';
                $output.= '</div>';
                $success=TRUE;
            }
            else{
                $output.= '<div class="sid_error">';
                $output.= 'Deletion failed';
                $output.= '</div>';
            }
       }
       else{
                $output.= '<div class="sid_error">';
                $output.= 'Invalid';
                $output.= '</div>';
       }

       $json=array(
           'output'=>$output,
           'success'=>$success
       );

       echo json_encode($json);
    }

    function schedule_period(){
        $data=array(
            'msg'=>'Departments Information',
            'info'=>'',
            'title'=>'Sechodule Tasks'
        );
        $data['all_departments']= $this->department_model->get_all_department();
        $data['all_schedule']= $this->department_model->get_all_schedule();
        $this->load->view('admin/view_schedule_tasks',$data);
    }

    function update_schedule(){
          $id = $this->input->post('id');
          $value = $this->input->post('value');
          $column = $this->input->post('columnName');
          $columnPosition = $this->input->post('columnPosition');
          $columnId = $this->input->post('columnId');
          $rowId = $this->input->post('rowId');

          $data=array(
              $column=>$value
          );

          

          $config=$this->strip($id);

         /* if($value=="result_show_period"){
                $this->course_model->update_taken_course_status($config);
          }*/
          


          $update=$this->department_model->update_schedule_info($config,$data);

          if($update){
              echo $value;

              if($value=="result_show_period"){
                  /**
                   * here student's status will be changed according to his result
                   * if he get passed gpa then passed and removed from the group
                   * else he is failed and also remove from the group
                   */
                  //$this->course_model->update_student_status();
                  //echo 'hello world';
                  $this->course_model->delete_takencourse($config);
                  $this->course_model->delete_assignedcourse($config);
                  $this->course_model->delete_classinfo($config);
                  $this->course_model->delete_exam($config);
                  $this->course_model->delete_marks($config);
                  $this->course_model->delete_content($config);
                  $this->course_model->delete_message($config);
                 

                 // var_dump($config);
                  //$config['Dept_id'].$config['sLevel'].$config['Term'].
              }
          }
          else{
              echo "Database update falied";
          }
    }

    function strip($param=NULL){
        $Dept_id=substr($param, 0, -2);
        $sLevel=substr($param,-2,1);
        $Term=substr($param,-1);

        $config=array(
            'Dept_id'=>$Dept_id,
            'sLevel'=>$sLevel,
            'Term'=>$Term
            );
        return $config;
    }

    function delete_schedule(){
        $id = $this->input->post('id');
        /*further deletion task will be done here.*/

        $config=$this->strip($id);

        $delete=$this->department_model->delete_schedule($config);
        if($delete){
            echo "ok";
        }
        else{
            echo "Database deletion failed";
        }
    }
    
    function add_schedule(){
        $Dept_id = $this->input->post('Dept_id');
        $sLevel=$this->input->post('sLevel');
        $Term=$this->input->post('Term');
        $period=$this->input->post('period');

        $data=array(
            'Dept_id'=>$Dept_id,
            'sLevel'=>$sLevel,
            'Term'=>$Term,
            'period'=> $period
        );
        $config=array(
            'Dept_id'=>$Dept_id,
            'sLevel'=>$sLevel,
            'Term'=>$Term
        );

       $output='';
       $success=FALSE;

       $check=$this->department_model->check_schedule($config);
       
       if($check){
                $output.= '<div class="sid_error">';
                $output.= 'Already Exists';
                $output.= '</div>';
       }
       else{
                $insert=$this->department_model->add_schedule($data);
                $output.= '<div class="sid_success">';
                $output.= 'Successfuly Created';
                $output.= '</div>';
                $success=TRUE;
       }
       $json=array(
           'output'=>$output,
           'success'=>$success
       );
       echo json_encode($json);
    }

}
