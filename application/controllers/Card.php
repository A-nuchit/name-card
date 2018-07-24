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


}