<?php
Class addstudent_model extends CI_Model
{
function insertstudent($data,$session,$roll,$rno){
$this->db->insert('student', $data);
$id=mysql_insert_id();
$datas = array(
   'student_id' => $this->db->insert_id(),
   'session' =>$session,
   'roll' =>$roll,
   'no' =>$rno
);
$this->db->insert('student_sem', $datas);
}		
function show_students(){
$query = $this->db->get('student');
echo $this->db->last_query();
$query_result = $query->result();
return $query_result;
}
function students_session(){
//$condition= "active ='1'";	
$this -> db -> select('session.*');
//$this -> db -> where($condition);
$query = $this->db->get('session');
$query_result = $query->result();
return $query_result;
}
function getsession($session){
$condition= "id ='".$session."'";	
$this -> db -> select('session.*');
$this -> db -> where($condition);
$query = $this->db->get('session');
foreach ($query->result() as $row) {
$ses= $row->year_exam;
return $ses;
}
}
function getsessionad($session){
$condition= "id ='".$session."'";	
$this -> db -> select('session.*');
$this -> db -> where($condition);
$query = $this->db->get('session');
foreach ($query->result() as $row) {
$sesad= $row->year;
return $sesad;
}
}
function crntssn(){
$condition= "active ='1'";	
$this -> db -> select('session.year');
$this -> db -> where($condition);
$query = $this->db->get('session');
$query_result = $query->result();
return $query_result;
}

function record_count_st() {
$query ="select no from student_sem where sem = '1st' and status = 'R' order by id DESC limit 1";
$res = $this->db->query($query);
//echo $this->db->last_query();
if($res->num_rows() > 0) {
$data = array_shift($res->result_array());
$rn= $data['no']+1;
return $rn;
}else{
$i=1;
return $i;
}
}

}
?>