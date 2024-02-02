<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Employee_Management extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function fetchEmployee(){
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->select('employee_number');
        $this->db->select('employee_id');
        $this->db->from('employee');
        return $this->db->get()->result_array();   
    }

    public function fetchEmployeeID(){
        $this->db->select('employee_id');
        $this->db->from('employee_user');
        return $this->db->get()->result_array()[0];   
    }

    public function fetchUserID(){
        $this->db->select('employee_id');
        $this->db->from('employee');
        return $this->db->get()->result_array();   
    }

    public function fetchEmployeeCount(){
        $this->db->select('COUNT(employee_id) as COUNT');
        $this->db->from('employee_user');
        return $this->db->get()->result_array()[0]['COUNT'];
    }
    
    public function fetchAccessRoles(){
        $this->db->select('access_role_id');
        $this->db->select('access_role_name'); 
        $this->db->from('access_role');
        return $this->db->get()->result_array(); 
    }

    public function fetchCourse(){
        $this->db->select('course_id');
        $this->db->select('course_code'); 
        $this->db->from('course');
        return $this->db->get()->result_array(); 
    }

    public function employeeCreate($employee_id, $access_role_id, $password,$employee_number,$first_name,$middle_name,$last_name,$course_id)
    {
        
        $data = array(
            'employee_id' => $employee_id,
            'access_role_id' => $access_role_id,
            'password' => $password

        );
        $data1 = array(
            'employee_id' => $employee_id,
            'employee_number' => $employee_number,
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'course_id' => $course_id
        );
        // $data2 = array(
        //     'employee_id' => $employee_id
        // );
        $this->db->insert('employee_user', $data);
        $this->db->insert('employee', $data1);
        // $this->db->update('employee', $data2);
        // $this->db->where('employee_id', $employee_id);
    }
}