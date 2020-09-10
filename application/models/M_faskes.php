<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_faskes extends MY_Model {

  public $table = 'ms_faskes';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = TRUE;
  } 
 
  public function list_data(){
    $this->db->select("a.id,nm_faskes,kecamatan,kepala_faskes,a.tipe_faskes");
    $this->db->from("$this->table a");
    $this->db->join("detail_faskes b","a.id=b.id_faskes", "left");
    $this->db->where("a.deleted_at is null");
    $this->db->order_by('a.id desc');
    $query = $this->db->get();
    return $query->result_array();
  }
 
  public function get_data($id){
    $this->db->select("detail_faskes.kepala_faskes,detail_faskes.sumber_listrik,detail_faskes.daya_listrik,detail_faskes.sumber_air,detail_faskes.internet,detail_faskes.pusling,detail_faskes.bandwidth,detail_faskes.konstruksi,detail_faskes.bukti_kepemilikan,detail_faskes.masa_bangunan,detail_faskes.tingkat,detail_faskes.jumlah_lantai,ms_faskes.id,ms_faskes.id as id_faskes,ms_faskes.nm_faskes,ms_faskes.tipe_faskes,ms_faskes.kondisi,ms_faskes.status_faskes,ms_faskes.sk_pendirian,ms_faskes.sk_ijin_operasional,ms_faskes.sertifikasi_iso,ms_faskes.alamat,ms_faskes.kelurahan,ms_faskes.kecamatan,ms_faskes.kode_pos,ms_faskes.telepon,ms_faskes.website,ms_faskes.email,ms_faskes.npwp,ms_faskes.lat,ms_faskes.lon,fasilitas.ugd,fasilitas.kia,fasilitas.rawat_inap,fasilitas.laboratorium,fasilitas.pengolah_limbah,fasilitas.ambulance,fasilitas.mushola,fasilitas.taman,fasilitas.parkir,fasilitas.toilet ,lahan.luas_lahan,lahan.luas_bangunan,lahan.luas_halaman,lahan.luas_lapangan,lahan.sudah_pagar,lahan.belum_pagar,lahan.luas_lahan_kosong,lahan.area,perolehan.id_barang,perolehan.kode_barang,perolehan.no_dokumen,perolehan.tahun_pengadaan,perolehan.nilai_perolehan,perolehan.sumber_dana,perolehan.nm_brg,perolehan.detail_brg,perolehan.masa_manfaat,posyandu.nm_posyandu,posyandu.alamat,posyandu.foto_1,posyandu.foto_2,posyandu.foto_3,posyandu.foto_4 ,pustu.nm_pustu,pustu.alamat,pustu.foto_1,pustu.foto_2,pustu.foto_3,pustu.foto_4");
    $this->db->from("$this->table");
    $this->db->join("detail_faskes", "ms_faskes.id = detail_faskes.id_faskes","left");
    $this->db->join("fasilitas", "ms_faskes.id = fasilitas.id_faskes","left");
    $this->db->join("lahan", "ms_faskes.id = lahan.id_faskes","left");
    $this->db->join("perolehan", "ms_faskes.id = perolehan.id_faskes","left");
    $this->db->join("posyandu", "ms_faskes.id = posyandu.id_faskes","left");
    $this->db->join("pustu", "ms_faskes.id = pustu.id_faskes","left");
    $this->db->where('ms_faskes.id',$id);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_kecamatan(){
    $this->db->select("*");
    $this->db->from("ms_kecamatan"); 
    $query = $this->db->get();
    return $query->result_array();
  }
  
}

