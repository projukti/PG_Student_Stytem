<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class signature_copy extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('signature_copy_model');
 }

 function index()
 {
	 
	
	
	$id = $this->uri->segment(3);
   	 
	if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('signature_copy', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 	 
   
 }
 
function show_student($id) {
$data['show_student'] = $this->signature_copy_model->show_student($id);
$data['exam_details'] = $this->signature_copy_model->exam_details($id);

foreach ($data["exam_details"] as $res) {
$paper_code= $res->paper_code;
$paper_name= $res->paper_name;
$date= $res->date;
$sem= $res->sem;
//echo $data['ad_gen']=$this->admitcard_gen_model->admit_generation($sid);
}
$data['paper_code']=$paper_code;
$data['paper_name']=$paper_name;
$data['date']=$date;
$data['sem']=$sem;

$this->load->view('signature_copy', $data);
}

}
 
 
 


?>