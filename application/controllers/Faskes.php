<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faskes extends CI_Controller {
	public function __construct()
	{
		parent::__construct();  
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}   
		$this->load->model('m_faskes');
		$this->load->model('m_lahan');
		$this->load->model('m_detail_faskes'); 
		$this->load->model('m_perolehan'); 
		$this->load->model('m_gambar'); 
		$this->load->model('m_pemeliharaan'); 
		$this->load->model('m_fasilitas'); 
		$this->load->model('m_posyandu'); 
		$this->load->model('m_pustu'); 
		$this->data = [
			'url' 	=> site_url('data-faskes'), 
			'menu' 	=> ['menu' => 'data_faskes', 'submenu' => ''], 
			'ms_kecamatan' 	=> $this->m_faskes->get_kecamatan(), 
		];
	}

	public function index()
	{
		$this->output->set_template('template');
		$this->output->set_title('Data faskes'); 
		$this->data['title'] = 'Data faskes';   
		$this->data['list'] = $this->m_faskes->list_data();
		$this->load->view('faskes/list',$this->data);
	}

	public function add()
	{  
		$this->output->set_template('template');
		$this->output->set_title('Tambah Data faskes');
		$this->data['title1'] = 'Identitas faskes';  
		$this->data['title2'] = 'Penggunaan Lahan';   
		$this->data['title3'] = 'Data Lainnya';   
		$this->data['title4'] = 'Prestasi faskes';   
		$this->data['title5'] = 'Asal Perolehan';   
		$this->data['title6'] = 'Upload Gambar';   
		$this->data['title7'] = 'Pemeliharaan';    
		$this->data['title8'] = 'Posyandu';
		$this->data['title9'] = 'Pustu';
		$this->data['action'] = 'create';  
		$this->load->view('faskes/form',$this->data);		
	}

	private function get_gambar($kond){
		$data = $this->m_gambar->get($kond);
		if($data){
			return $data->nama_gambar;
		}else{
			return '';
		}
	}
 
	public function edit($id)
	{  
		$this->output->set_template('template');
		$this->output->set_title('Edit Data faskes');
		$this->data['title1'] = 'Edit Identitas faskes';  
		$this->data['title2'] = 'Edit Penggunaan Lahan';   
		$this->data['title3'] = 'Edit Data Lainnya';   
		$this->data['title4'] = 'Edit Prestasi faskes';   
		$this->data['title5'] = 'Edit Asal Perolehan'; 
		$this->data['title6'] = 'Upload Gambar';   
		$this->data['title7'] = 'Pemeliharaan';    
		$this->data['title8'] = 'Posyandu';
		$this->data['title9'] = 'Pustu';
		$this->data['action'] = 'update';   
		$this->data['data'] = $this->m_faskes->get_data($id)[0]; 
		
		$this->data['image0'] = $this->get_gambar(['id_faskes'=>$id, 'nama_gambar !=' => NULL, 'type'=>'image','urut'=>'0']);
		$this->data['image1'] = $this->get_gambar(['id_faskes'=>$id, 'nama_gambar !=' => NULL, 'type'=>'image','urut'=>'1']);
		$this->data['image2'] = $this->get_gambar(['id_faskes'=>$id, 'nama_gambar !=' => NULL, 'type'=>'image','urut'=>'2']);
		$this->data['image3'] = $this->get_gambar(['id_faskes'=>$id, 'nama_gambar !=' => NULL, 'type'=>'image','urut'=>'3']);
		$this->data['image4'] = $this->get_gambar(['id_faskes'=>$id, 'nama_gambar !=' => NULL, 'type'=>'image','urut'=>'4']);
		$this->data['image5'] = $this->get_gambar(['id_faskes'=>$id, 'nama_gambar !=' => NULL, 'type'=>'image','urut'=>'5']);
		$this->data['img360'] = $this->get_gambar(['id_faskes'=>$id, 'nama_gambar !=' => NULL, 'type'=>'360']);
		$this->data['video'] = $this->get_gambar(['id_faskes'=>$id, 'nama_gambar !=' => NULL, 'type'=>'video']);
		$this->data['pelihara'] = $this->m_pemeliharaan->get_detail($id);
		$this->data['posyandu'] = $this->m_posyandu->get_all(['id_faskes'=>$id, 'deleted_at' => NULL]);
		$this->data['pustu'] = $this->m_pustu->get_all(['id_faskes'=>$id, 'deleted_at' => NULL]);
// echo json_encode($this->data['data']); die;
		$this->load->view('faskes/form',$this->data);		
	}

	public function save_identitas(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);  
		$action = $data['action'];
		
		$field['nm_faskes'] = $data['nm_faskes'];
		$field['tipe_faskes'] = $data['tipe_faskes'];
		$field['kondisi'] = $data['kondisi'];
		$field['status_faskes'] = $data['status_faskes'];
		$field['sk_pendirian'] = $data['sk_pendirian'];
		$field['sk_ijin_operasional'] = $data['sk_ijin_operasional'];
		$field['sertifikasi_iso'] = $data['sertifikasi_iso'];
		$field['alamat'] = $data['alamat'];
		$field['kelurahan'] = $data['kelurahan'];
		$field['kecamatan'] = $data['kecamatan'];
		$field['kode_pos'] = $data['kode_pos'];
		$field['telepon'] = $data['telepon'];
		$field['website'] = $data['website'];
		$field['email'] = $data['email'];
		$field['npwp'] = $data['npwp'];
		$field['lat'] = $data['lat'];
		$field['lon'] = $data['lon'];

		if($action=='create'){ 
			$save = $this->m_faskes->insert($field);
			$this->m_lahan->insert(['id_faskes'=>$save]);
			$this->m_detail_faskes->insert(['id_faskes'=>$save]); 
			$this->m_perolehan->insert(['id_faskes'=>$save]);
			$this->m_fasilitas->insert(['id_faskes'=>$save]);
			$this->m_posyandu->insert(['id_faskes'=>$save]);
			$this->m_pustu->insert(['id_faskes'=>$save]);
			  
			for ($i=0; $i < 6; $i++) { 
				$this->m_gambar->insert(['id_faskes'=>$save,'type'=>'image','urut'=>$i]);
			} 
			$this->m_gambar->insert(['id_faskes'=>$save,'type'=>'360','urut'=>'6']);
			$this->m_gambar->insert(['id_faskes'=>$save,'type'=>'video','urut'=>'7']);

			$this->m_pemeliharaan->insert(['id_faskes'=>$save]);  
		}else{
			$save = $this->m_faskes->update($field,$data['id']);
		}
		 
		if($save){
			if($action=='create'){
				$return['type'] = 'add';
				$return['id_faskes'] = $save;
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Tersimpan.';
			}else{
				$return['type'] = 'edit';
				$return['status'] = 'success';
				 $return['message'] = 'Data Berhasil Diubah.';
			}
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}

	public function save_lahan(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);  
		$action = $data['action'];
   
		unset($data['action']); 
		if (substr($data['area'], 0,2) != '[[') {
			$data['area'] = str_replace('LatLng(', '[', $data['area']);
			$data['area'] = str_replace(')', ']', $data['area']);
			$data['area'] = '['.$data['area'].']';
		}
		
		$save = $this->m_lahan->update($data,$data['id_faskes']);
		 
		if($save){
			if($action=='create'){
				$return['type'] = 'add'; 
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Tersimpan.';
			}else{
				$return['type'] = 'edit';
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Diubah.';
			} 
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}

	public function save_detail(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);  
		$action = $data['action'];
		$data['id_faskes'] = $data['id_faskes2'];

		unset($data['action']); 
		unset($data['id_faskes2']); 
		 
		$save = $this->m_detail_faskes->update($data,$data['id_faskes']);
		 
		if($save){
			if($action=='create'){
				$return['type'] = 'add'; 
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Tersimpan.';
			}else{
				$return['type'] = 'edit';
				$return['status'] = 'success';
				 $return['message'] = 'Data Berhasil Diubah.';
			} 
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}
 

	public function save_perolehan(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);  
		$action = $data['action'];
		$data['id_faskes'] = $data['id_faskes4'];

		unset($data['action']); 
		unset($data['id_faskes4']); 

		$save = $this->m_perolehan->update($data,$data['id_faskes']);

		if($save){
			if($action=='create'){
				$return['type'] = 'add'; 
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Tersimpan.';
			}else{
				$return['type'] = 'edit';
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Diubah.';
			} 
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}

	public function save_fasilitas(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);  
		$action = $data['action'];
		$data['id_faskes'] = $data['id_faskes3'];

		unset($data['action']); 
		unset($data['id_faskes3']); 

		$save = $this->m_fasilitas->update($data,$data['id_faskes']);

		if($save){
			if($action=='create'){
				$return['type'] = 'add'; 
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Tersimpan.';
			}else{
				$return['type'] = 'edit';
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Diubah.';
			} 
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}

	public function save_posyandu(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);  
		$action = $data['action']; 
 
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|mp4';
		$config['max_size']             = 9000000;
		$config['max_width']            = 53048;
		$config['max_height']           = 33000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
		for ($i=0; $i <= 3; $i++) {
			if(!empty($_FILES['pos_foto'.$i]['name'])){
				$_FILES['file']['name'] = $_FILES['pos_foto'.$i]['name'];
				$_FILES['file']['type'] = $_FILES['pos_foto'.$i]['type'];
				$_FILES['file']['tmp_name'] = $_FILES['pos_foto'.$i]['tmp_name'];
				$_FILES['file']['error'] = $_FILES['pos_foto'.$i]['error'];
				$_FILES['file']['size'] = $_FILES['pos_foto'.$i]['size']; 
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();   
					$urut = $i+1;
					$field['foto_'.$urut] = $uploadData['file_name'] ;
				 
					
				} 
			}
		}
 
		$field['id_faskes'] = $data['id_faskes7'];
		$field['nm_posyandu'] = $data['pos_nama'];
		$field['alamat'] = $data['pos_alamat'];
		$field['lon'] = $data['pos_lon'];
		$field['lat'] = $data['pos_lat']; 
 
		if($data['pos_type']=='insert'){
			$save = $this->m_posyandu->insert($field);
		}else{
			$save = $this->m_posyandu->update($field,['id_faskes'=>$field['id_faskes'], 'id'=>$data['pos_id']]);
		}
 
		if($save){
			if($data['pos_type']=='insert'){
				$return['type'] = 'add'; 
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Tersimpan.';
			}else{
				$return['type'] = 'edit';
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Diubah.';
			} 
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}

	public function save_pustu(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);  
		$action = $data['action']; 
 
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|mp4';
		$config['max_size']             = 9000000;
		$config['max_width']            = 53048;
		$config['max_height']           = 33000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
		for ($i=0; $i <= 3; $i++) {
			if(!empty($_FILES['pus_foto'.$i]['name'])){
				$_FILES['file']['name'] = $_FILES['pus_foto'.$i]['name'];
				$_FILES['file']['type'] = $_FILES['pus_foto'.$i]['type'];
				$_FILES['file']['tmp_name'] = $_FILES['pus_foto'.$i]['tmp_name'];
				$_FILES['file']['error'] = $_FILES['pus_foto'.$i]['error'];
				$_FILES['file']['size'] = $_FILES['pus_foto'.$i]['size']; 
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();   
					$urut = $i+1;
					$field['foto_'.$urut] = $uploadData['file_name'] ;
				 
					
				} 
			}
		}
 
		$field['id_faskes'] = $data['id_faskes8'];
		$field['nm_pustu'] = $data['pus_nama'];
		$field['alamat'] = $data['pus_alamat'];
		$field['lon'] = $data['pus_lon'];
		$field['lat'] = $data['pus_lat']; 
 
		if($data['pus_type']=='insert'){
			$save = $this->m_pustu->insert($field);
		}else{
			$save = $this->m_pustu->update($field,['id_faskes'=>$field['id_faskes'], 'id'=>$data['pus_id']]);
		}
 
		if($save){
			if($data['pus_type']=='insert'){
				$return['type'] = 'add'; 
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Tersimpan.';
			}else{
				$return['type'] = 'edit';
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Diubah.';
			} 
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}

	public function save_pemeliharaan(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);  
		$action = $data['action'];
		$data['id_faskes'] = $data['id_faskes6'];

		unset($data['action']); 
		unset($data['id_faskes6']); 
		$total_data = count($data['nilai']);
		  
		if($total_data){
			$this->m_pemeliharaan->delete(['id_faskes' =>$data['id_faskes']]);
			for ($i=0; $i <$total_data ; $i++) { 
				$val['tahun'] = $data['tahun'][$i];
				$val['nilai'] = str_replace(',','',$data['nilai'][$i]) ;
				$val['id_faskes'] = $data['id_faskes'];
				$val['id_perolehan'] = $this->m_perolehan->get_id($data['id_faskes']);
				if($data['nilai'][$i] && $data['nilai'][$i]!='0.00'){
					$this->m_pemeliharaan->insert($val);
				}
				
			} 
			$save = true;
		}else{
			$save = false;
		}
		 
		if($save){
			if($action=='create'){
				$return['type'] = 'add'; 
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Tersimpan.';
			}else{
				$return['type'] = 'edit';
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Diubah.';
			} 
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}

	public function save_gambar(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);  
		$action = $data['action'];
		$data['id_faskes'] = $data['id_faskes5'];
		 
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|mp4';
		$config['max_size']             = 9000000;
		$config['max_width']            = 53048;
		$config['max_height']           = 33000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
		for ($i=0; $i <= 7; $i++) {
			
			if(!empty($_FILES['filefoto'.$i]['name'])){
				$_FILES['file']['name'] = $_FILES['filefoto'.$i]['name'];
				$_FILES['file']['type'] = $_FILES['filefoto'.$i]['type'];
				$_FILES['file']['tmp_name'] = $_FILES['filefoto'.$i]['tmp_name'];
				$_FILES['file']['error'] = $_FILES['filefoto'.$i]['error'];
				$_FILES['file']['size'] = $_FILES['filefoto'.$i]['size']; 
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();   
					 
					$nm_img = $uploadData['file_name'] ;
					$img_ins['id_faskes'] = $data['id_faskes'];
					$img_ins['urut'] = $i;
					$img_ins['nama_gambar'] = $nm_img;

					if($i<=5){ // Gambar biasa
						$cek = $this->get_gambar(['id_faskes'=>$data['id_faskes'],'type'=>'image','urut'=>$i]); 
						if(isset($cek)){							 
							$save = $this->m_gambar->update(['nama_gambar'=>$nm_img],['id_faskes'=>$data['id_faskes'],'urut'=>$i]);
						}else{
							$img_ins['type'] = 'image';
							$save = $this->m_gambar->insert($img_ins);
						}
					}else if($i==6){ // Gambar 360
						$cek = $this->get_gambar(['id_faskes'=>$data['id_faskes'], 'type'=>'360']);
						if(isset($cek)){							 
							$save = $this->m_gambar->update(['nama_gambar'=>$nm_img],['id_faskes'=>$data['id_faskes'],'urut'=>$i]);
						}else{
							$img_ins['type'] = '360';
							$save = $this->m_gambar->insert($img_ins);
						}
					}else if($i==7){ // Video
						$cek = $this->get_gambar(['id_faskes'=>$data['id_faskes'], 'type'=>'video']);
						if(isset($cek)){							 
							$save = $this->m_gambar->update(['nama_gambar'=>$nm_img],['id_faskes'=>$data['id_faskes'],'urut'=>$i]);
						}else{
							$img_ins['type'] = 'video';
							$save = $this->m_gambar->insert($img_ins);
						}
					}
					
				} 
			}
			
		} 
		 
		if($action=='create'){
			$return['type'] = 'add'; 
			$return['status'] = 'success';
			$return['message'] = 'Data Berhasil Tersimpan.';
		}else{
			$return['type'] = 'edit';
			$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Diubah.';
		} 
		 
		echo json_encode($return);
	}

	public function delete($id){
		$delete = $this->m_faskes->delete(['id'=>$id]);
		 
		$del_lahan =$this->m_lahan->delete(['id_faskes'=>$id]);
		$del_detail_faskes =$this->m_detail_faskes->delete(['id_faskes'=>$id]); 
		$del_perolehan =$this->m_perolehan->delete(['id_faskes'=>$id]);

		if($delete){
			$return['status'] = 'success';
			$return['title'] = 'Sukses !';
			$return['message'] = 'Data Berhasil Terhapus.';
		}else{
			$return['status'] = 'error';
			$return['title'] = 'Gagal !';
			$return['message'] = 'Data Gagal Terhapus.';
		}
		
		echo json_encode($return);
	}
	
	public function get_detpos(){
		$id 		= $this->input->get('id');
		$id_faskes 	= $this->input->get('id_faskes');
		$result = $this->m_posyandu->get(['id_faskes'=>$id_faskes, 'id'=>$id]);
		echo json_encode($result);
	}

	public function get_detpus(){
		$id 		= $this->input->get('id');
		$id_faskes 	= $this->input->get('id_faskes');
		$result = $this->m_pustu->get(['id_faskes'=>$id_faskes, 'id'=>$id]);
		echo json_encode($result);
	}

	public function delete_posyandu(){
		$id = $this->input->post('id');
		$id_faskes = $this->input->post('id_faskes');
		for ($i=0; $i < count($id); $i++) { 
			$where['id'] = $id[$i];
			$where['id_faskes'] = $id_faskes;
			$proces = $this->m_posyandu->delete($where);
		}

		$return['title'] = 'Berhasil';
		$return['status'] = 'success';
		$return['message'] = 'Data Berhasil Dihapus.';
		echo json_encode($return);
	}

	public function delete_pustu(){
		$id = $this->input->post('id');
		$id_faskes = $this->input->post('id_faskes');
		for ($i=0; $i < count($id); $i++) { 
			$where['id'] = $id[$i];
			$where['id_faskes'] = $id_faskes;
			$proces = $this->m_pustu->delete($where);
		}

		$return['title'] = 'Berhasil';
		$return['status'] = 'success';
		$return['message'] = 'Data Berhasil Dihapus.';
		echo json_encode($return);
	}

	public function remove_image(){
		$nm_img = $this->input->post('nm_img');
		$id_fas = $this->input->post('id_fas');
		$proses = $this->m_gambar->delete(['nama_gambar'=>$nm_img, 'id_faskes'=>$id_fas]);
		$return['title'] = 'Berhasil';
		$return['status'] = 'success';
		$return['message'] = 'Gambar Berhasil Dihapus.';
		echo json_encode($return);
	}
}
