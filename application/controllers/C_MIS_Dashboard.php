<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MIS_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(empty($_SESSION['employee_id'])){ 
            redirect('C_Employee_Login');
        }
        
        $this->load->model('M_MIS_Dashboard'); 

    }

    public function index(){ 
        
        $employee_id = $this->session->userdata('employee_id');
        $MIS_info = $this->M_MIS_Dashboard->fetchMISInfo($employee_id);
        $role_list = $this->M_MIS_Dashboard->fetchAccessRoleId($employee_id); 
        // $access_role_name = $this->M_MIS_Dashboard->fetchAccessRoles();
        
        $data = array( 
            'MIS_info' => $MIS_info,
            'role_list'=> $role_list
            // 'access_role_name'=> $access_role_name
        );
		$this->load->view('V_MIS_Dashboard', $data);
    }


    public function logout(){
        $this->session->unset_userdata('employee_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }
}