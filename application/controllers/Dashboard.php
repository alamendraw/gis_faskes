<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();  
	 
		$this->load->model('m_dashboard','model');
		$this->data['url'] = site_url('dashboard');    
		

	}
	public function index()
	{  
		
		$this->data['kecamatan'] = $this->model->kecamatan();  
		$this->data['title'] = 'Dashboard';  
		$this->load->view('dashboard/index',$this->data);		
	} 

	public function kib_get(){ 
		$kec = $_REQUEST['kec'];
		$data = $this->model->get_kib($kec);
		 
		echo json_encode($data);
	}
 
	public function detail_data(){ 
		$id = $this->input->get('id'); 
		$data = $this->model->detail_data($id)[0];
		$data['total_pelihara'] = number_format(($data['nilai_pelihara1']+$data['nilai_pelihara2']+$data['nilai_pelihara3']),2);
		$data['nilai_pelihara1'] = number_format($data['nilai_pelihara1'],2);
		$data['nilai_pelihara2'] = number_format($data['nilai_pelihara2'],2);
		$data['nilai_pelihara3'] = number_format($data['nilai_pelihara3'],2);
		echo json_encode($data);
	}
 
	public function get_marker_data(){ 
		$id = $this->input->get('data_id'); 
		$data = $this->model->get_marker_data($id); 
		for ($i=0; $i < count($data) ; $i++) { 
			   
			if($data[$i]['tahun_pelihara1']){
				$thn_pelihara = $data[$i]['tahun_pelihara1'];
			}
			if($data[$i]['tahun_pelihara2'] ){
				$thn_pelihara = $data[$i]['tahun_pelihara2'];
			}
			if($data[$i]['tahun_pelihara3']){
				$thn_pelihara = $data[$i]['tahun_pelihara3'];
			} 
			if(isset($thn_pelihara)){
				$data[$i]['akhir_pelihara'] = $thn_pelihara;
				$data[$i]['selisih'] = date("Y") - $thn_pelihara;
			}else{
				$data[$i]['akhir_pelihara'] = '-';
				$data[$i]['selisih'] = 0;
			}
			


			$nilai1 = 0;$nilai2 = 0;$nilai3 = 0;
			$html='';
			$html .="<table width='100%' border='1' style='border-color:solid 1px #c1c1c1'>
			<tr>
				<td colspan='2' align='center'><b>Data Pemeliharaan</b></td> 
			</tr>
			<tr>
				<td width='40%' align='center'><b>Tahun</b></td>
				<td width='60%' align='center'><b>Nilai</b></td>
			</tr>";
			if($data[$i]['tahun_pelihara1']){
				$nilai1 = $data[$i]['nilai_pelihara1'];
				$html.="<tr>
					<td align='center'>".$data[$i]['tahun_pelihara1']."</td>
					<td align='right'>".number_format($nilai1,2)."</td>
				</tr>";
			}
			
			if($data[$i]['tahun_pelihara2']){
				$nilai2 = $data[$i]['nilai_pelihara2'];
				$html.="<tr>
					<td align='center'>".$data[$i]['tahun_pelihara2']."</td>
					<td align='right'>".number_format($nilai2,2)."</td>
				</tr>";
			}
			
			if($data[$i]['tahun_pelihara3']){
				$nilai3 = $data[$i]['nilai_pelihara3'];
				$html.="<tr>
					<td align='center'>".$data[$i]['tahun_pelihara3']."</td>
					<td align='right'>".number_format($nilai3,2)."</td>
				</tr>";
			}

			$total = $nilai1+$nilai2+$nilai3;
			$html.="<tr>
					<td align='center'><b>Total</b></td>
					<td align='right'><b>".number_format($total,2)."</b></td>
				</tr>";
			$html.="</table>";
			$data[$i]['pemeliharaan'] = $html;

		}
		echo json_encode($data);
	}
 
	public function detail(){
		$lat = $_REQUEST['lat'];
		$lng = $_REQUEST['lng'];
		$data = $this->model->detail_kib($lat,$lng);
		echo json_encode($data);
	}

	public function image_get(){
		$id = $_REQUEST['id']; 
		$data = $this->model->image($id);
		echo json_encode($data);
	}
}
