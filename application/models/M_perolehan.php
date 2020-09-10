<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_perolehan extends MY_Model {

  public $table = 'perolehan';
  public $primary_key = 'id_faskes';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = TRUE;
  } 

  public function get_id_faskes($id){
    $this->db->select('id_faskes');
    $this->db->from($this->table);
    $this->db->where('id_barang', $id);
    $query = $this->db->get();
    return $query->result_array()[0]['id_faskes'];
  }
  
  public function get_id_perolehan($id){
    $this->db->select('id as id_perolehan');
    $this->db->from($this->table);
    $this->db->where('id_barang', $id);
    $query = $this->db->get();
    return $query->result_array()[0]['id_perolehan'];
  }
  
  public function get_id($id){
    $this->db->select('id as id_perolehan');
    $this->db->from($this->table);
    $this->db->where('id_faskes', $id);
    $query = $this->db->get();
    return $query->result_array()[0]['id_perolehan'];
  }
  
}