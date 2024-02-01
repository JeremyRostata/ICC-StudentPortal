<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Program_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(empty($_SESSION['employee_id'])){
            redirect('C_Employee_Login');
        }
        
        $this->load->library('excel');
        $this->load->model('M_Program_Dashboard');

    }

    public function index(){
        redirect('C_Program_Dashboard/sectionList');
    }

    public function sectionList(){
        
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
            'course_section' => $section_info,
            'section_id' => $section_id
        );

		$this->load->view('V_Program_Section', $data);
    }

    public function scheduleList(){
        
        $employee_id = $this->session->userdata('employee_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);
        $course_section = $this->M_Program_Dashboard->fetchCourseSection($employee_id);

        $data = array( 
            'teacher_schedule_info' => $teacher_schedule_info,
            'course_section' => $course_section
        );

		$this->load->view('V_Program_Dashboard', $data);
    }

    
    public function uploadStudentSection(){

        $section_id = $this->input->post('section_id');
        $objPHPExcel = PHPExcel_IOFactory::load($_FILES['fileToUpload']['tmp_name']);
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
 

        $this->M_Program_Dashboard->emptySection($section_id);

        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
         
            //The header will/should be in row 1 only. of course, this can be modified to suit your need.
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
                $arr_data[$row][$column] = $data_value;
            }
        }

        foreach ($arr_data as $row){
            $insert_array = array(
                'student_number' => $row['A']
            );

            $this->M_Program_Dashboard->saveUploadedExcel($insert_array, $section_id);
        }

        $this->session->set_flashdata('message','Save Successful!');
        redirect("/C_Program_Dashboard/section/?section_id=$section_id");
    
    }

    public function logout(){
        $this->session->unset_userdata('employee_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }
}