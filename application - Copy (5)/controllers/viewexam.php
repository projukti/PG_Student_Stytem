<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class viewexam extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('viewexam_model');
   $this->load->library('form_validation');	 
   $this->load->library('pagination');
 }
 
 public function index(){ 	 
	 
if($this->session->userdata('logged_in'))
{
$data['student_session'] = $this->viewexam_model->students_session();	
$config = array();
$config["base_url"] = base_url() . "index.php/viewexam/index";
$total_row = $this->viewexam_model->record_count();
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
$data["results"] = $this->viewexam_model->fetch_data($config["per_page"], $page,$start);
$str_links = $this->pagination->create_links();
$data["links"] = explode('&nbsp;',$str_links );

// View data according to array.
$this->load->view("viewexam", $data);
}
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 
}
function search_exam_id() {
$data['student_session'] = $this->viewexam_model->students_session();	
$key = $this->input->post('key');
$session = $this->input->post('session');
$sem = $this->input->post('sem');
if(!empty($key)){$data['search_exam'] = $this->viewexam_model->search_exam_all($key);}
if(!empty($session)){$data['search_exam'] = $this->viewexam_model->search_exam_session($session);}
if(!empty($sem)){$data['search_exam'] = $this->viewexam_model->search_exam_sem($sem);}
$this->load->view('viewexam', $data);
} 
function delete_exam() {
$id = $this->uri->segment(3);
$this->viewexam_model->delete_exam_id($id);
$this->session->set_flashdata('messagedel', 'Data Deleted Successfully.'); 
redirect('viewexam', 'refresh');
}

function show_exam_id() {
$id = $this->uri->segment(3);
$data['single_exam'] = $this->viewexam_model->show_exam_id($id);
$data['studentac_session'] = $this->viewexam_model->studentac_session($id);
$data['student_session'] = $this->viewexam_model->students_session();
$data['paper_code'] = $this->viewexam_model->paper_code(); 
$this->load->view('viewexam', $data);
}

function update_exam_id() {
//$this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	
	$this->form_validation->set_rules('session', 'Session', 'required|xss_clean');
   $this->form_validation->set_rules('dob', 'Date', 'required|xss_clean');
  // $this->form_validation->set_rules('day', 'Day', 'required|xss_clean');
   $this->form_validation->set_rules('from_tm', 'From time', 'required|xss_clean');
   $this->form_validation->set_rules('to_tm', 'To Time', 'required|xss_clean');
   $this->form_validation->set_rules('sem', 'Sem No', 'required|xss_clean');
   $this->form_validation->set_rules('paper_code', 'Paper Code', 'required|xss_clean|');
   //$this->form_validation->set_rules('paper_name', 'Paper Name', 'required|xss_clean');
   
   if ($this->form_validation->run() == FALSE) {
/*	   $id= $this->input->post('id');
	   $data['paper_code'] = $this->viewexam_model->paper_code(); 
	   $this->show_exam_id($id);*/
	   $id= $this->input->post('id');
       $data['single_exam'] = $this->viewexam_model->show_exam_id($id);
       $data['student_session'] = $this->viewexam_model->students_session($id);
       $data['paper_code'] = $this->viewexam_model->paper_code(); 
	   
       $this->load->view('viewexam', $data);
   } else {	
$id= $this->input->post('id');
$day= date("l",strtotime($this->input->post('dob')));

$data = array(
'session' => strtoupper($this->input->post('session')),
'date' => strtoupper($this->input->post('dob')),
'day' => strtoupper($day),
'from_tm' => $this->input->post('from_tm'),
'to_tm' => $this->input->post('to_tm'),
'sem' => $this->input->post('sem'),
'paper_id' => $this->input->post('paper_code'),
//'paper_name' => $this->input->post('paper_name')
);

$this->viewexam_model->update_exam_id($id,$data);
$this->session->set_flashdata('messageup', 'Data Updated Successfully.'); 
redirect('viewexam', 'refresh');
   }
}


}

?>