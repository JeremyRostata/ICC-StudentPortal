<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Student_Login extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function fetchStudentNumber($student_number, $password){
        
        $this->db->select('students.student_number');
        $this->db->from('students_user');
        $this->db->join('students', 'students_user.student_id = students.student_id');
        $this->db->where('students.student_number', $student_number);
        $this->db->where('students_user.password', $password);
        $result = $this->db->get();

        return $result->result_array();
    }

}