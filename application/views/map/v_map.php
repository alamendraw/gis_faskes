<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
 
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="GIS FASKES">
    <meta name="keywords" content="Gis FASKES, MSM, Murfa Surya Mahardika">
    <meta name="author" content="GIS FASKES">
    <title>GIS FASKES</title>
    <link rel="apple-touch-icon" href="<?= base_url();?>assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>assets/image/favicons.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vendors/css/ui/prism.min.css"> 
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/smartphoto.min.css"> 
	 

	<link rel="stylesheet" href="<?= base_url();?>assets/css/select2.min.css" /> 
	<link rel="stylesheet" href="<?= base_url();?>assets/leaflet/leaflet.css" > 
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/core/menu/menu-types/vertical-menu.css">
    <style type="text/css">
		#mapid { height: 100vh; top: 0px;}
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

		.stytr{
			border-bottom:solid 1px #efefef;
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

		#reloadmap {
            left: 42px;
			position: absolute;
			top: 73px;
			padding: 10px;
			z-index: 400;
        }

		.masonry {
			-moz-transition: all .5s ease-in-out;
			-webkit-transition: all .5s ease-in-out;
			transition: all .5s ease-in-out;
			-moz-column-gap: 30px;
			-webkit-column-gap: 30px;
			column-gap: 30px;
			-moz-column-fill: initial;
			-webkit-column-fill: initial;
			column-fill: initial;
		}
		.masonry .brick {
			margin-bottom: 30px;
			overflow: hidden;
		}
		.masonry .brick img {
			-moz-transition: all .5s ease-in-out;
			-webkit-transition: all .5s ease-in-out;
			transition: all .5s ease-in-out;
		}
		.masonry .brick:hover img {
			opacity: .75;
		}
		.masonry.bordered {
			-moz-column-rule: 1px solid #eee;
			-webkit-column-rule: 1px solid #eee;
			column-rule: 1px solid #eee;
			-moz-column-gap: 50px;
			-webkit-column-gap: 50px;
			column-gap: 50px;
		}
		.masonry.bordered .brick {
			padding-bottom: 25px;
			margin-bottom: 25px;
			border-bottom: 1px solid #eee;
		}
		.masonry.gutterless {
			-moz-column-gap: 0;
			-webkit-column-gap: 0;
			column-gap: 0;
		}
		.masonry.gutterless .brick {
			margin-bottom: 0;
		}


	@media only screen and (min-width: 1024px) {
		.desc {
			font-size: 1.25em;
		}

		.intro {
			letter-spacing: 1px;
		}

		.wrapper {
			width: 80%;
			padding: 2em;
		}

		.masonry {
			-moz-column-count: 3;
			-webkit-column-count: 3;
			column-count: 3;
		}
	}

	@media only screen and (min-width: 768px) and (max-width: 1023px) {
		.wrapper {
			width: 85%;
			padding: 1.5em;
		}

		.masonry {
			-moz-column-count: 2;
			-webkit-column-count: 2;
			column-count: 2;
		}
	}
			
	</style> 

