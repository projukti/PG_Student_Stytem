<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $password);
   $cur_session = $this->user->session();
   
   if($cur_session)
   {
	 foreach($cur_session as $cur_session)
     {
		 $year=$cur_session->year; 
		 date_default_timezone_set("Asia/Kolkata"); 
         
		 if(date('m')>=8){
		 if($year!=date('Y'))
		   {
			   $session_yr=date('Y')."-".date('Y', strtotime('+1 year'));
			   $year_exam=date('Y', strtotime('+1 year'));
			   $data = array(
               'year' => date('Y'),
			   'year_exam' => $year_exam,
			   'active' => 1,
               'session_yr' => $session_yr
                );
				$dataup = array(
			   'active' => 0
                );
         $this->user->insertsession($data,$dataup);
		   }
		 }
	 }
   }
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username,
		 'access' => $row->access
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>