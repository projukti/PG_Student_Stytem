<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class admitcard_gen extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('admitcard_gen_model');
   $this->load->library('form_validation');	 
   $this->load->library('pagination');
 }
 
public function index(){ 	 
	 
if($this->session->userdata('logged_in'))
{
$data['student_session'] = $this->admitcard_gen_model->students_session();			
$config = array();
$config["base_url"] = base_url() . "index.php/admitcard_gen/index";
$total_row = $this->admitcard_gen_model->record_count();
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
$data["results"] = $this->admitcard_gen_model->fetch_data($config["per_page"], $page,$start);
if(!empty($data["results"])){
foreach ($data["results"] as $res) {
$sid= $res->id;
}
}
$str_links = $this->pagination->create_links();
$data["links"] = explode('&nbsp;',$str_links );

// View data according to array.
$this->load->view("admitcard_gen", $data);
}
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   } 
}
function search_student_id() {
$data['student_session'] = $this->admitcard_gen_model->students_session();	
$key = $this->input->post('key');
$session = $this->input->post('session');
$sem = $this->input->post('sem');
if(!empty($key)){$data['search_student'] = $this->admitcard_gen_model->search_student_all($key);}
if((!empty($session))&&(!empty($sem))){$data['search_student'] = $this->admitcard_gen_model->search_student($sem,$session);}
//if(!empty($session)){$data['search_student'] = $this->admitcard_gen_model->search_student_session($session);}
//if(!empty($sem)){$data['search_student'] = $this->admitcard_gen_model->search_student_sem($sem);}
$this->load->view('admitcard_gen', $data);
}


function show_student_id() {
$id = $this->uri->segment(3);
$sm = $this->uri->segment(4);
$ses = $this->uri->segment(5);
$data['single_student'] = $this->admitcard_gen_model->show_student_id($id,$sm);
$data['student_subject'] = $this->admitcard_gen_model->student_subject($id,$sm);
$data['student_session'] = $this->admitcard_gen_model->admit_session($ses);
$data['studentac_session'] = $this->admitcard_gen_model->studentac_session();

$this->load->view('admitcard_gen', $data);
}
function edit_admit_id() {
$id = $this->uri->segment(3);
$sm = $this->uri->segment(4);
$ses = $this->uri->segment(5);
$data['edit_student'] = $this->admitcard_gen_model->show_student_id($id,$sm);
$data['student_subject'] = $this->admitcard_gen_model->admit_subject($id,$sm,$ses);
$data['student_session'] = $this->admitcard_gen_model->admit_session($ses);
$data['studentac_session'] = $this->admitcard_gen_model->studentac_session();

$this->load->view('admitcard_gen', $data);
}

function insertexam_subject() {
	
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
   $this->form_validation->set_rules('session', 'Session', 'required|xss_clean');
   $this->form_validation->set_rules('subject_id', 'Subject', 'required|xss_clean');
   
   if ($this->form_validation->run() == FALSE) {
	   
	   $id = $this->input->post('id');
       $sm = $this->input->post('sem');
	   $ses = $this->input->post('ses');
       $data['single_student'] = $this->admitcard_gen_model->show_student_id($id,$sm);
$data['student_subject'] = $this->admitcard_gen_model->student_subject($id,$sm);
$data['student_session'] = $this->admitcard_gen_model->admit_session($ses);
$data['studentac_session'] = $this->admitcard_gen_model->studentac_session();
$this->load->view('admitcard_gen', $data);
	   
   } else {	
   $id = $this->input->post('id');
   $se = $this->input->post('sem');
   $ss = $this->input->post('session');
   $sb1 = $this->input->post('subject_id');
   $sb2 = $this->input->post('sub_id');
   $result = array_intersect($sb2, $sb1);
   $result2 = array_diff($sb2, $sb1);
   //print_r($result2);exit();
/////////////////////cretae admit///////////// 
   	foreach($result as $r){	 
	  $sta="Y";
	  $ex_sta="";
	  $data[] = array(
		'subject_id' => $r,
		'sem' => $this->input->post('sem'),
		'student_id'=> $this->input->post('id'),
		'session'=> $ss,
		'status'=>$sta,
		'result_status'=>$ex_sta

		);
	}
	

//	foreach($result2 as $r2){	 
//	  $sta="N";
//	  $ex_sta="NC";
//	  $data2[] = array(
//		'subject_id' => $r2,
//		'sem' => $this->input->post('sem'),
//		'student_id'=> $this->input->post('id'),
//		'session'=> $ss,
//		'status'=>$sta,
//		'result_status'=>$ex_sta
//
//		);
//	}
        
//print_r($data);  exit();
$this->admitcard_gen_model->insertexam_subject($data,$id,$se);

$this->admitcard_gen_model->up_admit($id,$se,$ss);

$this->admitcard_gen_model->up_student($id,$ss);


redirect('admit_card/card_details/'.$id.'/'.$se.'/'.$ss);


   }
}

function update_admit() {
	
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
   $this->form_validation->set_rules('session', 'Session', 'required|xss_clean');
   $this->form_validation->set_rules('subject_id', 'Subject', 'required|xss_clean');
   
   if ($this->form_validation->run() == FALSE) {
	   
	   $id = $this->input->post('id');
       $sm = $this->input->post('sem');
	   $ses = $this->input->post('ses');
       $data['edit_student'] = $this->admitcard_gen_model->show_student_id($id,$sm);
$data['student_subject'] = $this->admitcard_gen_model->admit_subject($id,$sm,$ses);
$data['student_session'] = $this->admitcard_gen_model->admit_session($ses);
$data['studentac_session'] = $this->admitcard_gen_model->studentac_session();

$this->load->view('admitcard_gen', $data);
	   
   } else {	
   $id = $this->input->post('id');
   $se = $this->input->post('sem');
   $ss = $this->input->post('session');
   $sb1 = $this->input->post('subject_id');
   $sb2 = $this->input->post('sub_id');
   $result = array_intersect($sb2, $sb1);
   $result2 = array_diff($sb2, $sb1);
	
	foreach($result as $r){	 
	$admitid=$r;
	  $sta="Y";
	  $ex_sta="";
	  $data = array(
		'session'=> $ss
		);
		$this->admitcard_gen_model->upexam_subject($data,$admitid);
	}
	//foreach($result2 as $r2){	 
//	  $sta="N";
//	  $ex_sta="NC";
//	  $data[] = array(
//		'subject_id' => $r2,
//		'sem' => $this->input->post('sem'),
//		'student_id'=> $this->input->post('id'),
//		'session'=> $ss,
//		'status'=>$sta,
//		'result_status'=>$ex_sta
//
//		);
//	}
        
//print_r($data);  
//exit();


$this->admitcard_gen_model->up_admit($id,$se,$ss);

$this->admitcard_gen_model->up_student($id,$ss);


redirect('admit_card/card_details/'.$id.'/'.$se.'/'.$ss);


   }
}
}

?>