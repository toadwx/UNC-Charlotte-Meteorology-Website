/**
 * @author Warren Pettee
 * Javascript map plotting functions
 */

// SETUP BASE MAP -------------------------------------------
var map = new ol.Map({
	target: 'map',
	layers: [
		new ol.layer.Tile({
			source: new ol.source.MapQuest({layer: 'sat'})
		})
	],
	view: new ol.View({
		center: ol.proj.transform([-80.52, 35.14], 'EPSG:4326', 'EPSG:3857'),
		zoom: 6
	})
});

/*
var apiKey = "AuETJich_aLcuvPmrlr3_7g7t09wYGP_keAY6bWrWe1Jh4BF3YmUtda5MWPBs1yy";

var aerial = new OpenLayers.Layer.Bing({
    key: apiKey,
    type: "Aerial"
});

var map = new OpenLayers.Map('map', {
                layers: [
                	aerial
                ],
                controls: [
                    new OpenLayers.Control.Navigation(),
                    new OpenLayers.Control.MousePosition(),
                    new OpenLayers.Control.KeyboardDefaults()
                ],
                center: new OpenLayers.LonLat(-81, 35).transform('EPSG:4326', 'EPSG:3857'),
                zoom: 8
            });*/
// WMS NEXRAD SERVICE ------------------------------------------------------------

var nexrad = new ol.layer.Tile({
            title: 'National N0R Composite',
            visible: true,
            source: new ol.source.XYZ({
                    url : 'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/nexrad-n0q-900913/{z}/{x}/{y}.png'
            })});
var goesVisLay = new ol.layer.Tile({
            title: 'GOES Visible',
            visible: true,
            source: new ol.source.XYZ({
                    url : 'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/goes-vis-1km-900913/{z}/{x}/{y}.png'
            })});
var goesIrLay = new ol.layer.Tile({
            title: 'GOES IR',
            visible: true,
            source: new ol.source.XYZ({
                    url : 'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/goes-ir-4km-900913/{z}/{x}/{y}.png'
            })});
var goesWvLay = new ol.layer.Tile({
            title: 'GOES WV',
            visible: true,
            source: new ol.source.XYZ({
                    url : 'http://mesonet.agron.iastate.edu/cache/tile.py/1.0.0/goes-wv-4km-900913/{z}/{x}/{y}.png'
            })});            
var nwsWarn = new ol.layer.Tile({
            title: 'NWS Warnings',
            visible: true,
            source: new ol.source.XYZ({
                    url : 'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/hazards/{z}/{x}/{y}.png'
            })});          
            
// Hydro Resources ------------------------------------------------------------------
var ffg12Layer = new ol.layer.Tile({
            title: '12 Hour Flash Flood Guidance',
            visible: true,
            source: new ol.source.XYZ({
                    url : 'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg12hr/{z}/{x}/{y}.png'
            })});
var ffg24Layer = new ol.layer.Tile({
            title: '24 Hour Flash Flood Guidance',
            visible: true,
            source: new ol.source.XYZ({
                    url : 'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg24hr/{z}/{x}/{y}.png'
            })});
var ffg6Layer = new ol.layer.Tile({
            title: '6 Hour Flash Flood Guidance',
            visible: true,
            source: new ol.source.XYZ({
                    url : 'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg6hr/{z}/{x}/{y}.png'
            })});    
var ffg3Layer = new ol.layer.Tile({
            title: '3 Hour Flash Flood Guidance',
            visible: true,
            source: new ol.source.XYZ({
                    url : 'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg3hr/{z}/{x}/{y}.png'
            })}); 
var ffg1Layer = new ol.layer.Tile({
            title: '1 Hour Flash Flood Guidance',
            visible: true,
            source: new ol.source.XYZ({
                    url : 'http://ridgewms.srh.noaa.gov/tc/tc.py/1.0.0/ffg1hr/{z}/{x}/{y}.png'
            })});                   
// County Resources -----------------------------------------------------------------

//var incidentIcon = new OpenLayers.Icon("http://weather.uncc.edu/src/warning.png", new OpenLayers.Size(32,32))

//var cmpd_accidents = new OpenLayers.Layer.GeoRSS( 'CMPD Accidents', 'http://weather.uncc.edu/data/cmpdAccidents.xml', {'icon':incidentIcon});
   
//var ncdot_accidents = new OpenLayers.Layer.GeoRSS( 'NCDOT Accidents', 'http://weather.uncc.edu/data/ncdotAccidents.xml', {'icon':incidentIcon});

var roads = new ol.layer.Tile({
        visible: true,
        source: new ol.source.TileWMS({
          url: 'http://maps.co.mecklenburg.nc.us/geoserver/postgis/wms',
          params: {'FORMAT': 'image/png', 
                   'VERSION': '1.1.1',
                   tiled: true,
                LAYERS: 'postgis:roads',
                STYLES: '',
          }
        })
      });
		
   
var cfd = new ol.layer.Tile({
        visible: true,
        source: new ol.source.TileWMS({
          url: 'http://maps.co.mecklenburg.nc.us/geoserver/postgis/wms',
          params: {'FORMAT': 'image/png', 
                   'VERSION': '1.1.1',
                   tiled: true,
                LAYERS: 'postgis:fire_stations',
                STYLES: '',
          }
        })
      });
      
var lightRail = new ol.layer.Tile({
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://maps.co.mecklenburg.nc.us/geoserver/postgis/wms',
		params: {'FORMAT': 'image/png', 
			'VERSION': '1.1.1',
			tiled: true,
			LAYERS: 'postgis:cats_light_rail',
			STYLES: '',
		}
	})
});

