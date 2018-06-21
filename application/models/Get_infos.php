<?php


class Get_infos extends CI_Model
{
	public function get_info()
	{
		$data = $this->db->get('member');
        return $data->result();
	}
	
}

?>