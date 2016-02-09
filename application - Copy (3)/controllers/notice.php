<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class notice extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('notice_model');
   $this->load->library('form_validation');	 
 }
 
public function index(){ 	 
	 
if($this->session->userdata('logged_in'))
{
$data['student_session'] = $this->notice_model->students_session();	
$this->load->view("notice",$data);
}
   else
   {
     redirect('login', 'refresh');
   } 
}
function search_student_id() {
	
$data['student_session'] = $this->notice_model->students_session();	
$session = $this->input->post('session');
$sem = $this->input->post('sem');
$msg = $this->input->post('msg');

$data['star_date'] = $this->notice_model->star_date($session,$sem);
if(!empty($data["star_date"])){
foreach ($data["star_date"] as $res) {					
$dt1= $res->date;
}
}
$data['search_student'] = $this->notice_model->search_student($session,$sem,$msg);
$i=0;
if(!empty($data["search_student"])){
foreach ($data["search_student"] as $res) {					
$date= $res->date;
}

$data['msg']=$msg;
$data['dt1']=$dt1;
$data['date']=$date;
$data['sem']=$sem;
$data['session']=$session;

$this->load->view('exam_notice', $data);
}else{
	$this->session->set_flashdata('messagef', 'Data Not Found.'); 
redirect('notice', 'refresh');

}
}
}
?>