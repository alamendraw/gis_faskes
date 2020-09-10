
<section class="simple-validation">  
    <div class="row">  
        <div class="col-md-12" align="center">
            <div class="card"> 
                <div class="card-content">
                    <div class="card-body">  
                        <button style="height:60px;" type="button" onClick="buttonToggle('identitas')" class="btn btn_menu btn-outline-primary">Identitas</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('detail')" class="btn btn_menu btn-primary">Detail</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('lahan')" class="btn btn_menu btn-outline-primary">Lahan</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('perolehan')" class="btn btn_menu btn-outline-primary">Perolehan</button> 
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
<form id="form3" action="<?php echo $url.'-save-detail'?>" method="post" enctype="multipart/form-data"  autocomplete="off">

<div class="col-md-12">
    <div class="row">
    <input type="hidden" class="form-control" name="action" id="action" value="<?= $action;?>">
    <input type="hidden" class="form-control" name="id_faskes2" id="id_faskes2" value="<?= ($action=='update')?$data['id_faskes']:'';?>">
        <div class=" ">
            <div class="card"> 
                <div class="card-body" >
                    <h4 class="card-title"><?php echo $title3?></h4>
                </div> 
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="row">  
 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kepala Faskes</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['kepala_faskes']:'';?>" name="kepala_faskes" id="kepala_faskes">
                                    </div>
                                </div>                                     
                            </div>  
                             
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label>Sumber Listrik</label>
                                     <div class="controls">
                                         <input type="text" class="form-control" value="<?= ($action=='update')?$data['sumber_listrik']:'';?>" name="sumber_listrik" id="sumber_listrik">
                                     </div>
                                 </div>                                     
                             </div>  
                                
                             
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Daya Listrik</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['daya_listrik']:'';?>" name="daya_listrik" id="daya_listrik">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Sumber Air</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['sumber_air']:'';?>" name="sumber_air" id="sumber_air">
                                    </div>
                                </div>                                     
                            </div>  
                             
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Internet</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['internet']:'';?>" name="internet" id="internet">
                                    </div>
                                </div>                                     
                            </div>  
                             
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Bandwidth</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['bandwidth']:'';?>" name="bandwidth" id="bandwidth">
                                    </div>
                                </div>                                     
                            </div>  
                               
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Pusling</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['pusling']:'';?>" name="pusling" id="pusling"> -->
                                        <select name="pusling" class="form-control">
                                            <option value="<?= ($action=='update')?$data['pusling']:'';?>"><?= ($action=='update')?$data['pusling']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>  
                               
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Konstruksi</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['konstruksi']:'';?>" name="konstruksi" id="konstruksi">
                                    </div>
                                </div>                                     
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Bukti Kepemilikan</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['bukti_kepemilikan']:'';?>" name="bukti_kepemilikan" id="bukti_kepemilikan">
                                    </div>
                                </div>                                     
                            </div>  
                               
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Masa Bangunan</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['masa_bangunan']:'';?>" name="masa_bangunan" id="masa_bangunan">
                                    </div>
                                </div>                                     
                            </div>  
                               
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tingkat</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['tingkat']:'';?>" name="tingkat" id="tingkat">
                                    </div>
                                </div>                                     
                            </div>  
                               
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jumlah Lantai</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['jumlah_lantai']:'';?>" name="jumlah_lantai" id="jumlah_lantai">
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