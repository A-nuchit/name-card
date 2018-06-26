<?php
class Insert_post extends CI_Model
{   
	public function add_post($data)
	{	$this->load->database();
		$this->db->set($data);
		$count = $this->db->insert('post',$data);
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