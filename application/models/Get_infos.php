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
							card.time,
							member.email,
							member.tel, 
							card.user_id, 
							card.topic,
							card.detail,
							card.type_time,
							job_type.nametype '
					);
		$this->db->from('card');
		$this->db->join('job_type', 'card.type_id = job_type.type_id');
		$this->db->join('member', 'card.user_id = member.user_id');
		$data = $this->db->get();
        return $data->result();
	}
	public function get_job()
	{
		$data = $this->db->get('job_type');
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
							card.type_time,
							job_type.nametype '
					);
		$this->db->from('card');
		if($nametype != '*'){
			$this->db->where('nametype',$nametype);
		}
		$this->db->like('topic',$word);
		$this->db->join('job_type', 'card.type_id = job_type.type_id');
		$this->db->join('member', 'card.user_id = member.user_id');
		$data = $this->db->get();
        return $data->result();
	}
}

?>