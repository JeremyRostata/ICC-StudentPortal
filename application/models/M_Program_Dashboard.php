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
        $this->db->select('course.course_id');
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
    
    public function saveUploadedExcel($insert_array, $section_id){
        
        $this->db->set('section_id', $section_id);
        $this->db->where('student_number',$insert_array['student_number']);
        $this->db->update('students',$insert_array);
        
    }
    public function emptySection($section_id){
        
        $this->db->set('section_id', 'null', false);
        $this->db->where('section_id',$section_id);
        $this->db->update('students');
        
    }

    public function fetchTeacherSchedule($course_id){
        
        $this->db->select('CONCAT(employee.first_name, " ", employee.last_name) as employee_name');
        $this->db->select('schedule.schedule_id');
        $this->db->select('schedule.schedule_remarks');
        $this->db->select('schedule.room_remarks');
        $this->db->select('subject.subject_name');
        $this->db->from('course');
        $this->db->join('section','course.course_id = section.course_id','inner');
        $this->db->join('schedule','section.section_id = schedule.section_id','inner');
        $this->db->join('subject','schedule.subject_id = subject.subject_id','left');
        $this->db->join('employee','schedule.employee_id = employee.employee_id','left');
        $this->db->where('course.course_id', $course_id);
       
        return $this->db->get()->result_array();
    }
}