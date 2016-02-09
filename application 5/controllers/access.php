<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class access extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('access_model');
   $this->load->library('form_validation');	 
   $this->load->library('pagination');
 }
 
public function index(){ 	 
	 
if($this->session->userdata('logged_in'))
{		
$data["results"] = $this->access_model->fetch_data();
$this->load->view("access", $data);
}
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 
}
function block() {
$id = $this->uri->segment(3);
$a = $this->uri->segment(4);
if($a==1){$block=0;}else{$block=1;}
$data = array(
'block' => $block,
);
$this->access_model->block_id($id,$data);
$this->session->set_flashdata('messageup', 'Data Updated Successfully.'); 
redirect('access', 'refresh');
}

}

?>