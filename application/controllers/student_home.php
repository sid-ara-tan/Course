<?php

class Student_home extends CI_controller {

    private $query_student='';
    private $query_taken_course='';
    var $prefs_calender;
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('student');
        $this->load->model('course');
        $this->my_library->is_logged_in();
        
        $this->query_student = $this->student->get_info();
        $this->query_taken_course=$this->course->get_courses();
        
      $this->prefs_calender = array (
          
                'template'=>'{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calender">{/table_open}

                            {heading_row_start}<tr>{/heading_row_start}

                            {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
                            {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
                            {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

                            {heading_row_end}</tr>{/heading_row_end}

                            {week_row_start}<tr>{/week_row_start}
                            {week_day_cell}<td>{week_day}</td>{/week_day_cell}
                            {week_row_end}</tr>{/week_row_end}

                            {cal_row_start}<tr class="days">{/cal_row_start}
                            {cal_cell_start}<td class="day">{/cal_cell_start}

                            {cal_cell_content}
                            <div class="day_num"><a href="{content}">{day}</a></div>
                            {/cal_cell_content}
                            {cal_cell_content_today}<div class="day_num highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

                            {cal_cell_no_content}
                            <div class="">{day}</div>
                            {/cal_cell_no_content}
                            {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

                            {cal_cell_blank}&nbsp;{/cal_cell_blank}

                            {cal_cell_end}</td>{/cal_cell_end}
                            {cal_row_end}</tr>{/cal_row_end}

                            {table_close}</table>{/table_close}',
               'start_day'    => 'saturday',
               'month_type'   => 'long',
               'day_type'     => 'short',
               'show_next_prev'=> TRUE,
               'next_prev_url'   =>base_url().'index.php/student_home/index/calendar/show/'
             );

    }

    /**
    * This function will load the main page of student after log in.
    * 
    * @return student home page.
    */
    
    function index() {
        $this->load->model('student');
        $this->load->model('classinfo');
        $this->load->model('exam');
        ///////////////////////////////////////////////////////////////////////////////////////////////
        $uptime = strftime("%Y-%m-%d %H:%M:%S", time());
        $current_year=  substr($uptime,0,4);
        $current_month=  substr($uptime,5,2);
        
        if($this->uri->segment(5)==''||$this->uri->segment(6)=='')$exam_query=$this->exam->get_all_list($current_month,$current_year);
        else $exam_query=$this->exam->get_all_list( $this->uri->segment(6),$this->uri->segment(5));
        
        //var_dump($exam_query);
        $this->load->library('calendar',$this->prefs_calender);
        if($exam_query!=false)
        {
             foreach ($exam_query as $row) {
                 $date[substr($row->eDate,8,2)]='#';
             }
        }
        else $date[]='';
        $data['my_calender']=$this->calendar->generate($this->uri->segment(5), $this->uri->segment(6),$date);
        
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $data['query_student_info'] = $this->query_student;
        
        
        $data['taken_course_query'] = $this->query_taken_course;
        
        $this->load->view('student_homepage', $data);
    }
    
    
    /**
    * This function will load a calender containig the exam schedule of his taken course.
    * 
    * @return exam calender.
    */
    function load_exam_calender()
    {
        $this->load->model('exam');
        $uptime = strftime("%Y-%m-%d %H:%M:%S", time());

        if($this->input->post('year')==null)
        {
             $current_year=  substr($uptime,0,4);
             $current_month=  substr($uptime,5,2);
             $date=$current_year.'-'.$current_month.'-'.substr($this->input->post('date'),12,2);
        }
        else 
        {
             $date=$this->input->post('year').'-'.$this->input->post('month').'-'.substr($this->input->post('date'),12,2);

        }
      
             // var_dump($date);
        $data['query_exam']=$this->exam->get_exam_on_date($date);
        if($data['query_exam']!=FALSE)echo $this->load->view('student_home_page_exam_calender', $data,TRUE);
        else echo "No Exam Today";
    }
    
    /**
    * This function will redirect to another controller name student_home_group
    * which contains all the group activity function.
    * 
    * @return null.
    */
    
    function group()
    {
        $courseno=$this->uri->segment(3);
        redirect('student_home_group/group/'.$courseno);
    }
    
    /**
    * This function will load a page containing student profile information.
    * 
    * @return student profile page.
    */
    function profile()
    {
        $data['notification']=$this->session->flashdata('notification');        
        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        $row=$this->query_student->row();
        $this->load->model('teacher');
        if($row->Advisor!=null)$data['advisor_name']=$this->teacher->get_name($row->Advisor);
        else $data['advisor_name']='';
        $this->load->view('student_profile', $data);
    }
    

    function edit_profile()
    {
        $this->load->model('student');
        $update=$this->student->edit_profile();
        
        if($update)
        {
            $this->session->set_flashdata('notification',"Profile has been updated successfully");
            redirect('student_home/profile');
        }
        else echo "error occured";
    }
    
    /**
    * This function will load a page for course regitration of students
    * only when course registration period will be running.
    * 
    * @return null.
    */
    function course_registration()
    {
        $this->load->model('course');
        $this->load->model('schedule');
        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        
        $Period=$this->schedule->get_schedule_student();
        
        if($Period->period=='registration_request')
        {
            $data['query_offered']=$this->course->get_offered_courses();
            $data['query_retake']=$this->course->get_retake_courses();
            $data['query_optional']=$this->course->get_optional_courses();
            $data['is_taken_pending']=$this->course->get_taken_courses_pending();
        }
        else $data['query_offered']='Not Period';
        
        if($Period->period=='drop_request')
        {
            $data['query_drop']=$this->course->get_drop_courses();
            $data['is_drop_pending']=$this->course->get_drop_courses_status();
        }
        else $data['query_drop']='Not Period';
        
        $data['notification']=$this->session->flashdata('notification');
        $this->load->view('student_course_registration', $data);
    }
    
    function course_selected()
    {
        $this->load->model('course');
        $this->course->store_selected_courses();
        $this->session->set_flashdata('notification',"Registration Request Submitted Successfully");
        redirect('student_home/course_registration');
    }
    
    function course_dropped()
    {
        $this->load->model('course');
        $this->course->store_dropped_courses();
        $this->session->set_flashdata('notification',"Drop Request Submitted Successfully");
        redirect('student_home/course_registration');  
    }



    function result()
    {
        $this->load->model('course');
        $data['query_result_list']=$this->course->get_std_result_option();
        
        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        
        $this->load->view('student_view_result', $data);
    }
    
    /**
    * This function calulate CGPA of student from takencourse entity
    * and show the grade sheet after selecting his/her level term 
    * 
    * @return gradesheet of particular level term.
    */
    function result_show()
    {
        $this->load->model('course');
        
        $level=  substr($this->input->post('levelTerm'),0,1);
        $term=  substr($this->input->post('levelTerm'),1,1);
        $data['query_grade_sheet']=$this->course->get_std_grade_sheet($level,$term);
        
        $crd=0;
        $mult=0;
        $flag=0;
        foreach($data['query_grade_sheet']->result_array() as $row)
        {
            $crd+=$row['Credit'];
            $mult+=$row['Credit']*$row['GPA'];
            if($row['GPA']==0)$flag=1;


        }
        if($flag==0)$data['gpa']=round($mult/$crd,2);
        else $data['gpa']=0;
        $data['credit']=$crd;
        $data['level']=$level;
        $data['term']=$term;
        
        echo $this->load->view('student_view_gradesheet', $data,TRUE);
        
    }
    

}