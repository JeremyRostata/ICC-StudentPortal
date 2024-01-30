<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Student_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if(empty($_SESSION['student_id'])){
            redirect('C_Student_Login');
        }

        $this->load->model('M_Student_Dashboard'); 
    }

    public function index(){
        $student_id = $this->session->userdata('student_id');
        $student_info = $this->M_Student_Dashboard->fetchStudentInfo($student_id);
        $student_grade_list = $this->M_Student_Dashboard->fetchStudentGradeList($student_id);

        $data = array( 
            'student_info' => $student_info,
            'student_grade_list'=> $student_grade_list
        );
		$this->load->view('V_Student_Dashboard', $data);
    }

    public function logout(){
        $this->session->unset_userdata('student_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }
}