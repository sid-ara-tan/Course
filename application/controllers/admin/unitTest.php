<?php class UnitTest extends CI_Controller{

    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
    }

    function index(){


        $fixture = array();
        $this->assertTrue(count($fixture) == 0);

        $fixture[] = 'element';
        $this->assertTrue(count($fixture) == 1);
        
        $this->load->view('admin/backupcode/graph');
    }

  function assertTrue($condition){
        if (!$condition) {
            throw new Exception('Assertion failed.');
        }
    }

    function sample(){
        echo 'This is sample test';
        $test = $this->getI(4);

        $expected_result = 16;

        $test_name = 'Adds one plus one';

        echo $this->unit->run($test, $expected_result, $test_name);
       
        /*echo br();
        echo $this->unit->result();
        echo br();
        echo $this->unit->report();

        echo br();
        echo $this->unit->run('Foo', 'Foo');
        echo br();
        echo $this->unit->run('Foo', 'is_string');*/
    }
    
    
    function getI($i=5){
        return $i*$i;
    }

    function returnTrue(){
        return TRUE;
    }

    /**
     * Testing for some student_model method is done here
     */

    function testing_student_model(){        
        $this->load->model('admin/student_model');
        $test="";
        $config=array(
                    '0805047'=>'0805047',
                    '0805048'=>'0805048'
            );

        foreach($config as $test=>$expected){
            $test=$this->student_model->get_student_by_id($test)->row();
            echo $this->unit->run($test->S_Id,$expected,'Testing get_student_by_id_function','$this->student_model->get_student_by_id()');
        }

        $config=array(
                    '0705047'=>'is_false',
                    '0705048'=>'is_false'
            );

        foreach($config as $test=>$expected){
            $test=$this->student_model->get_student_by_id($test);
            echo $this->unit->run($test,$expected,'Testing get_student_by_id_function','$this->student_model->get_student_by_id()');
        }
    }
    
    function new_netbeans(){
        echo 'This is netbeans new version Let s e howw it differ.';
                
    }

    function exampleJson(){
        $sid=$this->input->post('sid');

        $ret[] = array('Year','Max','Min');
        $ret[] = array("y".'1950',40,30);
        $ret[] = array("y".'1960',48,30);

        echo json_encode($ret,JSON_NUMERIC_CHECK);
    }


    function rupa(){
         $data=array(
            'msg'=>'Welcome to Admin Panel',
            'info'=>"",
            'title'=>'Home'
        );
         
        $this->load->view('admin/demo',$data);
    }

    function dir_creation($CourseNo="sid"){
        $route = "uploads/".$CourseNo;

        if(!is_dir($route)) //create the folder if it's not already exists
        {
          mkdir($route,0777,TRUE);
        }
    }
    
}