<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function show_table()
	{
		$this->load->model('Get_infos');
		$data ['query'] = $this->Get_infos->get_info();
		$this->load->view('Show_table',$data);
	}
	public function add_user()
	{
		$name = $this->input->post('name');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$tel = $this->input->post('tel');
		$this->load->model('Check_mails');
		if($this->Check_mails->check($email))
		{
			$data = array('name' => $name,'lastname' => $lastname, 'email' => $email, 'tel'=> $tel );
			$this->load->model('Add_users');
			$this->load->model('Email');
			if($this->Add_users->add($data) && $this->Email->sent_email($name,$lastname,$email,$tel))
			{
				$this->load->view('welcome_message');
				$this->load->view('Alert');
				$this->load->database();
				$this->load->model('Get_infos');
				$data ['query'] = $this->Get_infos->get_info();
				$this->load->view('Show_table',$data);

			}
			else
			{
				$this->load->view('welcome_message');
			}
		}else
		{
		$this->load->view('welcome_message');
		$this->load->view('Alertx');
		}
	}
}
