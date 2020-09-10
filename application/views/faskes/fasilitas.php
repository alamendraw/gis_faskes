
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
                        <button style="height:60px;" type="button" id="btn_fasilitas" onClick="buttonToggle('fasilitas')" class="btn btn_menu btn-primary">Fasilitas</button>  
                        <button style="height:60px;" type="button" id="btn_posyandu" onClick="buttonToggle('posyandu')" class="btn btn_menu btn-outline-primary">Posyandu</button>  
                        <button style="height:60px;" type="button" id="btn_pustu" onClick="buttonToggle('pustu')" class="btn btn_menu btn-outline-primary">Pustu</button>
                        <button style="height:60px;" type="button" onClick="buttonToggle('gambar')" class="btn btn_menu btn-outline-primary">Gambar</button> 
                        
                    </div>
                </div>
            </div>
        </div>  
    </div>  
<form id="form8" action="<?php echo $url.'-save-fasilitas'?>" method="post" enctype="multipart/form-data"  autocomplete="off">

    <div class="row">
    <input type="hidden" class="form-control" name="action" id="action" value="<?= $action;?>">
    <input type="hidden" class="form-control" name="id_faskes3" id="id_faskes3" value="<?= ($action=='update')?$data['id_faskes']:'';?>">
       
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-body" >
                    <h4 class="card-title"><?php echo $title5?></h4>
                </div> 
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="row">
                        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>UGD</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['ugd']:'';?>" name="ugd" id="ugd"> -->
                                        <select name="ugd" class="form-control">
                                            <option value="<?= ($action=='update')?$data['ugd']:'';?>"><?= ($action=='update')?$data['ugd']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>KIA</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['kia']:'';?>" name="kia" id="kia"> -->
                                        <select name="kia" class="form-control">
                                            <option value="<?= ($action=='update')?$data['kia']:'';?>"><?= ($action=='update')?$data['kia']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Rawat Inap</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['rawat_inap']:'';?>" name="rawat_inap" id="rawat_inap"> -->
                                        <select name="rawat_inap" class="form-control">
                                            <option value="<?= ($action=='update')?$data['rawat_inap']:'';?>"><?= ($action=='update')?$data['rawat_inap']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Laboratorium</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['laboratorium']:'';?>" name="laboratorium" id="laboratorium"> -->
                                        <select name="laboratorium" class="form-control">
                                            <option value="<?= ($action=='update')?$data['laboratorium']:'';?>"><?= ($action=='update')?$data['laboratorium']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Pengolah Limbah</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['pengolah_limbah']:'';?>" name="pengolah_limbah" id="pengolah_limbah"> -->
                                        <select name="pengolah_limbah" class="form-control">
                                            <option value="<?= ($action=='update')?$data['pengolah_limbah']:'';?>"><?= ($action=='update')?$data['pengolah_limbah']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ambulance</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['ambulance']:'';?>" name="ambulance" id="ambulance"> -->
                                        <select name="ambulance" class="form-control">
                                            <option value="<?= ($action=='update')?$data['ambulance']:'';?>"><?= ($action=='update')?$data['ambulance']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mushola</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['mushola']:'';?>" name="mushola" id="mushola"> -->
                                        <select name="mushola" class="form-control">
                                            <option value="<?= ($action=='update')?$data['mushola']:'';?>"><?= ($action=='update')?$data['mushola']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Taman</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['taman']:'';?>" name="taman" id="taman"> -->
                                        <select name="taman" class="form-control">
                                            <option value="<?= ($action=='update')?$data['taman']:'';?>"><?= ($action=='update')?$data['taman']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Parkir</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['parkir']:'';?>" name="parkir" id="parkir"> -->
                                        <select name="parkir" class="form-control">
                                            <option value="<?= ($action=='update')?$data['parkir']:'';?>"><?= ($action=='update')?$data['parkir']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Toilet</label>
                                    <div class="controls">
                                        <!-- <input type="text" class="form-control" value="<?= ($action=='update')?$data['toilet']:'';?>" name="toilet" id="toilet"> -->
                                        <select name="toilet" class="form-control">
                                            <option value="<?= ($action=='update')?$data['toilet']:'';?>"><?= ($action=='update')?$data['toilet']:'';?></option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
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