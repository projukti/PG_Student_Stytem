<?php
Class editaccount_model extends CI_Model
{
function __construct() {
parent::__construct();
}
function username(){
$query = $this->db->get('admin_login');
$query_result = $query->result();
return $query_result;
}
// Update Query 
function update_account($data,$id){
$this->db->where('id',$id);
$this->db->update('admin_login', $data);
}
}
?>