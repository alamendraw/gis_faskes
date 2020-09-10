<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
	public function __construct()
	{
	  parent::__construct();
  
	  
	  $this->load->library('upload');
	  $this->load->library('cloudinarylib');
	  $this->load->library('password'); 
	  $this->load->model('homes'); 
	  $this->load->model('users'); 
	   
	}
	public function index()
	{ 
		$this->load->view('template');
	}

	public function getContent(){ 
		$this->load->view('content');  
	}
	public function test(){ 
		$mpdf = new \Mpdf\Mpdf();
		$data = 'alam';
		$mpdf->WriteHTML($data);
		$mpdf->Output();
	}

	public function profile(){ 
		$this->output->set_template('template');
		$this->output->set_title('Profile');
		  
		$this->data['title'] = 'Profile';
		$this->data['list'] = $this->homes->get_profile();
		$this->load->view('master/profile',$this->data);
	}

	public function update_profile(){   
		$data = $this->input->post(null, true); 
		$id = userinfo('id');
		$image='';
		$config['upload_path'] = './assets/images/user/';  
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE; 
		$this->upload->initialize($config);
		if(!empty($_FILES['image']['name']))
		{
			if ($this->upload->do_upload('image'))
			$gbr = $this->upload->data();
			$image=$gbr['file_name'];  
			$upload = \Cloudinary\Uploader::upload($gbr['full_path'], $options = array(
				'folder' => 'mjnh',
				'public_id' => $image,
				'resource_type' => 'image'
			));
			if ($upload) {
				$image_name = $upload['secure_url'];
				unlink($gbr['full_path']);
			}
			
		}
		$data['password'] = $this->password->hash_password($data['pass']);
		unset($data['pass']);
		$data['image'] = $image_name; 
		$query = $this->users->update($data,$id);
		$return = [
		'status' => 'success',
		'message' => ''
		];

     	echo json_encode($return);
     
	}
}
