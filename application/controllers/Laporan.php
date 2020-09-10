<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();  
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}   
		
		$this->mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$this->mpdf->SetFooter('Printed on GIS Aset Faskes');
		$this->load->model('m_laporan');  
	}
	
	public function rekap_tahun(){
		$this->data = [
			'url'              => '', 
			'menu'              => ['menu' => 'laporan', 'submenu' => 'rekap_tahun'], 
		];
		$this->output->set_template('template');
		$this->output->set_title('Laporan Rekap Tahun');  
		$this->data['title'] = 'Laporan Rekap Tahun';
		$this->load->view('laporan/rekap_tahun',$this->data); 
	}

	public function rekap_tahun_data(){
		$data = $this->m_laporan->rekap_tahun();
		echo json_encode($data);
	}
 
	public function rekap_tahun_pdf(){
		$data = $this->m_laporan->rekap_tahun(); 
		$this->mpdf->WriteHTML($data);
		$this->mpdf->Output();
	}
 
	public function rekap_kondisi(){
		$this->data = [
			'url'              => '', 
			'menu'              => ['menu' => 'laporan', 'submenu' => 'rekap_kondisi'], 
		];
		$this->output->set_template('template');
		$this->output->set_title('Laporan Rekap Kondisi');  
		$this->data['title'] = 'Laporan Rekap Kondisi';
		$this->load->view('laporan/rekap_kondisi',$this->data); 
	}

	public function rekap_kondisi_data(){
		$data = $this->m_laporan->rekap_kondisi();
		echo json_encode($data);
	}
 
	public function rekap_kondisi_pdf(){
		$data = $this->m_laporan->rekap_kondisi(); 
		$this->mpdf->WriteHTML($data);
		$this->mpdf->Output();
	}
 
}
