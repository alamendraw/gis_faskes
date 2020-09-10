  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pages/data_posyandu.css">
<section class="simple-validation">  
    <div class="row">  
        <div class="col-md-12" align="center">
            <div class="card"> 
                <div class="card-content">
                    <div class="card-body">  
                        <button style="height:60px;" type="button" onClick="buttonToggle('identitas')" class="btn btn_menu btn-outline-primary">Identitas</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('detail')" class="btn btn_menu btn-outline-primary">Detail</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('lahan')" class="btn btn_menu btn-outline-primary">Lahan</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('perolehan')" class="btn btn_menu btn-outline-primary">Perolehan</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('pemeliharaan')" class="btn btn_menu btn-outline-primary">Pemeliharaan</button>  
                        <button style="height:60px;" type="button" id="btn_fasilitas" onClick="buttonToggle('fasilitas')" class="btn btn_menu btn-outline-primary">Fasilitas</button>  
                        <button style="height:60px;" type="button" id="btn_posyandu" onClick="buttonToggle('posyandu')" class="btn btn_menu btn-primary">Posyandu</button>  
                        <button style="height:60px;" type="button" id="btn_pustu" onClick="buttonToggle('pustu')" class="btn btn_menu btn-outline-primary">Pustu</button>
                        <button style="height:60px;" type="button" onClick="buttonToggle('gambar')" class="btn btn_menu btn-outline-primary">Gambar</button> 
                        
                    </div>
                </div>
            </div>
        </div>  
    </div>  
<form id="form9" action="<?php echo $url.'-save-posyandu'?>" method="post" enctype="multipart/form-data"  autocomplete="off">
 
    <div class="row">
    <input type="hidden" class="form-control" name="action" id="action" value="<?= $action;?>">
    <input type="hidden" class="form-control" name="id_faskes7" id="id_faskes7" value="<?= ($action=='update')?$data['id_faskes']:'';?>">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-body" >
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0"><?php echo $title8?></h2> 
                    </div>  

    <!-- Konten --> 
                <section id="data-posyandu-view" class="data-posyandu-view-header">   
                    <!-- <div class="action-btns d-none"> -->
                        <!-- <div class="btn-dropdown mr-1 mb-1"> -->
                            <div class="btn-group" style="top: 61px; left: 0px;">
                                <button type="button" class="btn btn-outline-danger" id="del_pos">
                                    Hapus
                                </button> 
                            </div>
                        <!-- </div> -->
                    <!-- </div>                   -->
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-posyandu" width="100%">
                            <thead>
                                <tr> 
                                    <th width="43%">&nbsp;&nbsp; Keterangan</th>
                                    <th width="57%">Foto</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($posyandu){foreach($posyandu as $rpos){?>
                                <tr id="<?= $rpos->id;?>"> 
                                    <td>                                        
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-4">Nama</div>
                                                <div class="col-sm-8">: <?= $rpos->nm_posyandu;?></div>
                                                <div class="col-sm-4">Koordinat</div>
                                                <div class="col-sm-8">: <?= $rpos->lat;?>, <?= $rpos->lon;?></div>
                                                <div class="col-sm-4">Alamat</div>
                                                <div class="col-sm-8">: <?= $rpos->alamat;?></div>
                                            </div>
                                        </div>                                        
                                    </td>
                                    <td class="product-img">
                                        <img src="<?= base_url();?>/uploads/<?= ($rpos->foto_1)?$rpos->foto_1:'404.png';?>" style="width:120px;height:100px;" alt="Foto">
                                        <img src="<?= base_url();?>/uploads/<?= ($rpos->foto_2)?$rpos->foto_2:'404.png';?>" style="width:120px;height:100px;" alt="Foto">
                                        <img src="<?= base_url();?>/uploads/<?= ($rpos->foto_3)?$rpos->foto_3:'404.png';?>" style="width:120px;height:100px;" alt="Foto">
                                        <img src="<?= base_url();?>/uploads/<?= ($rpos->foto_4)?$rpos->foto_4:'404.png';?>" style="width:120px;height:100px;" alt="Foto">
                                    </td>                                     
                                </tr> 
                                <?php }};?>
                            </tbody>
                        </table>
                    </div>
                    <!-- dataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4>Tambah Data Posyandu</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2">
                                    <div class="row"> 
                                        <input type="hidden" class="form-control" name="pos_id" id="pos_id"> 
                                        <input type="hidden" class="form-control" name="pos_type" id="pos_type"> 
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Nama Posyandu</label>
                                            <input type="text" class="form-control" name="pos_nama" id="posyandu_name">
                                        </div> 

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Koordinat</label>
                                            <div class="input-group">
                                                <input class="form-control" id="pos_lat" name="pos_lat" type="text" value="" placeholder="Lat">
                                                <input class="form-control" id="pos_lon" name="pos_lon" type="text" value="" placeholder="Lon">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Alamat</label>
                                            <textarea name="pos_alamat" id="pos_alamat" class="form-control" cols="10" rows="3"></textarea>
                                        </div> 

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Gambar</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div id="foto1"> </div> 
                                                </div>
                                                <div class="col-sm-6">
                                                    <div id="foto2"> </div> 
                                                </div>
                                                <div class="col-sm-12">&nbsp;</div>
                                                <div class="col-sm-6">
                                                    <div id="foto3"> </div> 
                                                </div>
                                                <div class="col-sm-6">
                                                    <div id="foto4"> </div> 
                                                </div>
                                                 
                                            </div> 
                                        </div> 
                                         
                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-outline-primary">Simpan</button>
                                </div>
                               
                                <!-- <div class="hide-data-sidebar">
                                <button class="btn btn-outline-danger">Selesai</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
            </div>
                 
    <!-- End Konten -->  
            </div>
<!-- Batas -->
            
        </div>
   
        
        <!-- Batas -->
        <div class="col-md-12" align="center">
            <div class="card"> 
                <div class="card-content">
                    <div class="card-body"> 
                        <div style="padding-bottom:30px">
                            <button style="float:left;" type="button" onClick="back()" class="btn btn-outline-warning">Kembali</button>
                            <!-- <button style="float:right;" type="submit" class="btn btn-outline-primary">Simpan</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div> 
 
</form>
</div>

</section> 
   
<script src="<?php echo base_url('assets/js/posyandu.js'); ?>"></script>