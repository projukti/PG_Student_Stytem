<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('*');
   $this -> db -> from('admin_login');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
  function session()
 {
   $this -> db -> select('*');
   $this -> db -> from('session');
   $this -> db -> where('active', 1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
function insertsession($data,$dataup){
$this->db->update('session', $dataup);	
$this->db->insert('session', $data);
}
}
?>