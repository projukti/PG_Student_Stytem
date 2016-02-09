<?php
error_reporting(0);
Class result_search_model extends CI_Model
{
function __construct() {
parent::__construct();
}
function search_student($session,$sem){
$condition = "result.session ='".$session."' AND result.sem ='".$sem."' AND student_sem.session ='".$session."' AND student_sem.sem ='".$sem."'";
$this->db->select('student.*,student_sem.roll,student_sem.no');
$this->db->from('student');
$this->db->join('result', 'student.id = result.student_id');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
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
function search_student_all($session,$sem){
//$condition = "result.session ='".$session."' AND result.sem ='".$sem."' AND student_sem.status!='R'";
$condition = "student_sem.status !='R'";
$this->db->select('student.*,student_sem.roll,student_sem.no,student_sem.sem');
$this->db->from('student');
$this->db->join('result', 'student.id = result.student_id');
$this->db->join('student_sem', 'result.student_id = student_sem.student_id AND result.sem=student_sem.sem');
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
function session_year($session){
$condition = "session.id ='".$session."'";
$this->db->select('session.year_exam');
$this->db->from('session');
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
function subject_admit($sem){
$condition = "sem_no ='".$sem."'";
$this->db->select('*');
$this->db->from('subjects');
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
function sub_status($student_id,$subject_id,$session,$sem){
$condition = "student_id ='".$student_id."' AND subject_id ='".$subject_id."' AND session ='".$session."' AND sem ='".$sem."'";
$this->db->select('*');
$this->db->from('student_admit');
$this->db->where($condition);
$query = $this->db->get();
echo $this->db->last_query();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}
function std_result($student_id,$sem,$session){
$condition = "student_id ='".$student_id."' AND sem ='".$sem."' AND session ='".$session."'";
$this->db->select('*');
$this->db->from('result');
$this->db->where($condition);
$query = $this->db->get();
//echo $this->db->last_query();
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
}
?>