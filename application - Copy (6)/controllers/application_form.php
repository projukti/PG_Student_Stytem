<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class application_form extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('application_form_model');
 }

 function index()
 {
	
	
	
	$id = $this->uri->segment(3);
   	 
	if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('application_form', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 	 
   
 }
 
function card_details() {
$id = $this->uri->segment(3);
$sem = $this->uri->segment(4);

$data['card_details'] = $this->application_form_model->card_details($id,$sem);
$data['sem_details'] = $this->application_form_model->sem_details($id);
//$sub['sub_details'] = $this->application_form_model->sub_details($id);
$data['student_session'] = $this->application_form_model->students_session($id); 

foreach ($data["student_session"] as $res) {
$yr= $res->year;
}
$data['yr']=$yr;
$this->load->view('application_form', $data);
}
 
 /*function paper_code() {
	$id = $this->uri->segment(3);
	$data['paper_code'] = $this->addexam_model->paper_code($id); 
	$this->load->view('addexam', $data);
	}*/
 
}

?>