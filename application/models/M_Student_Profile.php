<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Student_Profile extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function fetchMISInfo($student_id){ 
        $this->db->select('first_name'); 
        $this->db->select('last_name');
        $this->db->select('middle_name'); 
        $this->db->select('profile_name'); 
        $this->db->from('students');
        $this->db->where('student_id', $student_id);   
        return $this->db->get()->result_array()[0];
    }

    

    public function changePass($password,$student_id){
        $data = array(
            'password' => $password

        );
        $this->db->where('student_id', $student_id);
        $this->db->update('student_user', $data);
    }

    public function resetPass($password,$student_id){
        $data = array(
            'password' => $password
        );
        $this->db->where('student_id', $student_id);
        $this->db->update('student_user', $data);
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false;
        }
    }
 
    public function imageUpload($student_id,$new_img_name){
        $data = array(
            'profile_name' => $new_img_name
        );

        $this->db->where('student_id', $student_id);
        $this->db->update('students', $data);

        return ($this->db->affected_rows() > 0);
    }
}