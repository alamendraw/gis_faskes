<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('users');  
		$this->load->library('password'); 

	}
	public function index()
	{ 
		if($this->session->userdata('logged_in')){
			redirect('home', 'refresh');
		}else{
			$this->load->view('login');
		}
	}
	
	public function signout()
	{
		$this->session->unset_userdata(['logged_in', 'login_user']);
		redirect('/');
	}

	public function signin(){ 
		$username 	= $_REQUEST['username'];
		$password 	= $_REQUEST['password'];
	 
		$user = $this->check_user($username);
		if($user){
			$verify = $this->verify($user, $password);
			if ($verify) {
				redirect('home', 'refresh');
			}else{
				echo 'Username and Password did not match';
			}
		}else{
			echo 'Username is Not Registered';
		}
		
	}
	 
	private function check_user($username)
	{
		$user = $this->users->get(['username' => $username]);
		if ($user) {
		return $user;
		}
		return false;
	}

	private function verify($user, $password){
		$verify = $this->password->check_password($password, $user->password);

		if ($verify) {
		$this->users->update(['last_login' => date('Y-m-d H:i:s')], $user->id);
		$this->set_session($user);
		return true;
		}
		return false;
	}

	private function set_session($user) {  
		$session_data = array(
		  'logged_in' => TRUE,
		  'login_user' => [
			'id' => $user->id,
			'group_id' => $user->group_id, 
			'email' => $user->email,
			'name' => $user->name,
			'username' => $user->username, 
			'image' => $user->image
		  ]
		);
	
		$this->session->set_userdata($session_data);
	
		return true;
	  }
}
