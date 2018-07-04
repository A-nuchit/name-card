<?php
class Del extends CI_Model
{
	public function del_user($user_id){
		$this->db->delete('member', array('id' => $user_id));
	}
	public function del_card($card_id){
		$this->db->delete('card', array('card_id' => $card_id));
	}
}
?>