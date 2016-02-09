<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class marksheet extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('marksheet_model');
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
 
function result_details($id) {
$id = $this->uri->segment(3);
$sem = $this->uri->segment(4);
$session = $this->uri->segment(5);
$data['student_details'] = $this->marksheet_model->student_details($id,$sem,$session);
$data['result_details'] = $this->marksheet_model->result_details($id,$sem,$session);
$data['result_total'] = $this->marksheet_model->result_total($id,$sem,$session);
$data['result_status'] = $this->marksheet_model->result_total($id,$sem,$session);
$data['result_final'] = $this->marksheet_model->result_final($id);
foreach ($data["student_details"] as $student_details) {
$clg_ref_no= $student_details->clg_ref_no;
}
foreach ($data["result_details"] as $res) {
$sem= $res->sem;
$year= $res->year;
$year_exam= $res->year_exam;
$id= $res->student_id;
//echo $data['ad_gen']=$this->admitcard_gen_model->admit_generation($sid);
}
if($sem=='1st'){$n=1;}if($sem=='2nd'){$n=2;}if($sem=='3rd'){$n=3;}if($sem=='4th'){$n=4;}
$data['sr_no']="0".$n."/".substr($year_exam,2);
$data['sem']=$sem;
$data['session']=$session;
$data['year']=$year;
$data['year_exam']=$year_exam;
$data['id']=$id;
$data['clg_ref_no']=$clg_ref_no;

$this->load->view('marksheet', $data);
}
 
 
 
}

?>