var railroads = new ol.layer.Tile({
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://maps.co.mecklenburg.nc.us/geoserver/postgis/wms',
		params: {'FORMAT': 'image/png', 
			'VERSION': '1.1.1',
			tiled: true,
			LAYERS: 'postgis:railroads',
			STYLES: '',
		}
	})
});

var cmpd = new ol.layer.Vector({
	source: new ol.source.Vector({
		url:'./gis/CMPD_Stations.kml',
		format: new ol.format.KML(),
	})
});
var cmpdDistricts = new ol.layer.Tile({
        visible: true,
        source: new ol.source.TileWMS({
          url: 'http://maps.co.mecklenburg.nc.us/geoserver/postgis/wms',
          params: {'FORMAT': 'image/png', 
                   'VERSION': '1.1.1',
                   tiled: true,
                LAYERS: 'postgis:cmpd_districts',
                STYLES: '',
          }
        })
      });
var hosp = new ol.layer.Vector({
	source: new ol.source.Vector({
		url:'./gis/Hospitals.kml',
		format: new ol.format.KML(),
	})
});
var interstates = new ol.layer.Vector({
	source: new ol.source.Vector({
		url:'./gis/Interstates.kml',
		format: new ol.format.KML(),
	})
});
var counties = new ol.layer.Vector({
	source: new ol.source.Vector({
		url:'./gis/gz_2010_us_050_00_5m.kml',
		format: new ol.format.KML(),
	})
});
var schools = new ol.layer.Tile({
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://maps.co.mecklenburg.nc.us/geoserver/postgis/wms',
		params: {'FORMAT': 'image/png', 
				'VERSION': '1.1.1',
				tiled: true,
			LAYERS: 'postgis:schools_2014',
			STYLES: '',
		}
	})
});
var streams = new ol.layer.Tile({
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://maps.co.mecklenburg.nc.us/geoserver/postgis/wms',
		params: {'FORMAT': 'image/png', 
				'VERSION': '1.1.1',
				tiled: true,
			LAYERS: 'fema_streams',
			STYLES: '',
		}
	})
});
var floodplain = new ol.layer.Tile({
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://maps.co.mecklenburg.nc.us/geoserver/postgis/wms',
		params: {'FORMAT': 'image/png', 
				'VERSION': '1.1.1',
				tiled: true,
			LAYERS: 'fema_floodplain_changes',
			STYLES: '',
		}
	})
});
var dams = new ol.layer.Tile({
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://maps.co.mecklenburg.nc.us/geoserver/postgis/wms',
		params: {'FORMAT': 'image/png', 
				'VERSION': '1.1.1',
				tiled: true,
			LAYERS: 'uasidata:dams',
			STYLES: '',
		}
	})
});
//map.addLayer(cfd);  //DEBUG
// Label toggle detection --------------------------------------------------------
document.getElementById('interstateSelect').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(roads);
	} else {
		map.removeLayer(roads);
	}
};

document.getElementById('trafficSelect').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(cmpd_accidents);
		map.addLayer(ncdot_accidents);
	} else {
		map.removeLayer(cmpd_accidents);
		map.removeLayer(ncdot_accidents);
	}
};

document.getElementById('rrSelect').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(lightRail);
		map.addLayer(railroads);
	} else {
		map.removeLayer(lightRail);
		map.removeLayer(railroads);
	}
};

document.getElementById('fireSelect').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(cfd);
	} else {
		map.removeLayer(cfd);
	}
};
document.getElementById('policeSelect').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(cmpd);
		map.addLayer(cmpdDistricts);
	} else {
		map.removeLayer(cmpd);
		map.removeLayer(cmpdDistricts);
	}
};
document.getElementById('hospitalSelect').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(hosp);
	} else {
		map.removeLayer(hosp);
	}
};
document.getElementById('schoolsSelect').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(schools);
	} else {
		map.removeLayer(schools);
	}
};
document.getElementById('countySelect').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(counties);
	} else {
		map.removeLayer(counties);
	}
};

document.getElementById('streamSelect').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(streams);
		map.addLayer(dams);
	} else {
		map.removeLayer(streams);
		map.removeLayer(dams);
	}
};

document.getElementById('floodplainSelect').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(floodplain);
	} else {
		map.removeLayer(floodplain);
	}
};



document.getElementById('goesVis').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(goesVisLay);
	} else {
		map.removeLayer(goesVisLay);
	}
};

document.getElementById('goesIR').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(goesIrLay);
	} else {
		map.removeLayer(goesIrLay);
	}
};

document.getElementById('goesWV').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(goesWvLay);
	} else {
		map.removeLayer(goesWvLay);
	}
};

document.getElementById('warnings').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(nwsWarn);
	} else {
		map.removeLayer(nwsWarn);
	}
};

document.getElementById('ffg1Select').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(ffg1Layer);
	} else {
		map.removeLayer(ffg1Layer);
	}
};
document.getElementById('ffg3Select').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(ffg3Layer);
	} else {
		map.removeLayer(ffg3Layer);
	}
};
document.getElementById('ffg6Select').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(ffg6Layer);
	} else {
		map.removeLayer(ffg6Layer);
	}
};
document.getElementById('ffg12Select').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(ffg12Layer);
	} else {
		map.removeLayer(ffg12Layer);
	}
};
document.getElementById('ffg24Select').onclick = function() {
	// access properties using this keyword
	if ( this.checked ) {
		map.addLayer(ffg24Layer);
	} else {
		map.removeLayer(ffg24Layer);
	}
};