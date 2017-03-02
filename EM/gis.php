<!DOCTYPE html>
<html lang="en">
	
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<head>
  	
	<title>WxConsole</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta name="description" content="Wx Console">
    <meta name="author" content="Warren Pettee">
    
    <link rel="stylesheet" href="emcon.css"/>
    
    <!-- Clock code -->
    <script>
        // -------------------------------- CLOCK
        function startTime() {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML = h+":"+m+":"+s+" UTC";
            var t = setTimeout(function(){startTime()},500);
        }

        function checkTime(i) {
            if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
    <script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-54843224-1', 'auto');
			ga('require', 'displayfeatures');
			ga('send', 'pageview');
		</script>
		<!-- MAPBOX API -->
		<script src='https://api.mapbox.com/mapbox-gl-js/v0.22.1/mapbox-gl.js'></script>
		<link href='https://api.mapbox.com/mapbox-gl-js/v0.22.1/mapbox-gl.css' rel='stylesheet' />
    
</head>
    
    <body onload="startTime()"> <!-- Run time function in head -->
    	<!-- TOP BANNER -->
        <span id='txt' style="position:absolute;top: 10px;left: 10px;z-index: 1000;color:#ffffff;"> </span>
        <!--<a href="http://weather.uncc.edu/" style="position:absolute;top: 10px;right: 10px;z-index: 1000;color:#ffffff;">weather.uncc.edu</a> -->
        <img id = "school" style="position:absolute;bottom: 0px;left: 0px;z-index: 1000;" src="http://weather.uncc.edu/src/LogoIdea.png"  width="7%"/>
        <div id="header" style="background:linear-gradient(gray, black);z-index: -1;">
            <h2 style="margin-top:0;margin-bottom:0;text-align:center;color:#ffffff;">Weather Support Console</h2>
        </div>
        <div id="txt1"> </div>
        
        <!-- Right Panel -->
        <div id="infrastructure">
          <h3 style="margin-top:0;margin-bottom:0;text-align:center;color:#ffffff;">Infrastructure</h3>
          <input type="checkbox" id="interstateSelect"  />Roads <br /> <br />
          <input type="checkbox" id="rrSelect"          />Railroads <br />
          <input type="checkbox" id="utilitiesSelect"   />Utilities <br /> <br />
          <input type="checkbox" id="trafficSelect"     />Traffic <br /> <br />
          <input type="checkbox" id="fireSelect"       />CFD Stations <br />
          <input type="checkbox" id="policeSelect"     />CMPD Stations <br />
          <input type="checkbox" id="hospitalSelect"   />Hospitals <br />
          <input type="checkbox" id="schoolsSelect"    />Schools <br /><br />
          <h3 style="margin-top:0;margin-bottom:0;text-align:center;color:#ffffff;">Hydrology</h3>
          <input type="checkbox" id="streamSelect"     />Streams <br />
          <input type="checkbox" id="floodplainSelect" />100yr Floodplain <br /> <br />
          <input type="checkbox" id="streamgageSelect" />Stream Gauges<br />
          <input type='checkbox' id="raingageSelect"   />Rain Gauges<br /> <br />
        </div>
        
        <!-- Left Panel -->
        <div id="forecast">
        	<h3 style="margin-top:0;margin-bottom:0;text-align:center;color:#ffffff;">National</h3>
        	<input type='checkbox' id="nationalComp"   />NEXRAD Composite<br />
        	<input type='checkbox' id="goesVis"   />GOES Visible<br />
        	<input type='checkbox' id="goesIR"   />GOES IR<br />
        	<input type='checkbox' id="goesWV"   />GOES WV<br />
        	<input type='checkbox' id="warnings"   />NWS Warnings<br />
        	<input type='checkbox' id="stormReports"   />Storm Reports<br />
        	<input type='checkbox' id="mpingReports"   />MPing Reports<br /><br/>
          <h3 style="margin-top:0;margin-bottom:0;text-align:center;color:#ffffff;">Flash Flood Guidance</h3>
          <input type='checkbox' id="ffg1Select"   />1 hr<br />
          <input type='checkbox' id="ffg3Select"   />3 hr<br />
          <input type='checkbox' id="ffg6Select"   />6 hr<br />
          <input type='checkbox' id="ffg12Select"   />12 hr<br />
          <input type='checkbox' id="ffg24Select"   />24 hr<br /> <br />
          <h3 style="margin-top:0;margin-bottom:0;text-align:center;color:#ffffff;">Camera Feeds</h3>
          <input type='checkbox' id="cameraOverlay" style="align:center;"  />Map Overlay<br />
          <button type="button" id="cameraMosaic" onclick='window.open("mosaic.html");'>Mosaic</button><br />
          
        </div>
        
        <!-- Bottom Panel -->
        <div id="mapSettings">
          <h3 style="margin-top:0;margin-bottom:0;text-align:center;color:#ffffff;">Map Settings</h3>
          <input type="checkbox" id="countySelect"        />Counties<br />
        </div>
		
		<!-- Radar Panel -->
        <div id="radar">
          <h3 style="margin-top:0;margin-bottom:0;text-align:center;color:#ffffff;">Radar</h3>
           <select>
                <option value="volvo">CLT TDWR</option>
                <option value="saab">GSP NEXRAD</option>
                <option value="mercedes">RAX NEXRAD</option>
                <option value="audi">FCX NEXRAD</option>
          </select>
          <select>
                <option value="baseRef">Base Ref</option>
                <option value="baseVel">Base Vel</option>
                <option value="stormVel">Storm Rel Vel</option>
          </select>  <br />
          <input type="button" value="Load" onclick="loadRadar()"> 
          
        </div>
        
        <!-- Map Placeholder -->
        <div id='map' style='width: 100%; height: 100%;'> </div>
		<script>
			mapboxgl.accessToken = 'pk.eyJ1Ijoid3BldHRlZSIsImEiOiJjaXM2NjU0aXIwY3ZsMm9wMTZlcXQ3MTN2In0.V5OQVyEd55c6TIbq-Fgbpg';
			var map = new mapboxgl.Map({
			    container: 'map',
			    style: 'mapbox://styles/mapbox/satellite-streets-v9',
			    center: [-79, 36],
			    zoom: 5,
			    
			});
			// IEM DATA SOURCES ---------------------------------------------------------------------------------
			map.on('load', function() {
			    map.addSource('IEM_NATIONAL_COMPOSITE_RADAR', {
			        'type': 'raster',
			        'tiles': [
			            'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913/{z}/{x}/{y}.png'
			        ],
			        'tileSize': 256
			    });
			    map.addSource('GOES_VISIBLE', {
			        'type': 'raster',
			        'tiles': [
			            'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/goes-vis-1km-900913/{z}/{x}/{y}.png'
			        ],
			        'tileSize': 256
			    });
			    map.addSource('GOES_IR', {
			        'type': 'raster',
			        'tiles': [
			            'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/goes-ir-4km-900913/{z}/{x}/{y}.png'
			        ],
			        'tileSize': 256
			    });
			    map.addSource('GOES_WV', {
			        'type': 'raster',
			        'tiles': [
			            'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/goes-wv-4km-900913/{z}/{x}/{y}.png'
			        ],
			        'tileSize': 256
			    });
			    //  RIDGE WMS SOURCES -----------------------------------------------------------------------------
			    map.addSource('NWS_WARNINGS', {
			        'type': 'vector',
			        'url': 'http://mesonet.agron.iastate.edu/geojson/sbw.geojson?'
			    });
			    map.addSource('STORM_REPORTS', {
			        'type': 'vector',
			        'url': 'http://mesonet.agron.iastate.edu/geojson/lsr.php?sts=201605100000&ets=201605110000&wfos=DVN,DMX,ARX'
			    });
			    map.addSource('FFG_1hr', {
			        'type': 'raster',
			        'tiles': [
			            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg1hr/{z}/{x}/{y}.png'
			        ],
			        'tileSize': 256
			    });
			    map.addSource('FFG_3hr', {
			        'type': 'raster',
			        'tiles': [
			            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg3hr/{z}/{x}/{y}.png'
			        ],
			        'tileSize': 256
			    });
			    map.addSource('FFG_6hr', {
			        'type': 'raster',
			        'tiles': [
			            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg6hr/{z}/{x}/{y}.png'
			        ],
			        'tileSize': 256
			    });
			    map.addSource('FFG_12hr', {
			        'type': 'raster',
			        'tiles': [
			            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg12hr/{z}/{x}/{y}.png'
			        ],
			        'tileSize': 256
			    });
			    map.addSource('FFG_24hr', {
			        'type': 'raster',
			        'tiles': [
			            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg24hr/{z}/{x}/{y}.png'
			        ],
			        'tileSize': 256
			    });
			});
			document.getElementById('nationalComp').onclick = function() {
				// access properties using this keyword
				if ( this.checked ) {
					map.addLayer({
						'id': 'nationalComposite',
						'type': 'raster',
						'source': 'IEM_NATIONAL_COMPOSITE_RADAR',
						'paint': {}
					}, 'aeroway-taxiway');
				} else {
					map.removeLayer('nationalComposite');
				}
			};
			document.getElementById('goesVis').onclick = function() {
				// access properties using this keyword
				if ( this.checked ) {
					map.addLayer({
						'id': 'goesVisible',
						'type': 'raster',
						'source': 'GOES_VISIBLE',
						'paint': {}
					}, 'aeroway-taxiway');
				} else {
					map.removeLayer('goesVisible');
				}
			};
			document.getElementById('goesIR').onclick = function() {
				// access properties using this keyword
				if ( this.checked ) {
					map.addLayer({
						'id': 'goesInfrared',
						'type': 'raster',
						'source': 'GOES_IR',
						'paint': {}
					}, 'aeroway-taxiway');
				} else {
					map.removeLayer('goesInfrared');
				}
			};
			document.getElementById('goesWV').onclick = function() {
				// access properties using this keyword
				if ( this.checked ) {
					map.addLayer({
						'id': 'goesWaterVapor',
						'type': 'raster',
						'source': 'GOES_WV',
						'paint': {}
					}, 'aeroway-taxiway');
				} else {
					map.removeLayer('goesWaterVapor');
				}
			};
			document.getElementById('warnings').onclick = function() {
				// access properties using this keyword
				if ( this.checked ) {
					map.addLayer({
						'id': 'nwsWarnings',
						'type': 'fill',
						'source': 'NWS_WARNINGS'
					}, 'aeroway-taxiway');
				} else {
					map.removeLayer('nwsWarnings');
				}
			};
			document.getElementById('ffg1Select').onclick = function() {
				// access properties using this keyword
				if ( this.checked ) {
					map.addLayer({
						'id': 'ffg1',
						'type': 'raster',
						'source': 'FFG_1hr',
						'paint': {}
					}, 'aeroway-taxiway');
				} else {
					map.removeLayer('ffg1');
				}
			};
			document.getElementById('ffg3Select').onclick = function() {
				// access properties using this keyword
				if ( this.checked ) {
					map.addLayer({
						'id': 'ffg3',
						'type': 'raster',
						'source': 'FFG_3hr',
						'paint': {}
					}, 'aeroway-taxiway');
				} else {
					map.removeLayer('ffg3');
				}
			};
			document.getElementById('ffg6Select').onclick = function() {
				// access properties using this keyword
				if ( this.checked ) {
					map.addLayer({
						'id': 'ffg6',
						'type': 'raster',
						'source': 'FFG_6hr',
						'paint': {}
					}, 'aeroway-taxiway');
				} else {
					map.removeLayer('ffg6');
				}
			};
			document.getElementById('ffg12Select').onclick = function() {
				// access properties using this keyword
				if ( this.checked ) {
					map.addLayer({
						'id': 'ffg12',
						'type': 'raster',
						'source': 'FFG_12hr',
						'paint': {}
					}, 'aeroway-taxiway');
				} else {
					map.removeLayer('ffg12');
				}
			};
			document.getElementById('ffg24Select').onclick = function() {
				// access properties using this keyword
				if ( this.checked ) {
					map.addLayer({
						'id': 'ffg24',
						'type': 'raster',
						'source': 'FFG_24hr',
						'paint': {}
					}, 'aeroway-taxiway');
				} else {
					map.removeLayer('ffg24');
				}
			};

			</script>
        
        <!-- REQUIRED LIBRARIES
    	<script src="http://openlayers.org/en/v3.9.0/build/ol.js" type="text/javascript"></script>
    	<!--<script src='OpenLayers.js' type="text/javascript"></script>-->
        <!-- CALL SCRIPTS 
		<script src="map.js"></script> -->
</html>
