
	<link rel="stylesheet" href="<?= base_url();?>assets/css/select2.min.css" /> 
<section class="simple-validation">  
        <div class="row">  
            <div class="col-md-12" align="center">
                <div class="card"> 
                    <div class="card-content">
                        <div class="card-body">   
                            <button style="height:60px;" type="button" id="btn_identitas" onClick="buttonToggle('identitas')" class="btn btn_menu btn-primary">Identitas</button> 
                            <button style="height:60px;" type="button" id="btn_detail" onClick="buttonToggle('detail')" class="btn btn_menu btn-outline-primary">Detail</button> 
                            <button style="height:60px;" type="button" id="btn_lahan" onClick="buttonToggle('lahan')" class="btn btn_menu btn-outline-primary">Lahan</button> 
                            <button style="height:60px;" type="button" id="btn_perolehan" onClick="buttonToggle('perolehan')" class="btn btn_menu btn-outline-primary">Perolehan</button> 
                            <button style="height:60px;" type="button" id="btn_pemeliharaan" onClick="buttonToggle('pemeliharaan')" class="btn btn_menu btn-outline-primary">Pemeliharaan</button> 
                            <button style="height:60px;" type="button" id="btn_fasilitas" onClick="buttonToggle('fasilitas')" class="btn btn_menu btn-outline-primary">Fasilitas</button>  
                            <button style="height:60px;" type="button" id="btn_posyandu" onClick="buttonToggle('posyandu')" class="btn btn_menu btn-outline-primary">Posyandu</button>  
                            <button style="height:60px;" type="button" id="btn_pustu" onClick="buttonToggle('pustu')" class="btn btn_menu btn-outline-primary">Pustu</button> 
                            <button style="height:60px;" type="button" id="btn_gambar" onClick="buttonToggle('gambar')" class="btn btn_menu btn-outline-primary">Gambar</button> 
                           
                        </div>
                    </div>
                </div>
            </div> 
        </div>  

