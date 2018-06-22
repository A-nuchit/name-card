<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Add_users');
		$this->load->model('Email');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	

	public function index()
	{
		$this->load->view('Login_form');
	}
	public function show_table()
	{
		$this->load->model('Get_infos');
		$data ['query'] = $this->Get_infos->get_info();
		$this->load->view('Show_table',$data);
	}
	public function register(){
		$this->load->view('welcome_message');
	}
	public function login(){
			$data = array(
				'name' => $this->input->post('name'),
				'password' => $this->input->post('password')
				);
			 if($this->Add_users->login_user($data)){
			 	
			 }
		}
	public function add_user()
	{
		$config['upload_path'] = 'assets/images/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '1024';
		$config['remove_spaces'] = TRUE;
		$config['file_name'] = $_FILES['featured']['name'];

		$this->load->library("upload",$config);
		if ($this->upload->do_upload('featured')) {
			$uploadData = $this->upload->data();
			$pic = $uploadData['file_name'];
		} else {
			$errors = $this->upload->display_errors();
			echo $errors;
 		}

		$name = $this->input->post('name');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$tel = $this->input->post('tel');
		$pass = $this->input->post('password');
		$c_pass = $this->input->post('confirm-password');
		$this->load->model('Check_mails');
		if($this->Check_mails->check($email))
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
			$data = array('name' => $name,'lastname' => $lastname,'password'=> $pass, 'email' => $email, 'tel'=> $tel, 'pic'=>$pic );
				if($this->Add_users->add($data) && $this->Email->sent_email($name,$lastname,$email,$tel))
				{
					$this->load->view('Login_form');
				}
				else
				{
					echo "debug3";
					$this->load->view('welcome_message');
				}
			}
		}else
		{
		$this->load->view('welcome_message');
		$this->load->view('Alertx');
		}
	}
}
