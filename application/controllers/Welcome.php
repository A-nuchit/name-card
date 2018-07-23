<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('html');
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
		$this->load->view('css/home_css.css');
		$this->load->view('welcome');
	}
	public function profile(){
		$this->load->view('Navbar');
		$data['query'] = $this->Get_infos->get_now_member();
		$this->load->view('Profile',$data);
	}
	public function show_card_new(){
		$this->load->view('Navbar');
		$data ['query'] = $this->Get_infos->get_card();
		foreach($data['query'] as $r){
			$this->load->view('Show_card2',$r);
		}
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
		$this->load->view('css/template.css');
		$this->load->view('head');
		foreach($data_search['query'] as $r){
				$this->load->view("template/".$r->template,$r);
				if(isset($this->session->userdata['logged_in'])){
					$like = array('like_qurey' => $this->Get_infos->get_like(),
							  'card_id' => $r->card_id,
							  'user_id' => $r->user_id
								);
					$this->load->view('template/Status_card',$like);
				}
				echo '</div>';
				
		}
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
	public function edit_member(){
		$card_id = $this->session->userdata['logged_in']['user_id'];
		$this->load->view('Navbar');
		$data['query'] = $this->Get_infos->get_now_member();
		if($data['query'] == NULL){
			echo "Error cannot select data";
		}
		$this->load->view('Editmember_from',$data);
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
		$this->load->view('css/template.css');
		$this->load->view('head');
		foreach($data['query'] as $r){
				$like = array('like_qurey' => $this->Get_infos->get_like(),
							  'card_id' => $r->card_id,
							  'user_id' => $r->user_id
								);
				$this->load->view("template/".$r->template,$r);
				$this->load->view('template/Status_card',$like);
		}
	}
	public function update_member(){
		$name = $this->input->post('name');
		$lastname = $this->input->post('lastname');
		$gender = $this->input->post('gender');
		$district = $this->input->post('district');
		$province = $this->input->post('province');
		$zip_code = $this->input->post('zip_code');
		$day = $this->input->post('day');
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data_update = array( 'name' => $name,
							  'lastname' => $lastname,
							  'gender' => $gender,
							  'district' => $district,
							  'province' => $province,
							  'zip_code' => $zip_code,
							  'day' => $day,
							  'month' => $month,
							  'year' => $year
							 );
		$this->Update->update_member($data_update,$user_id);
		$this->load->view('Navbar');
		$data['query'] = $this->Get_infos->get_now_member();
				if($data ['query']== NULL){
			$this->load->view('Alert_Null');
		}
		$this->load->view('Profile',$data);
	}
	public function update_name(){
		$name = $this->input->post('name');
		$lastname = $this->input->post('lastname');
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data_update = array( 'name' => $name,
							  'lastname' => $lastname,
							 );
		$this->Update->update_member($data_update,$user_id);
		$this->load->view('Navbar');
		$data['query'] = $this->Get_infos->get_now_member();
				if($data ['query']== NULL){
			$this->load->view('Alert_Null');
		}
		$this->load->view('Profile',$data);
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
				'province'=>'*'
				);
		$data_search = array('query' => $this->Get_infos->get_search($info),
							 'like_qurey' => $this->Get_infos->get_like()
		 			  );
		$this->load->view('Navbar');
		$this->load->view('css/template.css');
		$this->load->view('Search',$data);
		$this->load->view('head');
		foreach($data_search['query'] as $r){
				$like = array('like_qurey' => $this->Get_infos->get_like(),
							  'card_id' => $r->card_id,
							  'user_id' => $r->user_id
								);
				$this->load->view("template/".$r->template,$r);
				$this->load->view('template/Status_card',$like);
		}
	}
	public function register_form(){
		$this->load->view('welcome_message');
	}
	public function login_form(){
		$this->load->view('Login_form');
	}
	public function search_form(){
		$this->load->view('Navbar');
		$data ['query'] = $this->Get_infos->get_job();
		$this->load->view('css/home_css.css');
		$this->load->view('Search',$data);
	}
	public function select_tem(){
		$this->load->view('Navbar');
		$this->load->view('Select_template');
	}
	public function select_back(){
		$data['back'] = $this->input->get('tem');
		$this->load->view('Navbar');
		$this->load->view('Select_back',$data);
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
					$data['query'] = $this->Get_infos->get_card();
					$this->load->view('css/template.css');
					$this->load->view('head');
					foreach($data['query'] as $r){
						$like = array('like_qurey' => $this->Get_infos->get_like(),
								  'card_id' => $r->card_id,
								  'user_id' => $r->user_id
									);
						$this->load->view("template/".$r->template,$r);
						$this->load->view('template/Status_card',$like);
					}
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
				$this->load->view('css/template.css');
				$this->load->view('head');
				foreach($data['query'] as $r){
					$like = array('like_qurey' => $this->Get_infos->get_like(),
								  'card_id' => $r->card_id,
								  'user_id' => $r->user_id
									);
					$this->load->view("template/".$r->template,$r);
					$this->load->view('template/Status_card',$like);
				}
				$this->load->view('end');
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
				if($data ['query']== NULL){
					$this->load->view('Alert_Null');
				}
				$this->load->view('css/template.css');
				$this->load->view('head');
				foreach($data['query'] as $r){
					$like = array('like_qurey' => $this->Get_infos->get_like(),
								  'card_id' => $r->card_id,
								  'user_id' => $r->user_id
									);
					$this->load->view("template/".$r->template,$r);
					$this->load->view('template/Status_card_like');
				}
				$this->load->view('end');
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
				$select_tem = $this->input->post('tem');
				if(empty($select_tem)){
					$select_tem = $this->input->get('tem');
				}
				$select_bag = $this->input->get('back');
				if(empty($select_tem)){
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Select_template');
					echo "string".$select_tem;
				}
				else{
					if(empty($select_bag)){
						$time = date("Y-m-d h:i:sa");
						$config['upload_path'] = 'assets/images/';
						$config['allowed_types'] = 'gif|jpg|jpeg|png';
						$config['remove_spaces'] = TRUE;
						$config['file_name'] = $this->session->userdata['logged_in']['username']."_".$time."_".rand(10,10000)."_bg";
						$this->load->library("upload",$config);
						$check_pic = $this->upload->do_upload('pic_bg');
						$uploadData = $this->upload->data();
						$pic_bg = $uploadData['file_name'];
						$data = array('query' => $this->Get_infos->get_job(),
								  'template' => $select_tem,
								  'address' => $this->Get_infos->get_address(),
								  'bg' => $pic_bg
								);
						$this->load->view('Addcard_form',$data);
					}
					else{
						$data = array('query' => $this->Get_infos->get_job(),
								  'template' => $select_tem,
								  'address' => $this->Get_infos->get_address(),
								  'bg' => $select_bag
								);
					$this->load->view('Addcard_form',$data);
					}
					
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
		$this->load->view('css/template.css');
		$this->load->view('head');
		foreach($data['query'] as $r){
		$like = array('like_qurey' => $this->Get_infos->get_like(),
					  'card_id' => $r->card_id,
					  'user_id' => $r->user_id
						);
		$this->load->view("template/".$r->template,$r);
		$this->load->view('template/Status_card',$like);
		}
	}
	public function del_card_like(){
		$card_id = $this->input->get('card_id');
		$this->Del->del_card_like($card_id);

		$this->load->view('Navbar');
		$data ['query'] = $this->Get_infos->get_mylike();
		if($data ['query'] == NULL){
			$this->load->view('Alert_like');
		}
		$this->load->view('css/template.css');
		$this->load->view('head');
		foreach($data['query'] as $r){
				$like = array('like_qurey' => $this->Get_infos->get_like(),
							  'card_id' => $r->card_id,
							  'user_id' => $r->user_id
								);
				$this->load->view("template/".$r->template,$r);
				$this->load->view('template/Status_card_like');
		}
	}
	

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['username'] == "admin"){
					$this->load->view('Admin_page');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Search',$data);
				}

				else{
					$this->load->view('Navbar');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('Search',$data);

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
					$this->load->view('Search',$data);
				}

				else{
					$this->load->view('Navbar');
					$data ['query'] = $this->Get_infos->get_job();
					$this->load->view('css/home_css.css');
					$this->load->view('welcome');
				}
			 }
			 else{
			 	$data['message_display'] = 'Name or Password dont ';
				$this->load->view('Login_form',$data);
			 }
		}
	}
	public function select_temp(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('Navbar');
				$data ['query'] = $this->Get_infos->get_job();
				$this->load->view('Select_template');
			}
			else{
				$this->load->view('Login_form');
			}
		}
		else{
			$this->load->view('Login_form');
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
		$pic_bg = $this->input->post('bg');
		$template = $this->input->post('tem');
		$time = $timelast_update = date("Y-m-d h:i:sa");
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['remove_spaces'] = TRUE;
			$config['file_name'] = $this->session->userdata['logged_in']['username']."_".$time."_".rand(10,10000)."_logo";
			$this->load->library("upload",$config);
			$check_pic = $this->upload->do_upload('pic_logo');
			$uploadData = $this->upload->data();
			$pic_logo = $uploadData['file_name'];
		$data = array(  'topic' => $topic,
						'detail' => $detail,
						'type_job'=> $type_job,
						'work_id'=> $work_id,
						'district_card' => $district,
						'province_card' => $province,
						'zip_code_card' => $zip_code,
						'pic_logo' => $pic_logo,
						'pic_bg' => $pic_bg,
						'template' => $template,
						'time' => $time,
						'timelast_update' => $timelast_update,
						'user_id'=> $this->session->userdata['logged_in']['user_id'] );
		if($this->Insert_card->add_card($data)){
			if($this->session->userdata['logged_in']['username'] == "admin"){
				$this->load->view('Admin_page');
				$data ['query'] = $this->Get_infos->get_job();
				$this->load->view('Search',$data);
			}
			else{
				$this->load->view('Navbar');
				$data ['query'] = $this->Get_infos->get_job();
				$this->load->view('Search',$data);
			}
		}
	}
	public function add_user()
	{
		$username = $this->input->post('username');
		$name = $this->input->post('name');
		#$config['upload_path'] = 'assets/images/';
		#$config['allowed_types'] = 'gif|jpg|jpeg|png';
		#$config['remove_spaces'] = TRUE;
		#$config['file_name'] = $username;
		#$this->load->library("upload",$config);
		$this->load->model('Check_mails');
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
		if( $check_mail == TRUE && $check_username == TRUE )
		{

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
						  'name' => $name,
						  'lastname' => $lastname,
						  'password'=> $pass,
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
		$this->load->view('css/home_css.css');
		$this->load->view('welcome');
	}
}