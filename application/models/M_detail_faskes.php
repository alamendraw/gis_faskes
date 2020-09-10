<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_detail_faskes extends MY_Model {

  public $table = 'detail_faskes';
  public $primary_key = 'id_faskes';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = TRUE;
  } 
  public function check($id){
    $query = $this->db->query("select * from $this->table where id_faskes='$id'");
    return $query->result_array();
  }
}