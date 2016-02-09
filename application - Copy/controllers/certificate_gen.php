<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class certificate_gen extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('certificate_gen_model');
   $this->load->library('form_validation');	 
   $this->load->library('pagination');
 }
 
public function index(){ 	 
	 
if($this->session->userdata('logged_in'))
{
$data['student_session'] = $this->certificate_gen_model->students_session();			
$config = array();
$config["base_url"] = base_url() . "index.php/certificate_gen/index";
$total_row = $this->certificate_gen_model->record_count();
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
$data["results"] = $this->certificate_gen_model->fetch_data($config["per_page"], $page,$start);
if(!empty($data["results"])){
foreach ($data["results"] as $res) {
$sid= $res->id;
//echo $data['ad_gen']=$this->result_gen_model->admit_generation($sid);
}}
//$data["ad_gen"] = $this->result_gen_model->admit_generation();
$str_links = $this->pagination->create_links();
$data["links"] = explode('&nbsp;',$str_links );

// View data according to array.
$this->load->view("certificate_gen", $data);
}
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 
}
function search_student_id() {
$data['student_session'] = $this->certificate_gen_model->students_session();	
$key = $this->input->post('key');
$session = $this->input->post('session');
$sem = $this->input->post('sem');
if(!empty($key)){$data['search_student'] = $this->certificate_gen_model->search_student_all($key);}
if(!empty($session)){$data['search_student'] = $this->certificate_gen_model->search_student_session($session);}
if(!empty($sem)){$data['search_student'] = $this->certificate_gen_model->search_student_sem($sem);}
$this->load->view('certificate_gen', $data);
}
function show_student_id() {
$id = $this->uri->segment(3);
$data['single_student'] = $this->certificate_gen_model->show_student_id($id);
$data['student_subject'] = $this->certificate_gen_model->student_subject($id);
//$data['student_session'] = $this->result_gen_model->students_session();
$this->load->view('certificate_gen', $data);
}

function insert_result() {
 $this->result_gen_model->insert_result();
 $this->session->set_flashdata('message', 'Result Created Successfully.'); 
 redirect('result_gen', 'refresh');	
}


}

?>