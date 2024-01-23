<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Program_Dashboard extends CI_Model{
    public function __construct(){
        parent::__construct();
    }





    public function fetchTeacherInfo($employee_id){
        $this->db->select('employee.employee_number');
        $this->db->select('employee.first_name');
        $this->db->select('employee.last_name');
        $this->db->select('course.course_name');
        $this->db->from('employee');
        $this->db->join('course','employee.course_id = course.course_id','left');
        $this->db->where('employee.employee_id', $employee_id);
       
        return $this->db->get()->result_array()[0];
    }

    public function fetchCourseSection($employee_id){
        $this->db->select('section.section_name');
        $this->db->select('section.section_id');
        $this->db->from('employee');
        $this->db->join('course','employee.course_id = course.course_id','left');
        $this->db->join('section','course.course_id = section.course_id','left');
        $this->db->where('employee.employee_id', $employee_id);
       
        return $this->db->get()->result_array();
    }

    public function fetchStudentList($section_id){
        $this->db->select('CONCAT(students.first_name, " ", students.last_name) as student_name');
        $this->db->select('students.year_level');
        $this->db->from('students');
        $this->db->where('students.section_id', $section_id);
       
        return $this->db->get()->result_array();
    }

    public function fetchSectionInfo($section_id){
        $this->db->select('section.section_name');
        $this->db->select('section.year_level');
        $this->db->from('section');
        $this->db->where('section.section_id', $section_id);
       
        return $this->db->get()->result_array()[0];
    }
}