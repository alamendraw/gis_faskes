<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();  
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}   
		$this->load->model('homes');
		// $this->data['url'] = site_url('home');    
		$this->data = [  
			'url'              => site_url('home'), 
			'menu'              => ['menu' => 'dashboard', 'submenu' => ''], 
		];

	}
	public function index()
	{  
		$this->output->set_template('template');
		$this->output->set_title('Dashboard'); 
		$this->data['title'] = 'Dashboard';   
		$this->load->view('home',$this->data);
		
	}

	public function get_bar_chart(){
		$data = $this->homes->get_dash();
		echo json_encode($data);
	}

	public function get_pie_chart(){
		$label = array(); 
		$data_label = $this->homes->pie_chart();
		foreach($data_label as $r_label){
			array_push($label,$r_label['kondisi']);
		}
		
		$value = array();
		$data_value = $this->homes->pie_chart();
		foreach($data_value as $r_total){
			array_push($value, (int)$r_total['total']);
		}
		
		$data['label'] = $label;
		$data['total'] = $value;
		echo json_encode($data);
	}

	function get_404(){
		$this->data = [  
			'url'              => site_url('home'), 
			'menu'              => ['menu' => '404', 'submenu' => ''], 
		];
		$this->output->set_template('template');
		$this->output->set_title('404');  
		$this->load->view('404',$this->data);

	}
	function coming_soon(){
		$this->output->set_template('template');
		$this->output->set_title('404');  
		$this->load->view('coming_soon');

	}

	public function dashboard(){
		$this->output->set_template('template');
		$this->output->set_title('Dashboard');
		  
		$this->data['title'] = 'Dashboard'; 
		$this->load->view('dashboard',$this->data);
	}

	public function getContent(){ 
		$this->load->view('content');  
	}
	public function test(){ 
		$this->load->view('test');  
	}
}
