<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends MY_Model {
  public function get_kib($kec){
    
    ($kec=='all')?$w_kec='':$w_kec="and kecamatan='$kec'";
    
    $this->db->select("s.id,  s.nm_faskes, s.lat, s.lon, s.nm_faskes, s.tahun,l.tahun_pelihara1,l.tahun_pelihara2,l.tahun_pelihara3");
    $this->db->from("ms_faskes s"); 
    $this->db->join("lahan l","s.id=l.id_faskes","left"); 
    $this->db->where("lat!='' and lon!='' and left(lat,1)='-' and lon not like '%°%' and lon not like '%,%' $w_kec");
    $this->db->group_by('nm_faskes');
    // $this->db->limit('10');
    $query = $this->db->get();

    return $query->result_array();
 }

 public function get_marker_data($id){
     
    $this->db->select("ifnull(s.id,'-') as id,ifnull(s.nm_faskes,'-') as nm_faskes,ifnull(s.kondisi,'-') as kondisi,ifnull(d.konstruksi,'-') as konstruksi,ifnull(s.lat,'-') as lat,ifnull(s.lon,'-') as lon,ifnull(s.alamat,'-')as alamat,ifnull(internet,'-') as internet,ifnull(sumber_listrik,'-') as sumber_listrik,ifnull(daya_listrik,'-') as daya_listrik,ifnull(laboratorium,'-') as laboratorium,ifnull(sanitasi,'-') as sanitasi,ifnull(tahun,'-') as tahun_pembangunan,'-' as nilai_perolehan,ifnull(bukti_kepemilikan,'-') as bukti_kepemilikan,
    ifnull(masa_bangunan,'-') as masa_bangunan,ifnull(tingkat,'-') as tingkat,ifnull(jumlah_lantai,'-') as jumlah_lantai,tahun_pelihara1,tahun_pelihara2,tahun_pelihara3,nilai_pelihara1,nilai_pelihara2,nilai_pelihara3,foto1");
    $this->db->from("ms_faskes s"); 
    $this->db->join("lahan l","s.id=l.id_faskes","left"); 
    $this->db->join("detail_faskes d","s.id=d.id_faskes","left"); 
    $this->db->where_in("s.id",$id);
    $this->db->group_by("s.id");
 //   $this->db->limit('1');
    $query = $this->db->get();

    return $query->result_array();
 }

   public function detail_kib($lat,$lng){
      
      $this->db->select("*,ifnull(tahun_pelihara,'-')as pelihara");
      $this->db->from("ms_faskes");
      $this->db->where("lat='$lat' and lon='$lng'");
   //   $this->db->limit('1');
      $query = $this->db->get();

      return $query->result_array();
   }
   public function image($id){
      
      $this->db->select("foto1,foto2,foto3,nm_faskes");
      $this->db->from("ms_faskes");
      $this->db->where("id",$id);
   //   $this->db->limit('1');
      $query = $this->db->get();

      return $query->result_array();
   }

   public function kecamatan(){
      $query = $this->db->query("SELECT kecamatan from ms_faskes where kecamatan!='' and lat!='' and lon!='' and left(lat,1)='-' and lon not like '%°%' and lon not like '%,%' group by kecamatan");
      return $query->result_array();
   }

   public function detail_data($id){
      $this->db->select("s.id,s.npsn,s.nm_faskes,s.kondisi,s.tahun,s.status_faskes,s.sk_pendirian,s.sk_ijin_operasional,s.akreditasi,s.sertifikasi_iso,s.alamat,s.kelurahan,s.kecamatan,s.kode_pos,s.telepon,s.website,s.email,s.npwp,s.lat,s.lon,s.foto1,s.foto2,s.foto3,d.kepsek,d.jumlah_ruang,d.jumlah_siswa,d.sumber_listrik,d.daya_listrik,d.sumber_air,d.internet,d.bandwidth,d.program_inklusi,d.program_cbi,d.konstruksi,d.laboratorium,d.sanitasi,d.bukti_kepemilikan,d.masa_bangunan,d.tingkat,d.jumlah_lantai,l.luas_lahan,l.luas_bangunan,l.luas_halaman,l.luas_lapangan,l.sudah_pagar,l.belum_pagar,l.luas_lahan_kosong,l.tahun_pelihara1,l.tahun_pelihara2,l.tahun_pelihara3,ifnull(l.nilai_pelihara1,0)as nilai_pelihara1,ifnull(l.nilai_pelihara2,0)as nilai_pelihara2,ifnull(l.nilai_pelihara3,0)as nilai_pelihara3,p.kode_barang,p.no_dokumen,p.tahun_pengadaan,p.nilai_perolehan,p.sumber_dana");
      $this->from("ms_faskes s");
      $this->db->join("lahan l","s.id=l.id_faskes","left"); 
      $this->db->join("detail_faskes d","s.id=d.id_faskes","left"); 
      $this->db->join("perolehan p","s.id=p.id_faskes","left"); 
      $this->db->where("s.id",$id);
      $query = $this->db->get();
      return $query->result_array();
   }
  
}