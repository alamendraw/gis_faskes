
<style type="text/css">
		#mapid { height: 80vh; }
		 
	</style>
<div id="mapid"  class="col-md-12"></div>
<script src="<?= base_url();?>assets/leaflet/leaflet.js" ></script>
<script type="text/javascript"> 
      
// $(document).ready(function() {
	
// });
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

	
	 	// on CLick Add Marker	 
	var addmarker;
	mymap.on('click', function(e){
		if (addmarker) { // check
			mymap.removeLayer(addmarker); // remove
		}
		addmarker = new L.Marker(e.latlng,{
			draggable: true
		  }).addTo(mymap); // set

		addmarker.on('dragend', function(e){
			console.log(addmarker.getLatLng().lat);
		});
	});
 


</script>