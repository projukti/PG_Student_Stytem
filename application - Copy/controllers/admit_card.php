<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class admit_card extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('admit_card_model');
 }

 function index()
 {
	 
	
	
	$id = $this->uri->segment(3);
   	 
	if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('admit_card', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 	 
   
 }
 
 function card_details($id,$sm,$session) {
$id = $this->uri->segment(3);
$sm = $this->uri->segment(4);
$session = $this->uri->segment(5);
$data['student_details'] = $this->admit_card_model->student_details($id,$sm);
$data['exam_details'] = $this->admit_card_model->exam_details($id,$sm,$session);
foreach ($data["exam_details"] as $res) {
$sem= $res->sem;
$year= $res->year;
//echo $data['ad_gen']=$this->admitcard_gen_model->admit_generation($sid);
}
$data['sem']=$sem;
$data['year']=$year;


$this->load->view('admit_card', $data);
}
 
 
 
}

?>