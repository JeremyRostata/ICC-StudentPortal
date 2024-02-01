<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Student_year extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Student_year'); 
    }

    public function index(){
        $student_id = $this->session->userdata('student_id');
        
        $student_info = $this->M_Student_year->fetchStudentInfo($student_id);
        $student_subject = $this->M_Student_year->fetchSubject($student_id);
        $sem1 = $this->M_Student_year->fetchSem1($student_id);
        $sem2 = $this->M_Student_year->fetchSem2($student_id);

        $data = array( 
            'student_info' => $student_info,
            'student_subject' => $student_subject,
            'sem1' => $sem1,
            'sem2' => $sem2
            
        );
        
		$this->load->view('V_Student_year', $data);
    }


    

    public function logout(){
        $this->session->unset_userdata('student_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }
}