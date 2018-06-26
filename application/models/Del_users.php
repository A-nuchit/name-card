<?php
class Del_users extends CI_Model
{
	public function del_user($id){
		$this->db->delete('member', array('id' => $id));
	}
}
?>