<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class attendance extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('attendance_model');
   $this->load->library('form_validation');	 
 }
 
public function index(){ 	 
	 
if($this->session->userdata('logged_in'))
{
$data['student_session'] = $this->attendance_model->students_session();	
$this->load->view("attendance",$data);
}
   else
   {
     redirect('login', 'refresh');
   } 
}
function search_student_id() {
$data['student_session'] = $this->attendance_model->students_session();	
$session = $this->input->post('session');
$sem = $this->input->post('sem');
$data['sub'] = $this->attendance_model->sub($sem);
$data['search_student'] = $this->attendance_model->search_student($session,$sem);
if(!empty($data['search_student'] )){
foreach ($data['search_student'] as $result)
{
	$student_id = $result->id;
	$data['subject_admit'] = $this->attendance_model->subject_admit($sem);
}}
$data['sem']=$sem;
$data['session']=$session;
$this->load->view('attendance_sheet', $data);
}
}
?>