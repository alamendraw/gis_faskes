
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
                        <button style="height:60px;" type="button" id="btn_pustu" onClick="buttonToggle('pustu')" class="btn btn_menu btn-outline-primary">Pustu</button>
                        <button style="height:60px;" type="button" onClick="buttonToggle('gambar')" class="btn btn_menu btn-primary">Gambar</button> 
                        
                    </div>
                </div>
            </div>
        </div> 
    </div>  
<form id="form6" action="<?php echo $url.'-save-gambar'?>" method="post" enctype="multipart/form-data"  autocomplete="off">

<div class="col-md-12">
    <div class="row">
    <input type="hidden" class="form-control" name="action" id="action" value="<?= $action;?>">
    <input type="hidden" class="form-control" name="id_faskes5" id="id_faskes5" value="<?= ($action=='update')?$data['id_faskes']:'';?>">
        <div class=" ">
            <div class="card"> 
                <div class="card-body" >
                    <h4 class="card-title"><?php echo $title6?> </h4> 
                    
                </div> 
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="row">  
                            <div class="col-md-4">
                                <div class="card"> 
                                    <div class="card-content"> 
                                        <div class="card-body"> 
                                        <input type="file" name="filefoto0" id="filefoto0" value="<?= ($action=='update')?$image0:'';?>" class="dropify" data-height="150" data-default-file="<?= ($action=='update')?($image0)?base_url().'uploads/'.$image0:'':'';?>" data-show-remove="true">  
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="card"> 
                                    <div class="card-content"> 
                                        <div class="card-body"> 
                                        <input type="file" name="filefoto1" id="filefoto1" value="<?= ($action=='update')?$image1:'';?>" class="dropify" data-height="150" data-default-file="<?= ($action=='update')?($image1)?base_url().'uploads/'.$image1:'':'';?>" data-show-remove="true">  
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="card"> 
                                    <div class="card-content"> 
                                        <div class="card-body"> 
                                        <input type="file" name="filefoto2" id="filefoto2" value="<?= ($action=='update')?$image2:'';?>" class="dropify" data-height="150" data-default-file="<?= ($action=='update')?($image2)?base_url().'uploads/'.$image2:'':'';?>" data-show-remove="true">  
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="card"> 
                                    <div class="card-content"> 
                                        <div class="card-body"> 
                                        <input type="file" name="filefoto3" id="filefoto3" value="<?= ($action=='update')?$image3:'';?>" class="dropify" data-height="150" data-default-file="<?= ($action=='update')?($image3)?base_url().'uploads/'.$image3:'':'';?>" data-show-remove="true">  
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="card"> 
                                    <div class="card-content"> 
                                        <div class="card-body"> 
                                        <input type="file" name="filefoto4" id="filefoto4" value="<?= ($action=='update')?$image4:'';?>" class="dropify" data-height="150" data-default-file="<?= ($action=='update')?($image4)?base_url().'uploads/'.$image4:'':'';?>" data-show-remove="true">  
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="card"> 
                                    <div class="card-content"> 
                                        <div class="card-body"> 
                                        <input type="file" name="filefoto5" id="filefoto5" value="<?= ($action=='update')?$image5:'';?>" class="dropify" data-height="150" data-default-file="<?= ($action=='update')?($image5)?base_url().'uploads/'.$image5:'':'';?>" data-show-remove="true">  
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                            
                    </div>
                </div>
            </div> 
        </div>
        <!-- Batas -->
        <div class="col-md-6"> 
            <div class="card">  
                <div class="card-content">
                    <div class="card-body"> 
                    <h4 class="card-title">Gambar 360 </h4> 
                        <div class="row">   
                            <div class="col-md-12">
                                <div class="card"> 
                                    <div class="card-content"> 
                                        <div class="card-body"> 
                                        <input type="file" name="filefoto6" id="filefoto6" value="<?= ($action=='update')?$img360:'';?>" class="dropify" data-height="150" data-default-file="<?= ($action=='update')?($img360)?base_url().'uploads/'.$img360:'':'';?>" data-show-remove="true">  
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div> 
        </div>
        <!-- Batas -->
        <div class="col-md-6"> 
            <div class="card">  
                <div class="card-content">
                    <div class="card-body"> 
                    <h4 class="card-title">Video </h4> 
                        <div class="row">   
                            <div class="col-md-12">
                                <div class="card"> 
                                    <div class="card-content"> 
                                        <div class="card-body"> 
                                        <input type="file" name="filefoto7" id="filefoto7" value="<?= ($action=='update')?$video:'';?>" class="dropify" data-height="150" data-default-file="<?= ($action=='update')?($video)?base_url().'uploads/'.$video:'':'';?>" data-show-remove="true"> 
                                        </div>
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

<script type="text/javascript"> 
   
</script>