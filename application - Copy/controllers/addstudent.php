<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class addstudent extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('addstudent_model');
 }

 function index()
 {
   $data['student_session'] = $this->addstudent_model->students_session(); 
   $this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	
   $this->form_validation->set_rules('session', 'Session', 'required|xss_clean');
   $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
   //$this->form_validation->set_rules('roll', 'Roll', 'required|xss_clean');
   //$this->form_validation->set_rules('no', 'No', 'required|xss_clean');
   $this->form_validation->set_rules('clg_ref_no', 'College Ref No.', 'required|xss_clean');
   $this->form_validation->set_rules('cu_reg_no', 'C.U. Reg. No.', 'required|xss_clean');
   $this->form_validation->set_rules('phn', 'Contact No.', 'required|xss_clean|integer');
   $this->form_validation->set_rules('guardian_nm', 'Name', 'required|xss_clean');
   $this->form_validation->set_rules('dob', 'Date', 'required|xss_clean');
   $this->form_validation->set_rules('caste', 'Caste', 'required|xss_clean');
   $this->form_validation->set_rules('sex', 'Gender', 'required|xss_clean');
   $this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
   $this->form_validation->set_rules('last_exam', 'Last Exam', 'required|xss_clean');
   $this->form_validation->set_rules('last_exam_marks', 'Marks', 'required|integer|xss_clean');
   $this->form_validation->set_rules('last_exam_per', 'Percentage', 'required|decimal|xss_clean');
   $this->form_validation->set_rules('last_exam_yr', 'Passing Year', 'required|integer|xss_clean');
   $this->form_validation->set_rules('last_uni_nm', 'University Name', 'required|xss_clean');
   $this->form_validation->set_rules('email', 'Email', 'valid_email');
  
   if ($this->form_validation->run() == FALSE) {
	   
   } else {
	   
$count_st = $this->addstudent_model->record_count_st();
$rno= sprintf("%'.03d\n", $count_st); 


$session=$this->input->post('session');	
$data['ses']=$this->addstudent_model->getsession($session);
$sesad=$this->addstudent_model->getsessionad($session);
$roll="12".substr($data['ses'],2);
$ssn=$this->input->post('ssn');
$s=$this->input->post('sex');

if($this->input->post('caste')=="GENERAL"){$c="01";}
if($this->input->post('caste')=="SC"){$c="02";}
if($this->input->post('caste')=="ST"){$c="03";}
if($this->input->post('caste')=="OBC-A"){$c="04";}
if($this->input->post('caste')=="OBC-B"){$c="05";}

$no=$this->input->post('clg_ref_no');

$clg_ref_no= $s[0]."/".$c."/".$sesad."/".$no;
	   
$data = array(
'session' => $this->input->post('session'),
'name' => strtoupper($this->input->post('name')),
'clg_ref_no' => $clg_ref_no,
//'clg_ref_no' => $this->input->post('clg_ref_no'),
'cu_reg_no' => $this->input->post('cu_reg_no'),
'phn' => $this->input->post('phn'),
'guardian_nm' => $this->input->post('guardian_nm'),
'dob' => $this->input->post('dob'),
'caste' => $this->input->post('caste'),
'sex' => $this->input->post('sex'),
'address' => $this->input->post('address'),
'last_exam' => $this->input->post('last_exam'),
'last_exam_marks' => $this->input->post('last_exam_marks'),
'last_exam_per' => $this->input->post('last_exam_per'),
'last_exam_yr' => $this->input->post('last_exam_yr'),
'last_uni_nm' => $this->input->post('last_uni_nm'),
'relation' => $this->input->post('relation'),
'landline' => $this->input->post('landline'),
'email' => $this->input->post('email'),
'last_college' => $this->input->post('last_college'),
'is_handicaped' => $this->input->post('is_handicaped')
);
//Transfering data to Model

$this->addstudent_model->insertstudent($data,$session,$roll,$rno);
$data['message'] = 'Data Inserted Successfully';
}	 
	if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $data['access'] = $session_data['access'];
	 $access=$data['access'];
	 $data['student_session'] = $this->addstudent_model->students_session();
	 $data['crntssn'] = $this->addstudent_model->crntssn(); 
     $this->load->view('addstudent', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 	 
   
 }
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>