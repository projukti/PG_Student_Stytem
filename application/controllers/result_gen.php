<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class result_gen extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('result_gen_model');
   $this->load->library('form_validation');	 
   $this->load->library('pagination');
 }
 
public function index(){ 	 
	 
if($this->session->userdata('logged_in'))
{	
$data['student_session'] = $this->result_gen_model->students_session();	
$this->load->view("result_gen",$data);
}
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 
}
function search_student_id() {
$data['student_session'] = $this->result_gen_model->students_session();	
$session = $this->input->post('session');
$sem = $this->input->post('sem');
$data['search_student'] = $this->result_gen_model->search_student($sem,$session);
$data['sem']=$sem;
$data['session']=$session;
$this->load->view('result_gen', $data);
}
function show_student_id() {
$data['current_session'] = $this->result_gen_model->current_session();		
$id = $this->uri->segment(3);
$sem = $this->uri->segment(4);
$session = $this->uri->segment(5);
$data['single_student'] = $this->result_gen_model->show_student_id($id,$sem,$session);
$data['student_subject'] = $this->result_gen_model->student_subject($id,$sem,$session);
//$data['student_session'] = $this->result_gen_model->students_session();
$this->load->view('result_gen', $data);
}
function show_result_id() {
$data['current_session'] = $this->result_gen_model->current_session();		
$id = $this->uri->segment(3);
$sem = $this->uri->segment(4);
$session = $this->uri->segment(5);
$data['show_result_id'] = $this->result_gen_model->show_student_id($id,$sem,$session);
$data['student_subject'] = $this->result_gen_model->student_subjecte($id,$sem,$session);
//$data['student_session'] = $this->result_gen_model->students_session();
$data['studentac_session'] = $this->result_gen_model->studentac_session();
$this->load->view('result_gen', $data);
}
function show_review_id() {
$data['current_session'] = $this->result_gen_model->current_session();		
$id = $this->uri->segment(3);
$sem = $this->uri->segment(4);
$session = $this->uri->segment(5);
$data['show_review_id'] = $this->result_gen_model->show_student_id($id,$sem,$session);
$data['student_subject'] = $this->result_gen_model->student_subjectr($id,$sem,$session);
$data['studentac_session'] = $this->result_gen_model->studentac_session();
//$data['student_session'] = $this->result_gen_model->students_session();
$this->load->view('result_gen', $data);
}
function show_review_marks() {
$data['current_session'] = $this->result_gen_model->current_session();		
$id = $this->uri->segment(3);
$sem = $this->uri->segment(4);
$session = $this->uri->segment(5);
$data['show_review_marks'] = $this->result_gen_model->show_student_id($id,$sem,$session);
$data['student_subject'] = $this->result_gen_model->student_subject_review($id,$sem,$session);
$data['studentac_session'] = $this->result_gen_model->studentac_session();
//$data['student_session'] = $this->result_gen_model->students_session();
$this->load->view('result_gen', $data);
}
function insert_result() {
 $this->result_gen_model->insert_result();
 $this->session->set_flashdata('message', 'Result Created Successfully.'); 
 redirect('result_gen', 'refresh');	
}
function insertexam_subject() {
 $this->result_gen_model->insert_review();	
 $this->session->set_flashdata('message', 'Review Created Successfully.'); 
 redirect('result_gen', 'refresh');	
}
function edit_result() {
 $this->result_gen_model->edit_result();
 $this->session->set_flashdata('message', 'Result Created Successfully.'); 
 redirect('result_gen', 'refresh');	
}
function review_result() {
 $this->result_gen_model->review_result();
 $this->session->set_flashdata('message', 'Result Created Successfully.'); 
 redirect('result_gen', 'refresh');	
}
}
?>