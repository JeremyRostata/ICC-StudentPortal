<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Registrar_Dashboard extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function fetchRegistrarInfo($employee_id){   
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->select('profile_name');
        $this->db->from('employee');
        $this->db->where('employee_id', $employee_id);
        return $this->db->get()->result_array()[0]; 
    }

    public function fetchAccessRoleId($employee_id){
        
        $this->db->select('access_role.access_role_name');
        $this->db->select('employee_user.access_role_id'); 
        $this->db->from('employee_user');
        $this->db->join('access_role', 'employee_user.access_role_id = access_role.access_role_id', 'left'); 
        $this->db->where('employee_id', $employee_id);
        $result = $this->db->get();

        return $result->result_array()[0];
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
        echo "<p>got it</p>";
    }
    
}