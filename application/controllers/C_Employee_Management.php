<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Employee_Management extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Employee_Management');  
    }

	public function index()
	{
        $employee_list = $this->M_Employee_Management->fetchEmployee();
        $access_role_list = $this->M_Employee_Management->fetchAccessRoles();  
        $employee_count = $this->M_Employee_Management->fetchEmployeeCount();
        $course_list = $this->M_Employee_Management->fetchCourse();
        $employee_user_id = $this->M_Employee_Management->fetchEmployeeID();

        $data = array(
            'employee_list'=> $employee_list,
            'employee_count'=> $employee_count,
            'access_role_list'=> $access_role_list,
            'course_list'=> $course_list,
            'employee_user_id' => $employee_user_id,
        );

		$this->load->view('V_Employee_Create', $data);
	}

	public function employeeCreate()
	{
        $employee_id = $this->input->post('employee_id');
        $access_role_id = $this->input->post('access_role_id');

        $employee_number = $this->input->post('employee_number');
        $first_name = $this->input->post('first_name');
        $middle_name = $this->input->post('middle_name');
        $last_name = $this->input->post('last_name');
        $course_id = $this->input->post('course_id');
        $password = md5($this->input->post('password'));

        $this->M_Employee_Management->employeeCreate($employee_id, $access_role_id, $password,$employee_number,$first_name,$middle_name,$last_name,$course_id);
        redirect(['C_Employee_Management/index']);
	}

    public function fetchUserID()
    {

    }
}
