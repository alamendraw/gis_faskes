<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('users');  
		$this->load->library('password'); 

	}

	public function index()
	{
		$this->load->view('register');
	}

	public function signup(){
		 
		$user['username'] = $_REQUEST['name'];
		$user['password'] = $this->password->hash_password($_REQUEST['password']); 
	   
			$this->users->insert($user);
			redirect('login', 'refresh');
		 
	}
}
