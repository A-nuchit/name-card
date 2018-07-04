<?php
class Insert_card extends CI_Model
{   
	public function add_card($data)
	{	$this->load->database();
		$this->db->set($data);
		$count = $this->db->insert('card',$data);
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