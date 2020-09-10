
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pages/data_pustu.css">
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
                        <button style="height:60px;" type="button" id="btn_posyandu" onClick="buttonToggle('posyandu')" class="btn btn_menu btn-outline-primary">Posyandu</button>  
                        <button style="height:60px;" type="button" id="btn_pustu" onClick="buttonToggle('pustu')" class="btn btn_menu btn-primary">Pustu</button>
                        <button style="height:60px;" type="button" onClick="buttonToggle('gambar')" class="btn btn_menu btn-outline-primary">Gambar</button> 
                        
                    </div>
                </div>
            </div>
        </div>  
    </div>  

    <form id="form10" action="<?php echo $url.'-save-pustu'?>" method="post" enctype="multipart/form-data"  autocomplete="off">
 
    <div class="row">
    <input type="hidden" class="form-control" name="action" id="action" value="<?= $action;?>">
    <input type="hidden" class="form-control" name="id_faskes8" id="id_faskes8" value="<?= ($action=='update')?$data['id_faskes']:'';?>">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-body" > 
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0"><?php echo $title9?></h2> 
                    </div>

    <!-- Konten --> 
                <section id="data-pustu-view" class="data-pustu-view-header">    
                    <div class="btn-group" style="top: 61px; left: 50px;">
                        <button type="button" class="btn btn-outline-danger" id="del_pus">
                            Hapus 
                        </button> 
                    </div> 
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-pustu" width="100%">
                            <thead>
                                <tr> 
                                    <th width="43%">&nbsp;&nbsp; Keterangan</th>
                                    <th width="57%">Foto</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($pustu){foreach($pustu as $rpus){?>
                                <tr id="<?= $rpus->id;?>"> 
                                    <td>                                        
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-4">Nama</div>
                                                <div class="col-sm-8">: <?= $rpus->nm_pustu;?></div>
                                                <div class="col-sm-4">Koordinat</div>
                                                <div class="col-sm-8">: <?= $rpus->lat;?>, <?= $rpus->lon;?></div>
                                                <div class="col-sm-4">Alamat</div>
                                                <div class="col-sm-8">: <?= $rpus->alamat;?></div>
                                            </div>
                                        </div>                                        
                                    </td>
                                    <td class="product-img">
                                        <img src="<?= base_url();?>/uploads/<?= ($rpus->foto_1)?$rpus->foto_1:'404.png';?>" style="width:120px;height:100px;" alt="Foto">
                                        <img src="<?= base_url();?>/uploads/<?= ($rpus->foto_2)?$rpus->foto_2:'404.png';?>" style="width:120px;height:100px;" alt="Foto">
                                        <img src="<?= base_url();?>/uploads/<?= ($rpus->foto_3)?$rpus->foto_3:'404.png';?>" style="width:120px;height:100px;" alt="Foto">
                                        <img src="<?= base_url();?>/uploads/<?= ($rpus->foto_4)?$rpus->foto_4:'404.png';?>" style="width:120px;height:100px;" alt="Foto">
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
                                    <h4>Tambah Data pustu</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items-pus pb-3">
                                <div class="data-fields px-2">
                                    <div class="row"> 
                                        <input type="hidden" class="form-control" name="pus_id" id="pus_id"> 
                                        <input type="hidden" class="form-control" name="pus_type" id="pus_type"> 
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Nama pustu</label>
                                            <input type="text" class="form-control" name="pus_nama" id="pustu_name">
                                        </div> 

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Koordinat</label>
                                            <div class="input-group">
                                                <input class="form-control" id="pus_lat" name="pus_lat" type="text" value="" placeholder="Lat">
                                                <input class="form-control" id="pus_lon" name="pus_lon" type="text" value="" placeholder="Lon">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Alamat</label>
                                            <textarea name="pus_alamat" id="pus_alamat" class="form-control" cols="10" rows="3"></textarea>
                                        </div> 

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Gambar</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div id="pustu_foto1"> </div> 
                                                </div>
                                                <div class="col-sm-6">
                                                    <div id="pustu_foto2"> </div> 
                                                </div>
                                                <div class="col-sm-12">&nbsp;</div>
                                                <div class="col-sm-6">
                                                    <div id="pustu_foto3"> </div> 
                                                </div>
                                                <div class="col-sm-6">
                                                    <div id="pustu_foto4"> </div> 
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
                        </div>
                    </div>
                </div>
            </div>
        </div> 
 
</form>
</div>

</section> 
   
<script src="<?php echo base_url('assets/js/pustu.js'); ?>"></script>