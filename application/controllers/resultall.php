<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class resultall extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('resultall_model');
   $this->load->library('form_validation');	 
 }
 
public function index(){ 	 
	 
if($this->session->userdata('logged_in'))
{
}
   else
   {
     redirect('login', 'refresh');
   } 
}
function search_student_result() {
$data['student_session'] = $this->resultall_model->students_session();	
$id = $this->uri->segment(3);
$data['search_student'] = $this->resultall_model->search_student($id);
$data['search_result'] = $this->resultall_model->search_result($id);
$data['session_year'] = $this->resultall_model->session_year($session);
if(!empty($data['search_result'] )){
foreach ($data['search_result'] as $result)
{

	$session = $result->session;
	$sem = $result->sem;
	$data['subject_admit'] = $this->resultall_model->subject_admit($sem);
	$data['std_result'] = $this->resultall_model->std_result($id,$sem,$session);
}
}
//$data['sem']=$sem;
$data['session']=$session;
$this->load->view('resultall', $data);
}
}
?>