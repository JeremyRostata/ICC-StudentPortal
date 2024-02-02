<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Registrar_students extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(empty($_SESSION['employee_id'])){
            redirect('C_Employee_Login');
        }
        $this->load->library('excel');
        $this->load->model('M_Registrar_students');

    }

    public function index(){
        
        $employee_id = $this->session->userdata('employee_id');
        $registrar_info = $this->M_Registrar_students->fetchRegistrarInfo($employee_id);
        $student_info = $this->M_Registrar_students->fetchStudentInfo($employee_id);
        $data = array( 
            'registrar_info' => $registrar_info,
            'student_info' => $student_info
        );
		$this->load->view('V_Registrar_students', $data);
    }

    public function studentUpload(){

        $objPHPExcel = PHPExcel_IOFactory::load($_FILES['fileToUpload']['tmp_name']);
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
 

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
                'student_number' => $row['A'],
                'first_name' => $row['B'],
                'middle_name' => $row['C'],
                'last_name' => $row['D'],
                'contact_number' => $row['E'],
                'email_address' => $row['F'],
                'year_level' => $row['G']
            );

            $this->M_Registrar_Dashboard->saveUploadedExcel($insert_array);
        }

        $this->session->set_flashdata('message','Save Successful!');
        redirect('C_Registrar_Dashboard/index');
    
    }

    public function logout(){
        $this->session->unset_userdata('employee_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }


    public function search() {
        $searchName = $this->input->post('searchName');

        // SQL query to search for the name in the database
        $query = $this->db->query("SELECT * FROM students WHERE first_name LIKE '%$searchName%'");

        // Pass the result to the view
        $data['results'] = $query->result_array();

        $this->load->view('V_Registrar_result', $data);
    }



}