mapboxgl.accessToken = 'pk.eyJ1Ijoid3BldHRlZSIsImEiOiJjaXM2NjU0aXIwY3ZsMm9wMTZlcXQ3MTN2In0.V5OQVyEd55c6TIbq-Fgbpg';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/wpettee/ciwfcnz2200212psgr6820jq6',
    zoom: 9,
    center: [-80.842, 35.22]
});

var NCURL = 'http://weather.uncc.edu/data/NC.usgs.geojson';
var SCURL = 'http://weather.uncc.edu/data/SC.usgs.geojson';
var TNURL = 'http://weather.uncc.edu/data/TN.usgs.geojson';
var stormAttributesURL = 'http://mesonet.agron.iastate.edu/geojson/nexrad_attr.geojson';
var stormReportsURL = getStormReports();
var asosNCURL = 'https://mesonet.agron.iastate.edu/geojson/network_obs.php?network=NC_ASOS';

var stormBasedWarningsURL = 'http://mesonet.agron.iastate.edu/geojson/sbw.geojson'

var spcWatchesURL = 'http://mesonet.agron.iastate.edu/json/spcwatch.py'

var tr0loopcount = 0;

var pointForecastActive = false;

map.on('load', function () {
    window.setInterval(function () {
        map.getSource('usgsNC').setData(NCURL);
        map.getSource('usgsSC').setData(SCURL);
        map.getSource('usgsTN').setData(TNURL);
        map.getSource('asosNC').setData(asosNCURL);
        map.getSource('stormReports').setData(getStormReports());
    }, 60000);

    function buildRadarLayers(site, product, loopTime) {
        nowEpoch = new Date();
        earlierEpoch = new Date(nowEpoch - loopTime * 60000)

        now = nowEpoch.toISOString();
        now = now.slice(0, 4) + now.slice(5, 7) + now.slice(8, 10) + now.slice(11, 13) + now.slice(14, 16)

        earlier = earlierEpoch.toISOString();
        earlier = earlier.slice(0, 4) + earlier.slice(5, 7) + earlier.slice(8, 10) + earlier.slice(11, 13) + earlier.slice(14, 16)

        iemCall = 'http://mesonet.agron.iastate.edu/json/radar?operation=list&radar=' + site + '&product=' + product + '&start=' + earlier + '&end=' + now + '&jsoncallback=?'
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                buildRadarLoops(data, site, product);
            }
        };
        xmlhttp.open("GET", iemCall, true);
        xmlhttp.send();


        function buildRadarLoops(data, site, product) {
            scansArray = data.scans;

            arrayLength = scansArray.length;
            var times = new Array(arrayLength);
            for (var i = 0; i < arrayLength; i++) {
                times[i] = scansArray[i].ts;
            }

            arrayLength = times.length;
            tr0loopcount = arrayLength;
            var radarURL = new Array(arrayLength);
            for (var i = 0; i < arrayLength; i++) {
                radarURL[i] = 'https://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/ridge::' + site + '-' + product + '-' + times[i].slice(0, 4) + times[i].slice(5, 7) + times[i].slice(8, 10) + times[i].slice(11, 12) + times[i].slice(12, 13) + times[i].slice(14, 16) + '/{z}/{x}/{y}.png';
            }

            frameCount = radarURL.length;
            prefix = site + "_" + product + "_"
            for (var i = 0; i < frameCount; i++) {
                map.addSource(prefix + i, {
                    'type': 'raster',
                    'tiles': [
			            radarURL[i]
			        ],
                    'tileSize': 256
                });

                map.addLayer({
                    id: prefix + i,
                    source: prefix + i,
                    type: 'raster',
                    'layout': {
                        'visibility': 'none'
                    },
                    paint: {
                        'raster-opacity': 0,
                        'raster-opacity-transition': {
                            duration: 0
                        }
                    }
                });
            }
        }
    }
    function addRadarLoop(urlArray, prefix) {
        frameCount = urlArray.length;
        for (var i = 0; i < frameCount; i++) {
            map.addSource(prefix + i, {
                'type': 'raster',
                'tiles': [
		            urlArray[i]
		        ],
                'tileSize': 256
            });

            map.addLayer({
                id: prefix + i,
                source: prefix + i,
                type: 'raster',
                'layout': {
                    'visibility': 'none'
                },
                paint: {
                    'raster-opacity': 0,
                    'raster-opacity-transition': {
                        duration: 0
                    }
                }
            });
        }
    }
    //cltradarFrames = getLatestTimes('CLT');

    map.addSource('usgsNC', { type: 'geojson', data: NCURL });
    map.addSource('usgsSC', { type: 'geojson', data: SCURL });
    map.addSource('usgsTN', { type: 'geojson', data: TNURL });
    map.addSource('asosNC', { type: 'geojson', data: asosNCURL });
    map.addSource('stormAttributes', { type: 'geojson', data: stormAttributesURL });
    map.addSource('stormReports', { type: 'geojson', data: stormReportsURL });
    map.addSource('stormBasedWarnings', { type: 'geojson', data: stormBasedWarningsURL });
    map.addSource('spcWarnings', { type: 'geojson', data: spcWatchesURL });

    radarFrames = ['http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913-m50m/{z}/{x}/{y}.png',
    				'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913-m45m/{z}/{x}/{y}.png',
    				'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913-m40m/{z}/{x}/{y}.png',
    				'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913-m35m/{z}/{x}/{y}.png',
    				'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913-m30m/{z}/{x}/{y}.png',
    				'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913-m25m/{z}/{x}/{y}.png',
    				'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913-m20m/{z}/{x}/{y}.png',
    				'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913-m15m/{z}/{x}/{y}.png',
    				'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913-m10m/{z}/{x}/{y}.png',
    				'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913-m05m/{z}/{x}/{y}.png',
    				'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913/{z}/{x}/{y}.png'];

    //Making single site radar frames...
    // buildRadarArray(SITE,PRODUCT,LOOP TIME(s))
    buildRadarLayers('CLT', 'TR0', 60);
    buildRadarLayers('CLT', 'TV0', 60);
    addRadarLoop(radarFrames, 'radar');
    var nationalFrameCount = radarFrames.length;

    map.addSource('goesVis', {
        'type': 'raster',
        'tiles': [
            'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/goes-vis-1km-900913/{z}/{x}/{y}.png'
        ],
        'tileSize': 256
    });
    map.addSource('goesIr', {
        'type': 'raster',
        'tiles': [
            'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/goes-ir-4km-900913/{z}/{x}/{y}.png'
        ],
        'tileSize': 256
    });
    map.addSource('goesWv', {
        'type': 'raster',
        'tiles': [
            'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/goes-wv-4km-900913/{z}/{x}/{y}.png'
        ],
        'tileSize': 256
    });
    /*
    map.addSource('warnings', {
        'type': 'raster',
        'tiles': [
            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/hazards/{z}/{x}/{y}.png'
        ],
        'tileSize': 256
    });
    map.addSource('ffg24', {
        'type': 'raster',
        'tiles': [
            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg24hr/{z}/{x}/{y}.png'
        ],
        'tileSize': 256
    });
    map.addSource('ffg12', {
        'type': 'raster',
        'tiles': [
            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg12hr/{z}/{x}/{y}.png'
        ],
        'tileSize': 256
    });
    map.addSource('ffg6', {
        'type': 'raster',
        'tiles': [
            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg6hr/{z}/{x}/{y}.png'
        ],
        'tileSize': 256
    });
    map.addSource('ffg3', {
        'type': 'raster',
        'tiles': [
            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg3hr/{z}/{x}/{y}.png'
        ],
        'tileSize': 256
    });
    map.addSource('ffg1', {
        'type': 'raster',
        'tiles': [
            'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg1hr/{z}/{x}/{y}.png'
        ],
        'tileSize': 256
    });
*/
    map.addLayer({
        'id': 'Visible',
        'type': 'raster',
        'source': 'goesVis',
        'layout': {
            'visibility': 'none'
        },
        'paint': {}
    }, 'aeroway-taxiway');
    map.addLayer({
        'id': 'IR',
        'type': 'raster',
        'source': 'goesIr',
        'layout': {
            'visibility': 'none'
        },
        'paint': {}
    }, 'aeroway-taxiway');
    map.addLayer({
        'id': 'Water Vapor',
        'type': 'raster',
        'source': 'goesWv',
        'layout': {
            'visibility': 'none'
        },
        'paint': {}
    }, 'aeroway-taxiway');
    map.addLayer({
        "id": "USGS-NC",
        "type": "symbol",
        "source": "usgsNC",
        "layout": {
            "icon-image": "{icon}",
            "visibility": "none"
        }
        //"filter": ["==", "features.properties.stationType", 'ST']
    });
    map.addLayer({
        "id": "USGS-SC",
        "type": "symbol",
        "source": "usgsSC",
        "layout": {
            "icon-image": "{icon}",
            "visibility": "none"
        }
        //"filter": ["==", "features.properties.stationType", 'ST']
    });
    map.addLayer({
        "id": "USGS-TN",
        "type": "symbol",
        "source": "usgsTN",
        "layout": {
            "icon-image": "{icon}",
            "visibility": "none"
        }
        //"filter": ["==", "features.properties.stationType", 'ST']
    });
    map.addSource('UNCCwxStation', {
        type: 'geojson',
        data: {
            "type": "FeatureCollection",
            "features": [{
                "type": "Feature",
                "properties": {
                    "stationName": "UNC Charlotte Meteorology"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [
	                   -80.730213,
	                   35.307306
	               ]
                }
            }]
        }
    });
    map.addLayer({
        "id": "UNCCwxStation",
        "type": "symbol",
        "source": "UNCCwxStation",
        "layout": {
            "icon-image": "green_embassy-15"
        }
        //"filter": ["==", "features.properties.stationType", 'ST']
    });

    map.addLayer({
        "id": "Storm Attributes",
        "type": "symbol",
        "source": "stormAttributes",
        "layout": {
            "icon-image": "yellow_rocket-15",
            "visibility": "none"
        }
        //"filter": ["==", "features.properties.stationType", 'ST']
    });
    map.addLayer({
        "id": "Storm Reports",
        "type": "symbol",
        "source": "stormReports",
        "layout": {
            "icon-image": "yellow_rocket-15",
            "visibility": "none"
        },
        "filter": ["==", "typetext", "FREEZING RAIN"]
        //"filter": ["==", "features.properties.stationType", 'ST']
    });
    
    map.addLayer({
        "id": "Severe Warnings",
        "type": "line",
        "source": "stormBasedWarnings",
        "layout": {
        	"visibility": "none"
        },
        'paint': {
            'line-color': '#cbe30a',
            'line-width': 3
        },
        "filter": ["==", "phenomena", 'SV']
    });

	map.addLayer({
        "id": "Tornado Warnings",
        "type": "line",
        "source": "stormBasedWarnings",
        "layout": {
        	"visibility": "none"
        },
        'paint': {
            'line-color': '#D24040',
            'line-width': 3
        },
        "filter": ["==", "phenomena", 'TO']
    });
    
    map.addLayer({
        "id": "FF Warnings",
        "type": "line",
        "source": "stormBasedWarnings",
        "layout": {
        	"visibility": "none"
        },
        'paint': {
            'line-color': '#42f44e'
        },
        "filter": ["==", "phenomena", 'FF']
    });
    
    map.addLayer({
    	"id": "SVR Watches",
    	"type":"line",
    	"source": "spcWarnings",
    	"layout": {
    		"visibility": "none"
    	},
    	'paint': {
    		'line-color': '#edae42'
    	},
    	"filter": ["==", "type", "SVR"]
    });
    
    map.addLayer({
    	"id": "TOR Watches",
    	"type":"line",
    	"source": "spcWarnings",
    	"layout": {
    		"visibility": "none"
    	},
    	'paint': {
    		'line-color': '#963333'
    	},
    	"filter": ["==", "type", "TOR"]
    })

    map.addLayer({
        "id": "ASOS Temp",
        "type": "symbol",
        "source": "asosNC",
        "layout": {
            "text-field": "{tmpf}",
            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
            "visibility": "none"
        },
        "paint": {
            //"text-size": 12,
            "text-color": "#28F028"
        }
    });
    map.addLayer({
        "id": "ASOS Dewp",
        "type": "symbol",
        "source": "asosNC",
        "layout": {
            "text-field": "{dwpf}",
            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
            "visibility": "none"
        },
        "paint": {
            //"text-size": 12,
            "text-color": "#28F028"
        }
    });
    map.addLayer({
        "id": "ASOS Wind",
        "type": "symbol",
        "source": "asosNC",
        "layout": {
            "text-field": "{sknt}",
            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
            "visibility": "none"
        },
        "paint": {
            //"text-size": 12,
            "text-color": "#28F028"
        }
    });
    map.addLayer({
        "id": "ASOS Rain",
        "type": "symbol",
        "source": "asosNC",
        "layout": {
            "text-field": "{phour}",
            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
            "visibility": "none"
        },
        "paint": {
            //"text-size": 12,
            "text-color": "#28F028"
        }
    });
    map.addLayer({
        "id": "ASOS Pres",
        "type": "symbol",
        "source": "asosNC",
        "layout": {
            "text-field": "{mslp}",
            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
            "visibility": "none"
        },
        "paint": {
            //"text-size": 12,
            "text-color": "#28F028"
        }
    });
    // --------------------------------------------------------------------------------------------------
    // Layer Visibility:
    var toggleableLayerIds = ['USGS-NC', 'USGS-SC', 'USGS-TN', 'Radar', 'Visible', 'IR', 'Water Vapor', 'Warnings', 'Watches'];
    for (var i = 0; i < toggleableLayerIds.length; i++) {
        var id = toggleableLayerIds[i];

        var link = document.createElement('a');
        link.href = '#';
        link.className = '';
        link.textContent = id;

        link.onclick = function (e) {
            var clickedLayer = this.textContent;
            onOff = 0;
            e.preventDefault();
            e.stopPropagation();
            if (clickedLayer != 'Radar' && clickedLayer != 'Warnings' && clickedLayer != 'Watches') {
                var visibility = map.getLayoutProperty(clickedLayer, 'visibility');

                if (visibility === 'visible') {
                    map.setLayoutProperty(clickedLayer, 'visibility', 'none');
                    this.className = '';
                } else {
                    this.className = 'active';
                    map.setLayoutProperty(clickedLayer, 'visibility', 'visible');
                }
            }
            else if (clickedLayer == 'Warnings') {
            	var visibility = map.getLayoutProperty("Severe Warnings", 'visibility');
            	if (visibility === 'visible') {
            		map.setLayoutProperty('Severe Warnings','visibility','none');
            		map.setLayoutProperty('Tornado Warnings','visibility','none');
            		map.setLayoutProperty('FF Warnings','visibility','none');
            		this.className = '';
            	} else {
            		map.setLayoutProperty('Severe Warnings','visibility','visible');
            		map.setLayoutProperty('Tornado Warnings','visibility','visible');
            		map.setLayoutProperty('FF Warnings','visibility','visible');
            		this.className = 'active'
            	}
            }
            else if (clickedLayer == 'Watches') {
            	var visibility = map.getLayoutProperty("SVR Watches", 'visibility');
            	if (visibility === 'visible') {
            		map.setLayoutProperty('SVR Watches','visibility','none');
            		map.setLayoutProperty('TOR Watches','visibility','none');
            		this.className = '';
            	} else {
            		map.setLayoutProperty('SVR Watches','visibility','visible');
            		map.setLayoutProperty('TOR Watches','visibility','visible');
            		this.className = 'active'
            	}
            }
            else if (clickedLayer == 'Radar') {
                for (var i = 0; i < nationalFrameCount; i++) {
                    var visibility = map.getLayoutProperty('radar' + i, 'visibility');
                    if (visibility === 'visible') {
                        clearInterval(nationalLoopInterval);
                        map.setLayoutProperty('radar' + i, 'visibility', 'none');
                        this.className = '';
                    } else {
                        this.className = 'active';
                        map.setLayoutProperty('radar' + i, 'visibility', 'visible');
                        onOff = 1;
                    }
                }

                if (onOff == 1) {
                    var frame = nationalFrameCount - 1;
                    nationalLoopInterval = setInterval(function () {
                        map.setPaintProperty('radar' + frame, 'raster-opacity', 0);
                        frame = (frame + 1) % nationalFrameCount;
                        map.setPaintProperty('radar' + frame, 'raster-opacity', 1);
                    }, 200);
                }
            }
        };

        var layers = document.getElementById('menu');
        layers.appendChild(link);
    }
    // --------------------------------------------------------------------------------------------------
    // USGS Layer Info on click:
    map.on('click', function (e) {
        var features = map.queryRenderedFeatures(e.point, { layers: ['USGS-NC', 'USGS-SC', 'USGS-TN'] });

        if (!features.length) {
            return;
        }

        var feature = features[0];

        // Populate the popup and set its coordinates
        // based on the feature found.
        usgsID = feature.properties.usgsID;
        if (feature.properties.stationType == 'ST') {
            var popup = new mapboxgl.Popup()
		        .setLngLat(feature.geometry.coordinates)
		        .setHTML('<b>' + feature.properties.stationName + '</b>' + '<div>' + "Stream Flow: " + feature.properties.streamFlow + '<br>' +
		        'Gage Height: ' + feature.properties.gageHeight + '<br>'
		        + '<img src="http://waterdata.usgs.gov/nwisweb/graph?agency_cd=USGS&site_no=' + usgsID.trim() + '&parm_cd=00060&period=7" >' +
		        '<img src="http://waterdata.usgs.gov/nwisweb/graph?agency_cd=USGS&site_no=' + usgsID.trim() + '&parm_cd=00065&period=7" >' + '</div>')
		        .addTo(map);
        }
        if (feature.properties.stationType == 'AT') {
            var popup = new mapboxgl.Popup()
		        .setLngLat(feature.geometry.coordinates)
		        .setHTML('<b>' + feature.properties.stationName + '</b>' + '<div>' + 'Rainfall: ' + feature.properties.rainfall + '<br>' +
		        '<img src="http://waterdata.usgs.gov/nwisweb/graph?agency_cd=USGS&site_no=' + usgsID.trim() + '&parm_cd=00045&period=7" >' + '</div>')
		        .addTo(map);
        }
    });

    map.on('click', function (e) {
        var features = map.queryRenderedFeatures(e.point, { layers: ['UNCCwxStation'] });

        if (!features.length) {
            return;
        }

        var feature = features[0];

        // Populate the popup and set its coordinates
        // based on the feature found.
        var popup = new mapboxgl.Popup()
	        .setLngLat(feature.geometry.coordinates)
	        .setHTML('<h3>' + feature.properties.stationName + '</h3>' + '<div style="overflow:scroll; height:500px;">' + "<img src='http://weather.uncc.edu/data/stnplot/daytempdew.png' width='60%'/>" +
	        '<br> <img src="http://weather.uncc.edu/data/stnplot/dayrain.png" width="60%" />' + '</div>')
	        .addTo(map);
    });

    map.on('click', function (e) {
        var features = map.queryRenderedFeatures(e.point, { layers: ['Storm Reports'] });

        if (!features.length) {
            return;
        }

        var feature = features[0];

        // Populate the popup and set its coordinates
        // based on the feature found.
        var popup = new mapboxgl.Popup()
	        .setLngLat(feature.geometry.coordinates)
	        .setHTML('<h3>' + feature.properties.typetext + '</h3>' + '<div style="width:300px">' +
            'Valid: ' + feature.properties.valid + '<br>' +
	        'County: ' + feature.properties.county + '<br>' +
	        'Source: ' + feature.properties.source + '<br>' +
	        feature.properties.remark + '</div>')
	        .addTo(map);
    });
    map.on('click', function (e) {
        var features = map.queryRenderedFeatures(e.point, { layers: ['Storm Attributes'] });

        if (!features.length) {
            return;
        }

        var feature = features[0];
        // Populate the popup and set its coordinates
        // based on the feature found.
        var popup = new mapboxgl.Popup()
	        .setLngLat(feature.geometry.coordinates)
	        .setHTML('<h3> Storm: ' + feature.properties.storm_id + '</h3>' + '<div> <table id="stormAttributeTable"> <tbody>' +
	        '<tr><td>' + 'Echo Top</td><td>' + feature.properties.top + ' kft' + '</td></tr>' +
	        '<tr><td>' + 'Max dbZ</td><td>' + feature.properties.max_dbz + ' @ ' + feature.properties.max_dbz_height + ' kft' + '</td></tr>' +
	        '<tr><td>' + 'VIL</td><td>' + feature.properties.vil + ' kg/m3' + '</td></tr>' +
	        '<tr><td>' + 'POH</td><td>' + feature.properties.poh + ' %' + '</td></tr>' +
	        '<tr><td>' + 'POSH</td><td>' + feature.properties.posh + ' %' + '</td></tr>' +
	        '<tr><td>' + 'Max Hail Size</td><td>' + feature.properties.max_size + 'in' + '</td></tr>' +
	        '<tr><td>' + 'Mesocyclone Strength </td><td>' + feature.properties.meso + ' (1 to 25)' + '</td></tr>' +
	        '<tr><td>' + 'TVS</td><td>' + feature.properties.tvs + '<br>' +
	        '<tr><td>' + 'Storm Motion</td><td>' + feature.properties.sknt + 'kts @ ' + feature.properties.drct + 'deg' + '</td></tr>' +
	        '<tr><td>' + 'Detected By</td><td>' + feature.properties.nexrad + '</td></tr>' + '</tbody></table></div>')
	        .addTo(map);
    });
    // --------------------------------------------------------------------------------------------------
    // Warnings Layer Info on click:
    map.on('click', function (e) {
        var features = map.queryRenderedFeatures(e.point, { layers: ['Tornado Warnings', 'Severe Warnings'] });

        if (!features.length) {
            return;
        }

        var feature = features[0];

        // Populate the popup and set its coordinates
        // based on the feature found.
        startTime = feature.properties.polygon_begin;
        endTime = feature.properties.expire;
        wfo = feature.properties.wfo;
        if (feature.properties.phenomena == 'SV') {
		    var popup = new mapboxgl.Popup()
		        .setLngLat(feature.geometry.coordinates[0][0])
		        .setHTML('<b> Severe Thunderstorm Warning</b>' + '<div>' + "Issued: " + feature.properties.polygon_begin + '<br>' +
		        'Expires: ' + feature.properties.expire + '<br>' +
		        'WFO: ' + feature.properties.wfo + '<br>' +
		        '</div>')
		        .addTo(map);
		} 
		if (feature.properties.phenomena == 'TO') {
			var popup = new mapboxgl.Popup()
		        .setLngLat(feature.geometry.coordinates[0][0])
		        .setHTML('<b> Tornado Warning</b>' + '<div>' + "Issued: " + feature.properties.polygon_begin + '<br>' +
		        'Expires: ' + feature.properties.expire + '<br>' +
		        'WFO: ' + feature.properties.wfo + '<br>' +
		        '</div>')
		        .addTo(map);
		}
    });
    // Use the same approach as above to indicate that the symbols are clickable
    // by changing the cursor style to 'pointer'.
    map.on('mousemove', function (e) {
        var features = map.queryRenderedFeatures(e.point, { layers: ['USGS-NC', 'USGS-SC', 'USGS-TN', 'UNCCwxStation', 'Storm Reports', 'Storm Attributes'] });
        map.getCanvas().style.cursor = (features.length) ? 'pointer' : '';
    });

    //Now some stuff for those cool toggle buttons...
    document.getElementById("attributesButton").addEventListener("click", function () { toggleLayer("Storm Attributes", "attributesButton") }, false);
    document.getElementById("stormReportsButton").addEventListener("click", function () { toggleLayer("Storm Reports", "stormReportsButton") }, false);
    document.getElementById("cltRadarButton").addEventListener("click", function () { toggleLoopyLayer("CLT_TR0_", "cltRadarButton") }, false);
    document.getElementById("cltVelocityButton").addEventListener("click", function () { toggleLoopyLayer("CLT_TV0_", "cltVelocityButton") }, false);
    document.getElementById("asosButton").addEventListener("click", function () { handleASOS() }, false);
    document.getElementById("asosButton").addEventListener("click", function () { handleASOS() }, false);
    document.getElementById("pointForecast").addEventListener("click", function () { pointButton() }, false);

    function toggleLayer(layerName, buttonName) {
        var visibility = map.getLayoutProperty(layerName, 'visibility');
        if (visibility === 'visible') {
            map.setLayoutProperty(layerName, 'visibility', 'none');
            document.getElementById(buttonName).className = 'toggleButton';
        } else {
            map.setLayoutProperty(layerName, 'visibility', 'visible');
            document.getElementById(buttonName).className = 'toggleButtonDown';
        }
    }

    function toggleLoopyLayer(layerPrefix, buttonName) {
        onOff = 0;
        document.getElementById("loadingIcon").className = 'loadingShow';
        if (layerPrefix == 'CLT_TR0_' || layerPrefix == 'CLT_TV0_') {
            for (var i = 0; i < tr0loopcount; i++) {
                var visibility = map.getLayoutProperty(layerPrefix + i, 'visibility');
                if (visibility === 'visible') {
                    clearInterval(cltLoopInt);
                    map.setLayoutProperty(layerPrefix + i, 'visibility', 'none');
                } else {
                    map.setLayoutProperty(layerPrefix + i, 'visibility', 'visible');
                    onOff = 1;
                }
            }

            if (onOff == 1) {
                document.getElementById(buttonName).className = 'toggleButtonDown';
                var frame = tr0loopcount - 1;
                cltLoopInt = setInterval(function () {
                    map.setPaintProperty(layerPrefix + frame, 'raster-opacity', 0);
                    frame = (frame + 1) % tr0loopcount;
                    map.setPaintProperty(layerPrefix + frame, 'raster-opacity', 1);
                }, 200);
            }
            else {
                document.getElementById(buttonName).className = 'toggleButton';
            }
        }
        document.getElementById("loadingIcon").className = 'loadingHide';
    }

    function handleASOS() {
        if (document.getElementById('asosButton').className == 'toggleButton') {
            document.getElementById('asosButton').className = 'toggleButtonDown';
        }
        else {
            document.getElementById('asosButton').className = 'toggleButton';
            map.setLayoutProperty('ASOS Temp', 'visibility', 'none');
            map.setLayoutProperty('ASOS Dewp', 'visibility', 'none');
            map.setLayoutProperty('ASOS Wind', 'visibility', 'none');
            map.setLayoutProperty('ASOS Rain', 'visibility', 'none');
            map.setLayoutProperty('ASOS Pres', 'visibility', 'none');
        }
    }

    function pointButton() {
        if (document.getElementById('pointForecast').className == 'toggleButton') {
            document.getElementById('pointForecast').className = 'toggleButtonDown';
            pointForecastActive = true;
        }
        else {
            document.getElementById('pointForecast').className = 'toggleButton';
            pointForecastActive = false;
        }
    }
    map.on('click', function (e) {
        if (pointForecastActive == true) {
            long = JSON.stringify(e.lngLat.lng);
            lat = JSON.stringify(e.lngLat.lat);
            forecastURL = "http://forecast.weather.gov/MapClick.php?lat=" + lat + "&lon=" + long + "&unit=0&lg=english&FcstType=json";

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    myFunction(data);
                }
            };
            xhttp.open("GET", forecastURL, true);
            xhttp.send();

            function myFunction(forecast) {
                var temps = forecast.data.temperature;
                var tempLabel = forecast.time.tempLabel;
                var weather = forecast.data.weather;
                var icons = forecast.data.iconLink;
                var descs = forecast.data.text;
                var days = forecast.time.startPeriodName;

                var current = forecast.currentobservation;

                document.getElementById("station").innerHTML = '<b>Currently at ' + current.name + '</b>';
                document.getElementById("stationData").innerHTML = '<td>Temp (F):' + current.Temp + '</td><td>Dewpoint(F):' + current.Dewp + '</td>Relative Humidity (%):' + current.Relh + '<td>';
                arraySize = days.length;
                var row = '<td>'
                for (var i = 0; i < arraySize; i++) {
                    if (i == 0) {
                        portion = '<b>' + days[i] + '</b>';
                    }
                    else{
                        portion = '<td><b>' + days[i] + '</b>';
                    }
                    row = row + portion + '</td>';
                }
                document.getElementById("dayLabels").innerHTML = row;

                var row = '<td>'
                for (var i = 0; i < arraySize; i++) {
                    if (i == 0) {
                        portion = '<img src="' + icons[i] + '">';
                    }
                    else {
                        portion = '<td> <img src="' + icons[i] + '">';
                    }
                    row = row + portion + '</td>';
                }
                document.getElementById("dayIcons").innerHTML = row;

                var row = '<td>'
                for (var i = 0; i < arraySize; i++) {
                    if (i == 0) {
                        portion = '<b>' + temps[i] + ' F</b>';
                    }
                    else {
                        portion = '<td><b>'+tempLabel[i]+': ' + temps[i] + ' F</b>';
                    }
                    row = row + portion + '</td>';
                }
                document.getElementById("temps").innerHTML = row;

                var row = '<td>'
                for (var i = 0; i < arraySize; i++) {
                    if (i == 0) {
                        portion = '<i>' + descs[i] + '</i>';
                    }
                    else {
                        portion = '<td><i>' + descs[i] + '</i>';
                    }
                    row = row + portion + '</td>';
                }
                document.getElementById("dayDesc").innerHTML = row;

                var forecastBox = document.getElementById('pointForecastBox');
                forecastBox.style.display = "block";

            }
        }
    });

});
function overlayASOS(layer) {
    if (layer != "ASOS Temp"){
        map.setLayoutProperty("ASOS Temp", 'visibility', 'none');
    }
    if (layer != "ASOS Dewp") {
        map.setLayoutProperty("ASOS Dewp", 'visibility', 'none');
    }
    if (layer != "ASOS Wind") {
        map.setLayoutProperty("ASOS Wind", 'visibility', 'none');
    }
    if (layer != "ASOS Rain") {
        map.setLayoutProperty("ASOS Rain", 'visibility', 'none');
    }
    if (layer != "ASOS Pres") {
        map.setLayoutProperty("ASOS Pres", 'visibility', 'none');
    }

    map.setLayoutProperty(layer, 'visibility', 'visible');
};
function getStormReports() {
    nowStormEpoch = new Date();
	earlierStormEpoch = new Date(nowStormEpoch - 1200 * 60000)
		
	nowS = nowStormEpoch.toISOString();
	nowS = nowS.slice(0, 4)+ nowS.slice(5, 7) + nowS.slice(8,10) + nowS.slice(11, 13) + nowS.slice(14, 16)
		
	earlierS = earlierStormEpoch.toISOString(); 
	earlierS = earlierS.slice(0, 4)+ earlierS.slice(5, 7) + earlierS.slice(8,10) + earlierS.slice(11, 13) + earlierS.slice(14, 16)
    URL = 'http://mesonet.agron.iastate.edu/geojson/lsr.php?sts='+ earlierS +'&ets='+nowS+'&wfos=';

    return URL;
}