<?php
Class notice_model extends CI_Model
{
function __construct() {
parent::__construct();
}
function search_student($session,$sem){
if($sem=='O'){
$condition = "session ='".$session."' AND sem ='1st' OR sem='3rd'";
$this->db->select('exam.*, subjects.paper_code');
$this->db->from('exam');
$this->db->join('subjects', 'subjects.id = exam.paper_id');
$this->db->where($condition);
$query = $this->db->get();
}else{
$condition = "session ='".$session."' AND sem ='2nd' OR sem= '4th'";
$this->db->select('exam.*, subjects.paper_code');
$this->db->from('exam');
$this->db->join('subjects', 'subjects.id = exam.paper_id');
$this->db->where($condition);
$query = $this->db->get();
}
//echo $this->db->last_query();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}

function star_date($session,$sem){
if($sem=='O'){
$condition = "session ='".$session."' AND sem ='1st' OR sem='3rd' order by `exam`.`id` asc limit 1";
$this->db->select('exam.date');
$this->db->from('exam');
$this->db->where($condition);
$query = $this->db->get();
}else{
$condition = "session ='".$session."' AND sem ='2nd' OR sem= '4th' order by `exam`.`id` asc limit 1";
$this->db->select('exam.date');
$this->db->from('exam');
$this->db->where($condition);
$query = $this->db->get();
}
//echo $this->db->last_query();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}

/*function subject_admit($sem){
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
function sub_status($student_id,$subject_id,$session){
$condition = "student_id ='".$student_id."' AND subject_id ='".$subject_id."' AND session ='".$session."'";
$this->db->select('status');
$this->db->from('student_admit');
$this->db->where($condition);
$query = $this->db->get();
//echo $this->db->last_query();
if ($query->num_rows() > 0) {$status='Y';} else{$status='X';}
return $status;
}*/

function students_session(){
$query = $this->db->get('session');
$query_result = $query->result();
return $query_result;
}
}
?>