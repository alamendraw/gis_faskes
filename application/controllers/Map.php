<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller { 
	public function __construct()
	{
		parent::__construct();  
	 
		$this->load->model('m_map','model');
		$this->data['url'] = site_url('dashboard');    
		

	}
	public function index()
	{  
		$this->data['nm_faskes'] = $this->model->get_faskes();
		$this->data['kecamatan'] = $this->model->kecamatan();  
		$this->data['title'] = 'Dashboard';  
		$this->data['geojson'] = $this->model->get_map()['geojson'];  
		$this->data['lat'] = $this->model->get_map()['lat'];  
		$this->data['lon'] = $this->model->get_map()['lon'];  
		$this->data['zoom'] = $this->model->get_map()['zoom'];  
		$this->load->view('map/v_map',$this->data);	
	} 

	public function kib_get(){ 
		$kec = $_REQUEST['kec'];
		$data = $this->model->get_kib($kec);
		 
		echo json_encode($data);
	}

	// public function get_faskes(){
	// 	$data = $this->model->get_faskes();
	// 	echo json_encode($data);
	// }

	public function detail_data(){ 
		$id = $this->input->get('id'); 
		$data = $this->model->detail_data($id)[0];
		$data['pemeliharaan'] = $this->model->get_pelihara($id); 
		$data['gambar'] = $this->model->get_gambar($id); 
		$data['image_360'] = $this->model->get_gambar360($id); 
		$data['video'] = $this->model->get_video($id); 
		echo json_encode($data);
	}
 
	public function remove_marker_data(){ 
		$kondisi = $this->input->get('kondisi');
		$data = $this->model->remove_marker_data($kondisi);
		echo json_encode($data);
	}

	public function get_marker_data(){  
		$jenis = $this->input->get('jenis');
		$kec = $this->input->get('kec');
		$nama = $this->input->get('nama');
		$status = $this->input->get('status');
		$tipe = $this->input->get('tipe');
		$ch_baik = $this->input->get('ch_baik');
		$ch_rusak_ringan = $this->input->get('ch_rusak_ringan');
		$ch_rusak_sedang = $this->input->get('ch_rusak_sedang');
		$ch_rusak_berat = $this->input->get('ch_rusak_berat');

		$ch_less_3 = $this->input->get('ch_less_3');
		$ch_between45 = $this->input->get('ch_between45');
		$ch_more5 = $this->input->get('ch_more5');

		$kondisi = array();
		if($ch_baik=="true"){ array_push($kondisi,'B'); }
		if($ch_rusak_ringan=="true"){ array_push($kondisi,'RR'); }
		if($ch_rusak_sedang=="true"){ array_push($kondisi,'RS'); }
		if($ch_rusak_berat=="true"){ array_push($kondisi,'RB'); }
 
		$data = $this->model->get_marker_data($jenis,$kondisi,$kec,$nama,$status,$tipe); 
		 
		// echo json_encode($data[15]['id_barang']); die; 
		 
		
		$selisih =0; $total =0; $html='';
		for ($i=0; $i < count($data) ; $i++) { 
			$pelihara = $this->model->get_pelihara($data[$i]['id']);
			$html .="<table width='100%' border='1' style='border-color:solid 1px #c1c1c1'>
			<tr>
				<td colspan='2' align='center'><b>Data Pemeliharaan</b></td> 
			</tr>
			<tr>
				<td width='40%' align='center'><b>Tahun</b></td>
				<td width='60%' align='center'><b>Nilai</b></td>
			</tr>";

			foreach($pelihara as $list){
				$html.="<tr>
					<td align='center'>".$list['tahun']."</td>
					<td align='right'>".number_format($list['nilai'],2)."</td>
				</tr>";
				$total = $total+$list['nilai'];
				$thn_pelihara = $list['tahun'];
			}
 
			$html.="<tr>
					<td align='center'><b>Total</b></td>
					<td align='right'><b>".number_format($total,2)."</b></td>
				</tr>";
			$html.="</table>";
			$data[$i]['pemeliharaan'] = $html;
 
			if(isset($thn_pelihara)){
				$data[$i]['akhir_pelihara'] = $thn_pelihara;
				$selisih = date("Y") - $thn_pelihara;
				$data[$i]['selisih'] = $selisih;
			}else{
				$data[$i]['akhir_pelihara'] = '-';
				$data[$i]['selisih'] = 0;
			}
			 
		}
		echo json_encode($data);
	}
}
