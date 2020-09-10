  
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4>
                    <div style="float:right;"> 
                        <a href="<?php echo $url.'-add';?>" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="tooltip" data-original-title="Tambah Data Faskes"> <i class="feather icon-plus"></i> Tambah</a> 
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard"> 
                        <div class="table-responsive">
                            <table class="table zero-configuration" width="100%">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th> 
                                        <th width="34%">Nama Faskes</th>  
                                        <th width="20%">Kecamatan</th>  
                                        <th width="20%">Kepala Faskes</th>        
                                        <th width="10%">Tipe Faskes</th>          
                                        <th width="13%">Action</th> 
                                    </tr>
                                </thead>

                                <tbody> 
                                    <?php $no=1; foreach($list as $row){?>
                                    <tr>
                                        <td><?= $no;?></td> 
                                        <td><?= $row['nm_faskes'];?> </td>  
                                        <td><?= $row['kecamatan'];?> </td> 
                                        <td><?= $row['kepala_faskes'];?></td>    
                                        <td><?= $row['tipe_faskes'];?></td>  
                                        <td> 
                                        <a href="<?= $url.'-edit/'.$row['id'];?>" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="tooltip" data-original-title="Ubah Data"> Edit </a>
                                        <a href="javascript:void(0);" onclick="huda_delete('<?= $url.'-delete/'.$row['id'];?>')" class="btn btn-icon btn-delete btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="Hapus Data"> Hapus </a> 
                                        </td> 
                                    </tr>  
                                    <?php $no++; };?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  

<script type="text/javascript"> 
    function huda_delete(urlId){ 
        Swal.fire({
        title: 'Peringatan?',
        text: "Data akan di hapus?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Hapus',
        cancelButtonText: 'Batal',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
        }).then(function (result) {
        if (result.value) {
            $.ajax({
                type:'post',
                url:urlId,
                dataType:'json',
                success: function(data){
                    Swal.fire({
                        type: data.status,
                        title: data.title,
                        text: data.message,  
                    });
                    location.reload();
                }
            });
            
        }
        });
    }
    
</script>
    
 