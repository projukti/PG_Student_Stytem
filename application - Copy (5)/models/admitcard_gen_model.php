<?php
Class admitcard_gen_model extends CI_Model
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
$this->db->select('student.*, student_sem.sem,student_sem.status,student_sem.admit,student_sem.roll,student_sem.no');
$this->db->from('student');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
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
function search_student_all($key){
$condition = "name LIKE '%".$key."%' AND student_sem.status ='R' OR clg_ref_no='".$key."' OR cu_reg_no='".$key."' OR phn='".$key."'";
$this->db->select('student.*, student_sem.sem, student_sem.status,student_sem.admit,student_sem.roll,student_sem.no');
$this->db->from('student');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
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
function search_student($sem,$session){
$condition = "student.session ='".$session."' AND student_sem.sem ='".$sem."' AND student_sem.status ='R'";
$this->db->select('student.*, student_sem.sem, student_sem.status,student_sem.admit,student_sem.roll,student_sem.no');
$this->db->from('student');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
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
//function search_student_session($session){
//$condition = "student.session ='".$session."' AND student_sem.status ='R'";
//$this->db->select('student.*, student_sem.sem, student_sem.status,student_sem.admit,student_sem.roll,student_sem.no');
//$this->db->from('student');
//$this->db->join('student_sem', 'student.id = student_sem.student_id');
//$this->db->where($condition);
//$query = $this->db->get();
////echo $this->db->last_query();
//if ($query->num_rows() > 0) {
//foreach ($query->result() as $row) {
//$data[] = $row;
//}
//return $data;
//}
//return false;
//}
//function search_student_sem($sem){
//$condition = "student_sem.sem ='".$sem."' AND student_sem.status ='R'";
//$this->db->select('student.*, student_sem.sem, student_sem.status,student_sem.admit,student_sem.roll,student_sem.no');
//$this->db->from('student');
//$this->db->join('student_sem', 'student.id = student_sem.student_id');
//$this->db->where($condition);
//$query = $this->db->get();
////echo $this->db->last_query();
//
//if ($query->num_rows() > 0) {
//foreach ($query->result() as $row) {
//$data[] = $row;
//}
//return $data;
//}
//return false;
//}
function students_session(){
$query = $this->db->get('session');
$query_result = $query->result();
return $query_result;
}
function admit_session($ses){
$query = $this->db->query('select * from session where id>= '.$ses.'');
$query_result = $query->result();
return $query_result;
}
function show_student_id($id,$sm){

$condition = "student_sem.student_id ='".$id."' and student_sem.sem='".$sm."' and student_sem.status='R'";
$this->db->select('student.*, student_sem.sem,student_sem.status,student_sem.admit,student_sem.roll,student_sem.no');
$this->db->from('student');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
$this->db->where($condition);
	
//$this->db->select('student.*');
//$this->db->from('student');
//$this->db->where('id', $data);
$query = $this->db->get();
//echo $this->db->last_query();
$result = $query->result();
return $result;
}	

function studentac_session(){
$condition= "active ='1'";	
$this -> db -> select('session.id');
$this -> db -> where($condition);
$query = $this->db->get('session');
$query_result = $query->result();
return $query_result;}

/*function admit_generation($sid,$sem){
if(!empty($sid)){	
$condition = "student_admit.student_id ='".$sid."' and student_admit.sem='".$sem."'";	
$this->db->select('student_admit.*');
$this->db->from('student_admit');
//$this->db->join('student_sem', 'student_sem.student_id = student_admit.student_id');
$this->db->where($condition);
$query = $this->db->get();
//echo $this->db->last_query();
if ($query->num_rows() > 0) {
$ad='Y';
}else{
$ad='N';	
}
return $ad;
}
}*/

function student_subject($id,$sm){

 $status = $this->db->select('status')
                  ->get_where('student_sem', array('student_id' => $id,'sem' => $sm))
                  ->row()
                  ->status;	
	
if($status == 'R'){	

$condition = "student_sem.student_id ='".$id."' and student_sem.sem ='".$sm."'";	
$this->db->select('subjects.id, subjects.paper_name , subjects.sem_no, student_sem.status');
$this->db->from('subjects');
$this->db->join('student_sem', 'student_sem.sem = subjects.sem_no');
$this->db->where($condition);
$query = $this->db->get(); //echo $this->db->last_query();
$result = $query->result();
return $result;

}elseif($status == 'NC'  || $status == 'NQ'){
	
$condition = "student_admit.student_id ='".$id."' and student_admit.sem ='".$sm."' and student_admit.result_status ='NC' and student_admit.disposed!='Yes'";	
$this->db->select('subjects.id, subjects.paper_name , subjects.sem_no');
$this->db->from('subjects');
//$this->db->join('student_sem', 'student_sem.sem = subjects.sem_no');
$this->db->join('student_admit', 'student_admit.subject_id = subjects.id');
$this->db->where($condition);
$query = $this->db->get(); 
//echo $this->db->last_query();
$result = $query->result();
return $result;
}
}
function admit_subject($id,$sem,$session){
$condition = "student_admit.student_id ='".$id."' and student_sem.student_id ='".$id."' and student_sem.sem ='".$sem."' and student_admit.sem='".$sem."' and student_sem.status='R'";
//$condition = "student_admit.student_id ='".$id."' and student_sem.student_id ='".$id."' and student_sem.sem ='".$sem."' and student_admit.session='".$session."' and student_admit.sem='".$sem."' and student_sem.status='R'";	
$this->db->select('student_admit.*,subjects.paper_name');
$this->db->from('student_admit');
$this->db->join('student_sem', 'student_sem.sem = student_admit.sem');
$this->db->join('subjects', 'student_admit.subject_id = subjects.id');
$this->db->where($condition);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function insertexam_subject($data,$id,$se){
	$this->db->insert_batch('student_admit', $data);
}
function upexam_subject($data,$r){
$condition = "id ='".$r."'";	
$this->db->where($condition);
$this->db->update('student_admit', $data);
}
function up_admit($id,$se,$ss){
$data=array('admit'=>1,'session'=>$ss);
$condition = "student_id ='".$id."' and sem='".$se."' and status='R'";	
$this->db->where($condition);
$this->db->update('student_sem', $data);
}
function up_student($id,$ss){
$data=array('exam_session'=>$ss);
$condition = "id ='".$id."'";	
$this->db->where($condition);
$this->db->update('student', $data);
}





}
?>