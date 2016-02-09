<?php
Class access_model extends CI_Model
{
function __construct() {
parent::__construct();
}

public function fetch_data() {
$this->db->select('page_acess.*');
$this->db->from('page_acess');
$query = $this->db->get();	
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}
function block_id($id,$data){
$this->db->where('id', $id);
$this->db->update('page_acess', $data);
}
}
?>