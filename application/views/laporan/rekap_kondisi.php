 
<div class="row">
    <div class="col-md-12">
        <div class="card">  
            <div class="card-content">
                <div class="card-body"> 
                    <div class="row">  
                        <div class="col-md-12">
                            <button style="float:right;" type="button" id="pdf" class="btn btn-outline-primary">Cetak PDF</button>
                        </div>
                        <div id="content" class="col-md-12"></div>
                    </div>
                        
                </div>
            </div>
        </div> 
    </div> 
</div>  

<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript">
    $.ajax({
        type :'get',
        url : "<?= site_url('laporan-rekap-kondisi-data');?>",
        dataType : 'json',
        success : function(data){
            $("#content").html(data);
        }
    });

    $("#pdf").on('click', function(){
        window.open("<?= site_url('laporan-rekap-kondisi-pdf');?>","_blank");
    });
</script>