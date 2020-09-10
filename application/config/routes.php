<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
$route['default_controller'] = 'map';
$route['404_override'] = 'home/get_404';
$route['coming_soon'] = 'home/coming_soon';
$route['translate_uri_dashes'] = FALSE;

$route['manage'] = 'login';
$route['admin'] = 'login';
//Form faskes
$route['data-faskes'] = 'faskes';
$route['data-faskes-add'] = 'faskes/add';
$route['data-faskes-save-identitas'] = 'faskes/save_identitas';
$route['data-faskes-save-lahan'] = 'faskes/save_lahan';
$route['data-faskes-save-perolehan'] = 'faskes/save_perolehan';
$route['data-faskes-save-detail'] = 'faskes/save_detail';
$route['data-faskes-save-fasilitas'] = 'faskes/save_fasilitas';
$route['data-faskes-save-posyandu'] = 'faskes/save_posyandu';
$route['data-faskes-save-pustu'] = 'faskes/save_pustu';
$route['data-faskes-save-gambar'] = 'faskes/save_gambar';
$route['data-faskes-save-pemeliharaan'] = 'faskes/save_pemeliharaan';
$route['data-faskes-edit/(:any)'] = 'faskes/edit/$1';
$route['data-faskes-delete/(:any)'] = 'faskes/delete/$1';

//Laporan 
$route['laporan-rekap-tahun']       = 'laporan/rekap_tahun';
$route['laporan-rekap-tahun-data']  = 'laporan/rekap_tahun_data';
$route['laporan-rekap-tahun-pdf']   = 'laporan/rekap_tahun_pdf';

$route['laporan-rekap-kondisi']         = 'laporan/rekap_kondisi';
$route['laporan-rekap-kondisi-data']    = 'laporan/rekap_kondisi_data';
$route['laporan-rekap-kondisi-pdf']     = 'laporan/rekap_kondisi_pdf';

//API
$route['update-data'] = 'api';
$route['total-asset'] = 'api/total_assets';
$route['total-pelihara'] = 'api/total_pemeliharaan';
$route['total-gis'] = 'api/total_gis';
$route['proses-asset/(:any)'] = 'api/update_assets/$1';
$route['proses-pelihara/(:any)'] = 'api/update_pemeliharaan/$1';
$route['proses-gis/(:any)'] = 'api/update_gis/$1';
 

// $route['master-penandatangan/del/(:any)'] 	= 'cs/master/PenandatanganControllers/del/$1';