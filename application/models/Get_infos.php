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
	public function get_like()
	{
		$table = $this->session->userdata['logged_in']['username']."_like";
		$data = $this->db->get($table);
        return $data->result();
	}
	public function get_card()
	{
		$this->db->select('*');
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
	public function get_mycard()
	{
		$username = $this->session->userdata['logged_in']['username'];
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
	public function get_mylike($data)
		{
			$table = $data."_like";
			$table_join = $data."_like.card_id = card.card_id";

			$name_table = $data."_like.card_id,
								member.username,
								member.name,
								member.lastname,
								member.email,
								member.tel,
								card.user_id, 
								card.topic,
								card.detail,
								card.type_job,
								work_type.nametype";

			$this->db->select($name_table);
			$this->db->from($table);
			$this->db->join('card', $table_join);
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
		if($nametype != '*' || $nametype == NULL){
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