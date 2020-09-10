<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Model {

  public $table = 'user';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 

  public function get_list(){
    $this->db->select('*');
    $this->db->from($this->table); 
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }
  
}