<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Student_subject extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Student_subject'); 
    }

    public function index(){
        $student_id = $this->session->userdata('student_id');
        $student_info = $this->M_Student_subject->fetchStudentInfo($student_id);
        
        $student_subject = $this->M_Student_subject->fetchSubject($student_id);

        $data = array( 
            'student_info' => $student_info,
            'student_subject' => $student_subject,
           
            
        );
        
		$this->load->view('V_Student_subject', $data);
    }


    

    public function logout(){
        $this->session->unset_userdata('student_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }
}