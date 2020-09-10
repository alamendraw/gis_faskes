<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pustu extends MY_Model {

  public $table = 'pustu';
  public $primary_key = 'id_faskes';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = TRUE;
  }  
  
}