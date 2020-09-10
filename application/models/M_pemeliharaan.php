<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemeliharaan extends MY_Model {

  public $table = 'pemeliharaan';
  public $primary_key = 'id_faskes';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 
  
  public function get_detail($id){
    $this->db->select('tahun,nilai');
    $this->db->from($this->table);
    $this->db->where(['id_faskes'=>$id]);
    $query = $this->db->get();
    return $query->result_array();
  } 
  
}