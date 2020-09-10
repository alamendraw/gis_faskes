
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">  
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/toastr.css">
<style type="text/css">
		#mapid { height: 60vh; }
        #exitMap {
            position: absolute;
            top: 80px;
            right: 35px;
            padding: 10px;
            z-index: 400;
        }
        .btn_menu{
            padding: 0.9rem 1.5rem;
        }
	</style>
  
    <div id="identitas">
        <?php $this->load->view('faskes/identitas');?>
    </div> 

    <div id="detail">
        <?php $this->load->view('faskes/detail');?>
    </div> 

    <div id="perolehan">
        <?php $this->load->view('faskes/perolehan');?>
    </div> 

    <div id="pemeliharaan">
        <?php $this->load->view('faskes/pemeliharaan');?>
    </div> 

    <div id="lahan">
        <?php $this->load->view('faskes/lahan');?>
    </div> 
    
    <div id="fasilitas">
        <?php $this->load->view('faskes/fasilitas');?>
    </div> 
    
    <div id="gambar">
        <?php $this->load->view('faskes/gambar');?>
    </div> 

    <div id="posyandu">
        <?php $this->load->view('faskes/posyandu');?>
    </div> 

    <div id="pustu">
        <?php $this->load->view('faskes/pustu');?>
    </div> 

    
    <script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/vendors/js/forms/jquery.form.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/js/forms/validation/jquery.validate.min.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script> 
    <script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script> 

