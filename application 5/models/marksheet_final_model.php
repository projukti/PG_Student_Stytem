<?php
Class marksheet_final_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination


function student_details($data){
$condition = "student.id ='".$data."' and student_sem.sem='4th'";		
$this->db->select('student.*,student_sem.roll,student_sem.no');
$this->db->from('student');
$this->db->join('student_sem', 'student_sem.student_id = student.id');
$this->db->where($condition );
$query = $this->db->get();
$result = $query->result();
return $result;
$this->students_session($result->session);
$query = $this->db->get();
}	


function result_details($data){
$condition = "student_sem.student_id ='".$data."' AND student_sem.sem='4th' and student_admit.sem='4th'";	
$this->db->select('subjects.paper_code, subjects.paper_name, subjects.paper_marks, student_admit.*,session.year, student_sem.sem');
$this->db->from('student_admit');
$this->db->join('subjects', 'subjects.id = student_admit.subject_id');
$this->db->join('student_sem', 'student_sem.student_id = student_admit.student_id');
$this->db->join('session', 'session.id = student_admit.session');
$this->db->where($condition );
$query = $this->db->get();
$result = $query->result();
//echo $this->db->last_query();
return $result;
$this->students_session($result->session);

$query = $this->db->get();
}

function result_details1($data){
$condition = "student_sem.student_id ='".$data."' AND student_admit.disposed!='Yes' AND student_admit.sem='1st' AND student_sem.status='Q'";	
$this->db->select("subjects.paper_code, subjects.paper_name, subjects.paper_marks, student_admit.*,session.year, student_sem.sem,student_admit.disposed");
$this->db->from('student_admit');
$this->db->join('subjects', 'subjects.id = student_admit.subject_id');
$this->db->join('student_sem', 'student_sem.student_id = student_admit.student_id');
$this->db->join('session', 'session.id = student_admit.session');
$this->db->where($condition );
$query = $this->db->get();
$result = $query->result();
//echo $this->db->last_query();
return $result;
$this->students_session($result->session);

$query = $this->db->get();
}	

function result_total($data){
$condition = "result.student_id ='".$data."'";	
$this->db->select('result.*');
$this->db->from('result');
$this->db->join('session', 'session.id = result.session');
$this->db->where($condition );
$query = $this->db->get();
$result = $query->result();
//echo $this->db->last_query();
return $result;
$this->students_session($result->session);

$query = $this->db->get();
}
function result_final($data){
$condition = "result_final.student_id ='".$data."'";	
$this->db->select('result_final.*');
$this->db->from('result_final');
$this->db->where($condition );
$query = $this->db->get();
$result = $query->result();
//echo $this->db->last_query();
return $result;
$this->students_session($result->session);

$query = $this->db->get();
}
function result_semi($id,$sub,$s){
$condition = "student_sem.student_id ='".$id."' and student_admit.sem='".$s."' and student_admit.disposed!='Yes' and student_admit.subject_id='".$sub."'";	
$this->db->select('student_admit.*');
$this->db->from('student_admit');
$this->db->join('student_sem', 'student_sem.student_id = student_admit.student_id');
$this->db->join('session', 'session.id = student_admit.session');
$this->db->where($condition );
$query = $this->db->get();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
$total=$row->total_marks;
}
return $total;
}
else{$total=0;return $total;}
}
function result_i($id,$s){
$condition = "student_sem.student_id ='".$id."' and result.sem='".$s."' and result.disposed!='Yes'";	
$this->db->select('result.*');
$this->db->from('result');
$this->db->join('student_sem', 'student_sem.student_id = result.student_id');
//$this->db->join('session', 'session.id = result.session');
$this->db->where($condition );
$query = $this->db->get();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
$total=$row->total;
}
return $total;
}
else{$total=0;return $total;}
}
}
?>