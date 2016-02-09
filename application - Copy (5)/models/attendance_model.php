<?php
Class attendance_model extends CI_Model
{
function __construct() {
parent::__construct();
}
function sub($sem){
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
function search_student($session,$sem){
$condition = "student_sem.sem ='".$sem."' AND student_sem.status='R'  AND student.exam_session='".$session."'";
$this->db->select('student.*,student_sem.roll,student_sem.no');
$this->db->from('student');
$this->db->join('student_sem','student.id=student_sem.student_id');
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
$condition = "student_id ='".$student_id."' AND sem ='".$sem."'";
$this->db->select('status');
$this->db->from('student_admit');
$this->db->where($condition);
$query = $this->db->get();
if ($query->num_rows() == 0) {$status='ADMIT NOT CREATED';return $status;} else{
$condition = "student_id ='".$student_id."' AND subject_id ='".$subject_id."' AND session ='".$session."' AND result_status!='C'";
$this->db->select('status');
$this->db->from('student_admit');
$this->db->where($condition);
$query = $this->db->get();
//echo $this->db->last_query();
if ($query->num_rows() > 0) {$status='Y';} else{$status='X';}
return $status;
}
}
function students_session(){
$condition = "active ='1'";	
$this->db->select('*');
$this->db->from('session');
$this->db->where($condition);
$query = $this->db->get();
$query_result = $query->result();
return $query_result;
}
}
?>