<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class editaccount extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('editaccount_model');
   $this->load->library('form_validation');	 
 }
 
 public function index(){ 	 
  if($this->session->userdata('logged_in'))
   {
	 $data['username'] = $this->editaccount_model->username();  
     $this->load->view('editaccount',$data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 
}
public function update_account(){
$data['username'] = $this->editaccount_model->username();	
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
if ($this->form_validation->run() == FALSE) {
	$this->load->view('editaccount',$data);
   } else {
$id=$this->input->post('username');	   
$data = array(
'password' => $this->input->post('password'),
);

$this->editaccount_model->update_account($data,$id);
$this->session->set_flashdata('messageup', 'Account Updated Successfully.'); 
redirect('editaccount', 'refresh');
   }
}
}
?>