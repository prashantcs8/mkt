<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Info windows</title>
    <style>
     #map_wrapper {
    height: 400px;
}

#googlemaps {
    width: 600px;
    height: 100%;
}
#googlemaps .info_content{
    max-width: 150px;
}
    </style>
  </head>
  <body>
   <div id="map_wrapper">
    <div id="googlemaps" class="mapping"></div>
</div>
      <script type='text/javascript' src='http://localhost/mkt/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
      <script type="text/javascript">
    jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyDzxpHtzOZgrxfCEaTiOw6Xf11jYoX_C3k&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    // Map Markers
			var mapMarkers = [{				
				icon: {
				image: "http://localhost/mkt/wp-content/themes/mkt/images/pin.png",
					iconsize: [25, 25],
					iconanchor: [12, 46]
				}
			}];
    // Set the latitude & longitude for our location (London Eye)
    var myLatlng = new google.maps.LatLng(51.503454,-0.119562);
    var mapOptions = {
        center: myLatlng, // Set our point as the centre location
        zoom: 16, // Set the zoom level
        mapTypeId: 'roadmap', // set the default map type
        markers: mapMarkers,
        scrollwheel: false
    };
            
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("googlemaps"), mapOptions);
    // Allow our satellite view have a tilted display (This only works for certain locations) 
    map.setTilt(45);

    // Create our info window content   
    var infoWindowContent = '<div class="info_content">' +
        '<h3>London Eye</h3>' +
        '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames.</p>' +
    '</div>';

    // Initialise the inforWindow
    var infoWindow = new google.maps.InfoWindow({
        content: infoWindowContent
    });
                
    // Add a marker to the map based on our coordinates
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'London Eye, London'
    });

    // Display our info window when the marker is clicked
    google.maps.event.addListener(marker, 'click', function() {
        infoWindow.open(map, marker);
    });
   infoWindow.open(map, marker);
 }
    </script>
    
  </body>
</html>