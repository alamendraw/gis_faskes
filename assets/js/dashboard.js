var markersPopup = [];  
var marker = [];
var xtype = []; 
var valGis = []; 
var valNotGis = []; 
var valStat = [];
var valTipe = [];
var marker_data = '';
var val_marker = '';
var image_marker = 'smp_merah'; 
var valRadio = 'kondisi';
var val_img = '';
var ch_baik = false;
var ch_rusak_ringan = false;
var ch_rusak_sedang = false;
var ch_rusak_berat = false;
var ch_less_3 = false;
var ch_between45 = false;
var ch_more5 = false;
var file_geojson=''; 
var val_zoom = module.zoom; 
$(document).ready(function() { 
	radioMap('kondisi');
	dataCheck(1); 
	file_geojson = module.base+'assets/geojson/'+module.geojson; 
	 var layerGeo = new L.GeoJSON.AJAX([file_geojson],{onEachFeature:popUp,style: myStyle,pointToLayer: featureToMarker }).addTo(mymap);
	
	$('.komp').hide();
	$('.detailku').hide();
	$('.float').hide();
	$('#kecamatan').select2();
	$('#faskes').select2({
		placeholder: "Cari Nama Faskes",
	});
	$("#kecamatan").on('change', function(){
		dataCheck(1); 
	}); 
	$("#faskes").on('change', function(){
		dataCheck(0); 
	}); 
	
	$("#reloadmap").on('click', function(){
		dataCheck(1);
	});

});
 
		
//Layer Control
var mymap = L.map('mapid', {
	center: [module.lat,module.lon],
	zoom: val_zoom,
	layers: LayerKita
});
  
	var hybrid 		= L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
						maxZoom: 20,
						subdomains:['mt0','mt1','mt2','mt3']
					}),
		googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
						maxZoom: 20,
						subdomains:['mt0','mt1','mt2','mt3']
					}),
		LayerKita 	= L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
						attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>  Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
						maxZoom: 20,
						id: 'mapbox.streets',
						accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
					});

	var baseLayers = {
		" &nbsp;Default": LayerKita, 
		" &nbsp;Satelit": googleSat, 
		" &nbsp;Hybrid": hybrid
	};

	L.control.layers(baseLayers).addTo(mymap);
	mymap.addLayer(LayerKita);

//Ruler
	var options = {
			position: 'topleft',
			lengthUnit: {
				display: 'km',              // This is the display value will be shown on the screen. Example: 'meters'
				decimal: 2,                 // Distance result will be fixed to this value. 
				factor: null,               // This value will be used to convert from kilometers. Example: 1000 (from kilometers to meters)  
				label: 'Jarak:' 
			},
			angleUnit: {
				display: '&deg;',           // This is the display value will be shown on the screen. Example: 'Gradian'
				decimal: 2,                 // Bearing result will be fixed to this value.
				factor: null,                 
				label: 'Derajat:'
			}
	};
