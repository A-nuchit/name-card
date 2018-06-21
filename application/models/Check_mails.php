<?php
class Check_mails extends CI_Model
{
	public function check($email)
	{
		$data = $this->db->get('member');
		foreach ($data->result() as $key ) {
			if ($email == $key->email){
				return false;
			}
		}
		return true;
	}
	
}

?>