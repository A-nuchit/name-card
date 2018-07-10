<?php
class Update extends CI_Model
{   
	public function update_card($data,$card_id)
	{
		$this->load->database();
		$this->db->where('card_id',$card_id);
		$count = $this->db->update('card',$data);
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