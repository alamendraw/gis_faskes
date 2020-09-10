
<section class="simple-validation">  
    <div class="row">  
        <div class="col-md-12" align="center">
            <div class="card"> 
                <div class="card-content">
                    <div class="card-body">  
                        <button style="height:60px;" type="button" onClick="buttonToggle('identitas')" class="btn btn_menu btn-outline-primary">Identitas</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('detail')" class="btn btn_menu btn-outline-primary">Detail</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('lahan')" class="btn btn_menu btn-outline-primary">Lahan</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('perolehan')" class="btn btn_menu btn-primary">Perolehan</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('pemeliharaan')" class="btn btn_menu btn-outline-primary">Pemeliharaan</button> 
                        <button style="height:60px;" type="button" id="btn_fasilitas" onClick="buttonToggle('fasilitas')" class="btn btn_menu btn-outline-primary">Fasilitas</button>  
                        <button style="height:60px;" type="button" id="btn_posyandu" onClick="buttonToggle('posyandu')" class="btn btn_menu btn-outline-primary">Posyandu</button>  
                        <button style="height:60px;" type="button" id="btn_pustu" onClick="buttonToggle('pustu')" class="btn btn_menu btn-outline-primary">Pustu</button>
                        <button style="height:60px;" type="button" onClick="buttonToggle('gambar')" class="btn btn_menu btn-outline-primary">Gambar</button> 
                        
                    </div>
                </div>
            </div>
        </div>  
    </div>  
<form id="form5" action="<?php echo $url.'-save-perolehan'?>" method="post" enctype="multipart/form-data"  autocomplete="off">

<div class="col-md-12">
    <div class="row">
    <input type="hidden" class="form-control" name="action" id="action" value="<?= $action;?>">
    <input type="hidden" class="form-control" name="id_faskes4" id="id_faskes4" value="<?= ($action=='update')?$data['id_faskes']:'';?>">
        <div class=" ">
            <div class="card"> 
                <div class="card-body" >
                    <h4 class="card-title"><?php echo $title5?></h4>
                </div> 
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="row">  
 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID Barang</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['id_barang']:'';?>" name="id_barang" id="id_barang" <?= ($action=='update')?'readonly':'';?>>
                                    </div>
                                </div>                                     
                            </div>  
                             
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['kode_barang']:'';?>" name="kode_barang" id="kode_barang">
                                    </div>
                                </div>                                     
                            </div>  
                             
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nomor Dokumen</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['no_dokumen']:'';?>" name="no_dokumen" id="no_dokumen">
                                    </div>
                                </div>                                     
                            </div>  
                             
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tahun Pengadaan</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['tahun_pengadaan']:'';?>" name="tahun_pengadaan" id="tahun_pengadaan">
                                    </div>
                                </div>                                     
                            </div>  
                             
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nilai Perolehan</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['nilai_perolehan']:'';?>" name="nilai_perolehan" id="nilai_perolehan">
                                    </div>
                                </div>                                     
                            </div>  
                             
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Sumber Dana</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['sumber_dana']:'';?>" name="sumber_dana" id="sumber_dana">
                                    </div>
                                </div>                                     
                            </div>  
                              
                        </div>
                            
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

    </div>
</form>
</div>

</section>  