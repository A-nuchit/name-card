<?php
class Del extends CI_Model
{
	public function del_user($user_id){
		$this->db->delete('member', array('id' => $user_id));
	}
	public function del_card($card_id){
		$this->db->delete('card', array('card_id' => $card_id));
		$this->db->delete('like', array('card_id' => $card_id));
	}
	public function del_card_like($card_id){
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$this->db->select('	like.like_id ,
							like.id,
							like.card_id'
					);
		$this->db->from('like');
		$this->db->where('card_id',$card_id);
		$this->db->where('id',$user_id);
		$data = $this->db->delete();
	}
}
?>