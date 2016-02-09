<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class viewstudent extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('viewstudent_model');
   $this->load->library('form_validation');	 
   $this->load->library('pagination');
 }
 
public function index(){ 	 
	 
if($this->session->userdata('logged_in'))
{
$data['student_session'] = $this->viewstudent_model->students_session();			
$config = array();
$config["base_url"] = base_url() . "index.php/viewstudent/index";
$total_row = $this->viewstudent_model->record_count();
$config["total_rows"] = $total_row;
$config["per_page"] = 50;
$config['use_page_numbers'] = TRUE;
$config['num_links'] = $total_row;
$config['cur_tag_open'] = '&nbsp;<a class="current">';
$config['cur_tag_close'] = '</a>';
$config['next_link'] = 'Next';
$config['prev_link'] = 'Previous';

$this->pagination->initialize($config);
if($this->uri->segment(3)){
$page = ($this->uri->segment(3)) ;
$limit=$config["per_page"];
$start = ($page - 1) * $limit;
}
else{
$page = 1;
$start=0;
}
$data["results"] = $this->viewstudent_model->fetch_data($config["per_page"], $page,$start);
$str_links = $this->pagination->create_links();
$data["links"] = explode('&nbsp;',$str_links );

// View data according to array.
$this->load->view("viewstudent", $data);
}
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 
}
function search_student_id() {
$data['student_session'] = $this->viewstudent_model->students_session();	
$key = $this->input->post('key');
$session = $this->input->post('session');
$sem = $this->input->post('sem');
if(!empty($key)){$data['search_student'] = $this->viewstudent_model->search_student_all($key);}
if(!empty($session)){$data['search_student'] = $this->viewstudent_model->search_student_session($session);}
if(!empty($sem)){$data['search_student'] = $this->viewstudent_model->search_student_sem($sem);}
$this->load->view('viewstudent', $data);
}
function delete_student() {
$id = $this->uri->segment(3);
$this->viewstudent_model->delete_student_id($id);
$this->session->set_flashdata('messagedel', 'Data Deleted Successfully.'); 
redirect('viewstudent', 'refresh');
}

function show_student_id() {
$id = $this->uri->segment(3);
$data['single_student'] = $this->viewstudent_model->show_student_id($id);
$data['student_session'] = $this->viewstudent_model->students_session();
$this->load->view('viewstudent', $data);
}

function update_student_id1() {
//$this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	
   $this->form_validation->set_rules('session', 'Session', 'required|xss_clean');
   $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
   //$this->form_validation->set_rules('roll', 'Roll', 'required|xss_clean');
   //$this->form_validation->set_rules('no', 'No', 'required|xss_clean');
   $this->form_validation->set_rules('clg_ref_no', 'College Ref No.', 'required|xss_clean');
   $this->form_validation->set_rules('cu_reg_no', 'C.U. Reg. No.', 'required|xss_clean');
   $this->form_validation->set_rules('phn', 'Contact No.', 'required|xss_clean|integer');
   $this->form_validation->set_rules('guardian_nm', 'Name', 'required|xss_clean');
   $this->form_validation->set_rules('dob', 'Date of Birth', 'required|xss_clean');
   $this->form_validation->set_rules('caste', 'Caste', 'required|xss_clean');
   $this->form_validation->set_rules('sex', 'Gender', 'required|xss_clean');
   $this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
   $this->form_validation->set_rules('last_exam', 'Last Exam', 'required|xss_clean');
   $this->form_validation->set_rules('last_exam_marks', 'Marks', 'required|integer|xss_clean');
   $this->form_validation->set_rules('last_exam_per', 'Percentage', 'required|decimal|xss_clean');
   $this->form_validation->set_rules('last_exam_yr', 'Passing Year', 'required|integer|xss_clean');
   $this->form_validation->set_rules('last_uni_nm', 'University Name', 'required|xss_clean');
    $this->form_validation->set_rules('email', 'Email', 'valid_email');
   
   if ($this->form_validation->run() == FALSE) {
	   $id= $this->input->post('id');
	   //$this->show_student_id($id);
       $data['single_student'] = $this->viewstudent_model->show_student_id($id);
       $data['student_session'] = $this->viewstudent_model->students_session();
       $this->load->view('viewstudent', $data);
   } else {	
$id= $this->input->post('id');

$ssn=$this->input->post('ssn');
$s=$this->input->post('sex');

if($this->input->post('caste')=="GENERAL"){$c="01";}
if($this->input->post('caste')=="SC"){$c="02";}
if($this->input->post('caste')=="ST"){$c="03";}
if($this->input->post('caste')=="OBC-A"){$c="04";}
if($this->input->post('caste')=="OBC-B"){$c="05";}

$no=$this->input->post('clg_ref_no');
$ses=$this->input->post('ses');
$gen=$this->input->post('gen');
$cat=$this->input->post('cat');

$clg_ref_no= $gen.$cat.$ses.$no;	 

$data = array(
'session' => strtoupper($this->input->post('session')),
'name' => strtoupper($this->input->post('name')),
//'roll' => $this->input->post('roll'),
//'no' => $this->input->post('no'),
'clg_ref_no' => $clg_ref_no,
'cu_reg_no' => $this->input->post('cu_reg_no'),
'phn' => $this->input->post('phn'),
'guardian_nm' => $this->input->post('guardian_nm'),
'dob' => $this->input->post('dob'),
'caste' => $this->input->post('caste'),
'sex' => $this->input->post('sex'),
'address' => $this->input->post('address'),
'last_exam' => $this->input->post('last_exam'),
'last_exam_marks' => $this->input->post('last_exam_marks'),
'last_exam_per' => $this->input->post('last_exam_per'),
'last_exam_yr' => $this->input->post('last_exam_yr'),
'last_uni_nm' => $this->input->post('last_uni_nm'),
'relation' => $this->input->post('relation'),
'landline' => $this->input->post('landline'),
'email' => $this->input->post('email'),
'last_college' => $this->input->post('last_college'),
'is_handicaped' => $this->input->post('is_handicaped')
);
$this->viewstudent_model->update_student_id1($id,$data);
$this->session->set_flashdata('messageup', 'Data Updated Successfully.'); 
redirect('viewstudent', 'refresh');
   }
}


}

?>