<form id="form1" action="<?php echo $url.'-save-identitas'?>" method="post" enctype="multipart/form-data"  autocomplete="off">
 
    <div class="row">
    <input type="hidden" class="form-control" name="action" id="action" value="<?= $action;?>">
    <input type="hidden" class="form-control" name="id" id="id" value="<?= ($action=='update')?$data['id']:'';?>">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-body" >
                    <h4 class="card-title"><?php echo $title1?></h4>
                </div> 
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="row">   
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Faskes</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['nm_faskes']:'';?>" name="nm_faskes" id="nm_faskes">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <div class="controls"> 
                                        <select name="kondisi" id="kondisi" class="form-control" readonly>
                                            <option value="<?= ($action=='update')?$data['kondisi']:'';?>">
                                                <?php 
                                                    if($action=='update'){
                                                        switch ($data['kondisi']) {
                                                            case 'B':
                                                                echo 'Baik';
                                                            break;
                                                            case 'RR':
                                                                echo 'Rusak Ringan';
                                                            break;
                                                            case 'RS':
                                                                echo 'Rusak Sedang';
                                                            break; 
                                                            default:
                                                                echo 'Rusak Berat';
                                                        }
                                                    }else{
                                                        echo '';
                                                    }
                                                ?>
                                            </option>
                                            <option value="B">Baik</option>
                                            <option value="RR">Rusak Ringan</option>
                                            <option value="RS">Rusak Sedang</option>
                                            <option value="RB">Rusak Berat</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tipe Faskes</label>
                                    <div class="controls"> 
                                        <select name="tipe_faskes" id="tipe_faskes" class="form-control" readonly>
                                            <option value="<?= ($action=='update')?$data['tipe_faskes']:'';?>">
                                            <?= ($action=='update')?($data['tipe_faskes']=='1')?'Rawat Inap':'Non Rawat Inap':'';?>
                                            </option> 
                                            <option value="1">Rawat Inap</option> 
                                            <option value="2">Non Rawat Inap</option> 
                                        </select>
                                    </div>
                                </div>                                     
                            </div>  
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Faskes</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['status_faskes']:'';?>" name="status_faskes" id="status_faskes"> -->
                                        <select name="status_faskes" class="form-control">
                                                    <option value="<?= ($action=='update')?$data['status_faskes']:'';?>"><?= ($action=='update')?$data['status_faskes']:'';?></option>
                                                    <option value="Negeri">Negeri</option>
                                                    <option value="Swasta">Swasta</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SK Pendirian</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['sk_pendirian']:'';?>" name="sk_pendirian" id="sk_pendirian">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SK Ijin Operasional</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['sk_ijin_operasional']:'';?>" name="sk_ijin_operasional" id="sk_ijin_operasional">
                                    </div>
                                </div>                                     
                            </div>                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Sertifikasi Iso</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['sertifikasi_iso']:'';?>" name="sertifikasi_iso" id="sertifikasi_iso">
                                    </div>
                                </div>                                     
                            </div>    
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['kecamatan']:'';?>" name="kecamatan" id="kecamatan"> -->

                                        <select name="kecamatan" id="kecamatan" class="form-control" >
                                            <option value="<?= ($action=='update')?$data['kecamatan']:'';?>"><?= ($action=='update')?$data['kecamatan']:'';?></option>
                                            <?php foreach($ms_kecamatan as $rkec){?> 
                                                <option value="<?= $rkec['nama'];?>"><?= $rkec['nama'];?></option>
                                            <?php };?>
                                        </select>
                                    </div>
                                </div>                                     
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['kelurahan']:'';?>" name="kelurahan" id="kelurahan">
                                    </div>
                                </div>                                     
                            </div>   
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['alamat']:'';?>" name="alamat" id="alamat">
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['kode_pos']:'';?>" name="kode_pos" id="kode_pos">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['telepon']:'';?>" name="telepon" id="telepon">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Website</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['website']:'';?>" name="website" id="website">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['email']:'';?>" name="email" id="email">
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>NPWP</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['npwp']:'';?>" name="npwp" id="npwp">
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row"> 
                                    <div class="col-sm-10">
                                        <label for="lat">Koordinat</label> 
                                        <div class="input-group">
                                        <input class="form-control" id="lat" name="lat" type="text" value="<?= ($action=='update')?$data['lat']:'';?>">
                                        <input class="form-control" id="lon" name="lon" type="text" value="<?= ($action=='update')?$data['lon']:'';?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="map"></label> 
                                        <button type="button" class="btn btn-outline-success btn-sm" onClick="openMap()" style="height: 37px;">Map</button> 
                                    </div>  
                                </div>                                     
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>
<!-- Batas -->
            
        </div>
  

        <!-- Batas -->
        <div class="col-md-12" align="center" id="addMap">
            <div class="card"> 
                <div class="card-content">
                    <div class="card-body">  
                    <div id="mapid"  class="col-md-12"></div>
                    <button type="button" class="btn btn-danger" onClick="closeMap()" id="exitMap" title="Close Map">X</button>  
                    </div>
                </div>
            </div>
        </div>  
        
        <!-- Batas -->
        <div class="col-md-12" align="center">
            <div class="card"> 
                <div class="card-content">
                    <div class="card-body"> 
                        <div style="padding-bottom:30px">
                            <button style="float:left;" type="button" id="back" class="btn btn-outline-warning">Kembali</button>
                            <button style="float:right;" type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
 
</form>
</div>

</section>  

<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>

<script src="<?= base_url();?>assets/leaflet/leaflet.js" ></script>
<script src="<?php echo base_url(); ?>assets/leaflet/draw/L.draw.js"></script>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <script src="<?= base_url();?>assets/vendors/js/forms/select/select2.full.min.js"></script>

<script type="text/javascript">
    
    $('#kecamatan').select2();
</script>