<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Student_Management extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function fetchStudent(){
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->select('student_number');
        $this->db->select('student_id');
        $this->db->select('picture');
        $this->db->from('students');
        return $this->db->get()->result_array();  
    }
    
    public function studentCreate($student_id, $password) 
    {
        
        $data = array(
            'student_id' => $student_id,
            'password' => $password

        );
    
        $this->db->insert('student_user', $data);
    }
}