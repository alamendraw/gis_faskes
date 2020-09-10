<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends MY_Model {

  public $table = 'ms_faskes';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 
  
  // public function rekap_tahun_data(){
      
  //   $data = $this->db->query("CALL rekap_tahun_pelihara()");   
  //   return $data->result_array();
  // }

  public function rekap_tahun(){
    $show='';
    $show .="<table width='100%' border='0' style='font-size:16px; font-family:calibri;'>
              <tr>
                <td align='center' width='10%' rowspan='3'><img width='75px' height='80px' src='assets/image/bakti-husada.png'></td>
                <td align='center' width='90%'><b>REKAPITULASI</b></td>
              </tr>
              <tr>
                <td align='center'><b>MASA PEMELIHARAAN ASET FASKES</b></td> 
              </tr>
              <tr>
                <td align='center'><b>TAHUN ".date("Y")."</b></td> 
              </tr>
              <tr>
                <td colspan='2'>&nbsp;</td> 
              </tr>
            </table>";

            $show .="<table width='100%' border='0' style='font-size:12px; font-family:calibri;'>
                      <tr>
                        <td width='20%'>Provinsi</td>
                        <td width='80%'>: Sulawesi Selatan</td>
                      </tr>
                      <tr>
                        <td >Kabupaten / Kota</td> 
                        <td >: Makassar</td> 
                      </tr> 
                      <tr>
                        <td >Satuan Kerja</td> 
                        <td >: Dinas Kesehatan</td> 
                      </tr> 
                      <tr>
                        <td colspan='2'>&nbsp;</td>   
                      </tr> 
                    </table>";

            $show .="<table width='100%' border='1' style='font-size:12px; font-family:calibri; border-collapse:collapse;'>
                      <tr>
                        <td bgcolor='#07f1b6' align='center' rowspan='2' style='padding:3px;'><b>No</b></td>
                        <td bgcolor='#07f1b6' align='center' rowspan='2'><b>Kecamatan</b></td>
                        <td bgcolor='#07f1b6' align='center' colspan='3'><b>Tahun Pemeliharaan Terakhir</b></td>
                      </tr>
                      <tr>
                        <td bgcolor='#07f1b6' align='center' style='padding:3px;'><b>1 s/d 3 Tahun</b></td>
                        <td bgcolor='#07f1b6' align='center'><b>4 s/d 5 Tahun</b></td>
                        <td bgcolor='#07f1b6' align='center'><b>Lebih Dari 5 Tahun</b></td>
                      </tr>
                      <tr>
                        <td bgcolor='#07f1b6' width='5%' align='center' style='padding:3px;'><b>1</b></td>
                        <td bgcolor='#07f1b6' width='44%' align='center'><b>2</b></td>
                        <td bgcolor='#07f1b6' width='17%' align='center'><b>3</b></td>
                        <td bgcolor='#07f1b6' width='17%' align='center'><b>4</b></td>
                        <td bgcolor='#07f1b6' width='17%' align='center'><b>5</b></td>
                      </tr>";
              $data = $this->db->query("CALL rekap_tahun_pelihara")->result_array();
              $no=1; $total_field1=0; $total_field2=0; $total_field3=0;
              foreach($data as $row){
                $total_field1 = $total_field1+$row['field1'];
                $total_field2 = $total_field2+$row['field2'];
                $total_field3 = $total_field3+$row['field3'];
                $show .="<tr>
                          <td align='center'>".$no++."</td>
                          <td align='left' style='padding:3px;'>".$row['kecamatan']."</td>
                          <td align='center'>".$row['field1']."</td>
                          <td align='center'>".$row['field2']."</td>
                          <td align='center'>".$row['field3']."</td>
                        </tr>";
              }
              $show .="<tr>
                          <td align='center'> </td>
                          <td align='left' style='padding:3px;'><b>Total</b></td>
                          <td align='center'><b>".$total_field1."<b></td>
                          <td align='center'><b>".$total_field2."<b></td>
                          <td align='center'><b>".$total_field3."<b></td>
                        </tr>";
            $show .="</table>";
  return $show;
}
  
  public function rekap_kondisi(){
      $show='';
      $show .="<table width='100%' border='0' style='font-size:16px; font-family:calibri;'>
                <tr>
                  <td align='center' width='10%' rowspan='3'><img width='75px' height='80px' src='assets/image/bakti-husada.png'></td>
                  <td align='center' width='90%'><b>REKAPITULASI</b></td>
                </tr>
                <tr>
                  <td align='center'><b>KONDISI ASET FASKES</b></td> 
                </tr>
                <tr>
                  <td align='center'><b>TAHUN ".date("Y")."</b></td> 
                </tr>
                <tr>
                  <td colspan='2'>&nbsp;</td> 
                </tr>
              </table>";

              $show .="<table width='100%' border='0' style='font-size:12px; font-family:calibri;'>
                        <tr>
                          <td width='20%'>Provinsi</td>
                          <td width='80%'>: Sulawesi Selatan</td>
                        </tr>
                        <tr>
                          <td >Kabupaten / Kota</td> 
                          <td >: Makassar</td> 
                        </tr> 
                        <tr>
                          <td >Satuan Kerja</td> 
                          <td >: Dinas Kesehatan</td> 
                        </tr> 
                        <tr>
                          <td colspan='2'>&nbsp;</td>   
                        </tr> 
                      </table>";

              $show .="<table width='100%' border='1' style='font-size:12px; font-family:calibri; border-collapse:collapse;'>
                        <tr>
                          <td bgcolor='#07f1b6' align='center' rowspan='2' style='padding:3px;'><b>No</b></td>
                          <td bgcolor='#07f1b6' align='center' rowspan='2'><b>Kecamatan</b></td>
                          <td bgcolor='#07f1b6' align='center' colspan='4'><b>Kondisi</b></td>
                        </tr>
                        <tr>
                          <td bgcolor='#07f1b6' align='center' style='padding:3px;'><b>Baik</b></td>
                          <td bgcolor='#07f1b6' align='center'><b>Rusak Ringan</b></td>
                          <td bgcolor='#07f1b6' align='center'><b>Rusak Sedang</b></td>
                          <td bgcolor='#07f1b6' align='center'><b>Rusak Berat</b></td>
                        </tr>
                        <tr>
                          <td bgcolor='#07f1b6' width='5%' align='center' style='padding:3px;'><b>1</b></td>
                          <td bgcolor='#07f1b6' width='41%' align='center'><b>2</b></td>
                          <td bgcolor='#07f1b6' width='13%' align='center'><b>3</b></td>
                          <td bgcolor='#07f1b6' width='13%' align='center'><b>4</b></td>
                          <td bgcolor='#07f1b6' width='13%' align='center'><b>5</b></td>
                          <td bgcolor='#07f1b6' width='13%' align='center'><b>6</b></td>
                        </tr>";
                $data = $this->db->query("CALL rekap_kondisi")->result_array();
                $no=1; $total_baik=0; $total_rusak_ringan=0; $total_rusak_sedang=0; $total_rusak_berat=0;
                foreach($data as $row){
                  $total_baik         = $total_baik+$row['baik'];
                  $total_rusak_ringan = $total_rusak_ringan+$row['rusak_ringan'];
                  $total_rusak_sedang = $total_rusak_sedang+$row['rusak_sedang'];
                  $total_rusak_berat  = $total_rusak_berat+$row['rusak_berat'];
                  $show .="<tr>
                            <td align='center'>".$no++."</td>
                            <td align='left' style='padding:3px;'>".$row['kecamatan']."</td>
                            <td align='center'>".$row['baik']."</td>
                            <td align='center'>".$row['rusak_ringan']."</td>
                            <td align='center'>".$row['rusak_sedang']."</td>
                            <td align='center'>".$row['rusak_berat']."</td>
                          </tr>";
                }
                $show .="<tr>
                            <td align='center'> </td>
                            <td align='left' style='padding:3px;'><b>Total</b></td>
                            <td align='center'><b>".$total_baik."<b></td>
                            <td align='center'><b>".$total_rusak_ringan."<b></td>
                            <td align='center'><b>".$total_rusak_sedang."<b></td>
                            <td align='center'><b>".$total_rusak_berat."<b></td>
                          </tr>";
              $show .="</table>";
    return $show;
  }
}

