<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Teacher_Dashboard extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function fetchTeacherScheduleList($employee_id){
        $this->db->select('schedule.schedule_id');
        $this->db->select('CONCAT(subject.subject_code, " - ", subject.subject_name) AS subject_name');
        $this->db->select('schedule.room_remarks');
        $this->db->select('schedule.schedule_remarks');
        $this->db->select('schedule.year_level');
        $this->db->select('section.section_name');
        $this->db->select('schedule.semester');
        $this->db->from('schedule'); 
        $this->db->join('subject','schedule.subject_id = subject.subject_id','left');
        $this->db->join('section','schedule.section_id = section.section_id','left');
        $this->db->where('schedule.employee_id', $employee_id);
        $this->db->order_by('schedule.schedule_id');
        return $this->db->get()->result_array();
    }
    
    public function fetchTeacherSchedule($schedule_id){
        $this->db->select('CONCAT(subject.subject_code, " - ", subject.subject_name) AS subject_name');
        
        $this->db->select('schedule.room_remarks');
        $this->db->select('schedule.schedule_remarks');
        $this->db->select('schedule.year_level');
        $this->db->select('section.section_name');
        $this->db->select('schedule.semester');
        $this->db->from('schedule');
        $this->db->join('subject','schedule.subject_id = subject.subject_id','left');
        $this->db->join('section','schedule.section_id = section.section_id','left');
        $this->db->where('schedule.schedule_id', $schedule_id);
        return $this->db->get()->result_array()[0];
    }
    
    public function fetchTeacherStudentScheduleList($schedule_id){ 

        $section_id = $this->fetchScheduleSection($schedule_id);
        $this->db->select('students_schedule.student_schedule_id');
        $this->db->select('students.student_number');
        $this->db->select('CONCAT(students.first_name, " ", students.last_name) AS student_name');
        $this->db->select('students.year_level');
        $this->db->select('section.section_name');
        $this->db->select('students_schedule.prelim_grade');
        $this->db->select('students_schedule.midterm_grade');
        $this->db->select('students_schedule.final_grade');
        $this->db->select('students_schedule.grade');
        $this->db->select('students_schedule.grade_remarks_id');
        $this->db->from('students_schedule');
        $this->db->join('students','students_schedule.student_id = students.student_id','left');
        $this->db->join('section','students.section_id = section.section_id','left');
        $this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
        $this->db->where('students_schedule.schedule_id',$schedule_id);
        $this->db->order_by("CASE WHEN students.section_id = '$section_id' THEN '1' ELSE '2' END");
        return $this->db->get()->result_array();
    }
    
    private function fetchScheduleSection($schedule_id){
        $this->db->select('section_id');    
        $this->db->from('schedule');
        $this->db->where('schedule_id', $schedule_id);
        return $this->db->get()->result_array()[0]['section_id'];
    }

    public function fetchGradeRemarksList() {
        $this->db->select('grade_remarks_id');
        $this->db->select('grade_remarks_name');
        $this->db->from('grade_remarks');
        return $this->db->get()->result_array();
    }

    public function fetchTeacherInfo($employee_id){
        $this->db->select('first_name');
        $this->db->select('last_name');
        
        $this->db->from('employee');
        $this->db->where('employee_id', $employee_id);
        return $this->db->get()->result_array()[0];
    }
    
    public function updateStudentGrade($batch_condition){
    
        $this->db->update_batch('students_schedule', $batch_condition, 'student_schedule_id');
    }
}