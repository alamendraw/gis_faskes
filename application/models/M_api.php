<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_api extends MY_Model {
 
  public function get_count_gis(){
    $query = $this->db->query("SELECT COUNT(*)AS total FROM api_assets")->row('total');
    return (int)$query;
  }

  public function get_data_assets(){
    $this->db->select("*");
    $this->db->from('api_assets');
    $this->db->order_by('id_barang');
    $query = $this->db->get(); 
    return $query->result_array();
  }

  public function check_gis($id){
    $data = $this->db->query("SELECT count(*) as total from perolehan where id_barang='$id'")->row('total');
		return (int)$data;
  } 
  
  public function get_pemeliharaan($id){
    $this->db->select("*");
    $this->db->from("api_pemeliharaan");
    $this->db->where("id_barang",$id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_link(){
    $this->db->select('*');
    $this->db->from('ms_api');
    $query = $this->db->get();

    return $query->result_array();
  }
  
}