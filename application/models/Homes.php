<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Homes extends MY_Model {

  // public $table = '';
  // public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 

  public function get_dash(){
    $this->db->select("kecamatan as label,count(*)as value");
    $this->db->from("ms_faskes");
    $this->db->where("kecamatan is not null and kecamatan!=''");
    $this->db->group_by("kecamatan");
    // $this->db->limit(8);
    $query = $this->db->get();

    return $query->result_array();
  }
  
  public function pie_chart(){
    $this->db->select("kondisi, count(*)as total");
    $this->db->from("ms_faskes");
    $this->db->where("kondisi is not null && kondisi!=''");
    $this->db->group_by("kondisi"); 
    $this->db->order_by("kondisi"); 
    $query = $this->db->get();

    return $query->result_array();
  }
  
  public function get_profile(){
    $id = userinfo('id');
    $this->db->select("*");
    $this->db->from("user");
    $this->db->where(['id'=>$id]);
    $query = $this->db->get();
    return $query->result()[0];
  }
  
}