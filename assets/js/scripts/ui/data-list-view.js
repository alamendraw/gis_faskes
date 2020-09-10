var idpos = [];
$(document).ready(function () {
  cekselect();
  "use strict";
  // init list view datatable
  var dataListView = $('.data-list-view').DataTable({
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
    "aLengthMenu": [[4, 10, 15, 20], [4, 10, 15, 20]],
    select: {
      selector: 'td:first-child',
      style: 'multi'
    },
    order: [[1, 'asc']],
    bInfo: false,
    "pageLength": 4,
    buttons: [
      {
        text: "<i class='feather icon-plus'></i> Tambah Data",
        action: function () {
          $(this).removeClass("btn-secondary")
          $(".add-new-data").addClass("show")
          $(".overlay-bg").addClass("show")
          $("#posyandu_name,#pos_lat,#pos_lon,#pos_alamat,#pos_id").val("");
          $("#data-category, #data-status").prop('selectedIndex', 0); //Combobox
          
        },
        className: "btn-outline-primary",
      }
    ],
    initComplete: function (settings, json) {
      $(".dt-buttons .btn").removeClass("btn-secondary");
    },
  });

  // init thumb view datatable
  var dataThumbView = $(".data-thumb-view").DataTable({
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
    "aLengthMenu": [[4, 10, 15, 20], [4, 10, 15, 20]],
    select: {
      selector: 'td:first-child',
      style: 'multi'
    },
    order: [[1, 'asc']],
    bInfo: false,
    "pageLength": 4,
    buttons: [
      {
        text: "<i class='feather icon-plus'></i> Tambah Data",
        action: function () {
          $(this).removeClass("btn-secondary");
          $(".add-new-data").addClass("show");
          $(".overlay-bg").addClass("show"); 
          $("#posyandu_name,#pos_lat,#pos_lon,#pos_alamat,#pos_id").val("");
          $("#pos_type").val("insert");
          $("#foto1").html( '<input type="file" name="pos_foto0" id="pos_foto0" class="dropify" data-height="150" data-show-remove="true"></input>' );
          $("#foto2").html( '<input type="file" name="pos_foto1" id="pos_foto1" class="dropify" data-height="150" data-show-remove="true"></input>' );
          $("#foto3").html( '<input type="file" name="pos_foto2" id="pos_foto2" class="dropify" data-height="150" data-show-remove="true"></input>' );
          $("#foto4").html( '<input type="file" name="pos_foto3" id="pos_foto3" class="dropify" data-height="150" data-show-remove="true"></input>' );
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
 
  $(".data-list-view, .data-thumb-view").on("click", "tbody td", function () { 
    $(this).closest("tr").toggleClass("selected");
    var trid = $(this).closest('tr').attr('id');
    var ck = idpos.indexOf(trid);
    if(ck<0){
      idpos.push(trid);
    }else{
      idpos = jQuery.grep(idpos, function(value) {
        return value != trid;
      });
    }
    cekselect();
    $("#pos_id").val(trid); 
    $("#pos_type").val("update");  
  });

  // Double Click Listdata
  $(".data-list-view, .data-thumb-view").on("dblclick", "tbody td", function () { 
    $(this).closest("tr").toggleClass("selected");
    var trid = $(this).closest('tr').attr('id');
    var ck = idpos.indexOf(trid);
    if(ck<0){
      idpos.push(trid);
    }else{
      idpos = jQuery.grep(idpos, function(value) {
        return value != trid;
      });
    }
    cekselect();
    var idfas = $("#id_faskes7").val();
    $.ajax({
      type : 'get',
      url : vsite+'/faskes/get_detpos?id='+trid+'&id_faskes='+idfas,
      dataType : 'json',
      success : function(retu){
        $('#posyandu_name').val(retu.nm_posyandu);
        $('#pos_lat').val(retu.lat);
        $('#pos_lon').val(retu.lon);
        $('#pos_alamat').val(retu.alamat);  
        
        if(retu.foto_1 !== null){
          $("#foto1").html('<input type="file" name="pos_foto0" id="pos_foto0" data-height="150" data-show-remove="true"></input>' ); 
          $('#pos_foto0').dropify({ defaultFile: vbase+"uploads/"+retu.foto_1 });  
        }else{
          $("#foto1").html('<input type="file" name="pos_foto0" id="pos_foto0" class="dropify" data-height="150" data-show-remove="true"></input>' ); 
        }
        
        if(retu.foto_2 !== null){
          $("#foto2").html('<input type="file" name="pos_foto1" id="pos_foto1" data-height="150" data-show-remove="true"></input>' ); 
          $('#pos_foto1').dropify({ defaultFile: vbase+"uploads/"+retu.foto_2 });  
        }else{
          $("#foto2").html('<input type="file" name="pos_foto1" id="pos_foto1" class="dropify" data-height="150" data-show-remove="true"></input>' ); 
        }
        
        if(retu.foto_3 !== null){
          $("#foto3").html('<input type="file" name="pos_foto2" id="pos_foto2" data-height="150" data-show-remove="true"></input>' ); 
          $('#pos_foto2').dropify({ defaultFile: vbase+"uploads/"+retu.foto_3 }); 
        }else{
          $("#foto3").html('<input type="file" name="pos_foto2" id="pos_foto2" class="dropify" data-height="150" data-show-remove="true"></input>' ); 
        }

        if(retu.foto_4 !== null){
          $("#foto4").html('<input type="file" name="pos_foto3" id="pos_foto3" data-height="150" data-show-remove="true"></input>' ); 
          $('#pos_foto3').dropify({ defaultFile: vbase+"uploads/"+retu.foto_4 });  
        }else{
          $("#foto4").html('<input type="file" name="pos_foto3" id="pos_foto3" class="dropify" data-height="150" data-show-remove="true"></input>' ); 
        }
        
        setDropify();
        
      }
    });
    $("#pos_id").val(trid); 
    $("#pos_type").val("update"); 
    $(".add-new-data").addClass("show")
    $(".overlay-bg").addClass("show")
  });

  $(".dt-checkboxes").on("click", function () {
    $(this).closest("tr").toggleClass("selected");
  })
  $(".dt-checkboxes-select-all input").on("click", function () {
    $(".data-list-view").find("tbody tr").toggleClass("selected")
    $(".data-thumb-view").find("tbody tr").toggleClass("selected")
  })
  // Scrollbar
  if ($(".data-items").length > 0) {
    new PerfectScrollbar(".data-items", { wheelPropagation: false });
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

  $("#del_pos").on('click', function(){
    get_selected();
  });
});

function setDropify(){
  $('.dropify').dropify({
      messages: {
          default: 'Drag atau drop ',
          replace: 'Ganti',
          remove:  'Hapus',
          error:   'error'
      }
  });
}

function cekselect(){
  if(idpos.length>0){
    $("#del_pos").attr("disabled",false);
  }else{
    $("#del_pos").attr("disabled",true);
  }
}

function get_selected(){
  var idfas = $("#id_faskes7").val();
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
            url: vsite+'/faskes/delete_posyandu',
            data : ({id:idpos, id_faskes:idfas}),
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