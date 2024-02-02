<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Registrar_result extends CI_Model{
    public function __construct(){
        parent::__construct();
        
    }
    
    public function fetchRegistrarInfo($employee_id){
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->from('employee');
        $this->db->where('employee_id', $employee_id);
        return $this->db->get()->result_array()[0];
    }
    public function fetchStudentInfo($employee_id){
        $this->db->select('students.first_name');
        $this->db->select('students.last_name');
        $this->db->select('students.year_level');
        $this->db->select('course.course_name');
        $this->db->from('employee');
        $this->db->join('students','employee.registrar_id = students.registrar_id','left');
        $this->db->join('course','students.course_id = course.course_id','left');
        $this->db->where('employee_id', $employee_id);
        return $this->db->get()->result_array();
    }

    public function saveUploadedExcel($insert_array){
        
        $this->db->select('student_number');
        $this->db->from('students');
        $this->db->where('student_number', $insert_array['student_number']);

        $result = $this->db->get()->result_array();

        if($result){ 
            $this->db->where('student_number',$insert_array['student_number']);
            $this->db->update('students',$insert_array);
        }else{
            $this->db->insert('students',$insert_array);
        }
        
    }
    
}