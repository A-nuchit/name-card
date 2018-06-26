<?php
class Del extends CI_Model
{
	public function del_user($id){
		$this->db->delete('member', array('id' => $id));
	}
	public function del_post($id){
		$this->db->delete('post', array('post_id' => $id));
	}
}
?>