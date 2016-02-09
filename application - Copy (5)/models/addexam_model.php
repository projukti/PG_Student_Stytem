<?php
Class addexam_model extends CI_Model
{
function insertexam($data){
// Inserting in Table(students) of Database(college)
$this->db->insert('exam', $data);
}	
function show_students(){
$query = $this->db->get('student');
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

function paper_code(){
$query = $this->db->get('subjects');
$query_result = $query->result();
return $query_result;
}

 function getstate($country_id='')
     {
        $this -> db -> select('subjects.*');
        $this -> db -> where('sem_no', $country_id);
        $query = $this -> db -> get('subjects');
        return $query->result();
     }
/*function paper_code($id){
	$this->db->select('*');
$this->db->from('subjects');
$this->db->where('sem_no', $id);
$query = $this->db->get();
$query_result = $query->result();
return $query_result;

}*/
}
?>