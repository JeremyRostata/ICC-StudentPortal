<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Student_subject extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Student_subject'); 
    }

    public function index(){
        $student_id = $this->session->userdata('student_id');
        
        $student_info = $this->M_Student_subject->fetchStudentInfo($student_id);
        $student_subject = $this->M_Student_subject->fetchSubject($student_id);
        $Fsem1 = $this->M_Student_subject->fetchFsem1($student_id);
        $Fsem2 = $this->M_Student_subject->fetchFsem2($student_id);
        $Ssem1 = $this->M_Student_subject->fetchSsem1($student_id);
        $Ssem2 = $this->M_Student_subject->fetchSsem2($student_id);
        $Tsem1 = $this->M_Student_subject->fetchTsem1($student_id);
        $Tsem2 = $this->M_Student_subject->fetchTsem2($student_id);
        $Ftsem1 = $this->M_Student_subject->fetchFtsem1($student_id);
        $Ftsem2 = $this->M_Student_subject->fetchFtsem2($student_id);

        $data = array( 
            'student_info' => $student_info,
            'student_subject' => $student_subject,
            'Fsem1' => $Fsem1,
            'Fsem2' => $Fsem2,
            'Ssem1' => $Ssem1,
            'Ssem2' => $Ssem2,
            'Tsem1' => $Tsem1,
            'Tsem2' => $Tsem2,
            'Ftsem1' => $Ftsem1,
            'Ftsem2' => $Ftsem2
            
            
        );
        
		$this->load->view('V_Student_subject', $data);
    }


    

    public function logout(){
        $this->session->unset_userdata('student_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }
}