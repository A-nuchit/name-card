<?php
class Accept_users extends CI_Model
{
	public function accept_user($id){
		$data = $this->db->get('pre_member');
		$data->result();
		$this->db->delete('pre_member', array('pre_id' => $id));
		foreach ($data->result() as $key ) {
			if ($id == $key->pre_id){
				$data = array(
							'name' => $key->pre_name,
							'lastname' => $key->pre_lastname,
							'password'=> $key->pre_password,
							'email' => $key->pre_email,
							'tel'=> $key->pre_tel,
							'pic'=>$key->pre_pic 
				);
			}
		}
		$this->db->set($data);
		if($this->db->insert('member',$data)){
			echo "sucess";
		}

	
	}
}
?>