<script type="text/javascript"> 
    var vurl = "<?php echo $url;?>";
    var vsite = "<?= site_url();?>"; 
    var vbase = "<?= base_url();?>"; 
    var kond = "<?= $action;?>";
 
    var rlat = parseFloat($("#lat").val());
    var rlon = parseFloat($("#lon").val());
    if(kond!='update'){
        $("#btn_detail").attr('disabled', true);
        $("#btn_lahan").attr('disabled', true);
        $("#btn_fasilitas").attr('disabled', true);
        $("#btn_perolehan").attr('disabled', true);
        $("#btn_pemeliharaan").attr('disabled', true);
        $("#btn_prestasi").attr('disabled', true);
        $("#btn_gambar").attr('disabled', true);     
    } 
    if($("#lat").val()==''){
        rlat = '';
        rlon = '';
    }
    var module ={
                kondisi: kond, 
                vlat:rlat, 
                vlon:rlon, 
			};
 
    $(document).ready(function(){ 
          
        $('#addMap').hide();
        show_identitas();
        setDropify();
        // $('.dropify').dropify({
        //     messages: {
        //         default: 'Drag atau drop ',
        //         replace: 'Ganti',
        //         remove:  'Hapus',
        //         error:   'error'
        //     }
        // });
        
    });
    $( "#date" ).datepicker({
        dateFormat: "dd-mm-yy",
        altFormat: "yy-mm-dd",  
    });
  
    $("#back").on('click',function(){
        back();
    });

    function back(){
        window.location.replace(vurl);
    }

   
    function buttonToggle(idbtn){
        if(idbtn=='identitas'){
            show_identitas();
        }else if(idbtn=='detail'){
            show_detail();
        }else if(idbtn=='perolehan'){
            show_perolehan();
        }else if(idbtn=='lahan'){
            show_lahan();
        }else if(idbtn=='pemeliharaan'){
            show_pemeliharaan();
        }else if(idbtn=='prestasi'){
            show_prestasi();
        }else if(idbtn=='gambar'){
            show_gambar();
        }else if(idbtn=='fasilitas'){
            show_fasilitas();
        }else if(idbtn=='posyandu'){
            show_posyandu();
        }else if(idbtn=='pustu'){
            show_pustu();
        }
    }

    function clearInput(){
        $(".form-control").val('');
        var imagenUrl = "";
        var drEvent = $('.dropify').dropify(
        {
        defaultFile: imagenUrl
        });
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview(); 
    }

    function openMap(){  
        $('#addMap').show();
    }

    function closeMap(){  
        $('#addMap').hide();
    }

    function notif(v_status,v_message){
        if (v_status === 'success') {
            toastr.success(v_message, 'Success', {"closeButton": true});  
        } else {
            toastr.error(v_message, 'Error', {"closeButton": true});
        }
    }
       
    $(function() {     

        //Identitas faskes  
        $("#form1").validate({
            errorElement: "span",
            errorClass: 'help-block',
            highlight: function (element) {
                $(element).parent().addClass('error');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error');
            },
            submitHandler: function (form) {
                
                $(form).ajaxSubmit({ 
                    success: function (response) {
                        response = JSON.parse(response); 
                        notif(response.status,response.message);
                         
                        if(response.type === 'add'){
                            $("#id_faskes").val(response.id_faskes); //lahan
                            $("#id_faskes2").val(response.id_faskes); //detail
                            $("#id_faskes3").val(response.id_faskes); // fasilitas
                            $("#id_faskes4").val(response.id_faskes); // perolehan
                            $("#id_faskes5").val(response.id_faskes); // gambar
                            $("#id_faskes6").val(response.id_faskes); //pemeliharaan
                            $("#id_faskes7").val(response.id_faskes); //posyandu
                            $("#id_faskes8").val(response.id_faskes); //pustu
                        }
                        $("#btn_detail").attr('disabled', false);
                        $("#btn_lahan").attr('disabled', false);
                        $("#btn_perolehan").attr('disabled', false);
                        $("#btn_fasilitas").attr('disabled', false);
                        $("#btn_pemeliharaan").attr('disabled', false);
                        $("#btn_prestasi").attr('disabled', false);
                        $("#btn_gambar").attr('disabled', false);
                           
                    },
                    error: function (data) { 

                    }
                });
            }
        });

        //Perolehan faskes  
        $("#form5").validate({
            errorElement: "span",
            errorClass: 'help-block',
            highlight: function (element) {
                $(element).parent().addClass('error');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error');
            },
            submitHandler: function (form) {
                
                $(form).ajaxSubmit({ 
                success: function (response) {
                    response = JSON.parse(response);
                    notif(response.status,response.message);
                
                },
                error: function (data) { 

                }
                });
            }
        });

    //Lahan faskes  
        $("#form2").validate({
            errorElement: "span",
            errorClass: 'help-block',
            highlight: function (element) {
                $(element).parent().addClass('error');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error');
            },
            submitHandler: function (form) {
                
                $(form).ajaxSubmit({ 
                success: function (response) {
                    response = JSON.parse(response);
                    notif(response.status,response.message);                
                },
                error: function (data) { 

                }
                });
            }
        });

        //Detail faskes  
        $("#form3").validate({
        errorElement: "span",
        errorClass: 'help-block',
        highlight: function (element) {
            $(element).parent().addClass('error');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error');
        },
        submitHandler: function (form) {
            
            $(form).ajaxSubmit({ 
            success: function (response) {
                response = JSON.parse(response);
                notif(response.status,response.message);
            
            },
            error: function (data) { 

            }
            });
        }
        });

        //Prestasi faskes  
        $("#form4").validate({
            errorElement: "span",
            errorClass: 'help-block',
            highlight: function (element) {
                $(element).parent().addClass('error');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error');
            },
            submitHandler: function (form) {                
                $(form).ajaxSubmit({ 
                    success: function (response) {
                        response = JSON.parse(response);  
                        notif(response.status,response.message);
                    
                    },
                    error: function (data) { 

                    }
                });
            }
        });

        //Gambar faskes  
        $("#form6").validate({
            errorElement: "span",
            errorClass: 'help-block',
            highlight: function (element) {
                $(element).parent().addClass('error');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error');
            },
            submitHandler: function (form) {
                
                $(form).ajaxSubmit({ 
                success: function (response) {
                    response = JSON.parse(response); 
                    notif(response.status,response.message); 
                },
                error: function (data) { 

                }
                });
            }
        });

        //Pemeliharaan faskes  
        $("#form7").validate({
            errorElement: "span",
            errorClass: 'help-block',
            highlight: function (element) {
                $(element).parent().addClass('error');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error');
            },
            submitHandler: function (form) {
                
                $(form).ajaxSubmit({ 
                success: function (response) {
                    response = JSON.parse(response); 
                    notif(response.status,response.message); 
                },
                error: function (data) { 

                }
                });
            }
        });

        //Fasilitas faskes  
        $("#form8").validate({
            errorElement: "span",
            errorClass: 'help-block',
            highlight: function (element) {
                $(element).parent().addClass('error');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error');
            },
            submitHandler: function (form) {
                
                $(form).ajaxSubmit({ 
                success: function (response) {
                    response = JSON.parse(response); 
                    notif(response.status,response.message); 
                },
                error: function (data) { 

                }
                });
            }
        });

        //Posyandu
        $("#form9").validate({
            errorElement: "span",
            errorClass: 'help-block',
            highlight: function (element) {
                $(element).parent().addClass('error');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error');
            },
            submitHandler: function (form) {
                
                $(form).ajaxSubmit({ 
                success: function (response) {
                    response = JSON.parse(response); 
                    notif(response.status,response.message); 
                },
                error: function (data) { 

                }
                });
            }
        });

        //Pustu
        $("#form10").validate({
            errorElement: "span",
            errorClass: 'help-block',
            highlight: function (element) {
                $(element).parent().addClass('error');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error');
            },
            submitHandler: function (form) {
                
                $(form).ajaxSubmit({ 
                success: function (response) {
                    response = JSON.parse(response); 
                    notif(response.status,response.message); 
                },
                error: function (data) { 

                }
                });
            }
        });
    });


    function show_identitas(){
        $('#identitas').show();
        $('#detail').hide();     
        $('#prestasi').hide();     
        $('#lahan').hide();
        $('#perolehan').hide();
        $('#fasilitas').hide()
        $('#gambar').hide();
        $('#pemeliharaan').hide();
        $('#posyandu').hide();
        $('#pustu').hide();
    }
    function show_lahan(){
        $('#identitas').hide();
        $('#detail').hide();     
        $('#prestasi').hide();     
        $('#lahan').show(); 
        $('#perolehan').hide();
        $('#fasilitas').hide()
        $('#gambar').hide();
        $('#pemeliharaan').hide();
        $('#posyandu').hide();
        $('#pustu').hide();
    }
    
    function show_detail(){
        $('#identitas').hide();
        $('#detail').show();     
        $('#prestasi').hide();     
        $('#lahan').hide(); 
        $('#perolehan').hide();
        $('#fasilitas').hide()
        $('#gambar').hide();
        $('#pemeliharaan').hide();
        $('#posyandu').hide();
        $('#pustu').hide();
    }
    
    function show_prestasi(){
        $('#identitas').hide();
        $('#detail').hide();     
        $('#prestasi').show();     
        $('#lahan').hide();
        $('#perolehan').hide();
        $('#fasilitas').hide()
        $('#gambar').hide();
        $('#pemeliharaan').hide();
        $('#posyandu').hide();
        $('#pustu').hide();
    }
    function show_perolehan(){
        $('#gambar').hide();
        $('#identitas').hide();
        $('#detail').hide();     
        $('#prestasi').hide();     
        $('#lahan').hide();
        $('#perolehan').show();
        $('#pemeliharaan').hide();
        $('#posyandu').hide();
        $('#pustu').hide();
    }
    function show_gambar(){
        $('#identitas').hide();
        $('#detail').hide();     
        $('#prestasi').hide();     
        $('#lahan').hide();
        $('#perolehan').hide();
        $('#fasilitas').hide()
        $('#gambar').show();
        $('#pemeliharaan').hide();
        $('#posyandu').hide();
        $('#pustu').hide();
    }
    function show_pemeliharaan(){
        $('#identitas').hide();
        $('#detail').hide();     
        $('#prestasi').hide();     
        $('#lahan').hide();
        $('#perolehan').hide();
        $('#fasilitas').hide()
        $('#pemeliharaan').show();
        $('#posyandu').hide();
        $('#pustu').hide();
        $('#gambar').hide();
    }
    function show_fasilitas(){
        $('#identitas').hide();
        $('#detail').hide();     
        $('#prestasi').hide();     
        $('#lahan').hide();
        $('#perolehan').hide();
        $('#fasilitas').show()
        $('#pemeliharaan').hide();
        $('#posyandu').hide();
        $('#pustu').hide();
        $('#gambar').hide();
    }
    function show_posyandu(){
        $('#identitas').hide();
        $('#detail').hide();     
        $('#prestasi').hide();     
        $('#lahan').hide();
        $('#perolehan').hide();
        $('#fasilitas').hide()
        $('#pemeliharaan').hide();
        $('#posyandu').show();
        $('#pustu').hide();
        $('#gambar').hide();
    }
    function show_pustu(){
        $('#identitas').hide();
        $('#detail').hide();     
        $('#prestasi').hide();     
        $('#lahan').hide();
        $('#perolehan').hide();
        $('#fasilitas').hide()
        $('#pemeliharaan').hide();
        $('#posyandu').hide();
        $('#pustu').show();
        $('#gambar').hide();
    }

    function setDropify(){
        // $('.dropify').dropify({
        //     messages: {
        //         default: 'Drag atau drop ',
        //         replace: 'Ganti',
        //         remove:  'Hapus',
        //         error:   'error'
        //     }
        // });
        // var dropifyElements = {};
        // $('.dropify').each(function() {
        //     dropifyElements[this.id] = true;
        // });
        var drEvent = $('.dropify').dropify({
                messages: {
                    default: 'Drag atau drop ',
                    replace: 'Ganti',
                    remove:  'Hapus',
                    error:   'error'
                }
            });

        drEvent.on('dropify.beforeClear', function(event, element) {
            val_img = event.target.defaultValue; 
            val_idfas = $("#id_faskes5").val();
            console.log(val_idfas);

            $.ajax({
                type : 'post',
                url : vsite+'faskes/remove_image',
                data : {nm_img:val_img, id_fas:val_idfas},
                dataType : 'json',
                success : function(result){

                }
            });
            // if(dropifyElements[id]) {

            //     swal({   
            //         title: "Are you sure?",   
            //         text: "You will not be able undo this operation!",   
            //         type: "warning",   
            //         showCancelButton: true,   
            //         confirmButtonColor: "#DD6B55",   
            //         confirmButtonText: "Yes, delete it!",   
            //         cancelButtonText: "No, cancel please!",   
            //         closeOnConfirm: false,   
            //         closeOnCancel: false 
            //     }, isConfirm => {   
            //         if (isConfirm) {
            //             // element.value = "";
            //         } else {     
            //             swal({
            //                 title:"Cancelled",
            //                 text:"Delete Cancelled :)",
            //                 type:"error",
            //                 timer: 2000,
            //             });
            //         } 
            //     });

            //     return false;

            // }
        });
    }

    
</script>
 
<script src="<?php echo base_url();?>assets/js/huda_map.js"></script>