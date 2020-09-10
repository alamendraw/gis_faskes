<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {
	 
	public function index()
	{  
		$this->load->dbutil();
		$rules = [
			'format' => 'zip',
			'filename' => 'backup_database.sql',
		];

		$backup =& $this->dbutil->backup($rules);
		$databaseName = 'Backup Faskes On'.date("Y-m-d H:i:s").'.zip';
		$save = '/backup'.$databaseName;
		$this->load->helper('file');
		write_file($save,$backup);
		
		$this->load->helper('download');
		force_download($databaseName,$backup);
	}

}
