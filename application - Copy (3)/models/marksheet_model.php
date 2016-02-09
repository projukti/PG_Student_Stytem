<?php
Class marksheet_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination


function student_details($data,$sem,$session){
$condition = "student.id ='".$data."' and student_sem.sem='".$sem."' and student_sem.session='".$session."'";		
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


function result_details($data,$sem,$session){
$condition = "student_sem.student_id ='".$data."' and student_sem.sem='".$sem."' and student_sem.session='".$session."' and student_admit.sem='".$sem."' and student_admit.session='".$session."'";	
$this->db->select('subjects.paper_code, subjects.paper_name, subjects.paper_marks, student_admit.*,session.year,session.year_exam, student_sem.sem,student_sem.roll,student_sem.no');
$this->db->from('student_admit');
$this->db->join('subjects', 'subjects.id = student_admit.subject_id');
//$this->db->join('exam', 'exam.paper_id = student_admit.subject_id');
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

function result_total($data,$sem,$session){
$condition = "result.student_id ='".$data."' and result.sem='".$sem."' and result.session='".$session."' and result.disposed!='Yes'";	
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
function result_i($id,$s,$session){
$condition = "student_sem.student_id ='".$id."' and result.sem='".$s."' and result.session='".$session."'";	
$this->db->select('result.*');
$this->db->from('result');
$this->db->join('student_sem', 'student_sem.student_id = result.student_id');
$this->db->join('session', 'session.id = result.session');
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