<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class result_search extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('result_search_model');
   $this->load->library('form_validation');	 
 }
 
public function index(){ 	 
	 
if($this->session->userdata('logged_in'))
{
$data['student_session'] = $this->result_search_model->students_session();	
$this->load->view("result_search",$data);
}
   else
   {
     redirect('login', 'refresh');
   } 
}
function search_student_tabulation() {
$data['student_session'] = $this->result_search_model->students_session();	
$session = $this->input->post('session');
$sem = $this->input->post('sem');
$data['search_student'] = $this->result_search_model->search_student($session,$sem);
$data['session_year'] = $this->result_search_model->session_year($session);
if(!empty($data['search_student'] )){
foreach ($data['search_student'] as $result)
{
	$student_id = $result->id;
	$data['subject_admit'] = $this->result_search_model->subject_admit($sem);
}}
$data['sem']=$sem;
$data['session']=$session;
$this->load->view('tabulationsheet', $data);
}
function search_student_result() {
$data['student_session'] = $this->result_search_model->students_session();	
$session = $this->input->post('session');
$sem = $this->input->post('sem');
$data['search_student'] = $this->result_search_model->search_student($session,$sem);
$data['session_year'] = $this->result_search_model->session_year($session);
if(!empty($data['search_student'] )){
foreach ($data['search_student'] as $result)
{
	$student_id = $result->id;
	$data['subject_admit'] = $this->result_search_model->subject_admit($sem);
	$data['std_result'] = $this->result_search_model->std_result($student_id,$sem,$session);
//	foreach ($data['subject_admit'] as $res)
//     {
////	$subject_id = $res->id;
////	$data['sub_status'] = $this->result_search_model->sub_status($student_id,$subject_id,$session,$sem);
//     }
}}
$data['sem']=$sem;
$data['session']=$session;
$this->load->view('resultsheet', $data);
}

function search_student_tabulationall() {
$data['student_session'] = $this->result_search_model->students_session();	
$session = $this->input->post('session');
//$sem = $this->input->post('sem');
$data['search_student'] = $this->result_search_model->search_student_all($session,$sem);
$data['session_year'] = $this->result_search_model->session_year($session);
if(!empty($data['search_student'] )){
foreach ($data['search_student'] as $result)
{
	$student_id = $result->id;
	$sem = $result->sem;
	$data['subject_admit'] = $this->result_search_model->subject_admit($sem);
}}
//$data['sem']=$sem;
$data['session']=$session;
$this->load->view('tabulationsheetall', $data);
}
}
?>