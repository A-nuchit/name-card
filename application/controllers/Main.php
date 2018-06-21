<?php

class Main extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		echo "main Controller";
	}
	public function detail($id)
	{
		echo $id;
	}
 
}