<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Teacher_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(empty($_SESSION['employee_id'])){
            redirect('C_Employee_Login');
        }
        
        $this->load->model('M_Teacher_Dashboard');

    }

    public function index(){
        $employee_id = $this->session->userdata('employee_id');
        $teacher_info = $this->M_Teacher_Dashboard->fetchTeacherInfo($employee_id);
        $schedule_list = $this->M_Teacher_Dashboard->fetchTeacherScheduleList($employee_id);

        $data = array( 
            'teacher_info' => $teacher_info,
            'schedule_list' => $schedule_list 
        );
		$this->load->view('V_Teacher_Dashboard', $data); 
    }

    public function schedule(){

        $schedule_id = $this->input->get('schedule_id'); 
        $employee_id = $this->session->userdata('employee_id');
        
        $schedule_info = $this->M_Teacher_Dashboard->fetchTeacherSchedule($schedule_id);
        
        $teacher_info = $this->M_Teacher_Dashboard->fetchTeacherInfo($employee_id);
        $teacher_student_schedule_list = $this->M_Teacher_Dashboard->fetchTeacherStudentScheduleList($schedule_id);
        $grade_remarks_list = $this->M_Teacher_Dashboard->fetchGradeRemarksList();
		$data = array( 
            'teacher_info' => $teacher_info,
            'teacher_student_schedule_list' => $teacher_student_schedule_list,
            'grade_remarks_list' => $grade_remarks_list,
            'schedule_id'=> $schedule_id,
            'schedule_info'=> $schedule_info
        );
        
        

        $this->load->view('V_Teacher_Schedule', $data);
    }
    
    public function saveStudentGrade(){

        $student_schedule_id = $this->input->post('student_schedule_id');
        $prelim_grade = $this->input->post('prelim_grade');
        $midterm_grade = $this->input->post('midterm_grade');
        $final_grade = $this->input->post('final_grade');
        $grade = $this->input->post('grade');
        $grade_remarks_id = $this->input->post('grade_remarks_id');
        $schedule_id = $this->input->post('schedule_id');
    
        

        foreach($student_schedule_id as $key => $value){
            $grades = $prelim_grade[$key] *.30 + $midterm_grade[$key] *.30 + $final_grade[$key] *.40;
            if($grades >= 99){
                $result = 1;
            }
            else if($grades >= 96){
                $result = 1.25;
            }
            else if($grades >= 93){
                $result = 1.5;
            }
            else if($grades >= 90){
                $result = 1.75;
            }
            else if($grades >= 87){
                $result = 2.0;
            }
            else if($grades >= 84){
                $result = 2.25;
            }
            else if($grades >= 81){
                $result = 2.5;
            }
            else if($grades >= 78){
                $result = 2.75;
             }
            else if($grades >= 75){
                $result = 3.0;
            }
            else{
                $result = 5.0;
            }

            $remarks = $result;
            if($remarks <= 3.0){
                $description = 1; //1=pass
            }
            else{
                $description = 2; //2=fail
            }

            $batch_condition[] = array(
                'student_schedule_id'=> $value,
                'prelim_grade'=> $prelim_grade[$key] == 0 ? null : $prelim_grade[$key],
                'midterm_grade'=> $midterm_grade[$key] == 0 ? null : $midterm_grade[$key],
                'final_grade'=> $final_grade[$key] == 0 ? null : $final_grade[$key],
                'grade'=> $result,
                'grade_remarks_id'=> $description
            );
            
           
        }

        $this->M_Teacher_Dashboard->updateStudentGrade($batch_condition);
        redirect("/C_Teacher_Dashboard/schedule/?schedule_id=$schedule_id");
    }


    public function logout(){
        $this->session->unset_userdata('employee_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }
}