<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Program_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(empty($_SESSION['employee_id'])){
            redirect('C_Employee_Login');
        }
        
        $this->load->model('M_Program_Dashboard');

    }

    public function index(){
        
        $employee_id = $this->session->userdata('employee_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);
        $course_section = $this->M_Program_Dashboard->fetchCourseSection($employee_id);

        $data = array( 
            'teacher_schedule_info' => $teacher_schedule_info,
            'course_section' => $course_section
        );

		$this->load->view('V_Program_Dashboard', $data);
    }

    public function section(){
        
        $employee_id = $this->session->userdata('employee_id');
        $section_id = $this->input->get('section_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);
        $student_list = $this->M_Program_Dashboard->fetchStudentList($section_id);
        $section_info = $this->M_Program_Dashboard->fetchSectionInfo($section_id);

        $data = array( 
            'teacher_schedule_info' => $teacher_schedule_info,
            'student_list' => $student_list,
            'course_section' => $section_info
        );

		$this->load->view('V_Program_Section', $data);
    }

    public function logout(){
        $this->session->unset_userdata('employee_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }
}