<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Student_Profile extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(empty($_SESSION['student_id'])){   
            redirect('C_Student_Login'); 
        }
        
        $this->load->model('M_Student_Profile');    

    }

    public function index(){ 
        
        $student_id = $this->session->userdata('student_id');
        $MIS_info = $this->M_Student_Profile->fetchMISInfo($student_id);
        

        $data = array( 
            'MIS_info' => $MIS_info
            
        );
		$this->load->view('V_Student_Profile', $data); 
    }

    public function changePass(){
        $student_id = $this->session->userdata('student_id');
        $password = md5($this->input->post('password'));
        $this->M_Student_Profile->changePass($password,$student_id);
        redirect(['C_Student_Profile/index']);
    }

    public function resetPass(){
        $student_id = $this->session->userdata('student_id');
        $password = md5($this->input->post('password'));
        $this->M_Student_Profile->resetPass($password,$student_id);
        redirect(['C_Student_Profile/index']);
    }

    public function imageUpload(){
        $student_id = $this->session->userdata('student_id');
        $img_name = $_FILES['profile_pic']['name'];
        $tmp_name = $_FILES['profile_pic']['tmp_name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);
        $new_img_name = $student_id.'.'.$img_ex_to_lc;
        $img_upload_path = 'images/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
        // $new_img_name = $_FILES['profile_pic']['tmp_name'];

        $this->M_Student_Profile->imageUpload($student_id,$new_img_name);
        redirect(['C_Student_Profile/index']);
    }

    public function logout(){
        $this->session->unset_userdata('student_id');
        redirect(['C_Student_Login']); 
    }
}