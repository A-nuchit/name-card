<?php
class Add_users extends CI_Model
{
	public function add($data)
	{
		$this->load->database();
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
	
}

?>