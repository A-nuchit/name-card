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
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$this->db->select('*');
		$this->db->from('like');
		$this->db->where('id',$user_id);
		$data = $this->db->get();
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
	public function get_a_card($card_id)
	{
		$this->db->select('	card.card_id ,
							member.username,
							member.name,
							member.lastname,
							member.email,
							member.tel,
							card.user_id, 
							card.topic,
							card.pic_bg,
							card.pic_logo,
							card.detail,
							card.district_card,
							card.province_card,
							card.zip_code_card,
							card.type_job,
							work_type.nametype ');
		$this->db->from('card');
		$this->db->where('card_id',$card_id);
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
							card.pic_bg,
							card.pic_logo,
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
	public function get_mylike()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$this->db->select(' like.like_id,
							like.id,
							member.username,
							member.name,
							member.lastname,
							member.email,
							member.tel,
							card.card_id, 
							card.user_id, 
							card.topic,
							card.detail,
							card.pic_bg,
							card.pic_logo,
							card.type_job,
							work_type.nametype');
		$this->db->from('like');
		$this->db->where('id',$user_id);
		$this->db->join('card', 'like.card_id = card.card_id');
		$this->db->join('member', 'card.user_id = member.user_id');
		$this->db->join('work_type', 'card.work_id = work_type.work_id');
		$data = $this->db->get();
        return $data->result();
	}
	public function get_search($data)
	{
		$nametype = $data['nametype'];
		$word = $data['word'];
		$province = $data['province'];
		$this->db->select('	card.card_id ,
							member.username,
							member.name,
							member.lastname,
							member.email,
							member.tel,
							card.user_id, 
							card.topic,
							card.detail,
							card.pic_bg,
							card.province_card,
							card.pic_logo,
							card.type_job,
							work_type.nametype '
					);
		$this->db->from('card');
		if($nametype != '*' || $nametype == NULL){
			$this->db->where('nametype',$nametype);
		}
		if($province != '*' || $province == NULL){
			$this->db->where('province_card',$province);
		}
		if($word != ""){
			$this->db->like('topic',$word);
			$this->db->like('detail',$word);
		}
		$this->db->join('work_type', 'card.work_id = work_type.work_id');
		$this->db->join('member', 'card.user_id = member.user_id');
		$data = $this->db->get();
        return $data->result();
	}
}

?>