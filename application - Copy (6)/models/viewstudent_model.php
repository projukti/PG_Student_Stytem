<?php
Class viewstudent_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination

// Count all record of table "contact_info" in database.
public function record_count() {
return $this->db->count_all("student");
}

// Fetch data according to per_page limit.
public function fetch_data($limit,$id,$start) {
$this->db->limit($limit,$start);
$condition = "student_sem.status ='R'";
$this->db->select('student.*, student_sem.sem, student_sem.roll, student_sem.no, session.session_yr');
$this->db->from('student');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
$this->db->join('session', 'session.id = student.session');
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
function search_student_all($key){
$condition = "name LIKE '%".$key."%' OR clg_ref_no='".$key."' AND student_sem.status ='R'";
$this->db->select('student.*, student_sem.sem, student_sem.roll, student_sem.no, session.session_yr');
$this->db->from('student');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
$this->db->join('session', 'session.id = student.session');
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
$condition = "student.session ='".$session."' AND student_sem.status ='R'";
$this->db->select('student.*, student_sem.sem, student_sem.roll, student_sem.no,session.session_yr');
$this->db->from('student');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
$this->db->join('session', 'session.id = student.session');
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
$condition = "student_sem.sem ='".$sem."' AND student_sem.status ='R'";
$this->db->select('student.*, student_sem.sem, student_sem.roll, student_sem.no, session.session_yr');
$this->db->from('student');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
$this->db->join('session', 'session.id = student.session');
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
// Function to Delete selected record from table name students.
function delete_student_id($id){
$this->db->where('id', $id);
$this->db->delete('student');
}
// Update Query For Selected Student
function update_student_id1($id,$data){
$this->db->where('id', $id);
$this->db->update('student', $data);
}


}
?>