<?php class Course extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
        $this->load->library('form_validation');
        $this->load->model('admin/course_model');
        $this->load->model('admin/department_model');
        $this->load->model('admin/teacher_model');
        $this->load->model('admin/student_model');
    }

    public function index($param=NULL){

    }
    /**
     * get all department all teacher information and all courses list
     * first then load the view view course
     */
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

    /**
     *retern course info as json data
     * @param <type> $param
     */

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

    /**
     *this is single department course view
     * you provide department id
     * this method will load it underlyilng course accorting
     * to dept_id/level/term/curriculam/type
     * @param <type> $param
     */

    function view_all_course_by_dept_id($param="ALL") {

        $Dept_id=$this->input->post('sel_Dept_id');
        $sLevel=$this->input->post('sel_sLevel');
        $Term=$this->input->post('sel_Term');
        $Curriculam=$this->input->post('sel_Curriculam');
        $Type=  $this->input->post('sel_Type');

        $config=array();
        if($Dept_id)
        {
            $config['Dept_id']=$Dept_id;
        }
        if($sLevel){
            $config['sLevel']=$sLevel;
        }
        if($Term){
            $config['Term']=$Term;
        }
        if($Curriculam){
            $config['Curriculam']=$Curriculam;
        }
        if($Type){
            $config['Type']=$Type;
        }

        $data['all_departments']= $this->department_model->get_all_department();
        $data['all_course']= $this->course_model->get_course_by_query($config);
        $msg=$this->load->view('admin/single_course_view',$data,TRUE);

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
    /**
     * check for unique course no
     * echo false if this course exists
     * this is for remote checking for add input form of course
     */
    function form_is_unique_course_no(){
        $CourseNo=$this->input->post('CourseNo');

        if($this->is_course_exists($CourseNo)){
            echo 'false';
        }
        else{
            echo 'true';
        }
    }

    /**
     *check wheather course exists or not
     * @param <type> $id
     * @return <boolean> true if exists
     */
    function is_course_exists($id=NULL){
        $check=$this->course_model->check_course_exists($id);
        if($check){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    /**
     * load department info as json data
     */
    public function load_department_info(){
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
    /**
     * get information from datatable jeditable input form
     * add those information to database
     */
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
    /**
     * get courseno and checking is done here before deleting a course
     * if course deleted successfully
     * this method will  echo ok
     *
     */
     function delete_information(){
        $id = $this->input->post('id');
        /*further deletion task will be done here.*/

        $teachers=$this->teacher_model->check_assigned_teacher_by_course_no($id);
        if($teachers){
            echo "Unassigned currenly assigned teachers first";
            return;
        }
        $students=$this->student_model->check_assigned_student_by_course_no($id);
        if($students){
            echo "Some students are currenly assigned Under this course.modify them first";
            return;
        }
        
        $delete=$this->course_model->delete_info($id);
        if($delete){
            echo "ok";
        }
        else{
            echo "Database deletion failed";
        }

    }

    function assign_teacher_for_these_course(){
         $data=array(
            'msg'=>'View course for assign teacher',
            'info'=>'',
            'title'=>'View Course'
        );

        $data['all_departments']= $this->department_model->get_all_department();
        $data['all_teacher']= $this->teacher_model->get_all_teacher();
        $data['all_courses']=  $this->course_model->get_all_course();
        $this->load->view('admin/view_course_for_assign_teacher',$data);
    }

    function select_individual_course_for_teacher(){
        $Dept_id=$this->input->post('sel_Dept_id');
        $sLevel=$this->input->post('sel_sLevel');
        $Term=$this->input->post('sel_Term');
        $Curriculam=$this->input->post('sel_Curriculam');
        $Type=  $this->input->post('sel_Type');

        $config=array();
        if($Dept_id)
        {
            $config['Dept_id']=$Dept_id;
        }
        if($sLevel){
            $config['sLevel']=$sLevel;
        }
        if($Term){
            $config['Term']=$Term;
        }
        if($Curriculam){
            $config['Curriculam']=$Curriculam;
        }
        if($Type){
            $config['Type']=$Type;
        }

        $data['all_departments']= $this->department_model->get_all_department();
        $data['all_course']= $this->course_model->get_course_by_query($config);
        $msg=$this->load->view('admin/single_course_view_for_assign_teacher',$data,TRUE);

        echo $msg;
    }

    function assign_teacher_for_this_course(){
        $CourseNo=$this->input->get('CourseNo');
        $Dept_id=$this->input->get('Dept_id');

        $data=array(
            'msg'=>'Assign Course to teacher',
            'info'=>'',
            'title'=>'Assign Course'
        );

        $data['assign_course_info']= $this->course_model->get_course_by_courseno($CourseNo);
        $data['department_info']=  $this->department_model->get_department_info($Dept_id);
        $data['all_teachers']=  $this->teacher_model->get_teacher_by_dept_id($Dept_id);
        $data['currently_assigned_teacher']=  $this->course_model->get_current_assigned_teacher($CourseNo);

        $this->load->view('admin/assign_course_view',$data);
        
    }

    function assign_course_to_teacher(){
        $config=array(
          'CourseNo'=>  $this->input->post('CourseNo'),
            'T_Id'=>  $this->input->post('T_Id'),
            'Sec'=>  $this->input->post('Sec')
        );
        $output='';
        $success=FALSE;
        $check=$this->course_model->is_this_course_already_assigned($config);
        if($check){
            $output.= '<div class="sid_error">';
            $output.= 'This Course is already assigned';
            $output.= '</div>';
        }
        else{

            $insert=$this->course_model->assigned_course($config);
            if($insert){
                $output.= '<div class="sid_success">';
                $output.= 'Successfully assigned';
                $output.= '</div>';
                $success=TRUE;
            }
            else{
                 $output.= '<div class="sid_error">';
                 $output.= 'Database Insertion failed';
                 $output.= '</div>';
            }
            
        }

        $ajax_output=array(
            'output'=>$output,
            'success'=>$success
            );

        echo json_encode($ajax_output);
    }

    function delete_assign_course(){
        $config=array(
          'CourseNo'=>  $this->input->get('CourseNo'),
            'T_Id'=>  $this->input->get('T_Id'),
            'Sec'=>  $this->input->get('Sec')
        );

        $output='';        
        
        $delete=$this->course_model->delete_assign_course($config);

        if($delete){
            $output.= '<div class="sid_success">';
            $output.= 'Successfully Deleted';
            $output.= '</div>';
        }
        else{
            $output.= '<div class="sid_error">';
            $output.= 'Deletion failed';
            $output.= '</div>';
        }
        
        
        echo $output;
    }

}