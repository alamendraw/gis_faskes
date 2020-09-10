
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
                        <button style="height:60px;" type="button" onClick="buttonToggle('pemeliharaan')" class="btn btn_menu btn-primary">Pemeliharaan</button>  
                        <button style="height:60px;" type="button" id="btn_fasilitas" onClick="buttonToggle('fasilitas')" class="btn btn_menu btn-outline-primary">Fasilitas</button>  
                        <button style="height:60px;" type="button" id="btn_posyandu" onClick="buttonToggle('posyandu')" class="btn btn_menu btn-outline-primary">Posyandu</button>  
                        <button style="height:60px;" type="button" id="btn_pustu" onClick="buttonToggle('pustu')" class="btn btn_menu btn-outline-primary">Pustu</button>
                        <button style="height:60px;" type="button" onClick="buttonToggle('gambar')" class="btn btn_menu btn-outline-primary">Gambar</button> 
                        
                    </div>
                </div>
            </div>
        </div>  
    </div>  
<form id="form7" action="<?php echo $url.'-save-pemeliharaan'?>" method="post" enctype="multipart/form-data"  autocomplete="off">

<div class="">
    <div class="row">
    <input type="hidden" class="form-control" name="action" id="action" value="<?= $action;?>">
    <input type="hidden" class="form-control" name="id_faskes6" id="id_faskes6" value="<?= ($action=='update')?$data['id_faskes']:'';?>">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-body" >
                    <h4 class="card-title"><?php echo $title7?></h4>
                </div> 
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="row">  
                            <div class="col-sm-6">
                                <span><b>Tahun</b></span>                               
                            </div>    
                            <div class="col-sm-6">
                                <span><b>Nilai</b></span>                               
                            </div>  
                            <div class="col-sm-6">
                                <hr>                              
                            </div>  
                            <div class="col-sm-6">
                                <hr>                              
                            </div>  

                        <?php if(isset($pelihara)){
                            foreach($pelihara as $rpel){ ;?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" data-inputmask="'mask': '2099'"  value="<?= ($action=='update')?$rpel['tahun']:'';?>" name="tahun[]" id="tahun[]">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group"> 
                                    <div class="controls">
                                    <input type="text" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="nilai[]" class="form-control" id="nilai[]" placeholder="Nilai" value="<?php echo ($action=='update')?$rpel['nilai']:'';?>"  >
                                    </div>
                                </div>                                     
                            </div>  
                        <?php }};?>

                            <div class="col-sm-6">
                                <div class="form-group"> 
                                    <div class="controls">
                                        <input type="text" data-inputmask="'mask': '2099'" class="form-control"  name="tahun[]" id="tahun[]">
                                    </div>
                                </div>                                     
                            </div>   

                            <div class="col-sm-6">
                                <div class="form-group"> 
                                    <div class="controls">
                                        <input type="text" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="nilai[]" class="form-control" id="nilai[]" placeholder="Nilai">
                                    </div>
                                </div>                                     
                            </div>   
  
                            <div class="col-sm-12">
                                <h8 style="color:sandybrown;">Note : Untuk menghapus data, kosongkan nilai kemudian simpan.</h8>                               
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>
<!-- Batas -->
            
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