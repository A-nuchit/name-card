<?php


class Get_infos extends CI_Model
{
	public function get_info()
	{
		$data = $this->db->get('member');
        return $data->result();
	}
	public function get_request()
	{
		$data = $this->db->get('pre_member');
        return $data->result();
	}
	
}

?>