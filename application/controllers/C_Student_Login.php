<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Student_Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(!empty($_SESSION['student_id'])){
            redirect('/C_Student_Dashboard/index');
        }elseif(!empty($_SESSION['employee_id'])){
            if($_SESSION['access_role_id'] == TEACHER_ACCESS){
                redirect('/C_Teacher_Dashboard/index');
            }
        }

        $this->load->model('M_Student_Login');
    }


	public function index()
	{
        $message = $this->session->flashdata('message');
        if(!empty($message)){
            $data = array(
                'message' => $message
            );
            $this->load->view('V_Student_Login', $data);
        } else {
            $this->load->view('V_Student_Login');
        }

	}

	public function studentLogin()
	{
        $student_number = $this->input->post('student_number');
        $password = md5($this->input->post('password'));

        $student_id = $this->M_Student_Login->fetchStudentId($student_number, $password);
        
        if(!empty($student_id)){
            $_SESSION['student_id'] = $student_id;
            redirect('C_Student_subject /index');
        } else{
            $this->session->set_flashdata('message','Incorrect login and password');
            redirect('C_Student_Login/index'); 
        }
	}
}