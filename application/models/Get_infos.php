<?php
class Get_infos extends CI_Model
{
	public function get_info()
	{
		$data = $this->db->get('member');
        return $data->result();
	}
	public function get_member()
	{
		$data = $this->db->get('member');
        return $data->result();
	}
	public function get_card()
	{
		$this->db->select('	card.card_id , 
							member.username,
							member.name,
							member.lastname,
							card.time,
							member.email,
							member.tel, 
							card.user_id, 
							card.topic,
							card.detail,
							card.type_job,
							work_type.nametype '
					);
		$this->db->from('card');
		$this->db->join('work_type', 'card.work_id = work_type.work_id');
		$this->db->join('member', 'card.user_id = member.user_id');
		$data = $this->db->get();
        return $data->result();
	}
	public function get_job()
	{
		$data = $this->db->get('work_type');
        return $data->result();
	}
	public function get_mycard($data)
	{
		$username = $data;

		$this->db->select('	card.card_id ,
							member.username,
							member.name,
							member.lastname,
							member.email,
							member.tel,
							card.user_id, 
							card.topic,
							card.detail,
							card.type_job,
							work_type.nametype '
					);
		$this->db->from('card');
		$this->db->where('username',$username);
		$this->db->join('work_type', 'card.work_id = work_type.work_id');
		$this->db->join('member', 'card.user_id = member.user_id');
		$data = $this->db->get();
        return $data->result();
	}
	public function get_search($data)
	{
		$nametype = $data['nametype'];
		$word = $data['word'];

		$this->db->select('	card.card_id ,
							member.username,
							member.name,
							member.lastname,
							member.email,
							member.tel,
							card.user_id, 
							card.topic,
							card.detail,
							card.type_job,
							work_type.nametype '
					);
		$this->db->from('card');
		if($nametype != '*'){
			$this->db->where('nametype',$nametype);
		}
		if($word != NULL){
			$this->db->like('topic',$word);
		}
		$this->db->join('work_type', 'card.work_id = work_type.work_id');
		$this->db->join('member', 'card.user_id = member.user_id');
		$data = $this->db->get();
        return $data->result();
	}
}

?>