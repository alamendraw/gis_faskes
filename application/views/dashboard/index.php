<!DOCTYPE html>
<html lang="en">
  <head></head>
  <title>GIS Aset Faskes</title>
  <?php $this->load->view('css');?>
  <style type="text/css">
		#mapid { height: 100vh; }
		.icon {
			display: inline-block;
			margin: 2px;
			height: 16px;
			width: 16px;
			background-color: #ccc;
		}
		.icon-bar {
			background: url('assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
		}
		.scrollbar { 
		float: right;
		height: 300px; 
		background: #fff;
		overflow-y: scroll;
		margin-bottom: 25px;
		}
		.force-overflow {
			min-height: 250px;
		}

		.tdPop{
			padding:3px;
		}
		
		#viewer {
			width: 100vw;
			height: 50vh;
		}

		
		.float{
			position:fixed;
			width:60px;
			height:60px;
			bottom:40px;
			right:40px;
			background-color:#0C9;
			color:#FFF;
			border-radius:50px;
			text-align:center;
			box-shadow: 2px 2px 3px #999;
		}

		.my-float{
			margin-top:22px;
		}

		.ketMap {
            position: absolute;
            top: 75px;
            right: 65px;
            padding: 10px;
            z-index: 400;
        }
		.pilihMarker {
            position: absolute;
            top: 75px;
            left: 50px;
            padding: 10px;
            z-index: 400;
        }
	</style> 
  <body data-menu="vertical-menu-modern" class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static menu-expanded">

	<?php $this->load->view('dashboard/navigation');?>


    <!-- BEGIN Content-->
    <div class="content app-content"> 
        <!-- fixed-top-->
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-static-top navbar-light navbar-shadow">  
			<div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav">
								<img width="55px" height="50px" src='assets/image/logo.png'>
                            </ul>
                           
                            <ul class="nav navbar-nav">
                                <li class="nav-item d-none d-lg-block"> <span class="user-name text-bold-600" style="font-size: 24px;padding-left: 12px;">GIS ASET FASKES</span> 
                                    <div class="bookmark-input search-input">
                                        <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                        <input class="form-control input" type="text" placeholder="Pencarian Data" tabindex="0" data-search="starter-list">
                                        <ul class="search-list"></ul>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <ul class="nav navbar-nav float-right">
                            
                            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                                <div class="search-input">
                                    <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="input" type="text" placeholder="Masukan Nama Faskes (Comming Soon)" tabindex="-1" data-search="starter-list">
                                    <div class="search-input-close"><i class="feather icon-x"></i></div>
                                    <ul class="search-list"></ul>
                                </div>
                            </li>  
                        </ul>
						<div style="padding: 0px 15px 0px 15px;">
							<button type="button" class="btn btn-primary" onClick="login()"><span class="user-name text-bold-600">Masuk</span> </button>
						</div>
						
							
                    </div>
                </div>
            </div>
        </nav>

			<div>
				<div id="mapid" class="mapku"></div>  
				<li class="list-group-item ketMap" id="bandKondisi">
					
				</li> 
				<div class="row">
				<li class="list-group-item pilihMarker"> 
						<fieldset>
							<div class="vs-radio-con">
								<input type="radio" name="vueradio" onChange="radioMap(this.value)" checked=""  value="kondisi">
								<span class="vs-radio">
									<span class="vs-radio--border"></span>
									<span class="vs-radio--circle"></span>
								</span>
								<span class="">Kondisi</span>
							</div>
						</fieldset>  
						<fieldset>
							<div class="vs-radio-con">
								<input type="radio" name="vueradio" onChange="radioMap(this.value)" value="tahun">
								<span class="vs-radio">
									<span class="vs-radio--border"></span>
									<span class="vs-radio--circle"></span>
								</span>
								<span class="">Pemeliharaan</span>
							</div>
						</fieldset> 
				</li> 
						</div>
				
			</div>
			
              
			<div class="card detailku" > 
                <!-- <div class="card-body" >sdf  </div>  -->
                <div class="card-content">
                    <div class="card-body"> 
                        <!-- <div class="row">   -->
							<table width="100%" border='0'>
								<tr>
									<td class='tdPop' colspan='2'><b>IDENTITAS FASKES</b></td> 
								</tr>
								<tr>
									<td class='tdPop' width='30%'>NPSN <span style="float:right;">:</span></td>
									<td class='tdPop' width='70%'><span id="det_npsn"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Nama Faskes <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_nm_faskes"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Kondisi <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_kondisi"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Tahun <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_tahun"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Status faskes <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_status_faskes"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Nomor SK Pendirian <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_sk_pendirian"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Nomor SK Ijin Operasional <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_sk_ijin_operasional"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Akreditasi <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_akreditasi"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Sertifikasi ISO <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_sertifikasi_iso"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Kecamatan <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_kecamatan"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Alamat <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_alamat"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Kode Pos <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_kode_pos"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Telpon <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_telepon"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Website <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_website"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Email <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_email"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>NPWP <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_npwp"></span></td>
								</tr>
								<tr>
									<td class='tdPop' colspan='2'>&nbsp;</td> 
								</tr>
								<tr>
									<td class='tdPop' colspan='2'><b>DATA LAINNYA</b></td> 
								</tr> 
								<tr>
									<td class='tdPop'>Kepala faskes<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_kepsek"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Jumlah Ruang<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_jumlah_ruang"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Jumlah Siswa<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_jumlah_siswa"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Sumber Listrik<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_sumber_listrik"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Daya Listrik<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_daya_listrik"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Sumber Air<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_sumber_air"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Internet<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_internet"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Bandwidth<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_bandwidth"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Program Inklusi<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_program_inklusi"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Program Cerdas Berbakat Istimewa<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_program_cbi"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Konstruksi<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_konstruksi"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Laboratorium<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_laboratorium"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Sanitasi<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_sanitasi"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Bukti Kepemilikan<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_bukti_kepemilikan"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Masa Bangunan<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_masa_bangunan"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Tingkat<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_tingkat"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Jumlah Lantai<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_jumlah_lantai"></span> </td>
								</tr> 
							<!-- ASAL PEROLEHAN -->
								<tr>
									<td class='tdPop' colspan='2'>&nbsp;</td> 
								</tr>
								<tr>
									<td class='tdPop' colspan='2'><b>ASAL PEROLEHAN</b></td> 
								</tr>
								<tr>
									<td class='tdPop'>Kode Barang<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_kode_barang"></span> </td>
								</tr> 
								<tr>
									<td class='tdPop'>Nomor Dokumen<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_no_dokumen"></span> </td>
								</tr> 
								<tr>
									<td class='tdPop'>Tahun Pengadaan<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_tahun_pengadaan"></span> </td>
								</tr> 
								<tr>
									<td class='tdPop'>Nilai Perolehan<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_nilai_perolehan"></span> </td>
								</tr> 
								<tr>
									<td class='tdPop'>Sumber Dana<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_sumber_dana"></span> </td>
								</tr> 
							<!-- PENGGUNAAN LAHAN DAN PEMELIHARAAN -->
								<tr>
									<td class='tdPop' colspan='2'>&nbsp;</td> 
								</tr>
								<tr>
									<td class='tdPop' colspan='2'><b>PENGGUNAAN LAHAN DAN PEMELIHARAAN</b></td> 
								</tr>
								<tr>
									<td class='tdPop'>Luas Lahan <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_luas_lahan"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Luas Bangunan <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_luas_bangunan"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Luas Halaman <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_luas_halaman"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Luas Lapangan <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_luas_lapangan"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Luas Lahan Sudah Dipagar <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_sudah_pagar"></span></td>
								</tr>
								<tr>
									<td class='tdPop'>Luas Lahan Belum Dipagar <span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_belum_pagar"></span></td>
								</tr> 
								<tr>
									<td class='tdPop'>Luas Lahan Kosong<span style="float:right;">:</span></td>
									<td class='tdPop'><span id="det_luas_lahan_kosong"></span></td>
								</tr>  
								<tr>
									<td class='tdPop' colspan='2'>&nbsp;</td> 
								</tr>  
								
								<tr>
								<td class='tdPop' valign='top'>Pemeliharaan<span style="float:right;">:</span></td>
									<td class='tdPop'> 
										<table width='100%' border='1' id="tbl_pelihara" >  
											<tr>
												<td width='50%' bgcolor="#68e4c5" align='center'><b>Tahun</b></td>
												<td width='50%' bgcolor="#68e4c5" align='center'><b>Nilai</b></td>
											</tr> 
										</table> 
									</td> 
								</tr> 
								<tr>
									<td class='tdPop' colspan='2'>&nbsp;</td> 
								</tr>
								<tr>
									<td class='tdPop' colspan='2' align="center">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-4">
													<div class="thumbnail">
														<div id="img1"></div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="thumbnail">
														<div id="img2"></div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="thumbnail">
														<div id="img3"></div>
													</div>
												</div>
											</div>
										</div>
									</td> 
								</tr>
							</table>
                        <!-- </div> -->
                            
                    </div>
                </div>
            </div>

			<a href="javascript:void(0);" onClick="showMap()" class="float" title="kembali">
			<i class="fa fa-arrow-left my-float"></i>
			</a>
	 
		
    </div>
    <!-- END Content-->

    <!-- START FOOTER LIGHT-->
    <footer class="footer footer-static footer-light">
	<p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">&copy; 2020<a class="text-bold-800 grey darken-2" href="http://www.msmgroup.co.id/
" target="_blank">MSM,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block"> <!-- text --> </span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- START FOOTER LIGHT-->

  </body>
  
  	<?php $this->load->view('js');?>
	  
<script src="<?= base_url();?>assets/leaflet/leaflet.js" ></script>
<script src="<?= base_url();?>assets/js/leaflet.ajax.js"></script>
<script src="<?= base_url();?>assets/js/select2.min.js"></script>	
<script src="<?= base_url();?>assets/js/dashboard.js"></script>
	
<script src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js'); ?>"></script> 
  
	<script type="text/javascript">
	   	var module ={
				url: "<?php echo site_url('dashboard');?>",
				base: "<?php echo base_url(); ?>"
			};
		
			function login(){
				window.open("<?= site_url('login');?>","_self");
			}
   </script>
</html>