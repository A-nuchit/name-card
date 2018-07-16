<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Add_users');
		$this->load->model('Email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Get_infos');
		$this->load->model('Accept_users');
		$this->load->model('Insert_card');
		$this->load->model('Del');
		$this->load->model('Create_table');
		$this->load->model('Update');
	}
	public function index(){
		$this->load->view('Navbar');
		$data ['query'] = $this->Get_infos->get_job();
		$this->load->view('Search',$data);
	}
	public function testb(){
		$this->load->view('testb');
	}
	public function searchs(){
		$info = array(
				'nametype' => $this->input->post('type_job'),
				'word' => $this->input->post('word'),
				'province' =>$this->input->post('province')
				);
		if(isset($this->session->userdata['logged_in'])){
			$data_search = array('query' => $this->Get_infos->get_search($info),
							     'like_qurey' => $this->Get_infos->get_like()
		 			  );
		}
		else{
			$data_search = array('query' => $this->Get_infos->get_search($info)
		 			  );
		}
		$data ['query'] = $this->Get_infos->get_job();
		$this->load->view('Navbar');
		$this->load->view('Search',$data);
		if($data_search['query'] == NULL){
			$this->load->view('Alert_Null');
		}
		$this->load->view('Show_card',$data_search);
	}
	public function edit_card(){
		$card_id = $this->input->get('card_id');
		$this->load->view('Navbar');
		$data['query'] = $this->Get_infos->get_a_card($card_id);
		if($data['query'] == NULL){
			echo "string";
		}
		$this->load->view('Edit_from',$data);
	}
	public function update_card(){
		$card_id = $this->input->post('card');
		$type_job = $this->input->post('type_job');
		$district = $this->input->post('district');
		$province = $this->input->post('province');
		$zip_code = $this->input->post('zip_code');
		$timelast_update = date("Y-m-d h:i:sa");
		$data_update = array('type_job' => $type_job,
							  'district_card' => $district,
							  'province_card' => $province,
							  'zip_code_card' => $zip_code,
							  'timelast_update' => $timelast_update
							 );
		$this->Update->update_card($data_update,$card_id);
		$this->load->view('Navbar');
		$data ['query'] = $this->Get_infos->get_mycard();
		if($data ['query']== NULL){
			$this->load->view('Alert_Null');
		}
		$this->load->view('Show_card',$data);
	}
	public function save_card(){
		$card_id = $this->input->get('card_id');
		$data = array('card_id' => $card_id,
					  'id' => $this->session->userdata['logged_in']['user_id']
					);
		$this->Add_users->add_like($data);
		$data ['query'] = $this->Get_infos->get_job();
		$info = array(
				'nametype' => '*',
				'word' => "",
				'province'=>"*"
				);
		$data_search = array('query' => $this->Get_infos->get_search($info),
							 'like_qurey' => $this->Get_infos->get_like()
		 			  );
		$this->load->view('Navbar');
		$this->load->view('Search',$data);
		$this->load->view('Show_card',$data_search);
	}
	public function register_form(){
		$this->load->view('welcome_message');
	}
	public function login_form(){
		$this->load->view('Login_form');
	}
	public function Addtype_form(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['username'] == "admin"){
					$this->load->view('Admin_page');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Insert_type');
					}
				else{
						$this->load->view('Navbar');
						$data ['query'] = $this->Get_infos->get_job();
						$this->load->view('Addcard_form',$data);
				}
			}
			else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
		}
	}
	public function add_type(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['username'] == "admin"){
						$work_type = array ('nametype' => $this->input->post('work_type'),
											'dis_type' => $this->input->post('work_type_dis')
										);
						$this->Add_users->add_type($work_type);
						$this->load->view('Admin_page');
						$data ['query'] = $this->Get_infos->get_job();
						$this->load->view('Insert_type');
					}
				else{
						$this->load->view('Navbar');
						$data ['query'] = $this->Get_infos->get_job();
						$this->load->view('Addcard_form',$data);

				}
			}
			else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
		}
	}
	public function home(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['username'] == "admin"){
					$this->load->view('Admin_page');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Addcard_form',$data);
					}
				else{
					$this->load->view('Navbar');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Addcard_form',$data);

				}
			}
			else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
		}
	}
	public function Show_card_admin(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['username'] == "admin"){
					$this->load->view('Admin_page');
					$data = array('query' => $this->Get_infos->get_card(),
								  'like_qurey' => $this->Get_infos->get_like()
					 			  );
					$this->load->view('Show_card',$data);
					}
				else{
					$this->load->view('Navbar');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Addcard_form',$data);

				}
			}
			else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
		}
	}
	public function Show_mycard(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('Navbar');
				$data ['query'] = $this->Get_infos->get_mycard();
				if($data ['query']== NULL){
					$this->load->view('Alert_Null');
				}
				$this->load->view('Show_card',$data);
			}
			else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
		}
	}
	public function Show_mylike(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('Navbar');
				$data ['query'] = $this->Get_infos->get_mylike();
				if($data ['query'] == NULL){
					$this->load->view('Alert_like');
				}
				$this->load->view('Show_card-like',$data);
				}
			else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
		}
	}

	public function show_table(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['username'] == "admin"){
					$this->load->view('Navbar');
					$data ['query'] = $this->Get_infos->get_info();
					$this->load->view('Show_table',$data);
				}
				else{
					$this->load->view('Navbar');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Addcard_form',$data);

				}
			}
			else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
		}
	}
	public function create_card(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('Navbar');
				$data ['query'] = $this->Get_infos->get_job();
				$this->load->view('Addcard_form',$data);
			}
			else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
		}
	}
	public function show_member(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['username'] == "admin"){
					$data ['query'] = $this->Get_infos->get_member();
					$this->load->view('Show_member',$data);
				}
				else{
					$this->load->view('Navbar');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Addcard_form',$data);

				}
			}else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
		}
	}
	public function show_listcards(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['username'] == "admin"){
					$data ['query'] = $this->Get_infos->get_card();
					$this->load->view('Show_listcard',$data);
				}

				else{
					$this->load->view('Navbar');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Addcard_form',$data);

				}
			}else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
		}
	}
	public function del_users(){
		$user_id = $this->input->get('user_id');
		$this->Del->del_user($user_id);
		$data ['query'] = $this->Get_infos->get_member();
		$this->load->view('Show_member',$data);
	}
	public function del_card(){
		$card_id = $this->input->get('card_id');
		$this->Del->del_card($card_id);
		$data ['query'] = $this->Get_infos->get_card();
		$this->load->view('Show_listcard',$data);
	}
	public function del_card_user(){
		$card_id = $this->input->get('card_id');
		$this->Del->del_card($card_id);
		$data ['query'] = $this->Get_infos->get_mycard();
		$this->load->view('Navbar');
		if($data ['query']==NULL){
			$this->load->view('Alert_Null');
		}
		$this->load->view('Show_card',$data);
	}
	public function del_card_like(){
		$card_id = $this->input->get('card_id');
		$this->Del->del_card_like($card_id);

		$this->load->view('Navbar');
		$data ['query'] = $this->Get_infos->get_mylike();
		if($data ['query'] == NULL){
			$this->load->view('Alert_like');
		}
		$this->load->view('Show_card-like',$data);
	}
	

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['username'] == "admin"){
					$this->load->view('Admin_page');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Addcard_form',$data);
				}

				else{
					$this->load->view('Navbar');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Addcard_form',$data);

				}
			}else{
				$this->load->view('Login_form');
			}
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
			 if($this->Add_users->login_user($data)){
			 	$result = $this->Add_users->read_user_information($data['username']);
			 	$session_data = array(
			 							'user_id' => $result[0]->user_id,
										'username' => $result[0]->username,
										'email' => $result[0]->email,
										'point' => $result[0]->point
										);
				$this->session->set_userdata('logged_in', $session_data);
				$login = array('user_id' => $this->session->userdata['logged_in']['user_id'],
							   'date_login' => date("Y-m-d"),
							   'time_login' => date("h:i:sa")
							);
				$date_last = array('last_login' => date("Y-m-d h:i:sa"));
				$this->Add_users->date_check();
				$this->Add_users->add_timelogin($login);
				$this->Update->update_lasttime($date_last,$result[0]->user_id);

				if($this->session->userdata['logged_in']['username'] == "admin"){
					$this->load->view('Admin_page');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Addcard_form',$data);
				}

				else{
					$this->load->view('Navbar');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Addcard_form',$data);
				}
			 }
			 else{
			 	$data['message_display'] = 'Name or Password dont ';
				$this->load->view('Login_form',$data);
			 }
		}
	}
	public function add_card(){
		$topic = $this->input->post('topic');
		$detail = $this->input->post('detail');
		$work_id = $this->input->post('work_type');
		$type_job = $this->input->post('type_job');
		$district = $this->input->post('district');
		$province = $this->input->post('province');
		$zip_code = $this->input->post('zip_code');
		$pic_logo = $this->input->post('pic_logo');
		$pic_bg = $this->input->post('pic_bg');
		$time = $timelast_update = date("Y-m-d h:i:sa");
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['remove_spaces'] = TRUE;
			$config['file_name'] = $this->session->userdata['logged_in']['username']."_".$time."_".rand(10,10000)."_logo";
			$this->load->library("upload",$config);
			$check_pic = $this->upload->do_upload('pic_logo');
			$uploadData = $this->upload->data();
			$pic_logo = $uploadData['file_name'];
			$config2['upload_path'] = 'assets/images/';
			$config2['allowed_types'] = 'gif|jpg|jpeg|png';
			$config2['remove_spaces'] = TRUE;
			$config2['file_name'] = $this->session->userdata['logged_in']['username']."_".$time."_".rand(10,10000)."_bg";
			$this->load->library("upload",$config2);
			$check_pic = $this->upload->do_upload('pic_bg');
			$uploadData = $this->upload->data();
			$pic_bg = $uploadData['file_name'];
		$data = array(  'topic' => $topic,
						'detail' => $detail,
						'type_job'=> $type_job,
						'work_id'=> $work_id,
						'district_card' => $district,
						'province_card' => $province,
						'zip_code_card' => $zip_code,
						'pic_logo' => $pic_logo,
						'pic_bg' => $pic_bg,
						'time' => $time,
						'timelast_update' => $timelast_update,
						'user_id'=> $this->session->userdata['logged_in']['user_id'] );
		if($this->Insert_card->add_card($data)){
			if($this->session->userdata['logged_in']['username'] == "admin"){
				$this->load->view('Admin_page');
				$data ['query'] = $this->Get_infos->get_job();
				$this->load->view('Addcard_form',$data);
			}
			else{
				$this->load->view('Navbar');
				$data ['query'] = $this->Get_infos->get_job();
				$this->load->view('Addcard_form',$data);
			}
		}
	}
	public function add_user()
	{
		$username = $this->input->post('username');
		$name = $this->input->post('name');
		$config['upload_path'] = 'assets/images/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['remove_spaces'] = TRUE;
		$config['file_name'] = $username;
		$this->load->library("upload",$config);
		$this->load->model('Check_mails');
		$district = $this->input->post('district');
		$province = $this->input->post('province');
		$zip_code = $this->input->post('zip_code');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$tel = $this->input->post('tel');
		$gender = $this->input->post('gender');
		$day = $this->input->post('day');
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$pass = $this->input->post('password');
		$c_pass = $this->input->post('confirm-password');
		$check_mail = $this->Check_mails->check_email($email);
		$check_username = $this->Check_mails->check_name($username);
		$check_pic = $this->upload->do_upload('featured');
		if( $check_mail == TRUE && $check_username == TRUE && $check_pic == TRUE )
		{
			$uploadData = $this->upload->data();
			$pic = $uploadData['file_name'];

			if($pass != $c_pass){
				$data['message_display'] = 'Password dont math!';
				$this->load->view('welcome_message',$data);
			}
			else if( strlen($pass) < 6){
				$data['message_display'] = 'Pless more 6 char';
				$this->load->view('welcome_message',$data);
			}
			else{
			$pass = password_hash($pass, PASSWORD_DEFAULT);
			$data = array('username' => $username,
						  'district' => $district,
						  'province' => $province,
						  'zip_code' => $zip_code,	
						  'name' => $name,
						  'lastname' => $lastname,
						  'password'=> $pass,
						  'pic'=>$pic,
						  'day'=>$day,
						  'month'=>$month,
						  'year'=>$year,
						  'email' => $email,
						  'tel'=> $tel,
						  'gender' => $gender
						);
				if($this->Add_users->add($data) && $this->Email->sent_email($name,$lastname,$email,$tel))
				{
					$this->load->view('Login_form');
				}
				else
				{

					$this->load->view('welcome_message');
				}
			}
		}else
		{
			$this->load->view('welcome_message');
			if($check_username != TRUE){
				$this->load->view('Alert_name');
			}
			if($check_mail != TRUE){
				$this->load->view('Alertx');
			}
			if($check_pic != TRUE){
				echo "pic error";
			}
		}
	}
	public function logout() {
		$sess_array = array(
			'username' => '',
			'user_id' => '',
			'point' => '',
			'email' => ''
				);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->load->view('Navbar');
		$data ['query'] = $this->Get_infos->get_job();
		$this->load->view('Search',$data);
	}
}