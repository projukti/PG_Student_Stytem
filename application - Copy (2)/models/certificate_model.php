<?php
Class certificate_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination


function student_details($data){
$condition = "student.id ='".$data."'";	
$this->db->select('student.*,result_final.*');
$this->db->from('student');
$this->db->join('result_final', 'result_final.student_id = student.id');
$this->db->where($condition);
$query = $this->db->get();
$result = $query->result();
return $result;
$this->students_session($result->session);
$query = $this->db->get();
}	
}
?>