// L.control.ruler(options).addTo(mymap); //
//End Ruler

	function removeMarker(r_kon){
		$.ajax({
			type :'get',
			url : module.url+"/remove_marker_data",
			data : {kondisi:r_kon},
			dataType : 'json',
			success  : function(response){ 
				if (response) { 
					response.forEach(function (data_mark) {     
						if(marker[data_mark['id']]){
							xtype[data_mark['id']] = 2;  
							mymap.removeLayer(marker[data_mark['id']]);     
						}  
					});           
				} 					 
			} 
		}); 
	}

	function checkStatus(statid){		
		if ($('#'+statid).is(":checked")) {
			valStat.push(statid);
		}
		
		if ($('#'+statid).is(":not(:checked)")) {
			valStat = jQuery.grep(valStat, function(value) {
				return value != statid;
			});
		} 
		  
		dataCheck(0);
	}

	function checkTipe(tipid){	
		if(tipid == 'rawat'){
			tipeid = '1';
		}else{
			tipeid = '2';
		}
		if ($('#'+tipid).is(":checked")) {
			valTipe.push(tipeid);
		}
		
		if ($('#'+tipid).is(":not(:checked)")) {
			valTipe = jQuery.grep(valTipe, function(value) {
				return value != tipeid;
			});
		} 
		  
		dataCheck(0);
	}

	function dataCheck(c_id){ 
		v_kecamtan = $("#kecamatan").val();
		v_faskes = $("#faskes").val();
		if(c_id !==0){
			if ($('#baik').is(":checked")) { ch_baik = true; 			}else{ ch_baik = false; removeMarker('B');}
			if ($('#rusak_ringan').is(":checked")) { ch_rusak_ringan = true; 	}else{ ch_rusak_ringan = false; removeMarker('RR')}
			if ($('#rusak_sedang').is(":checked")) { ch_rusak_sedang = true; 	}else{ ch_rusak_sedang = false; removeMarker('RS')}
			if ($('#rusak_berat').is(":checked")) { ch_rusak_berat = true; 	}else{ ch_rusak_berat = false; removeMarker('RB')}
			if ($('#less_3').is(":checked")) { ch_less_3 = true; 			}else{ ch_less_3 = false; }
			if ($('#between45').is(":checked")) { ch_between45 = true; 		}else{ ch_between45 = false; }
			if ($('#more5').is(":checked")) { ch_more5 = true; 			}else{ ch_more5 = false; }
			v_faskes ='';
		}else{
			removeMarker('B');
			removeMarker('RR');
			removeMarker('RS');
			removeMarker('RB');
		}
		
		var totalData = 0;
		$.ajax({
			type :'get',
			url : module.url+"/get_marker_data",
			data : {jenis:valRadio,kec:v_kecamtan,nama:v_faskes,ch_baik:ch_baik,ch_rusak_ringan:ch_rusak_ringan,ch_rusak_sedang:ch_rusak_sedang,ch_rusak_berat:ch_rusak_berat,ch_less_3:ch_less_3,ch_between45:ch_between45,ch_more5:ch_more5,status:valStat,tipe:valTipe},
			dataType : 'json',
			success  : function(response){   
				val_marker = response;
				if (response) { 
					response.forEach(function (res_mark) {  
						marker_data = res_mark;
						res_sel = marker_data['selisih'];
						if(valRadio=='kondisi'){
							setMarker(marker_data);
							totalData++;
						}
						
						if(valRadio=='tahun' && ch_less_3==true && res_sel <= 3){
							setMarker(marker_data);
							totalData++;
						}else if(valRadio=='tahun' && ch_between45==true && res_sel > 3 && res_sel <=5){
							setMarker(marker_data);
							totalData++;
						}else if(valRadio=='tahun' && ch_more5==true && res_sel > 5){
							setMarker(marker_data);
							totalData++;
						}else if(valRadio=='tahun' && ch_more5==false && ch_between45==false && ch_less_3==false){
							setMarker(marker_data);
							totalData++;
						}
					});
					$("#total_data").html('Jumlah Data : '+totalData+'  Faskes');
				} 					 
			} 
		}); 
	}
 

	function setMarker(marker_data){  

		if(valRadio=='tahun'){
			if(marker_data['selisih']<=3){
				image_marker = 'faskes_hijau'; 
			}else if(marker_data['selisih']>3 && marker_data['selisih']<=5){
				image_marker = 'faskes_orange'; 
			}else{
				image_marker = 'faskes_merah'; 
			}
		}else{
			if(marker_data['kondisi']=='B'){
				image_marker = 'faskes_hijau'; 
			}else if(marker_data['kondisi']=='RR'){
				image_marker = 'faskes_biru'; 
			}else if(marker_data['kondisi']=='RS'){
				image_marker = 'faskes_orange'; 
			}else{
				image_marker = 'faskes_merah'; 
			}
		}
		
		if(marker_data['foto1']){	 
			val_img = "<img style='width:250px; height:130px;' src='"+module.base+"uploads/"+marker_data['foto1']+"' class='img-rounded' alt=''>"; 
		}else{
			val_img = "";
		}
		 
		bind = "<div style='width:320px;'>"+
				"<table border='0' width='100%'>"+
					"<tr>"+
						"<td class='tdPop' valign='top' colspan='4' style='border-bottom:solid 1px #c1c1c1'>"+marker_data['nm_faskes']+"</td>"+
					"</tr>"+
					"<tr>"+
						"<td colspan='2'>&nbsp;</td>"+
					"</tr>"+ 
					"<tr>"+
						"<td class='tdPop' valign='top'>Alamat <span style='float:right;'>:</span></td>"+
						"<td class='tdPop' valign='top'>"+marker_data['alamat']+"</td>"+  
					"</tr>"+
					"<tr>"+
						"<td class='tdPop' valign='top'>Latitude <span style='float:right;'>:</span></td>"+
						"<td class='tdPop' valign='top'>"+marker_data['lat']+"</td>"+  
					"</tr>"+
					"<tr>"+
						"<td class='tdPop' valign='top'>Longitude <span style='float:right;'>:</span></td>"+
						"<td class='tdPop' valign='top'>"+marker_data['lon']+"</td>"+  
					"</tr>"+
					"<tr>"+
						"<td class='tdPop' valign='top'>Kondisi <span style='float:right;'>:</span></td>"+
						"<td class='tdPop' valign='top'>"+marker_data['kondisi']+"</td>"+  
					"</tr>"+ 
					"<tr>"+
						"<td class='tdPop' valign='top'>Pemeliharaan Terakhir <span style='float:right;'>:</span></td>"+
						"<td class='tdPop' valign='top'>"+marker_data['akhir_pelihara']+"</td>"+  
					"</tr>"+ 
					"<tr>"+ 
						"<td class='tdPop' valign='top' align='center' colspan='2'>"+val_img+"</td>"+  
					"</tr>"+
					 
					"<tr>"+
						"<td colspan='4' style='border-bottom:solid 1px #c1c1c1'>&nbsp;</td>"+
					"</tr>"+
					"<tr>"+ 
						"<td class='tdPop' valign='top' align='center' colspan='2'><button type='button' onClick='detail("+marker_data['id']+")' class='btn btn-sm btn-outline-primary'>Selengkapnya</button></td>"+  
					"</tr>"+
					  
				"</table>"+
				"</div>";

	 
		// 		console.log(val_zoom);
		// switch(val_zoom) {
		// 	case 12:
		// 	case 13:
		// 	case 14:
		// 		val_size = [20,25];  
		// 	break;
		// 	case 15:
		// 	case 16:
		// 	case 17: 
		// 		val_size = [30,35];
		// 	break;
		// 	case 18:
		// 	case 19:
		// 	case 20: 
		// 		val_size = [40,45];
		// 	break;
		// 	default:
		// 		val_size = [10,15];
		//   }
		val_size = [20,25];
		var greenIcon = L.icon({
			iconUrl: 'assets/image/'+image_marker+'.png', 
			iconSize:     val_size, // size of the icon  
		});
					
		if(marker[marker_data['id']] && xtype[marker_data['id']]!==2 ){
			 
			var resizeIcon = L.icon({
				iconUrl: 'assets/image/'+image_marker+'.png', 
				iconSize:     val_size, // size of the icon  
			});
			marker[marker_data['id']].setIcon(resizeIcon);
		}else{			
			xtype[marker_data['id']] = 1;
			marker[marker_data['id']] = L.marker([marker_data['lat'], marker_data['lon']], {icon: greenIcon})
			// .on('click', markerOnClick)
			.bindPopup(bind,{maxWidth:900})
			.addTo(mymap);
			
		}
			
	}

	function selesai(){
		window.close();
	}

	function detail(mid){
		$(".trdata").hide();
		$("#bandKondisi").hide();
		$(".pilihMarker").hide();
		$.ajax({
			type :'get',
			url : module.url+"/detail_data",
			data : {id:mid},
			dataType : 'json',
			success  : function(data){ 
				 
				
				$("#det_npsn").html(data['npsn']);
				$("#det_nm_faskes").html(data['nm_faskes']);
				$("#det_kondisi").html(data['kondisi']);
				$("#det_tahun").html(data['tahun']);
				$("#det_status_faskes").html(data['status_faskes']);
				$("#det_sk_pendirian").html(data['sk_pendirian']);
				$("#det_sk_ijin_operasional").html(data['sk_ijin_operasional']);
				$("#det_akreditasi").html(data['akreditasi']);
				$("#det_sertifikasi_iso").html(data['sertifikasi_iso']);
				$("#det_alamat").html(data['alamat']);
				$("#det_kelurahan").html(data['kelurahan']);
				$("#det_kecamatan").html(data['kecamatan']);
				$("#det_kode_pos").html(data['kode_pos']);
				$("#det_telepon").html(data['telepon']);
				$("#det_website").html(data['website']);
				$("#det_email").html(data['email']);
				$("#det_npwp").html(data['npwp']); 
				$("#det_kepsek").html(data['kepsek']);
				$("#det_jumlah_ruang").html(data['jumlah_ruang']);
				$("#det_jumlah_siswa").html(data['jumlah_siswa']);
				$("#det_sumber_listrik").html(data['sumber_listrik']);
				$("#det_daya_listrik").html(data['daya_listrik']);
				$("#det_sumber_air").html(data['sumber_air']);
				$("#det_internet").html(data['internet']);
				$("#det_bandwidth").html(data['bandwidth']);
				$("#det_program_inklusi").html(data['program_inklusi']);
				$("#det_program_cbi").html(data['program_cbi']);
				$("#det_konstruksi").html(data['konstruksi']);
				$("#det_laboratorium").html(data['laboratorium']);
				$("#det_sanitasi").html(data['sanitasi']);
				$("#det_bukti_kepemilikan").html(data['bukti_kepemilikan']);
				$("#det_masa_bangunan").html(data['masa_bangunan']);
				$("#det_tingkat").html(data['tingkat']);
				$("#det_jumlah_lantai").html(data['jumlah_lantai']); 
				$("#det_luas_lahan").html(data['luas_lahan']);
				$("#det_luas_bangunan").html(data['luas_bangunan']);
				$("#det_luas_halaman").html(data['luas_halaman']);
				$("#det_luas_lapangan").html(data['luas_lapangan']);
				$("#det_sudah_pagar").html(data['sudah_pagar']);
				$("#det_belum_pagar").html(data['belum_pagar']);
				$("#det_luas_lahan_kosong").html(data['luas_lahan_kosong']); 

				$("#det_kode_barang").html(data['kode_barang']); 
				$("#det_no_dokumen").html(data['no_dokumen']); 
				$("#det_tahun_pengadaan").html(data['tahun_pengadaan']); 
				$("#det_nilai_perolehan").html(data['nilai_perolehan']); 
				$("#det_sumber_dana").html(data['sumber_dana']); 
 

// Gambar Galery	
				if(data['gambar'].length>=1){
					for (let i = 0; i < data['gambar'].length; i++) {
						vgbr = "<div class='brick' ><a href='"+module.base+"uploads/"+data['gambar'][i]['nama_gambar']+"' class='js-img-viwer' data-caption='"+data['gambar'][i]['nama_gambar']+"'>"+
									"<img src='"+module.base+"uploads/"+data['gambar'][i]['nama_gambar']+"' style='width:200px;height:200px;'/>"+
								"</a></div>";
						$("#gambar"+i).html(vgbr);
					}
				}else{ 
						$("#imageNotFound").html("<b>Gambar Tidak Ditemukan</b>");
				}			
				new SmartPhoto(".js-img-viwer"); 

// Gambar 360	
				if(data['image_360'].length>=1){
					viewer.setPanorama('uploads/'+data['image_360'][0]['nama_gambar']);
				}else{
					viewer.setPanorama('uploads/image_not_found.jpg');
				}

// Video
				if(data['video'].length>=1){
					$("#videoPlay").html(
						"<video width='400' controls>"+
							"<source src='uploads/"+data['video'][0]['nama_gambar']+"' type='video/mp4'>  "+
						"</video>"
					);
				}else{
					$("#videoPlay").html("<h4>Video Tidak Ditemukan</h4>");
				}
				
				totalPelihara =[0];
				no =0;

				if(data['pemeliharaan'].length>=1){
					for (let i = 0; i < data['pemeliharaan'].length; i++) {
						totalPelihara.push(parseInt(data['pemeliharaan'][i]['nilai']));
						no++;
						htb = "<tr class='trdata'>"+
									"<td align='center'>"+no+"</td>"+
									"<td align='center'>"+data['pemeliharaan'][i]['tahun']+"</td>"+
									"<td align='right' style='padding-right:5px;'>"+formatnumber(data['pemeliharaan'][i]['nilai'])+"</td>"+
								"</tr>";
								
					$("#tbl_pelihara").append(htb);
					}
					// console.log(totalPelihara);
					htb = "<tr class='trdata'>"+
									"<td align='center' colspan='2'><b>Total</b></td>"+
									"<td align='right' style='padding-right:5px;'><b>"+formatnumber(totalPelihara.reduce(totalsum))+".00</b></td>"+
								"</tr>";
					$("#tbl_pelihara").append(htb);
				}else{
					htb = "<tr class='trdata'>"+
								"<td align='center' colspan='3'>Data Pemeliharaan tidak di temukan</td>"+ 
							"</tr>";
					$("#tbl_pelihara").append(htb);
				}
				 

				$(".float").show();
				$(".detailku").show();
				$(".mapku").hide();				
			}
		});
	}
 
	function totalsum(total, num) {
		return total + num;
	}

	function formatnumber(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}

	function showMap(){ 
		$("#bandKondisi").show();
		$(".pilihMarker").show();
		$(".detailku").hide();
		$(".float").hide();
		$(".mapku").show();
	}

	function btnToggle(id){   
		// removeMarker();
		// tambahMarker(id);
	}

	function radioMap(idVal){
		valRadio = idVal;
		if(idVal=='kondisi'){
			html_band = "<li class='list-group-item'>"+
							"<div class='custom-control custom-checkbox'>"+
								"<input type='checkbox' class='custom-control-input' name='data[]' value='baik' id='baik' onChange='dataCheck(1)'>"+
								"<label class='custom-control-label' for='baik'> &nbsp;Baik</label>"+
							"</div> "+
						"</li>"+
						"<li class='list-group-item'>"+
							"<div class='custom-control custom-checkbox'>"+
								"<input type='checkbox' class='custom-control-input' name='data[]' value='rusak_ringan' id='rusak_ringan' onChange='dataCheck(1)'>"+
								"<label class='custom-control-label' for='rusak_ringan'> &nbsp;Rusak Ringan</label>"+
							"</div> "+
						"</li>"+
						"<li class='list-group-item'>"+
							"<div class='custom-control custom-checkbox'>"+
								"<input type='checkbox' class='custom-control-input' name='data[]' value='rusak_sedang' id='rusak_sedang' onChange='dataCheck(1)'>"+
								"<label class='custom-control-label' for='rusak_sedang'> &nbsp;Rusak Sedang</label>"+
							"</div> "+
						"</li>"+
						"<li class='list-group-item'>"+
							"<div class='custom-control custom-checkbox'>"+
								"<input type='checkbox' class='custom-control-input' name='data[]' value='rusak_berat' id='rusak_berat' onChange='dataCheck(1)'>"+
								"<label class='custom-control-label' for='rusak_berat'> &nbsp;Rusak Berat</label>"+
							"</div> "+
						"</li>";
			
		}else{
			html_band = "<li class='list-group-item'>"+
							"<div class='custom-control custom-checkbox'>"+
								"<input type='checkbox' class='custom-control-input' name='data[]' value='less_3' id='less_3' onChange='dataCheck(1)'>"+
								"<label class='custom-control-label' for='less_3'> &nbsp;Kurang dari 3 tahun</label>"+
							"</div> "+
						"</li>"+
						"<li class='list-group-item'>"+
							"<div class='custom-control custom-checkbox'>"+
								"<input type='checkbox' class='custom-control-input' name='data[]' value='between45' id='between45' onChange='dataCheck(1)'>"+
								"<label class='custom-control-label' for='between45'> &nbsp;4 - 5 Tahun</label>"+
							"</div> "+
						"</li>"+
						"<li class='list-group-item'>"+
							"<div class='custom-control custom-checkbox'>"+
								"<input type='checkbox' class='custom-control-input' name='data[]' value='more5' id='more5' onChange='dataCheck(1)'>"+
								"<label class='custom-control-label' for='more5'> &nbsp;Lebih dari 5 tahun</label>"+
							"</div> "+
						"</li>" ;
		}
		$("#bandKondisi").html(html_band);
		dataCheck(1);
	}
 

	function btnImage(idImg){  
		$.ajax({
			type :'get',
			url : module.url+"/image_get?id="+idImg,
			dataType : 'json',
			success  : function(data){ 
					
				
				if(data[0]['foto1']){
					v_img1 = "<img style='width:550px; height:330px;' src='"+data[0]['foto1']+"' class='img-rounded' alt=''>";
				}else{
					v_img1 = "<img style='width:550px; height:330px;' src='"+module.base+"uploads/"+data[0]['nm_faskes']+"1.jpg' class='img-rounded' alt=''>";
				}
					
				if(data[0]['foto2']){
					v_img2 = "<img style='width:550px; height:330px;' src='"+data[0]['foto2']+"' class='img-rounded' alt=''>";
				} else{
					v_img2 = "<img style='width:550px; height:330px;' src='"+module.base+"uploads/"+data[0]['nm_faskes']+"2.jpg' class='img-rounded' alt=''>";
				}
				
				if(data[0]['foto3']){
					v_img3 = "<img style='width:550px; height:330px;' src='"+data[0]['foto3']+"' class='img-rounded' alt=''>";
				}else{
					v_img3 = "<img style='width:550px; height:330px;' src='"+module.base+"uploads/"+data[0]['nm_faskes']+"3.jpg' class='img-rounded' alt=''>";
				}
					
				$("#mod_gambar1").html(v_img1);
				$("#mod_gambar2").html(v_img2);
				$("#mod_gambar3").html(v_img3); 
				$("#mod_header").html(data[0]['nm_faskes']);
				$('#ModalImage').modal('show');
			}
		});
	}

	function btn360(id360){  

		$('#Modal360').modal('show');
		val_img = 'assets/image/sphere.jpg';
		var viewer = $("#viewer").html('');
		viewer = new PhotoSphereViewer.Viewer({
			container: document.querySelector('#viewer'),
			panorama: val_img, 
		});
			
	}
 
	function popUp(f,l){
		var out = [];
		if (f.properties){
			html = "<table>"+
						"<tr><td>Kota</td><td>: "+f.properties['WADMKK']+"</td></tr>"+
						"<tr><td>Kecamatan</td><td>: "+f.properties['NAMOBJ']+"</td></tr>"+
						"<tr><td>Provinsi</td><td>: "+f.properties['WADMPR']+"</td></tr>"+
					"</table>";

			out.push(html);   
			l.bindPopup(out.join("<br />"));
		}
	}

	// legend

	function iconByName(name) {
		return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
	}

	function featureToMarker(feature, latlng) {
		return L.marker(latlng, {
			icon: L.divIcon({
				className: 'marker-'+feature.properties.amenity,
				html: iconByName(feature.properties.amenity),
				iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
			})
		});
	}

	var baseLayers = [
		{
			name: " OpenStreetMap",
			layer: LayerKita
		},
		{	
			name: " Hybrid",
			layer: L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',)
		},
		{
			name: " Outdoors",
			layer: L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
						maxZoom: 20,
						subdomains:['mt0','mt1','mt2','mt3']
					})
		}
	];

	
// FUNGSI JIKA ZOOM 
	mymap.on('zoomend', function() {  
		val_zoom = mymap.getZoom();   
		if(val_zoom == 12 || val_zoom == 15 || val_zoom == 18){ 
			// dataCheck(1); 
			// console.log(val_zoom);
		}

	});

	var myStyle = {
			    "color": "#f3af32",
			    "weight": 1,
			    "opacity": 60
			};
			
 