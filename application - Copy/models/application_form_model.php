<?php
Class application_form_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination

function card_details($id,$sem){
$condition = "student.id = '".$id."'";
$this->db->select('student.*');
$this->db->from('student');
$this->db->where($condition);
$query = $this->db->get();
$result = $query->result();
return $result;
$this->students_session($result->session);
}

function sem_details($id){
$condition = "student_id = '".$id."' and status = 'R'";
$this->db->select('sem');
$this->db->from('student_sem');
$this->db->where($condition);
$query = $this->db->get(); 
//echo $this->db->last_query();
$result = $query->result();
return $result;
$this->students_session($result->session);
}	



function sub_details($id,$sem){
$queryc ="select * from student_admit where student_id = '".$id."' and sem = '".$sem."'";
//echo $this->db->last_query();	
$resc = $this->db->query($queryc);	
$count= $resc->num_rows();

if($count == '0'){	

$condition = "sem_no ='".$sem."'";	
$this->db->select('subjects.paper_code');
$this->db->from('subjects');
$this->db->where($condition);
$query = $this->db->get(); 
//echo $this->db->last_query();
$result = $query->result();
return $result;

}else{

$condition = "student_admit.student_id ='".$id."' and student_admit.sem ='".$sem."' and student_admit.result_status ='NC'";	
$this->db->select('subjects.paper_code');
$this->db->from('subjects');
$this->db->join('student_admit', 'student_admit.subject_id = subjects.id');
$this->db->where($condition);
$query = $this->db->get(); 
//echo $this->db->last_query();
$result = $query->result();
return $result;

}

}

function cnt_sub($id,$sem){
$queryc ="select * from student_admit where student_id = '".$id."' and sem = '".$sem."'";
//echo $this->db->last_query();	
$resc = $this->db->query($queryc);	
$count= $resc->num_rows();

if($count == '0'){	

$condition = "sem_no ='".$sem."'";	
$this->db->select('count(subjects.paper_code) as cnt');
$this->db->from('subjects');
$this->db->where($condition);
$query = $this->db->get(); 
//echo $this->db->last_query();
$result = $query->result();
return $result;

}else{

$condition = "student_admit.student_id ='".$id."' and student_admit.sem ='".$sem."' and student_admit.result_status ='NC'";	
$this->db->select('count(subjects.paper_code) as cnt');
$this->db->from('subjects');
$this->db->join('student_admit', 'student_admit.subject_id = subjects.id');
$this->db->where($condition);
$query = $this->db->get(); 
//echo $this->db->last_query();
$result = $query->result();
return $result;

}
}


/*function sub_details($id,$sem){
$query ="select sem from student_sem where student_id = '".$id."' and status = 'R'";
$res = $this->db->query($query);
$data = $res->result_array();
foreach($data as $result){
$query2 ="select * from student_admit where student_id = '".$id."' and sem = '".$result['sem']."'";
 echo $this->db->last_query();	
$res2 = $this->db->query($query2);
if($res->num_rows() > 0) {
	
}
}
}
*/
function students_session($id){
$condition = "student.id = '".$id."'";
$this->db->select('session.year');
$this->db->from('session');
$this->db->join('student', 'student.session = session.id');
$query = $this->db->get();
$query_result = $query->result();
return $query_result;
}




}
?>