</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="">
 
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">GIS FASKES</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content"> 
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            	<li class="navigation-header"><span id="total_data"></span> </li>
            	<li class="navigation-header"><span>Filter</span></li>
				<li class="nav-item">
					<div class="col-md-12">
						<div class="form-group"> 
							<!-- <label for="kecamatan">Kecamatan</label>  -->
							<select class="form-control" id="kecamatan" title="Filter Kecamatan"> 
								<option value='all'>Seluruh Kecamatan</option>
								<?php foreach($kecamatan as $row){;?>
								<option value='<?= $row['kecamatan'];?>'><?= $row['kecamatan'];?></option>
								<?php }?>
							</select> 
						</div>
					</div>
				</li>

				<!-- Status -->
				<li class="nav-item"><a href="#"><i class="feather icon-server"></i><span class="menu-title" >Status</span></a>
					<ul class="menu-content">				 
						<li class='list-group-item'>
							<div class='custom-control custom-checkbox'>
									<input type="checkbox" class="custom-control-input" id="Negeri" onChange="checkStatus(this.id)">
									<label class='custom-control-label' for='Negeri'> &nbsp;Negeri</label>						 
							</div> 
						</li> 				 
						<li class='list-group-item'>
							<div class='custom-control custom-checkbox'>
									<input type="checkbox" class="custom-control-input" id="Swasta" onChange="checkStatus(this.id)">
									<label class='custom-control-label' for='Swasta'> &nbsp;Swasta</label>						 
							</div> 
						</li> 
					</ul>
				</li>
				<!-- Status -->

				<!-- Type -->
				<li class="nav-item"><a href="#"><i class="feather icon-cpu"></i><span class="menu-title" >Tipe Faskes</span></a>
					<ul class="menu-content">				 
						<li class='list-group-item'>
							<div class='custom-control custom-checkbox'>
									<input type="checkbox" class="custom-control-input" id="rawat" onChange="checkTipe(this.id)">
									<label class='custom-control-label' for='rawat'> &nbsp;Rawat Inap</label>						 
							</div> 
						</li> 				 
						<li class='list-group-item'>
							<div class='custom-control custom-checkbox'>
									<input type="checkbox" class="custom-control-input" id="nonrawat" onChange="checkTipe(this.id)">
									<label class='custom-control-label' for='nonrawat'> &nbsp;Non Rawat Inap</label>						 
							</div> 
						</li> 
					</ul>
				</li>
				<!-- Type -->
				
				<!-- Marker -->
				<li class="nav-item"><a href="#"><i class="feather icon-map-pin"></i><span class="menu-title" >Tematik</span></a>
					<ul class="menu-content">
						<div class=""> <!-- col-md-12 row -->
							<li class="list-group-item pilihMarker"> 
								<div class="row">
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
										<span class="">Tahun Pemeliharaan</span>
									</div>
								</fieldset> 
								</div>
							</li>
							<div id="bandKondisi" class="pilihMarker" style="padding-top:6px;"> </div>
						</div> 
					</ul>
				</li>
				<!-- Marker --> 
            </ul> 
        </div>
    </div>
    
    <div class="app-content content"> 
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
		<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu   navbar-light navbar-shadow">
			<div class="navbar-wrapper">
				<div class="navbar-container content">
					<div class="navbar-collapse" id="navbar-mobile">
						<div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
							<ul class="nav navbar-nav">
								<li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
							</ul>
							<ul class="nav navbar-nav bookmark-icons">
								<img src="<?php echo base_url();?>assets/image/bakti-husada.png" alt="branding logo" style="width:37px; height:43px; float:left;">
								<span class="user-name text-bold-600" style="font-size: 24px;padding-left: 12px;">GIS ASET FASKES</span> 
							</ul>
						
						</div>
						<ul class="nav navbar-nav" style="width:300px;"> 
							<select class="form-control" id="faskes" placeholder="">				
								<option value=''>&nbsp;</option> 
								<?php foreach($nm_faskes as $nm){;?>
								<option value='<?= $nm['id'];?>'><?= $nm['nm_faskes'];?></option>
								<?php }?>
							</select>  
						</ul>
						<ul class="nav navbar-nav float-right">   
							<li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>                          
						</ul>
						<ul class="nav navbar-nav float-right">   
							<a class="user-name text-bold-600" href="<?= site_url('login')?>" style="font-size: 17px;padding-left: 10px; color: #7468f0;">Masuk <i class="feather icon-log-in"></i></a>
						</ul>
					</div>
				</div>
			</div>
		</nav> 

		<div class="content-body">  
			<div id="mapid" class="mapku"></div>
			<!-- <button type="button" class="btn btn-success btn-sm" id="reloadmap" style="height: 37px;" title="Reload Pin / Marker">
				<i class="feather icon-refresh-cw" style="font-size: 16px;" title="Reload Pin / Marker"></i>
			</button>  -->
		</div>

		<div class="card detailku" >
			<div class="card-content">
				<div class="card-body">  
					<table width="100%" border='0'>
						<tr>
							<td class='tdPop' colspan='2'><b>IDENTITAS FASKES</b></td> 
						</tr> 
						<tr class="stytr">
							<td class='tdPop' width='30%'>Nama FASKES <span style="float:right;">:</span></td>
							<td class='tdPop' width='70%'><span id="det_nm_faskes"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Kondisi <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_kondisi"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Tahun <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_tahun"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Status FASKES <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_status_faskes"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Nomor SK Pendirian <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_sk_pendirian"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Nomor SK Ijin Operasional <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_sk_ijin_operasional"></span></td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Sertifikasi ISO <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_sertifikasi_iso"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Kecamatan <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_kecamatan"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Alamat <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_alamat"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Kode Pos <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_kode_pos"></span></td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Telpon <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_telepon"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Website <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_website"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Email <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_email"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>NPWP <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_npwp"></span></td>
						</tr>
						<tr>
							<td class='tdPop' colspan='2'>&nbsp;</td> 
						</tr>
						<tr>
							<td class='tdPop' colspan='2'><b>DATA LAINNYA</b></td> 
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Kepala FASKES<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_kepsek"></span></td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Jumlah Ruang<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_jumlah_ruang"></span></td>
						</tr>  
						<tr class="stytr">
							<td class='tdPop'>Sumber Listrik<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_sumber_listrik"></span></td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Daya Listrik<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_daya_listrik"></span></td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Sumber Air<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_sumber_air"></span></td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Internet<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_internet"></span></td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Bandwidth<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_bandwidth"></span></td>
						</tr>  
						<tr class="stytr">
							<td class='tdPop'>Konstruksi<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_konstruksi"></span></td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Laboratorium<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_laboratorium"></span></td>
						</tr>  
						<tr class="stytr">
							<td class='tdPop'>Bukti Kepemilikan<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_bukti_kepemilikan"></span></td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Masa Bangunan<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_masa_bangunan"></span></td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Tingkat<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_tingkat"></span></td>
						</tr> 
						<tr class="stytr">
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
						<tr class="stytr">
							<td class='tdPop'>Kode Barang<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_kode_barang"></span> </td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Nomor Dokumen<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_no_dokumen"></span> </td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Tahun Pengadaan<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_tahun_pengadaan"></span> </td>
						</tr> 
						<tr class="stytr">
							<td class='tdPop'>Nilai Perolehan<span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_nilai_perolehan"></span> </td>
						</tr> 
						<tr class="stytr">
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
						<tr class="stytr">
							<td class='tdPop'>Luas Lahan <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_luas_lahan"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Luas Bangunan <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_luas_bangunan"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Luas Halaman <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_luas_halaman"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Luas Lapangan <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_luas_lapangan"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Luas Lahan Sudah Dipagar <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_sudah_pagar"></span></td>
						</tr>
						<tr class="stytr">
							<td class='tdPop'>Luas Lahan Belum Dipagar <span style="float:right;">:</span></td>
							<td class='tdPop'><span id="det_belum_pagar"></span></td>
						</tr> 
						<tr class="stytr">
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
										<td width='5%' bgcolor="#68e4c5" align='center'><b>No</b></td>
										<td width='45%' bgcolor="#68e4c5" align='center'><b>Tahun</b></td>
										<td width='50%' bgcolor="#68e4c5" align='center'><b>Nilai</b></td>
									</tr> 
										
								</table> 
							</td> 
						</tr> 
						<tr>
							<td class='tdPop' colspan='2'>&nbsp;</td> 
						</tr>
						<tr>
							<td class='tdPop' colspan='2' align="left">
								<div class="col-md-12">
								<hr>
									<center><h2>Gambar</h2></center>
									<center><h4 id="imageNotFound"></h4></center>
									<div class="masonry row" >
										<div id="gambar0"> </div>
										<div id="gambar1"> </div>
										<div id="gambar2"> </div>
										<div id="gambar3"> </div>
										<div id="gambar4"> </div>
										<div id="gambar5"> </div> 
									</div>
								</div>
								<hr>
								<div class="col-md-12">
								<h2>Gambar 360</h2>  
								<div id="viewer" style="width:565px; height:300px" ></div>
								</div>
								<hr> 
								<h2>Video</h2> 
								<div id="videoPlay"> </div>  
							</td> 
						</tr>
					</table> 
						
				</div>
			</div>
		</div>

		<a href="javascript:void(0);" onClick="showMap()" class="float" title="kembali"> <i class="fa fa-arrow-left my-float"></i> </a>
	</div> 
 
    <footer class="footer footer-static footer-light" style="position: fixed;width: 100%;bottom: 0; z-index: 2200;">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="http://www.msmgroup.co.id/" target="_blank">MSM,</a>All rights Reserved</span> 
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer> 
	<link rel="stylesheet" href="<?= base_url();?>assets/css/photo-sphere-viewer.min.css"/> 
	<link href="<?= base_url();?>assets/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
	
    <script src="<?= base_url();?>assets/vendors/js/vendors.min.js"></script>
    <script src="<?= base_url();?>assets/vendors/js/forms/select/select2.full.min.js"></script> 
    <script src="<?= base_url();?>assets/vendors/js/ui/prism.min.js"></script> 
    <script src="<?= base_url();?>assets/js/core/app-menu.js"></script>
    <script src="<?= base_url();?>assets/js/core/app.js"></script>  

	<script src="<?= base_url();?>assets/leaflet/leaflet.js" ></script>
	<script src="<?= base_url();?>assets/js/leaflet.ajax.js"></script>


    
    <script type="text/javascript">
		
        var module ={
				url: "<?php echo site_url('map');?>",
				base: "<?php echo base_url(); ?>",
				geojson : "<?php echo $geojson;?>",
				lat : "<?php echo $lat;?>",
				lon : "<?php echo $lon;?>",
				zoom : "<?php echo $zoom;?>",
			};
			  
    </script>
    <script src="<?= base_url();?>assets/js/dashboard.js"></script>
	<script src="<?= base_url();?>assets/js/three.min.js"></script>
	<script src="<?= base_url();?>assets/js/browser.min.js"></script>
	<script src="<?= base_url();?>assets/js/photo-sphere-viewer.min.js"></script>
	<script src="<?= base_url();?>assets/js/smartphoto.js?v=1"></script> 
 
	<script type="text/javascript">  
		new SmartPhoto(".js-img-viwer"); 
		 
		var viewer = new PhotoSphereViewer.Viewer({
					panorama: 'uploads/443efedf558aeb2b791eba87d6eea194.jpg',
					container: 'viewer',
					caption: 'GIS Aset FASKES',
					loadingImg: 'https://photo-sphere-viewer.js.org/assets/photosphere-logo.gif',
					navbar: 'autorotate zoom download caption fullscreen',
					defaultLat: 0.3,
					mousewheel: false,
					touchmoveTwoFingers: true,
				  });

				var sources = document.querySelectorAll('source');
				var source_errors = 0;
				for (var i = 0; i < sources.length; i++) {
				sources[i].addEventListener('error', function(e) {
					if (++source_errors >= sources.length)
					fallBack();
				});
				}

				function fallBack() {
				document.body.removeChild(document.querySelector('video'));
				document.body.appendChild(document.createTextNode('No video with supported media and MIME type found'));
				}
		  
	</script> 
</body> 

</html> 