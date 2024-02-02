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
        $this->db->order_by('section.section_name');
       
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
        $this->db->select('section.section_name');
        $this->db->from('course');
        $this->db->join('schedule','course.course_id = schedule.course_id','left');
        $this->db->join('section','schedule.section_id = section.section_id','left');
        $this->db->join('subject','schedule.subject_id = subject.subject_id','left');
        $this->db->join('employee','schedule.employee_id = employee.employee_id','left');
        $this->db->where('course.course_id', $course_id);
       
        return $this->db->get()->result_array();
    }

    public function fetchTeacherList(){
        $this->db->select('employee.first_name');
        $this->db->select('employee.last_name');
        $this->db->select('employee.employee_number');
        $this->db->select('employee.employee_id');
        $this->db->from('employee_user');
        $this->db->join('employee','employee_user.employee_id = employee.employee_id','left');
        $this->db->where('employee_user.access_role_id', '1'); // Teacher User only
        return $this->db->get()->result_array();
    }
    
    public function fetchSubjectList($course_id){
        $this->db->select('subject.subject_name');
        $this->db->select('subject.subject_code');
        $this->db->select('subject.subject_id');
        $this->db->from('course');
        $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
        $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
        $this->db->where('course.course_id', $course_id);
        $this->db->order_by('subject.subject_code');
        return $this->db->get()->result_array();
    }

    public function createTeacherSchedule($employee_id, $subject_id, $schedule_remarks, $room_remarks, $course_id, $year_level, $semester)
    {
        
        $data = array(
            'employee_id' => $employee_id,
            'subject_id' => $subject_id,
            'schedule_remarks' => $schedule_remarks,
            'room_remarks' => $room_remarks,
            'course_id' => $course_id,
            'year_level' => $year_level,
            'semester' => $semester

        );
    
        $this->db->insert('schedule', $data);
    }
    
    public function createSection($section_name, $course_id, $year_level)
    {
        
        $data = array(
            'section_name' => $section_name,
            'course_id' => $course_id,
            'year_level' => $year_level

        );
    
        $this->db->insert('section', $data);
    }
    public function fetchStudentScheduleList($schedule_id){
        
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
    
    public function fetchScheduleInfo($schedule_id){
        $this->db->select("CONCAT(employee.first_name, ' ', employee.last_name) as teacher_name");
        $this->db->select('subject.subject_name');
        $this->db->select('schedule.section_id');
        $this->db->select('schedule.year_level');
        $this->db->select('schedule.semester');
        $this->db->from('schedule');
        $this->db->join('employee','schedule.employee_id = employee.employee_id','left');
        $this->db->join('subject','schedule.subject_id = subject.subject_id','left');
        $this->db->where('schedule.schedule_id', $schedule_id);
       
        return $this->db->get()->result_array()[0];
    }

    public function fetchGradeRemarksList() {
        $this->db->select('grade_remarks_id');
        $this->db->select('grade_remarks_name');
        $this->db->from('grade_remarks');
        return $this->db->get()->result_array();
    }

    public function deleteSchedule($schedule_id){
        $this->db->where('schedule_id', $schedule_id);
        $this->db->delete('schedule');

        
        $this->db->where('schedule_id', $schedule_id);
        $this->db->delete('students_schedule');
    }
    
    public function deleteSection($section_id){
        $this->db->where('section_id', $section_id);
        $this->db->delete('section');

        
        $this->db->set('section_id', 'NULL');
        $this->db->where('section_id', $section_id);
        $this->db->update('students');
    }
    
    public function deleteStudentSchedule($schedule_id){
        $this->db->where('schedule_id', $schedule_id);
        $this->db->delete('students_schedule');

        
        $this->db->where('schedule_id', $schedule_id);
        $this->db->delete('students_schedule');
    }
    
    public function createStudentScheduleBySection($schedule_id, $year_level, $semester, $section_id)
    {
        $this->db->select('student_id');
        $this->db->from('students');
        $this->db->where('section_id', $section_id);        
        $insert_array = $this->db->get()->result_array();
        
        if(empty($section_id)){
            $insert_array = array();
        }

        if(!empty($insert_array)){
            foreach($insert_array as $value){
                $data = array(
                    'student_id' => $value['student_id'],
                    'year_level' => $year_level,
                    'semester' => $semester,
                    'schedule_id' => $schedule_id

                );

            $this->db->insert('students_schedule', $data);
            }
        }
    
    }
    
    public function createStudentScheduleByStudent($schedule_id, $year_level, $semester, $student_number)
    {
        $this->db->select('student_id');
        $this->db->from('students');
        $this->db->where('student_number', $student_number);        
        $student_id = $this->db->get()->result_array()[0]['student_id'];
        
        if(!empty($student_id)){
            $data = array(
                'student_id' => $student_id,
                'year_level' => $year_level,
                'semester' => $semester,
                'schedule_id' => $schedule_id
            );

            $this->db->insert('students_schedule', $data);
        }    
    }
    
    public function updateScheduleSection($schedule_id, $section_id){
        
        $this->db->set('section_id', $section_id);
        $this->db->where('schedule_id',$schedule_id);
        $this->db->update('schedule');
        
    }
}