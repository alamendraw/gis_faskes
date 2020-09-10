

<div class="row">
<div class="col-md-6">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                            <h4 class="card-title">Update Data Assets</h4>
                        </div>                            
                    </div>
                    <hr>
                     
                    <div class="form-group">
                        <label>Link API</label>
                        <div class="controls">
                            <input type="text" class="form-control" value="<?= $link_assets;?>" readonly>
                        </div>
                    </div>                                     
                            
                    <div align="center"> 
                        <button type="button" id="assets" class="btn bg-gradient-success mr-1 mb-1 waves-effect waves-light">Proses &nbsp;<i class="feather icon-download"></i></button>
                    </div>
                    <div>
                        <span id="asset_ins"></span> <br>
                        <span id="asset_upd"></span>
                    </div>
                    
                    <hr> 
                    <div class="progress progress-bar-success progress-lg">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100" style="width:0%" id="prog_assets"></div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
<!-- Pemeliharaan -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                            <h4 class="card-title">Update Data Pemeliharaan</h4>
                        </div>                            
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Link API</label>
                        <div class="controls">
                            <input type="text" class="form-control" value="<?= $link_pelihara;?>" readonly>
                        </div>
                    </div> 
                    <div align="center">
                    <button type="button" class="btn bg-gradient-success mr-1 mb-1 waves-effect waves-light" id="pelihara">Proses &nbsp;<i class="feather icon-download"></i></button>
                    </div>
                    <div>
                        <span id="pelihara_ins"></span> <br>
                        <span id="pelihara_upd"></span>
                    </div>
                    
                    <hr> 
                    <div class="progress progress-bar-success progress-lg">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100" style="width:0%" id="prog_pelihara"></div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
<!-- GIS -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                            <h4 class="card-title">Update Data GIS Faskes</h4>
                        </div>                            
                    </div>
                    <hr>
                    <div align="center">
                    <button type="button" class="btn bg-gradient-success mr-1 mb-1 waves-effect waves-light" id="gis">Proses &nbsp;<i class="feather icon-download"></i></button>
                    </div>
                    <div>
                        <span id="gis_ins"></span> <br>
                        <span id="gis_upd"></span>
                    </div>
                    
                    <hr> 
                    <div class="progress progress-bar-success progress-lg">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100" style="width:0%" id="prog_gis"></div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script> 

<script type="text/javascript">
    site_url = "<?= $url;?>";

    var total_asset = 0;
    var ins_asset = 0;
    var upd_asset = 0;
    $("#assets").on('click', function(){ 
        $('#assets').prop('disabled', true);
        $.ajax({
            type : 'get',
            url : site_url+'/total-asset',
            dataType : 'json',
            success : function(t){
                total_asset = t; 
                for (i = 0; i < total_asset; i++) {
                    proses_asset(i);  
                } 
            }
        });
    });

    function proses_asset(pal){ 
        $.ajax({
            type : 'get',
            url : site_url+'/proses-asset/'+pal,
            dataType : 'json',
            success : function(d){  
                if(d['type']=='insert'){
                    ins_asset++;
                }else{
                    upd_asset++
                }

                if(d['posisi'] == total_asset){
                    $('#assets').prop('disabled', false);
                    $("#asset_ins").html(ins_asset+" Data ditambahkan");
                    $("#asset_upd").html(upd_asset+" Data diperbaharui");                    
                }
                res = (d['posisi']/total_asset)*100;
                $("#prog_assets").css("width", res+'%');
            }
        });
    }

// Pemeliharaan
    var total_pelihara = 0;
    var ins_pelihara = 0;
    var upd_pelihara = 0;
    $("#pelihara").on('click', function(){ 
        $('#pelihara').prop('disabled', true);
        $.ajax({
            type : 'get',
            url : site_url+'/total-pelihara',
            dataType : 'json',
            success : function(t){
                total_pelihara = t; 
                for (i = 0; i < total_pelihara; i++) {
                    proses_pelihara(i);  
                } 
            }
        });
    });

    function proses_pelihara(pal){ 
        $.ajax({
            type : 'get',
            url : site_url+'/proses-pelihara/'+pal,
            dataType : 'json',
            success : function(d){  
                if(d['type']=='insert'){
                    ins_pelihara++;
                }else{
                    upd_pelihara++
                }

                if(d['posisi'] == total_pelihara){
                    $('#pelihara').prop('disabled', false);
                    $("#pelihara_ins").html(ins_pelihara+" Data ditambahkan");
                    $("#pelihara_upd").html(upd_pelihara+" Data diperbaharui");                    
                }
                res = (d['posisi']/total_pelihara)*100;
                $("#prog_pelihara").css("width", res+'%');
            }
        });
    }

// GIS
    var total_gis = 0;
    var ins_gis = 0;
    var upd_gis = 0;
    $("#gis").on('click', function(){ 
        $('#gis').prop('disabled', true);
        $.ajax({
            type : 'get',
            url : site_url+'/total-gis',
            dataType : 'json',
            success : function(t){
                total_gis = t; 
                for (i = 0; i < total_gis; i++) {
                    proses_gis(i);  
                } 
            }
        });
    });

    function proses_gis(pal){ 
        $.ajax({
            type : 'get',
            url : site_url+'/proses-gis/'+pal,
            dataType : 'json',
            success : function(d){  
                if(d['type']=='insert'){
                    ins_gis++;
                }else{
                    upd_gis++
                }

                if(d['posisi'] == total_gis){
                    $('#gis').prop('disabled', false);
                    $("#gis_ins").html(ins_gis+" Data ditambahkan");
                    $("#gis_upd").html(upd_gis+" Data diperbaharui");                    
                }
                res = (d['posisi']/total_gis)*100;
                console.log(d['posisi']);
                $("#prog_gis").css("width", res+'%');
            }
        });
    }
</script>