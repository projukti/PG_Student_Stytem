<?php
Class admit_card_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination


function student_details($id,$sm){
$condition = "student_sem.student_id ='".$id."' and student_sem.sem='".$sm."' and student_sem.status='R'";
$this->db->select('student.*, student_sem.sem,student_sem.status,student_sem.admit,student_sem.roll,student_sem.no');
$this->db->from('student');
$this->db->join('student_sem', 'student.id = student_sem.student_id');
$this->db->where($condition);
$query = $this->db->get();
$result = $query->result();
return $result;
$this->students_session($result->session);
$query = $this->db->get();
}	


function exam_details($id,$sm,$session){
$condition = "student_admit.student_id ='".$id."' and student_admit.sem='".$sm."' and student_admit.status='Y' and exam.session='".$session."'";	
$this->db->select('subjects.paper_code, subjects.paper_name, student_admit.*, exam.date, exam.day, exam.from_tm, exam.to_tm, session.year');
$this->db->from('student_admit');
$this->db->join('subjects', 'subjects.id = student_admit.subject_id');
$this->db->join('exam', 'exam.paper_id = student_admit.subject_id and exam.session = student_admit.session');
//$this->db->join('student_sem', 'student_sem.student_id = student_admit.student_id');
$this->db->join('session', 'session.id = student_admit.session');
$this->db->where($condition );
$query = $this->db->get();
$result = $query->result();
//echo $this->db->last_query();
return $result;
$this->students_session($result->session);

$query = $this->db->get();
}	


}
?>