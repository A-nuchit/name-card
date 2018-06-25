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
	public function check_name($name)
	{
		$data = $this->db->get('member');
		foreach ($data->result() as $key ) {
			if ($name == $key->name){
				return false;
			}
		}
		return true;
	}
	
}

?>