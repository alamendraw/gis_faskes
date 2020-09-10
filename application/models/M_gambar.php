<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_gambar extends MY_Model {

  public $table = 'gambar';
  public $primary_key = 'id_faskes';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 
 
  
}