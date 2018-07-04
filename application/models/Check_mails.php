<?php
class Check_mails extends CI_Model
{
	public function check_email($email)
	{
		$data = $this->db->get('member');
		foreach ($data->result() as $key ) {
			if ($email == $key->email){
				return false;
			}
		}
		return true;
	}
	public function check_name($username)
	{
		$data = $this->db->get('member');
		foreach ($data->result() as $key ) {
			if ($username == $key->username){
				return false;
			}
		}
		return true;
	}
	
}

?>