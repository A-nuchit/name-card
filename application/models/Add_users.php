<?php
class Add_users extends CI_Model
{   
	public function add($data)
	{	$this->load->database();
		$this->db->set($data);
		$count = $this->db->insert('member',$data);
		if($count>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function add_type($data)
	{	$this->load->database();
		$this->db->set($data);
		$count = $this->db->insert('work_type',$data);
		if($count>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function add_like($data)
	{
		$this->load->database();
		$this->db->set($data);
		$count = $this->db->insert('like',$data);
		if($count>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function login_user($data){
		$this->load->database();
		$username = $data['username'];
		$password = $data['password'];
		$this->db->select('password');
		$this->db->from('member');
		$this->db->where("username","$username");
		$query = $this->db->get();
		$record=$query->row();
		if(!empty($record->password)){
			$password_hash = $record->password;
			if (password_verify ( $password , $password_hash )){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	public function add_timelogin($data)
	{
		$this->load->database();
		$this->db->set($data);
		$count = $this->db->insert('login',$data);
		if($count>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function date_check()
	{   
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$date = "date_add('".date('Y-m-d')."',interval 0 day)";
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('date(date_login) >=', $date);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			 #to day have login  NULL
		}
		else
		{
			$date = "date_add('".date('Y-m-d')."',interval -1 day)";
			$this->db->select('*');
			$this->db->from('login');
			$this->db->where('date(date_login) >=', $date);
			$this->db->where('user_id',$user_id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$this->db->set('point', 'point+1');
				$this->db->where('user_id', $user_id);
				$this->db->update('member');
				#have yesterday  +1
			}
			else{
					if((int)$this->session->userdata['logged_in']['point'] < 10){
						$this->db->set('point', '0' , FALSE);
						$this->db->where('user_id', $user_id);
						$this->db->update('member');
					}
					else{
					$this->db->set('point', 'point-10', FALSE);
					$this->db->where('user_id', $user_id);
					$this->db->update('member');
					#frist time -> -10 or valur == 0 -> NULL 
					}
				
			}
		}
	}
	public function read_user_information($username) {
		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('member');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}	
	}
}
?>