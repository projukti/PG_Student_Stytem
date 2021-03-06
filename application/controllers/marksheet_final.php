<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class marksheet_final extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('marksheet_final_model');
 }

 function index()
 {
	$id = $this->uri->segment(3);
   	 
	if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('marksheet_final', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 	 
   
 }
 
function result_details($id) {
$id = $this->uri->segment(3);
$data['student_details'] = $this->marksheet_final_model->student_details($id);
$data['result_details'] = $this->marksheet_final_model->result_details($id);
$data['result_total'] = $this->marksheet_final_model->result_total($id);
$data['result_status'] = $this->marksheet_final_model->result_total($id);
$data['result_final'] = $this->marksheet_final_model->result_final($id);
foreach ($data["student_details"] as $student_details) {
$clg_ref_no= $student_details->clg_ref_no;
}
foreach ($data["result_details"] as $res) {
$id= $res->student_id;
//echo $data['ad_gen']=$this->admitcard_gen_model->admit_generation($sid);
}
$data['id']=$id;
$data['clg_ref_no']=$clg_ref_no;

$this->load->view('marksheet_final', $data);
}
 
 
 
}

?>