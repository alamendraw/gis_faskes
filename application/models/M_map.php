<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_map extends MY_Model {
  public function get_kib($kec){
    
    ($kec=='all')?$w_kec='':$w_kec="and kecamatan='$kec'";
    
    $this->db->select("s.id,  s.nm_faskes, s.lat, s.lon, s.nm_faskes, s.tahun,l.tahun_pelihara1,l.tahun_pelihara2,l.tahun_pelihara3");
    $this->db->from("ms_faskes s"); 
    $this->db->join("lahan l","s.id=l.id_faskes","left"); 
    $this->db->where("lat!='' and lon!='' and left(lat,1)='-' and lon not like '%°%' and lon not like '%,%' $w_kec and s.deleted_at is null");
    $this->db->group_by('nm_faskes');
    // $this->db->limit('10');
    $query = $this->db->get();

    return $query->result_array();
 }

   // public function get_pelihara($id){
   //    $this->db->select("a.tahun,a.nilai");
   //    $this->db->from("pemeliharaan a");
   //    $this->db->join("perolehan b", "a.id_perolehan=b.id", "inner");
   //    $this->db->where("b.id_barang",$id);
   //    $query = $this->db->get();
   //    return $query->result_array();
   // }

   public function get_marker_data($jenis,$kondisi,$kec,$nama,$status,$tipe){ 
      $this->db->select("ifnull(s.id,'-') as id,ifnull(s.nm_faskes,'-') as nm_faskes,ifnull(s.kondisi,'-') as kondisi,ifnull(d.konstruksi,'-') as konstruksi,ifnull(s.lat,'-') as lat,ifnull(s.lon,'-') as lon,ifnull(s.alamat,'-')as alamat,ifnull(internet,'-') as internet,ifnull(sumber_listrik,'-') as sumber_listrik,ifnull(daya_listrik,'-') as daya_listrik,ifnull(laboratorium,'-') as laboratorium,ifnull(p.tahun_pengadaan,'-') as tahun_pembangunan,'-' as nilai_perolehan,ifnull(bukti_kepemilikan,'-') as bukti_kepemilikan,
      ifnull(masa_bangunan,'-') as masa_bangunan,ifnull(tingkat,'-') as tingkat,ifnull(jumlah_lantai,'-') as jumlah_lantai,p.id_barang ,p.id as iddd,(SELECT nama_gambar FROM gambar WHERE id_faskes = s.id AND type = 'image' AND nama_gambar IS NOT NULL LIMIT 1) as foto1");
      $this->db->from("ms_faskes s"); 
      $this->db->join("lahan l","s.id=l.id_faskes","left"); 
      $this->db->join("detail_faskes d","s.id=d.id_faskes","left"); 
      $this->db->join("perolehan p","s.id=p.id_faskes","left");     
      $this->db->join("fasilitas f","s.id=f.id_faskes","left");     
      $this->db->where("s.deleted_at is null");
      if($kondisi!=[] && $jenis=='kondisi'){ 
         $this->db->where_in("s.kondisi",$kondisi);
      }
      if($kec!='all'){
         $this->db->where("s.kecamatan",$kec);
      }
      if($nama){
         $this->db->where("s.id",$nama);
      }
      if($status){
         $this->db->where_in("s.status_faskes",$status);
      }
      if($tipe){
         $this->db->where_in("s.tipe_faskes",$tipe);
      }
      $this->db->group_by("s.id"); 
      $query = $this->db->get();

      return $query->result_array();
   }

   public function remove_marker_data($kondisi){
      
      $this->db->select("id,nm_faskes");
      $this->db->from("ms_faskes");  
      $this->db->where("kondisi",$kondisi);
      $this->db->group_by("id"); 
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

   public function kecamatan(){
      $query = $this->db->query("SELECT kecamatan from ms_faskes where kecamatan!='' and lat!='' and lon!='' and left(lat,1)='-' and lon not like '%°%' and lon not like '%,%' group by kecamatan");
      return $query->result_array();
   }

   public function detail_data($id){
      $this->db->select("s.id,s.nm_faskes,s.kondisi,p.tahun_pengadaan as tahun,s.status_faskes,s.sk_pendirian,s.sk_ijin_operasional,s.sertifikasi_iso,s.alamat,s.kelurahan,s.kecamatan,s.kode_pos,s.telepon,s.website,s.email,s.npwp,s.lat,s.lon,g.nama_gambar,d.kepala_faskes,d.sumber_listrik,d.daya_listrik,d.sumber_air,d.internet,d.bandwidth,d.konstruksi,f.laboratorium,d.bukti_kepemilikan,d.masa_bangunan,d.tingkat,d.jumlah_lantai,l.luas_lahan,l.luas_bangunan,l.luas_halaman,l.luas_lapangan,l.sudah_pagar,l.belum_pagar,l.luas_lahan_kosong,  p.kode_barang,p.no_dokumen,p.tahun_pengadaan,p.nilai_perolehan,p.sumber_dana");
      $this->from("ms_faskes s");
      $this->db->join("lahan l","s.id=l.id_faskes","left"); 
      $this->db->join("detail_faskes d","s.id=d.id_faskes","left"); 
      $this->db->join("perolehan p","s.id=p.id_faskes","left"); 
      $this->db->join("gambar g","s.id=g.id_faskes","left"); 
      $this->db->join("fasilitas f","s.id=f.id_faskes","left"); 
      $this->db->where("s.id",$id);
      $this->db->group_by("s.id");
      $query = $this->db->get();
      return $query->result_array();
   }

   public function get_faskes(){
      $this->db->select('id,nm_faskes');
      $this->db->from('ms_faskes');
      $this->db->group_by('nm_faskes');
      $this->db->where("nm_faskes!='' && nm_faskes is not null ");
      $this->db->where("deleted_at is null");
      $data = $this->db->get();
      return $data->result_array();
   }

   public function get_map(){
      $this->db->select('geojson,lat,lon,zoom');
      $this->db->from('ms_api');
      $query = $this->db->get();
      return $query->result_array()[0];
   }

   public function get_pelihara($id){
      $this->db->select('tahun,nilai');
      $this->db->from('pemeliharaan');
      $this->db->where(['id_faskes'=>$id]);
      $query = $this->db->get();
      return $query->result_array();
   }
  
   public function get_gambar($id){
      $this->db->select('nama_gambar');
      $this->db->from('gambar');
      $this->db->where(['id_faskes'=>$id,'type'=>'image']);
      $this->db->where('nama_gambar is not null');
      $query = $this->db->get();
      return $query->result_array();
   }
  
   public function get_gambar360($id){
      $this->db->select('nama_gambar');
      $this->db->from('gambar');
      $this->db->where(['id_faskes'=>$id,'type'=>'360']);
      $query = $this->db->get();
      return $query->result_array();
   }
  
   public function get_video($id){
      $this->db->select('nama_gambar');
      $this->db->from('gambar');
      $this->db->where(['id_faskes'=>$id,'type'=>'video']);
      $query = $this->db->get();
      return $query->result_array();
   }
  
}