<?php
Class print_student_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination


function student_details(){

$condition = "student_sem.status ='R'";
$this->db->select('student.*, student_sem.sem, student_sem.roll, student_sem.no, session.session_yr');
$this->db->from('student');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
$this->db->join('session', 'session.id = student.session');
$this->db->where($condition);
$query = $this->db->get();
$result = $query->result();
return $result;
}	

function record_count_m() {
$where = "sex = 'Male' and status='P'";	
$this->db->from('student');	
$this->db->where($where);
return $this->db->count_all_results();
}

function record_count_f() {
$where = "sex = 'Female' and status='P'";	
$this->db->from('student');	
$this->db->where($where);
return $this->db->count_all_results();
}

function record_count_t() {
$where = "sex = 'Transgender' and status='P'";	
$this->db->from('student');	
$this->db->where($where);
return $this->db->count_all_results();
}

function record_count_g() {
$where = "caste = 'GENERAL' and status='P'";	
$this->db->from('student');	
$this->db->where($where);
return $this->db->count_all_results();
}

function record_count_sc() {
$where = "caste = 'SC' and status='P'";	
$this->db->from('student');	
$this->db->where($where);
return $this->db->count_all_results();
}

function record_count_st() {
$where = "caste = 'ST' and status='P'";	
$this->db->from('student');	
$this->db->where($where);
return $this->db->count_all_results();
}

function record_count_oa() {
$where = "caste = 'OBC-A' and status='P'";	
$this->db->from('student');	
$this->db->where($where);
return $this->db->count_all_results();
}

function record_count_ob() {
$where = "caste = 'OBC-B' and status='P'";	
$this->db->from('student');	
$this->db->where($where);
return $this->db->count_all_results();
//echo $this->db->last_query();
}

function record_count_tt() {
$where = "status = 'P' ";	
$this->db->from('student');	
$this->db->where($where);
return $this->db->count_all_results();
//echo $this->db->last_query();
}

}
?>