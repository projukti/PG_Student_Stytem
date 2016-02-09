<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class addexam extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('addexam_model');
 }

 function index()
 {
	$data['student_session'] = $this->addexam_model->students_session(); 
	$data['paper_code'] = $this->addexam_model->paper_code(); 
	
	$id = $this->uri->segment(3);
	
   $this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	
	$this->form_validation->set_rules('session', 'Session', 'required|xss_clean');
   $this->form_validation->set_rules('dob', 'Date', 'required|xss_clean');
   //$this->form_validation->set_rules('day', 'Day', 'required|xss_clean');
   $this->form_validation->set_rules('from_tm', 'From time', 'required|xss_clean');
   $this->form_validation->set_rules('to_tm', 'To Time', 'required|xss_clean');
   $this->form_validation->set_rules('sem', 'Sem No', 'required|xss_clean');
   $this->form_validation->set_rules('paper_code', 'Paper Code', 'required|xss_clean|integer');
   //$this->form_validation->set_rules('paper_name', 'Paper Name', 'required|xss_clean');
  
  
   if ($this->form_validation->run() == FALSE) {
   } else {
$count_exam=$this->db->query("select * from exam where session='".$this->input->post('session')."' and sem='".$this->input->post('sem')."' and paper_id='".$this->input->post('paper_code')."'")->num_rows();	 
if($count_exam==0){	   
	   $day= date("l",strtotime($this->input->post('dob')));
$data = array(
'session' => strtoupper($this->input->post('session')),
'date' => $this->input->post('dob'),
'day' => strtoupper($day),
'from_tm' => $this->input->post('from_tm'),
'to_tm' => $this->input->post('to_tm'),
'sem' => $this->input->post('sem'),
'paper_id' => $this->input->post('paper_code'),
//'paper_name' => $this->input->post('paper_name')
);
//Transfering data to Model
$this->addexam_model->insertexam($data);
$this->session->set_flashdata('messagein', 'Data Inserted Successfully'); 
redirect('viewexam', 'refresh');
//$this->load->view('addexam', $data);
}
else{$this->session->set_flashdata('messageerr', 'Sorry Data Already Found with given input'); }
redirect('addexam', 'refresh');} 
	if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('addexam', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 	 
   
 }
 
 public function ajax_state_list($country_id)
    {
        $this->load->helper('url');
        $this->load->model('addexam_model');
        $data['state'] = $this->addexam_model->getstate($country_id);
        $this->load->view('addexam/ajax_get_state',$data);
    }
 
 /*function paper_code() {
	$id = $this->uri->segment(3);
	$data['paper_code'] = $this->addexam_model->paper_code($id); 
	$this->load->view('addexam', $data);
	}*/
 
}

?>