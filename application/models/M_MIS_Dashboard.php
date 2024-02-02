<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_MIS_Dashboard extends CI_Model{
    public function __construct(){
        parent::__construct(); 
    }
    
    public function fetchMISInfo($employee_id){ 
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

    // public function fetchAccessRoles(){
    //     $this->db->select('access_role_id');
    //     $this->db->select('access_role_name'); 
    //     $this->db->from('access_role');
    //     $this->db->where('access_role_id', $access_role_id);
    //     return $this->db->get()->result_array(); 
    // }
    
}