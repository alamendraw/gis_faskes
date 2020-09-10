var idpus = [];
$(document).ready(function () {
  cekselect_pustu();
  "use strict";
  // init list view datatable
  var dataListView = $('.data-pustu').DataTable({
    responsive: false,
    columnDefs: [{
      orderable: true,
      targets: 0,
      checkboxes: { selectRow: true },
    }],
    "dom": '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
    "oLanguage": {
      "sLengthMenu": "_MENU_",
      "sSearch": ""
    },
    "aLengthMenu": [[5, 10, 15, 20], [5, 10, 15, 20]],
    select: {
      selector: 'td:first-child',
      style: 'multi'
    },
    order: [[1, 'asc']],
    bInfo: false,
    "pageLength": 5,
    buttons: [
      {
        text: " Tambah Data",
        action: function () { 
          $(this).removeClass("btn-secondary")
          $(".add-new-data").addClass("show")
          $(".overlay-bg").addClass("show")
          $("#pustu_name,#pus_lat,#pus_lon,#pus_alamat,#pus_id").val("");
          $("#data-category, #data-status").prop('selectedIndex', 0); //Combobox
          $("#pus_type").val("insert");
          $("#pustu_foto1").html( '<input type="file" name="pus_foto0" id="pus_foto0" class="dropify" data-height="150" data-show-remove="true"></input>' );
          $("#pustu_foto2").html( '<input type="file" name="pus_foto1" id="pus_foto1" class="dropify" data-height="150" data-show-remove="true"></input>' );
          $("#pustu_foto3").html( '<input type="file" name="pus_foto2" id="pus_foto2" class="dropify" data-height="150" data-show-remove="true"></input>' );
          $("#pustu_foto4").html( '<input type="file" name="pus_foto3" id="pus_foto3" class="dropify" data-height="150" data-show-remove="true"></input>' );
          setDropify();
        },
        className: "btn-outline-primary",
      }
    ],
    initComplete: function (settings, json) {
      $(".dt-buttons .btn").removeClass("btn-secondary");
    },
  });

  // init thumb view datatable
  var dataThumbView = $(".data_pustu").DataTable({
    responsive: false,
    columnDefs: [{
      orderable: true,
      targets: 0,
      checkboxes: { selectRow: true },
    }],
    "dom": '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
    "oLanguage": {
      "sLengthMenu": "_MENU_",
      "sSearch": ""
    },
    "aLengthMenu": [[5, 10, 15, 20], [5, 10, 15, 20]],
    select: {
      selector: 'td:first-child',
      style: 'multi'
    },
    order: [[1, 'asc']],
    bInfo: false,
    "pageLength": 5,
    buttons: [
      {
        text: " Tambah Data",
        action: function () {
         
          $(this).removeClass("btn-secondary");
          $(".add-new-data").addClass("show");
          $(".overlay-bg").addClass("show"); 
          $("#pustu_name,#pus_lat,#pus_lon,#pus_alamat,#pus_id").val("");
          $("#pus_type").val("insert");
          $("#pustu_foto1").html( '<input type="file" name="pus_foto0" id="pus_foto0" class="dropify" data-height="150" data-show-remove="true"></input>' );
          $("#pustu_foto2").html( '<input type="file" name="pus_foto1" id="pus_foto1" class="dropify" data-height="150" data-show-remove="true"></input>' );
          $("#pustu_foto3").html( '<input type="file" name="pus_foto2" id="pus_foto2" class="dropify" data-height="150" data-show-remove="true"></input>' );
          $("#pustu_foto4").html( '<input type="file" name="pus_foto3" id="pus_foto3" class="dropify" data-height="150" data-show-remove="true"></input>' );
          setDropify();
        },
        className: "btn-outline-primary",
      }
    ],
    initComplete: function (settings, json) {
      $(".dt-buttons .btn").removeClass("btn-secondary");
    },

  })

  // To append actions dropdown before Tambah Data button
  var actionDropdown = $(".actions-dropodown")
  actionDropdown.insertBefore($(".top .actions .dt-buttons"))
 
  $(".data-pustu, .data-pustu-view").on("click", "tbody td", function () { 
    $(this).closest("tr").toggleClass("selected");
    var trid = $(this).closest('tr').attr('id');
    var ck = idpus.indexOf(trid);
    if(ck<0){
      idpus.push(trid);
    }else{
      idpus = jQuery.grep(idpus, function(value) {
        return value != trid;
      });
    }
    cekselect_pustu();
    $("#pus_id").val(trid); 
    $("#pus_type").val("update");  
  });

  // Double Click Listdata
  $(".data-pustu, .data-pustu-view").on("dblclick", "tbody td", function () { 
    $(this).closest("tr").toggleClass("selected");
    var trid = $(this).closest('tr').attr('id');
    var ck = idpus.indexOf(trid);
    if(ck<0){
      idpus.push(trid);
    }else{
      idpus = jQuery.grep(idpus, function(value) {
        return value != trid;
      });
    }
    cekselect_pustu();
    var idfas = $("#id_faskes8").val();
    $.ajax({
      type : 'get',
      url : vsite+'/faskes/get_detpus?id='+trid+'&id_faskes='+idfas,
      dataType : 'json',
      success : function(retu){
        $('#pustu_name').val(retu.nm_pustu);
        $('#pus_lat').val(retu.lat);
        $('#pus_lon').val(retu.lon);
        $('#pus_alamat').val(retu.alamat);  
        
        if(retu.foto_1 !== null){
          $("#pustu_foto1").html('<input type="file" name="pus_foto0" id="pus_foto0" data-height="150" data-show-remove="true"></input>' ); 
          $('#pus_foto0').dropify({ defaultFile: vbase+"uploads/"+retu.foto_1 });  
        }else{
          $("#pustu_foto1").html('<input type="file" name="pus_foto0" id="pus_foto0" class="dropify" data-height="150" data-show-remove="true"></input>' ); 
        }
        
        if(retu.foto_2 !== null){
          $("#pustu_foto2").html('<input type="file" name="pus_foto1" id="pus_foto1" data-height="150" data-show-remove="true"></input>' ); 
          $('#pus_foto1').dropify({ defaultFile: vbase+"uploads/"+retu.foto_2 });  
        }else{
          $("#pustu_foto2").html('<input type="file" name="pus_foto1" id="pus_foto1" class="dropify" data-height="150" data-show-remove="true"></input>' ); 
        }
        
        if(retu.foto_3 !== null){
          $("#pustu_foto3").html('<input type="file" name="pus_foto2" id="pus_foto2" data-height="150" data-show-remove="true"></input>' ); 
          $('#pus_foto2').dropify({ defaultFile: vbase+"uploads/"+retu.foto_3 }); 
        }else{
          $("#pustu_foto3").html('<input type="file" name="pus_foto2" id="pus_foto2" class="dropify" data-height="150" data-show-remove="true"></input>' ); 
        }

        if(retu.foto_4 !== null){
          $("#pustu_foto4").html('<input type="file" name="pus_foto3" id="pus_foto3" data-height="150" data-show-remove="true"></input>' ); 
          $('#pus_foto3').dropify({ defaultFile: vbase+"uploads/"+retu.foto_4 });  
        }else{
          $("#pustu_foto4").html('<input type="file" name="pus_foto3" id="pus_foto3" class="dropify" data-height="150" data-show-remove="true"></input>' ); 
        }
        
        setDropify();
        
      }
    });
    $("#pus_id").val(trid); 
    $("#pus_type").val("update"); 
    $(".add-new-data").addClass("show")
    $(".overlay-bg").addClass("show")
  });

  $(".dt-checkboxes").on("click", function () {
    $(this).closest("tr").toggleClass("selected");
  })
  $(".dt-checkboxes-select-all input").on("click", function () {
    $(".data-pustu").find("tbody tr").toggleClass("selected")
    $(".data-pustu-view").find("tbody tr").toggleClass("selected")
  })
  // Scrollbar
  if ($(".data-items-pus").length > 0) {
    new PerfectScrollbar(".data-items-pus", { wheelPropagation: false });
  }

  // Close sidebar
  $(".hide-data-sidebar, .cancel-data-btn").on("click", function () {
    $(".add-new-data").removeClass("show");
    $(".overlay-bg").removeClass("show");
    $("#data-name, #data-price").val("");
    $("#data-category, #data-status").prop('selectedIndex', 0);
  })

 
  // mac chrome checkbox fix
  if (navigator.userAgent.indexOf('Mac OS X') != -1) {
    $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox");
  }

  $("#del_pus").on('click', function(){
    get_selected_pus();
  });

});



function cekselect_pustu(){
  if(idpus.length>0){
    $("#del_pus").attr("disabled",false);
  }else{
    $("#del_pus").attr("disabled",true);
  }
}

function get_selected_pus(){
  var idfas = $("#id_faskes8").val();
  Swal.fire({
    title: 'Peringatan?',
    text: "Data yang dipilih akan di hapus?",
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
            url: vsite+'/faskes/delete_pustu',
            data : ({id:idpus, id_faskes:idfas}),
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