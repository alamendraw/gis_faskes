  
$(document).ready(function() {
	
});
//Layer Control
	 
	var mymap = L.map('mapid', {
		center: [-5.1461385,119.4349822],
		zoom: 12,
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
  
	if(module.kondisi=='update' && module.vlat!=''){  
		mymap.setView([module.vlat,module.vlon],14);
		var markerLatLng = [module.vlat,module.vlon];
		var marker = new L.Marker(markerLatLng,{draggable:true}).addTo(mymap);
		
		marker.on('dragend', function(e){ 
			$("#lat").val(marker.getLatLng().lat)
			$("#lon").val(marker.getLatLng().lng)
		});
	}else{ 
		var drawnMarker = new L.FeatureGroup();
		mymap.addLayer(drawnMarker);

		mymap.addControl(new L.Control.Draw({
			edit: {
				featureGroup: drawnMarker,
				poly : {
					allowIntersection : false
				}
			},
			draw: {
				circle: false,
				circlemarker: false,
				rectangle: false,
				polyline: false,
				marker: true,
				polygon : false
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
	
		mymap.on(L.Draw.Event.CREATED, function(event) {
			var layer = event.layer;
			var content = getPopupContent(layer);
			if (content !== null) {
				layer.bindPopup(content);
			}

			drawnMarker.addLayer(layer); 
			
			$("#lat").val(layer.getLatLng().lat);
			$("#lon").val(layer.getLatLng().lng);
		});

		mymap.on(L.Draw.Event.EDITED, function(event) {
			var layers = event.layers,
				content = null;
			layers.eachLayer(function(layer) {
				content = getPopupContent(layer);
				if (content !== null) {
					layer.setPopupContent(content);
				}
				
			$("#lat").val(layer.getLatLng().lat);
			$("#lon").val(layer.getLatLng().lng);
			});
		});
	}
	