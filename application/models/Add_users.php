<?php
class Add_users extends CI_Model
{   
	public function add($data)
	{	$this->load->database();
		$this->db->set($data);
		$count = $this->db->insert('member',$data);
		if($count>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function login_user($data){
		$this->load->database();
		$username = $data['name'];
		$password = $data['password'];
		$this->db->select('password');
		$this->db->from('member');
		$this->db->where("name","$username");
		$query = $this->db->get();
		$record=$query->row();
		$password_hash = $record->password;
		if (password_verify ( $password , $password_hash )){
			return true;
		}
		else{
			return false;
		}
	}
	
}

?>