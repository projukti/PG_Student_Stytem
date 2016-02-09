<?php
Class viewexam_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination

// Count all record of table "contact_info" in database.
public function record_count() {
return $this->db->count_all("exam");
}

// Fetch data according to per_page limit.
public function fetch_data($limit,$id,$start) {
$this->db->limit($limit,$start);
$this->db->select('exam.*, session.session_yr, subjects.paper_name, subjects.paper_code');
$this->db->from('exam');
$this->db->join('session', 'exam.session = session.id');
$this->db->join('subjects', 'subjects.id = exam.paper_id');
$query = $this->db->get();	
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}
function search_exam_all($key){
$condition = "paper_name LIKE '%".$key."%' OR paper_code='".$key."' OR day='".$key."' OR date='".$key."'";
$this->db->select('exam.*, session.session_yr, subjects.paper_name, subjects.paper_code');
$this->db->from('exam');
$this->db->join('session', 'exam.session = session.id');
$this->db->join('subjects', 'subjects.id = exam.paper_id');
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
function search_exam_session($session){
$condition = "session ='".$session."'";
$this->db->select('exam.*, session.session_yr, subjects.paper_name, subjects.paper_code');
$this->db->from('exam');
$this->db->join('session', 'exam.session = session.id');
$this->db->join('subjects', 'subjects.id = exam.paper_id');
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
function search_exam_sem($sem){
$condition = "sem ='".$sem."'";
$this->db->select('exam.*, session.session_yr, subjects.paper_name, subjects.paper_code');
$this->db->from('exam');
$this->db->join('session', 'exam.session = session.id');
$this->db->join('subjects', 'subjects.id = exam.paper_id');
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
function studentac_session($id){
$condition = "exam.id ='".$id."'";	
$this->db->select('session.session_yr, session.id');
$this->db->from('session');
$this->db->join('exam', 'exam.session = session.id');
$this->db->where($condition);
$query = $this->db->get(); 
$result = $query->result();
return $result;	
}
function students_session(){
$query = $this->db->get('session');
$query_result = $query->result();
return $query_result;
}
function paper_code(){
$query = $this->db->get('subjects');
$query_result = $query->result();
return $query_result;
}
function show_exam_id($data){
/*$condition = "exam.id = '".$data."'";	
$this->db->select('exam.*,subjects.paper_name, subjects.paper_code  ');
$this->db->from('exam');
$this->db->join('subjects', 'subjects.id = exam.paper_id');
$this->db->where($condition);*/
$this->db->select('*');
$this->db->from('exam');
$this->db->where('id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}	
// Function to Delete selected record from table name students.
function delete_exam_id($id){
$this->db->where('id', $id);
$this->db->delete('exam');
}
// Update Query For Selected Student
function update_exam_id($id,$data){
$this->db->where('id', $id);
$this->db->update('exam', $data);
}


}
?>