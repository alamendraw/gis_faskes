
<link rel="stylesheet" href="<?= base_url();?>assets/leaflet/leaflet.css" > 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/leaflet/draw/L.draw.css">
<style type="text/css">
   #polymap { height: 360px; }
   </style>
<section class="simple-validation">  
    <div class="row">  
        <div class="col-md-12" align="center">
            <div class="card"> 
                <div class="card-content">
                    <div class="card-body">  
                        <button style="height:60px;" type="button" onClick="buttonToggle('identitas')" class="btn btn_menu btn-outline-primary">Identitas</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('detail')" class="btn btn_menu btn-outline-primary">Detail</button> 
                        <button style="height:60px;" type="button" onClick="buttonToggle('lahan')" class="btn btn_menu btn-primary">Lahan</button> 
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
<form id="form2" action="<?php echo $url.'-save-lahan'?>" method="post" enctype="multipart/form-data"  autocomplete="off">

<div class="col-md-12">
    <div class="row">
    <input type="hidden" class="form-control" name="action" id="action" value="<?= $action;?>">
    <input type="hidden" class="form-control" name="id_faskes" id="id_faskes" value="<?= ($action=='update')?$data['id_faskes']:'';?>">
        <div class="">
            <div class="card"> 
                <div class="card-body" >
                    <h4 class="card-title"><?php echo $title2?></h4>
                </div> 
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="row">  
 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Luas Lahan</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['luas_lahan']:'';?>" name="luas_lahan" id="luas_lahan">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Luas Bangunan</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['luas_bangunan']:'';?>" name="luas_bangunan" id="luas_bangunan">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Luas Halaman</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['luas_halaman']:'';?>" name="luas_halaman" id="luas_halaman">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Luas lapangan</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['luas_lapangan']:'';?>" name="luas_lapangan" id="luas_lapangan">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Luas Lahan Yang Sudah Dipagar</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['sudah_pagar']:'';?>" name="sudah_pagar" id="sudah_pagar">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Luas Lahan Yang Belum Dipagar</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['belum_pagar']:'';?>" name="belum_pagar" id="belum_pagar">
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Luas Lahan Kosong</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="<?= ($action=='update')?$data['luas_lahan_kosong']:'';?>" name="luas_lahan_kosong" id="luas_lahan_kosong">
                                    </div>
                                </div>                                     
                            </div>  
                            
                            <div class="col-sm-12"> 
                                <div id="polymap"></div>   
                                <input type="hidden" name="area" id="area" value="<?php echo ($action == 'update') ? $data['area']: ''; ?>">                               
                            </div> 

                        </div>
                            
                    </div>
                </div>
            </div> 
        </div>
    
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
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
    <script src="<?= base_url();?>assets/leaflet/leaflet.js" ></script>
    <script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/leaflet/draw/L.draw.js"></script>
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
   <script type="text/javascript">
        var vlat = $("#lat").val();
        var vlon = $("#lon").val();
    
        var polymap = L.map('polymap', {
                        fullscreenControl: true, 
                        fullscreenControl: {
                            pseudoFullscreen: false 
                        }
                    })
                    .setView([vlat,vlon], 18); 
        
		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetpolymap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        }).addTo(polymap);

        var greenIcon = L.icon({
			iconUrl:  '<?= base_url();?>assets/image/faskes_hijau.png', 
			iconSize:     [20,25], // size of the icon  
		});
        
        L.marker([vlat, vlon], {icon: greenIcon}).addTo(polymap);
//Draw
<?php  if (isset($data['area'])) { ?>
 
      var polygonLatLngs = <?= $data['area'];?>; 
      var polygon = new L.Polygon(polygonLatLngs, {
          editable: true
      }).addTo(polymap);
      polymap.fitBounds(polygon.getBounds());
      polygon.on('edit', function() {
          $('#area').val(polygon.getLatLngs());
      });
	<?php } else { ?> 
		var drawnItems = new L.FeatureGroup();
      polymap.addLayer(drawnItems);

      polymap.addControl(new L.Control.Draw({
        edit: {
            featureGroup: drawnItems,
            poly : {
                allowIntersection : false
            }
        },
        draw: {
            circle: false,
            circlemarker: false,
            rectangle: false,
            polyline: false,
            marker: false,
            polygon : {
                allowIntersection: false,
                showArea:true
            }
        }
    }));
 
    var _round = function(num, len) {
        return Math.round(num*(Math.pow(10, len)))/(Math.pow(10, len));
    };
    
    var strLatLng = function(latlng) {
        return "("+_round(latlng.lat, 6)+", "+_round(latlng.lng, 6)+")";
    };
 
    var getPopupContent = function(layer) { 
        if (layer instanceof L.Marker || layer instanceof L.CircleMarker) {
            return strLatLng(layer.getLatLng());
        // Circle - lat/long, radius
        } else if (layer instanceof L.Circle) {
            var center = layer.getLatLng(),
                radius = layer.getRadius();
            return "Center: "+strLatLng(center)+"<br />"
                  +"Radius: "+_round(radius, 2)+" m";
        // Rectangle/Polygon - area
        } else if (layer instanceof L.Polygon) {
            var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs(),
                area = L.GeometryUtil.geodesicArea(latlngs);
            return "Area: "+L.GeometryUtil.readableArea(area, true);
        // Polyline - distance
        } else if (layer instanceof L.Polyline) {
            var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs(),
                distance = 0;
            if (latlngs.length < 2) {
                return "Distance: N/A";
            } else {
                for (var i = 0; i < latlngs.length-1; i++) {
                    distance += latlngs[i].distanceTo(latlngs[i+1]);
                }
                return "Distance: "+_round(distance, 2)+" m";
            }
        }
        return null;
    };

    polymap.on(L.Draw.Event.CREATED, function(event) {
        var layer = event.layer;
        var content = getPopupContent(layer);
        if (content !== null) {
            layer.bindPopup(content);
        }

        drawnItems.addLayer(layer);
        $('#area').val(layer.getLatLngs());
    });

    polymap.on(L.Draw.Event.EDITED, function(event) {
        var layers = event.layers,
            content = null;
        layers.eachLayer(function(layer) {
            content = getPopupContent(layer);
            if (content !== null) {
                layer.setPopupContent(content);
            }
            $('#area').val(layer.getLatLngs());
        });
	});
	<?php } ?>
   </script>


