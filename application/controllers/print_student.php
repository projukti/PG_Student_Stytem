<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class print_student extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('print_student_model');
 }

 function index()
 {
	 
	
	
	$id = $this->uri->segment(3);
   	 
	if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('print_student', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 	 
   
 }
 
 function student_details() {
$data['student_details'] = $this->print_student_model->student_details();
//echo $data['ad_gen']=$this->admitcard_gen_model->admit_generation($sid);
$data['count_m'] = $this->print_student_model->record_count_m();
$data['count_f'] = $this->print_student_model->record_count_f();
$data['count_t'] = $this->print_student_model->record_count_t();
$data['count_g'] = $this->print_student_model->record_count_g();
$data['count_sc'] = $this->print_student_model->record_count_sc();
$data['count_st'] = $this->print_student_model->record_count_st();
$data['count_oa'] = $this->print_student_model->record_count_oa();
$data['count_ob'] = $this->print_student_model->record_count_ob();
$data['count_tt'] = $this->print_student_model->record_count_tt();




$this->load->view('print_student', $data);
}
 
 
 
}

?>