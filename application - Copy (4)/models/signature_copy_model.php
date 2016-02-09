<?php
Class signature_copy_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination


function show_student($id){
$condition = "exam.id ='".$id."' and student_admit.result_status='' order by rand()";	
$this->db->select('student.*,student_sem.roll,student_sem.no');
$this->db->from('student');
$this->db->join('student_admit', 'student_admit.student_id = student.id');
$this->db->join('exam', 'exam.paper_id = student_admit.subject_id');
$this->db->join('student_sem', 'student_sem.student_id = student.id and exam.sem = student_sem.sem and exam.session = student_sem.session');
$this->db->join('subjects', 'subjects.id = exam.paper_id');
$this->db->where($condition);
$query = $this->db->get();
//echo $this->db->last_query();
$result = $query->result();
return $result;
$this->students_session($result->session);
$query = $this->db->get();
}
	
function exam_details($id){
$condition = "exam.id ='".$id."'";	
$this->db->select('exam.date, exam.sem, subjects.paper_code, subjects.paper_name');
$this->db->from('exam');
$this->db->join('subjects', 'subjects.id = exam.paper_id');
$this->db->where($condition);
$query = $this->db->get();
//echo $this->db->last_query();
$result = $query->result();
return $result;
//$this->students_session($result->session);
//$query = $this->db->get();
}




}
?>