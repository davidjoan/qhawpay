<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php include_http_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />        
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--<link rel="stylesheet" href="css/style.css" >-->

        <link rel="stylesheet" href="/css/frontend/leaflet.css" />
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="/css/frontend/leaflet.ie.css" />
        <![endif]-->        

        <style type="text/css">
            #qhawpayMap {
                height: 319px;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '292360694186351',
                    status     : true, 
                    cookie     : true,
                    xfbml      : true,
                    oauth      : true
                });
            };
            (function(d){
                var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                js = d.createElement('script'); js.id = id; js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                d.getElementsByTagName('head')[0].appendChild(js);
            }(document));
        </script>        



        <?php include_component('General', 'header') ?>

        <?php echo $sf_content ?>

        <?php include_component('General', 'footer') ?>

        <script src="/js/frontend/leaflet.js"></script>

	<script>
		var map = new L.Map('qhawpayMap');

		var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/721236c8c50c4af3ad881d33c3f7fa66/997/256/{z}/{x}/{y}.png',
			cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
			cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18, attribution: cloudmadeAttribution});

		map.setView(new L.LatLng(51.505, -0.09), 13).addLayer(cloudmade);


		var markerLocation = new L.LatLng(51.5, -0.09),
			marker = new L.Marker(markerLocation);

		map.addLayer(marker);
		marker.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();


		var circleLocation = new L.LatLng(51.508, -0.11),
			circleOptions = {color: '#f03', opacity: 0.7},
			circle = new L.Circle(circleLocation, 500, circleOptions);

		circle.bindPopup("I am a circle.");
		map.addLayer(circle);


		var p1 = new L.LatLng(51.509, -0.08),
			p2 = new L.LatLng(51.503, -0.06),
			p3 = new L.LatLng(51.51, -0.047),
			polygonPoints = [p1, p2, p3],
			polygon = new L.Polygon(polygonPoints);

		polygon.bindPopup("I am a polygon.");
		map.addLayer(polygon);


		map.on('click', onMapClick);

		var popup = new L.Popup();

		function onMapClick(e) {
			var latlngStr = '(' + e.latlng.lat.toFixed(3) + ', ' + e.latlng.lng.toFixed(3) + ')';

			popup.setLatLng(e.latlng);
			popup.setContent("You clicked the map at " + latlngStr);
			map.openPopup(popup);
		}
	</script>

    </body>
</html>
