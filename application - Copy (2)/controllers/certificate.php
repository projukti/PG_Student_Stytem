<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class certificate extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('certificate_model');
 }

 function index()
 {
	 
	
	
	$id = $this->uri->segment(3);
   	 
	if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('marksheet', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 	 
   
 }
 
function certificate_details($id) {
$id = $this->uri->segment(3);
$data['student_details'] = $this->certificate_model->student_details($id);
$this->load->view('certificate', $data);
}
 
 
 
}

?>