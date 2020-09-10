<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller { 
	public function __construct()
	{
		parent::__construct();  
		
		$this->load->model('m_faskes');
		$this->load->model('m_lahan');
		$this->load->model('m_detail_faskes'); 
		$this->load->model('m_perolehan'); 
		$this->load->model('m_pemeliharaan'); 
		$this->load->model('m_api'); 
		$this->load->model('m_gambar'); 
		
		$this->link_assets = $this->m_api->get_link()[0]['link_assets'];
		$this->link_pelihara = $this->m_api->get_link()[0]['link_pemeliharaan'];
		$this->data = [
			'url'    		=> site_url(), 
			'menu'			=> ['menu' => 'update_data', 'submenu' => ''], 
			'data_aset' 	=> $this->m_api->get_data_assets(),
		];
		
	} 

	public function index()
	{   
		$this->output->set_template('template');
		$this->output->set_title('Data faskes');
		$this->data['title'] = 'Data faskes';
		$this->data['link_assets'] = $this->link_assets;
		$this->data['link_pelihara'] = $this->link_pelihara;
		$this->load->view('update_data',$this->data);
	}

// Assets
	public function total_assets(){
		$data = json_decode(file_get_contents($this->link_assets));
		echo json_encode(count($data));
	}

	public function update_assets($res){
		$data = json_decode(file_get_contents($this->link_assets))[$res];
			$field = array(
				'id_barang' => $data->id_barang,
				'tahun' => $data->tahun,
				'tgl_oleh' => $data->tgl_oleh,
				'kd_brg' => $data->kd_brg,
				'nm_brg' => $data->nm_brg,
				'detail_brg' => $data->detail_brg,
				'nm_faskes' => $data->nm_faskes,
				'asal' => $data->asal,
				'kondisi' => $data->kondisi,
				'masa_manfaat' => $data->masa_manfaat,
				'lat' => $data->lat,
				'lon' => $data->lon,
				'kecamatan' => $data->kecamatan,
				'alamat' => $data->alamat,
				'foto1' => $data->foto1,
				'foto2' => $data->foto2,
				'foto3' => $data->foto3,
				'keterangan' => $data->keterangan,
				'jenis_gedung' => $data->jenis_gedung,
				'jenjang' => $data->jenjang
			); 
			$check = $this->check_asset($data->id_barang);
			if($check>0){
				$this->db->where('id_barang',$data->id_barang);
				$this->db->update('api_assets', $field);
				$result['type'] = 'update';
			}else{
				$this->db->insert('api_assets', $field); 
				$result['type'] = 'insert';
			} 
			$result['posisi'] =$res+1; 
		echo json_encode($result);
	}

	private function check_asset($id){
		$data = $this->db->query("SELECT count(*) as total from api_assets where id_barang='$id'")->row('total');
		return (int)$data;
	}

// Pemeliharaan	
	public function total_pemeliharaan(){
		$data = json_decode(file_get_contents($this->link_pelihara));
		echo json_encode(count($data));
	}

	public function update_pemeliharaan($res){
		$data = json_decode(file_get_contents($this->link_pelihara))[$res];
			$field = array(  
				'id_barang' => $data->id_barang,
				'nilai' => $data->nilai,
				'keterangan' => $data->keterangan,
				'tmbh_manfaat' => $data->tmbh_manfaat,
				'tahun' => $data->tahun
			); 
			$check = $this->check_pemeliharaan($data->id_barang);
			if($check>0){
				$this->db->where('id_barang',$data->id_barang);
				$this->db->where('tahun',$data->tahun);
				$this->db->update('api_pemeliharaan', $field);
				$result['type'] = 'update';
			}else{
				$this->db->insert('api_pemeliharaan', $field); 
				$result['type'] = 'insert';
			} 
			$result['posisi'] =$res+1; 
		echo json_encode($result);
	}

	private function check_pemeliharaan($id){
		$data = $this->db->query("SELECT count(*) as total from api_pemeliharaan where id_barang='$id'")->row('total');
		return (int)$data;
	}

// gis	
	public function total_gis(){
		$data = $this->m_api->get_count_gis();
		echo json_encode($data);
	}
 
	public function update_gis($res){
		$data = $this->data['data_aset'][$res]; 
			$field_perolehan = array( 
				'id_barang' =>$data['id_barang'],
				'kode_barang' =>$data['kd_brg'], 
				'tahun_pengadaan' =>$data['tahun'], 
				'nm_brg' =>$data['nm_brg'],
				'detail_brg' =>$data['detail_brg'],
				'masa_manfaat' =>$data['masa_manfaat'], 
			); 
			$field_faskes = array(
				'nm_faskes' =>$data['nm_faskes'], 
				'kondisi' =>$data['kondisi'],
				'tahun' =>$data['tahun'],
				'alamat' =>$data['alamat'],
				'kecamatan' =>$data['kecamatan'],
				'lat' =>$data['lat'],
				'lon' =>$data['lon']
			);
			
			$check = $this->m_api->check_gis($data['id_barang']);
			if($check>0){
				unset($field_perolehan['id_barang']);
				$upd_oleh = $this->m_perolehan->update($field_perolehan, array('id_barang'=>$data['id_barang']));
				$id_faskes = $this->m_perolehan->get_id_faskes($data['id_barang']);				 
				$this->m_faskes->update($field_faskes,$id_faskes);
				if($upd_oleh){ 
					$id_peroleh = $this->m_perolehan->get_id_perolehan($data['id_barang']);
					$data_pelihara = $this->m_api->get_pemeliharaan($data['id_barang']);
					$this->m_pemeliharaan->delete(['id_perolehan'=>$id_peroleh]);
					 
					foreach($data_pelihara as $res_pel){
						$res_pelihara['id_faskes'] = $id_faskes;
						$res_pelihara['id_perolehan'] = $id_peroleh;
						$res_pelihara['tahun'] = $res_pel['tahun'];
						$res_pelihara['nilai'] = $res_pel['nilai'];
						$this->m_pemeliharaan->insert($res_pelihara);
					}
				}
				$result['type'] = 'update';
			}else{
				$ins_faskes =  $this->m_faskes->insert($field_faskes);
				// Insert Gambar
				$field_gambar = [
					['id_faskes' =>$ins_faskes,'nama_gambar' =>$data['foto1'],'type' =>'image','urut' =>0],
					['id_faskes' =>$ins_faskes,'nama_gambar' =>$data['foto2'],'type' =>'image','urut' =>1],
					['id_faskes' =>$ins_faskes,'nama_gambar' =>$data['foto3'],'type' =>'image','urut' =>2],
				];
				$this->m_gambar->delete(['id_faskes' =>$ins_faskes]); 
				$this->m_gambar->insert($field_gambar); 
				// Insert Perolehan
				$field_perolehan['id_faskes'] = $ins_faskes;
				$ins_peroleh = $this->m_perolehan->insert($field_perolehan); 
				// Insert Pemeliharaan 
				$data_pelihara = $this->m_api->get_pemeliharaan($data['id_barang']);				
				$this->m_pemeliharaan->delete(['id_perolehan'=>$ins_peroleh]);
				foreach($data_pelihara as $res_pel){
					$res_pelihara['id_faskes'] = $ins_faskes;
					$res_pelihara['id_perolehan'] = $ins_peroleh;
					$res_pelihara['tahun'] = $res_pel['tahun'];
					$res_pelihara['nilai'] = $res_pel['nilai'];
					$this->m_pemeliharaan->insert($res_pelihara);
				}
				// Insert Lahan, Detail, Prestasi 
				$this->m_lahan->insert(array('id_faskes'=>$ins_faskes));
				$this->m_detail_faskes->insert(array('id_faskes'=>$ins_faskes));
				$this->m_prestasi->insert(array('id_faskes'=>$ins_faskes)); 
				$result['type'] = 'insert';
			}
			$result['posisi'] =$res+1; 
		echo json_encode($result);
	}
 
}
