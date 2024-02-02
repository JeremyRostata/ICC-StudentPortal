<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Registrar_Profile extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(empty($_SESSION['employee_id'])){  
            redirect('C_Employee_Login'); 
        }
        
        $this->load->model('M_Registrar_Profile');    

    }

    public function index(){  
        
        $employee_id = $this->session->userdata('employee_id');
        $MIS_info = $this->M_Registrar_Profile->fetchMISInfo($employee_id);
        $role_list = $this->M_Registrar_Profile->fetchAccessRoleId($employee_id); 

        $data = array( 
            'MIS_info' => $MIS_info,
            'role_list'=> $role_list
        );
		$this->load->view('V_Registrar_Profile', $data); 
    }

    public function changePass(){
        $employee_id = $this->session->userdata('employee_id');
        $password = md5($this->input->post('password'));
        $this->M_Registrar_Profile->changePass($password,$employee_id);
        redirect(['C_Registrar_Profile/index']);
    }

    public function resetPass(){
        $employee_id = $this->session->userdata('employee_id');
        $password = md5($this->input->post('password'));
        $this->M_Registrar_Profile->resetPass($password,$employee_id);
        redirect(['C_Registrar_Profile/index']);
    }

    public function imageUpload(){
        $employee_id = $this->session->userdata('employee_id');
        $img_name = $_FILES['profile_pic']['name'];
        $tmp_name = $_FILES['profile_pic']['tmp_name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);
        $new_img_name = $employee_id.'.'.$img_ex_to_lc;
        $img_upload_path = 'images/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
        // $new_img_name = $_FILES['profile_pic']['tmp_name'];

        $this->M_Registrar_Profile->imageUpload($employee_id,$new_img_name);
        redirect(['C_Registrar_Profile/index']);
    }

    public function logout(){
        $this->session->unset_userdata('employee_id');
        redirect(['C_Employee_Login']); 
    }
}