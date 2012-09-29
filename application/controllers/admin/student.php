<?php class Student extends CI_Controller{
    /**
     * all student related task done here
     * viewing student
     * adding a studnt info
     * manage group of student
     * construct check login information and load model
     */
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
        //by default load this 
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
        $data['all_teachers']= $this->teacher_model->bool_get_teacher_by_dept_id($Dept_id);

        $msg=$this->load->view('admin/teacher_dropdown_view',$data,TRUE);
        echo $msg;
    }

    function add_teacher_by_dept_id(){
        $Dept_id=$this->input->post('Dept_id');
        $data['all_teachers']= $this->teacher_model->bool_get_teacher_by_dept_id($Dept_id);

        $msg=$this->load->view('admin/add_teacher_dropdown_view',$data,TRUE);
        echo $msg;
    }

    /**
     * Searching through database done here
     * search can be done by this all category
     * 
     */
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
            echo '<article class="module width_full shadow ">';
            echo '<div class="full_width_sid_error" style="text-align:center;font-size:1.1em">';
            echo validation_errors('<div>','</div>');
            echo '</div>';
            echo '</article>';
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
            $info['all_departments']= $this->department_model->get_all_department();

            $msg=$this->load->view('admin/single_student_view',$info,TRUE);
            echo $msg;
        }
    }
    /**
     *check wheater the value in the input field is really digit
     * @param <type> $str
     * @return <type>
     */
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

    function validate_student_exist_unique(){
        $S_Id=$this->input->post('S_Id');
        if($this->is_student_exists($S_Id)){
            echo 'false';
        }
        else{
            echo 'true';
        }
    }

    function edit_validate_student_exist(){
        $S_Id=$this->input->post('value');
        if($this->is_student_exists($S_Id)){
            echo 'false';
        }
        else{
            echo 'true';
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
    /**
     * get searching value by term
     * check database by like by this term value
     * echo the search result
     * on client side this will show autocomplete box
     */
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
    /**
     * get term which contains searching info needed for get like
     * student id
     * @return json data
     */
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

          $update=$this->student_model->update_info($config,$id);
          if($update){
              echo $value;
          }
          else{
              echo "Database update falied";
          }
    }

    /**
     * load teacher info as json data
     * for drop down list on jquery jeditable
     */
    function load_teacher_info(){
        $id=$this->input->get('id');
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
    /**
     *get student i
     * delete a student information by this student id
     * only if the student is not currently assigned to any course
     * @return <type>
     */
    function delete_information(){
        $id = $this->input->post('id');
        /*further deletion task will be done here.*/
        $students=  $this->student_model->check_running_assigned_student_by_S_Id($id);
        if($students){
            echo 'Unassinged the student form taken course list first';
            return ;
        }
        $delete=$this->student_model->delete_info($id);
        if($delete){
            echo "ok";
        }
        else{
            echo "Database deletion failed";
        }

    }

    function add_a_student($param=NULL){
        $data=array(
            'msg'=>'Create a Student Information',
            'info'=>$param,
            'title'=>'Create a Student'
        );

        $data['all_departments']= $this->department_model->get_all_department();
        $this->load->view('admin/add_a_student_view',$data);
    }

    /**
     * this function will add a new student
     * this is needed when there is need for extra student
     */

    function create_a_student(){


        $this->form_validation->set_rules('S_Id', 'Student ID', 'required|trim|max_length[10]|xss_clean|callback_digit_check');
        $this->form_validation->set_rules('Name', 'Name', 'trim|max_length[49]|xss_clean');
        $this->form_validation->set_rules('Sec', 'Section', 'trim|max_length[4]');
        $this->form_validation->set_rules('Password', 'Password', 'required|trim|max_length[25]|min_length[5]|xss_clean');
        $this->form_validation->set_rules('father_name', 'Father Name', 'trim|max_length[49]|xss_clean');
        $this->form_validation->set_rules('email', 'Email address', 'trim|max_length[49]|email|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|max_length[49]|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone no', 'trim|max_length[49]|xss_clean|callback_digit_check');


        if ($this->form_validation->run() == FALSE)
        {
                $this->add_a_student();
        }
        else{

                $S_Id=$this->input->post('S_Id');
                $Name=  $this->input->post('Name');
                $Dept_id=$this->input->post('Dept_id');
                $sLevel=$this->input->post('sLevel');
                $Term=$this->input->post('Term');
                $Sec=$this->input->post('Sec');
                $Advisor=$this->input->post('Advisor');
                $Curriculam=$this->input->post('Curriculam');
                $Password=$this->input->post('Password');
                $father_name=$this->input->post('father_name');
                $email=$this->input->post('email');
                $address=$this->input->post('address');
                $phone=$this->input->post('phone');

                $config=array();

                if($S_Id){
                    $config['S_Id']=$S_Id;
                }
                if($Name){
                    $config['Name']=$Name;
                }
                if($Dept_id){
                    $config['Dept_id']=$Dept_id;
                }
                if($sLevel){
                    $config['sLevel']=$sLevel;
                }
                if($Term){
                    $config['Term']=$Term;
                }
                if($Sec){
                    $config['Sec']=$Sec;
                }
                if($Advisor){
                    $config['Advisor']=$Advisor;
                }
                if($Curriculam){
                    $config['Curriculam']=$Curriculam;
                }
                if($Password){
                    $config['Password']=$Password;
                }
                if($father_name){
                    $config['father_name']=$father_name;
                }
                if($email){
                    $config['email']=$email;
                }
                if($address){
                    $config['address']=$address;
                }
                if($phone){
                    $config['phone']=$phone;
                }

               //print_r($config);

               $create=$this->student_model->create_student($config);

               $info=NULL;
               if($create){
                   $info='success';
               }
               else{
                   $info='error';
               }

               $this->add_a_student($info);
        }

    }

    function manage_group_of_student($param=NULL){
         $data=array(
            'msg'=>'Manage group of students',
            'info'=>'',
            'title'=>'Group of students'
        );

        $data['all_departments']= $this->department_model->get_all_department();
        $this->load->view('admin/group_of_student_view',$data);
    }

    /**
     *  Get searching data group by these following criteria
     * this meathod will be used by many meathod just to get this searching data
     * @return boolean
     */
    function ajax_get_data_group(){
        $this->form_validation->set_rules('Dept_id', 'Deartment id', 'required|trim');
        $this->form_validation->set_rules('Sec', 'Section', 'required|trim|max_length[4]|xss_clean');
        $this->form_validation->set_rules('std_code', 'Student prefix code', 'required|trim|max_length[4]|xss_clean|callback_digit_check');
        $this->form_validation->set_rules('start_code', 'Start code', 'required|trim|max_length[3]|xss_clean|callback_digit_check');
        $this->form_validation->set_rules('end_code', 'End code', 'required|trim|max_length[3]|xss_clean|callback_digit_check');

        $error=FALSE;
        $error_msg='';
        $config=array();
        $data=array();

        if($this->form_validation->run()==FALSE){
            $error_msg='<article class="module width_full shadow ">';
            $error_msg=$error_msg.'<div style="font-size:1.1em">';
            $error_msg=$error_msg.validation_errors('<div>','</div>');
            $error_msg=$error_msg.'</div>';
            $error_msg=$error_msg.'</article>';
            $error=TRUE;
        }
        else{
                $Dept_id=$this->input->post('Dept_id');
                $sLevel=$this->input->post('sLevel');
                $Term=$this->input->post('Term');
                $Sec=$this->input->post('Sec');
                $Advisor=$this->input->post('Advisor');
                $Curriculam=$this->input->post('Curriculam');

                $std_code=  $this->input->post('std_code');
                $start_code=  $this->input->post('start_code');
                $end_code=  $this->input->post('end_code');

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

                if($start_code){
                    $config['std_code']=$std_code;
                }
                if($start_code){
                    $config['start_code']=$start_code;
                }
                if($end_code){
                    $config['end_code']=$end_code;
                }
        }

        $complete=array(
            'data'=>$data,
            'config'=>$config,
            'error_msg'=>$error_msg,
            'error'=>$error
        );

        return $complete;
    }

    function number_pad($number,$n) {
            return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
    }

    function ajax_create_group(){
        $complete=$this->ajax_get_data_group();

        if($complete['error']==TRUE){
            echo $complete['error_msg'];
        }
        else{
            $config=$complete['config'];
            $data=$complete['data'];

            $std_code=$config['std_code'];
            $start_code=$config['start_code'];
            $end_code=$config['end_code'];

            $i=intval($start_code);
            $j=intval($end_code);

            $std_id='';
            $output='';
            $no_of_succes=0;
            $no_of_warning=0;
            $no_of_error=0;

            $div_error_msg='<div style="padding:5px;">';
            $div_error_msg.='<img src="'.base_url().'/images/admin/error.png'.'" width="16px" height="16px"/>';

            $div_success_msg='<div style="padding:5px;">';
            $div_success_msg.='<img src="'.base_url().'/images/admin/valid.png'.'" width="16px" height="16px" />';

            $div_warning_msg='<div style="padding:5px;">';
            $div_warning_msg.='<img src="'.base_url().'/images/admin/warning.png'.'" width="16px" height="16px" />';

            $div_message_end='</div>';

            for($i;$i<=$j;$i++){
                $std_id=$std_code.$this->number_pad($i,3);

                $check_exist=  $this->student_model->is_student_Exists($std_id);

                if($check_exist){
                    $output.=$div_warning_msg;
                    $output.=$std_id." "."this student id already exists";
                    $output.=$div_message_end;
                    $no_of_warning++;
                    continue;
                }

                $data['S_Id']=$std_id;
                $data['Password']=random_string('alnum',10);
                $insert=$this->student_model->create_student($data);


                if($insert){
                    $output.=$div_success_msg;
                    $output.=$std_id." "."successfully created";
                    $output.=$div_message_end;
                    $no_of_succes++;
                }
                else{
                    $output.=$div_error_msg;
                    $output.=$std_id.' '.'student creation failed';
                    $output.=$div_message_end;
                    $no_of_error++;
                }
                $output.=br();
            }

            $data_passed_to_view['output']=$output;
            $data_passed_to_view['no_success']=$no_of_succes;
            $data_passed_to_view['no_error']=$no_of_error;
            $data_passed_to_view['no_warning']=$no_of_warning;


            $output_article=$this->load->view('admin/group_create_status_view',$data_passed_to_view,TRUE);
            echo $output_article;
        }
    }

    function ajax_show_group(){

        $complete=$this->ajax_get_data_group();

        if($complete['error']==TRUE){
            echo $complete['error_msg'];
        }

        else{
            $config=$complete['config'];
            $data=$complete['data'];

            $std_code=$config['std_code'];
            $start_code=$config['start_code'];
            $end_code=$config['end_code'];

            $start_s_id=$std_code.$start_code;
            $end_s_id=$std_code.$end_code;

            $info['all_students']=$this->student_model->get_range_of_student($data,$start_s_id,$end_s_id);

            $info['all_departments']= $this->department_model->get_all_department();
            $msg=$this->load->view('admin/group_student_view',$info,TRUE);
            echo $msg;
        }
    }

    function ajax_delete_group(){
        $complete=$this->ajax_get_data_group();

        if($complete['error']==TRUE){
            echo $complete['error_msg'];
        }
        else{
            $config=$complete['config'];
            $data=$complete['data'];

            $std_code=$config['std_code'];
            $start_code=$config['start_code'];
            $end_code=$config['end_code'];

            $i=intval($start_code);
            $j=intval($end_code);

            $div_error_msg='<div style="padding:5px;">';
            $div_error_msg.='<img src="'.base_url().'/images/admin/error.png'.'" width="16px" height="16px"/>';

            $div_success_msg='<div style="padding:5px;">';
            $div_success_msg.='<img src="'.base_url().'/images/admin/valid.png'.'" width="16px" height="16px" />';

            $div_warning_msg='<div style="padding:5px;">';
            $div_warning_msg.='<img src="'.base_url().'/images/admin/warning.png'.'" width="16px" height="16px" />';

            $div_message_end='</div>';

            $std_id='';
            $output='';
            $no_of_succes=0;
            $no_of_warning=0;
            $no_of_error=0;

            for($i;$i<=$j;$i++){
                $std_id=$std_code.$this->number_pad($i,3);

                 $check_exist=  $this->student_model->is_group_student_Exists($data,$std_id);

                if($check_exist==FALSE){
                    $output.=$div_warning_msg;
                    $output.=$std_id." "."this student id doesn't match query.";
                    $output.=$div_message_end;
                    $no_of_warning++;
                    continue;
                }

                $delete=$this->delete_student_by_id($std_id);

                if($delete){
                    $output.=$div_success_msg;
                    $output.=$std_id." "."successfully deleted";
                    $output.=$div_message_end;
                    $no_of_succes++;
                }
                else{
                    $output.=$div_error_msg;
                    $output.=$std_id.' '.'student deletion failed';
                    $output.=$div_message_end;
                    $no_of_error++;
                }
                $output.=br();
            }

            $data_passed_to_view['output']=$output;
            $data_passed_to_view['no_success']=$no_of_succes;
            $data_passed_to_view['no_error']=$no_of_error;
            $data_passed_to_view['no_warning']=$no_of_warning;


            $output_article=$this->load->view('admin/group_delete_status_view',$data_passed_to_view,TRUE);
            echo $output_article;
        }

    }

    function delete_student_by_id($S_Id=NULL){
        //perform some checking before deletion

        $students=  $this->student_model->check_running_assigned_student_by_S_Id($S_Id);
        if($students){
            return FALSE;
        }
        
        $delete=$this->student_model->delete_info($S_Id);
        

        if($delete){
            return $delete;
        }
        else{
            return FALSE;
        }
    }

    function get_update_form_group(){
        $Dept_id=$this->input->post('Dept_id');
        $data['all_teachers']= $this->teacher_model->get_teacher_by_dept_id($Dept_id);
        $msg=$this->load->view('admin/update_form_student_group_view',$data,TRUE);
        echo $msg;
    }

    function ajax_update_group(){

        $complete=$this->ajax_get_data_group();

        if($complete['error']==TRUE){
            echo $complete['error_msg'];
        }
        else{
            $config=$complete['config'];
            $where=$complete['data'];

            $std_code=$config['std_code'];
            $start_code=$config['start_code'];
            $end_code=$config['end_code'];

            $start_s_id=$std_code.$start_code;
            $end_s_id=$std_code.$end_code;

            $sLevel=  $this->input->post('update_sLevel');
            $Term=  $this->input->post('update_Term');
            $Sec=  $this->input->post('update_Sec');
            $Advisor=  $this->input->post('update_Advisor');
            $Curriculam=$this->input->post('update_Curriculam');

            $data=array();

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

            $update=$this->student_model->update_student_group($where,$data,$start_s_id,$end_s_id);

            $show_msg_to_view=array();

            if($update){
                $show_msg_to_view['msg']='Update successful';
            }
            else{
                $show_msg_to_view['msg']='Update failed';
            }

            $msg=$this->load->view('admin/student_group_update_view',$show_msg_to_view,TRUE);
            echo $msg;
        }

    }

    function get_assign_course_group(){
        
        $complete=$this->ajax_get_data_group();

        if($complete['error']==TRUE){
            echo $complete['error_msg'];
        }
        else{
            $config=$complete['config'];
            $data=$complete['data'];
            
            $sLevel=$data['sLevel'];
            $Term=$data['Term'];

            $std_code=$config['std_code'];
            $start_code=$config['start_code'];
            $end_code=$config['end_code'];

            //$all_course=$this->course_model->get_course_by_level_term($sLevel,$Term);

            $search_course=array(
                'sLevel'=>$sLevel,
                'Term'=>$Term,
                'Dept_id'=>$data['Dept_id']
            );

            $all_course=$this->course_model->get_course_by_level_term_dept($search_course);
            
            
            $view_data['all_course']=$all_course;
            $html_val=$this->load->view('admin/check_taken_courses_view',$view_data,TRUE);

            echo $html_val;
        }

    }

    function taken_course_confirmation_dialog(){
        $check_data=$this->input->post('check_data');

        $this->load->library('table');
        $this->table->set_heading(array('Course No ', 'Course Name', 'Credit'));

        $total_credit=0;

        if(empty ($check_data)){
            echo 'None selected';
        }
        else{
                foreach($check_data as $course){
                    $sin_course=$this->course_model->get_credit_by_course_no($course);
                    $single_course=$sin_course->row();
                    $this->table->add_row(array($single_course->CourseNo,$single_course->CourseName,$single_course->Credit));
                    $total_credit+=$single_course->Credit;
                }

            $this->table->add_row(array('','<b>Total</b>',"<b>$total_credit</b>"));

            echo $this->table->generate();
        }

        
    }

    function get_taken_course_list(){
        
        $check_data=$this->input->post('check_data');
        $complete=$this->ajax_get_data_group();
        $output='';
        $div_error_msg='<div style="padding:5px;">';
        $div_error_msg.='<img src="'.base_url().'/images/admin/error.png'.'" width="16px" height="16px"/>';

        $div_success_msg='<div style="padding:5px;">';
        $div_success_msg.='<img src="'.base_url().'/images/admin/valid.png'.'" width="16px" height="16px" />';

        $div_warning_msg='<div style="padding:5px;">';
        $div_warning_msg.='<img src="'.base_url().'/images/admin/warning.png'.'" width="16px" height="16px" />';

        $div_message_end='</div>';

        /* if($check_exist==FALSE){
                    $output.=$div_warning_msg;
                    $output.=$std_id." "."this student id doesn't match query.";
                    $output.=$div_message_end;
                    $no_of_warning++;
                    continue;
                }

                $delete=$this->delete_student_by_id($std_id);

                if($delete){
                    $output.=$div_success_msg;
                    $output.=$std_id." "."successfully deleted";
                    $output.=$div_message_end;
                    $no_of_succes++;
                }
                else{
                    $output.=$div_error_msg;
                    $output.=$std_id.' '.'student deletion failed';
                    $output.=$div_message_end;
                    $no_of_error++;
                }*/

        if($complete['error']==TRUE){
             echo $complete['error_msg'];
        }
        elseif(empty ($check_data)){
             $output.='None selected';
        }
        else{
            $config=$complete['config'];
            $data=$complete['data'];

            $sLevel=$data['sLevel'];
            $Term=$data['Term'];

            $std_code=$config['std_code'];
            $start_code=$config['start_code'];
            $end_code=$config['end_code'];

            $i=intval($start_code);
            $j=intval($end_code);

            $std_id='';
            

            for($i;$i<=$j;$i++){
                $std_id=$std_code.$this->number_pad($i,3);
                $output.="<b>$std_id</b>";

                $check_exist=  $this->student_model->is_group_student_Exists($data,$std_id);

                if($check_exist==FALSE){
                    $output.=$div_error_msg;
                    $output.=$std_id." "."this student id doesn't match query.<br/>";
                    $output.=$div_message_end;
                    continue;
                }

                else{
                    foreach($check_data as $courseno){

                        $check_taken=  $this->student_model->is_already_course_taken($std_id,$courseno);
                        if($check_taken){
                            $output.=$div_warning_msg;
                            $output.=$std_id." ".$courseno." "." Already taken<br/>";
                            $output.=$div_message_end;
                        }
                        else{
                            $insert_data=array(
                            'S_Id'=>$std_id,
                            'CourseNo'=>$courseno,
                            'Status'=>'Running'
                            );
                            $insert=$this->student_model->take_course($insert_data);
                            if($insert){
                                $output.=$div_success_msg;
                                $output.=$std_id." ".$courseno." "." successfully taken<br/>";
                                $output.=$div_message_end;
                            }
                            else{
                                $output.=$div_error_msg;
                                $output.=$std_id." ".$courseno." "."insertion failed<br/>";
                                $output.=$div_message_end;
                            }
                        }
                    }
                }

                $output.=br(2);

            }
        }

        $view_data['output']=$output;
        $html_val=$this->load->view('admin/group_taken_course_status_view',$view_data,TRUE);
        echo $html_val;
    }

    function  pending_request(){
        $data=array(
            'msg'=>'Student Information',
            'info'=>'',
            'title'=>'View Students'
        );

        $data['all_students']=  $this->student_model->get_pending_request();
        $data['all_departments']= $this->department_model->get_all_department();
        $this->load->view('admin/pending_student_view',$data);
    }

    function student_pending_request(){
        $id=$this->input->get('id');

        $data=array(
            'msg'=>'Pending requests',
            'info'=>'',
            'title'=>'Pending requests'
        );

        if($this->is_student_exists($id)){
            $data['student_info']=  $this->student_model->get_student_by_id($id);
            $data['all_pending_requsts']= $this->student_model->get_all_pending_request_by_id($id);
            $data['all_running_course']=  $this->student_model->get_all_running_course($id);
            $this->load->view('admin/single_student_pending_request_view', $data);

        }
        else{
            $this->index();
        }
    }

    function assign_course(){
        $CourseNo=$this->input->post('CourseNo');
        $S_Id=$this->input->post('S_Id');

        $running=$this->student_model->running_course($CourseNo,$S_Id);

        if($running){
            echo '<img src="'.base_url().'/images/admin/valid.png'.'" width="16px" height="16px" />';
            echo 'Assigned';
        }
        else{
            echo '<img src="'.base_url().'/images/admin/error.png'.'" width="16px" height="16px" />';
            echo 'Failed';
        }
    }

    function drop_course(){
        $CourseNo=$this->input->post('CourseNo');
        $S_Id=$this->input->post('S_Id');

        $dropped=$this->student_model->drop_course($CourseNo,$S_Id);

        if($dropped){
            echo '<img src="'.base_url().'/images/admin/valid.png'.'" width="16px" height="16px" />';
            echo 'Dropped';
        }
        else{
            echo '<img src="'.base_url().'/images/admin/error.png'.'" width="16px" height="16px" />';
            echo 'Failed';
        }


    }
}