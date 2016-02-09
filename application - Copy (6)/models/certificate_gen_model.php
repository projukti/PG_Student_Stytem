<?php
Class certificate_gen_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination

// Count all record of table "contact_info" in database.
public function record_count() {
return $this->db->count_all('result_final');
}

// Fetch data according to per_page limit.
public function fetch_data($limit,$id,$start) {
$this->db->limit($limit,$start);
$this->db->select('student.*,session.session_yr');
$this->db->from('student');
$this->db->join('result_final', 'result_final.student_id = student.id');
$this->db->join('session','session.id=student.session');
$query = $this->db->get();	
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
//$sid= $row->id;
//$this->result_gen_model->result_generation($sid);
$data[] = $row;
}
return $data;
}
return false;
}

function certificate_generation($sid){
if(!empty($sid)){	
$condition = "student_sem.student_id ='".$sid."' and student_sem.status='R'";	
$this->db->select('student_admit.*');
$this->db->from('student_admit');
$this->db->join('student_sem', 'student_sem.student_id = student_admit.student_id');
$this->db->where($condition);
$query = $this->db->get();
foreach ($query->result() as $row) {
$result_status= $row->result_status;
//echo $this->db->last_query();
if (!empty($result_status)) {
$ad='Y';
}else{
$ad='N';	
}
return $ad;
}

}
}

function search_student_all($key){
$condition = "name LIKE '%".$key."%' OR clg_ref_no='".$key."' OR cu_reg_no='".$key."' OR phn='".$key."'";
$this->db->select('student.*,session.session_yr');
$this->db->from('student');
$this->db->join('result_final', 'result_final.student_id = student.id');
$this->db->join('session','session.id=student.session');
$this->db->where($condition);
$query = $this->db->get();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}
function search_student_session($session){
$condition = "session ='".$session."'";
$this->db->select('student.*,session.session_yr');
$this->db->from('student');
$this->db->join('result_final', 'result_final.student_id = student.id');
$this->db->join('session','session.id=student.session');
$this->db->where($condition);
$query = $this->db->get();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}
function search_student_sem($sem){
$condition = "student_sem.sem ='".$sem."' AND student_sem.status!='Q'";
$this->db->select('student.*,session.session_yr');
$this->db->from('student');
$this->db->join('student_sem','student.id=student_sem.student_id');
$this->db->join('result_final', 'result_final.student_id = student.id');
$this->db->join('session','session.id=student.session');
$this->db->where($condition);
$query = $this->db->get();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}
function students_session(){
$query = $this->db->get('session');
$query_result = $query->result();
return $query_result;
}
function show_student_id($data){
$this->db->select('*');
$this->db->from('student');
$this->db->where('id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}	

function student_subject($data){
$condition = "student_admit.student_id ='".$data."' and student_sem.student_id ='".$data."' and student_sem.status='R'";	
$this->db->select('student_admit.*,subjects.paper_name');
$this->db->from('student_admit');
$this->db->join('student_sem', 'student_sem.sem = student_admit.sem');
$this->db->join('subjects', 'student_admit.subject_id = subjects.id');
$this->db->where($condition);
$query = $this->db->get(); 
$result = $query->result();
return $result;
}
}
?>