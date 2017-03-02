<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.28.0/mapbox-gl.js'></script>
		<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.28.0/mapbox-gl.css' rel='stylesheet' />
		 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Current weather for UNC Charlotte and the greater Charlotte-Mecklenburg region. This weather portal is operated by the UNC Charlotte Meteorology Program.">
		<meta name="author" content="Warren Pettee">
		
		<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0">
  		<meta http-equiv="expires" content="Sat, 31 Oct 2014 00:00:00 GMT">
  		<meta http-equiv="pragma" content="no-cache">
		<title>UNC Charlotte Weather</title>
		
		<!--<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<META HTTP-EQUIV="Expires" CONTENT="-1">-->
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<!--Load the AJAX API-->
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<!-- LOADD MEE -->
		<script>
			$(window).load(function() {
			    $('#load_screen').fadeOut('slow');
			});
		</script>
		<script src="mobileCheck.js"></script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-54843224-1', 'auto');
			ga('require', 'displayfeatures');
			ga('send', 'pageview');
		</script>
		<style>
			body { margin:0; padding:0; }
			/*map { position:absolute; top:0; bottom:0; width:100%; }*/
		</style>
	</head>
	<body>
		<script type="application/ld+json">
			{
				"@context" : "http://schema.org",
			"@type" : "EducationalOrganization",
			"url": "http://weather.uncc.edu/",
			"logo": "http://weather.uncc.edu/src/LogoIdea.png",
			"name": "UNC Charlotte Meteorology Program",
			"description": "The UNC Charlotte Meteorology program provides current weather data to UNC Charlotte and the greater Charlotte-Mecklenburg area through its online Campus Weather Portal . The meteorology program is under the Department of Geography and Earth Sciences at the University of North Carolina at Charlotte.",
			"address":[{
			"@type": "PostalAddress",
			"streetaddress": "9201 University City Blvd",
			"addressLocality": "Charlotte",
			"addressRegion": "North Carolina",
			"postalCode": "28223",
			"addressCountry": "United States"}]
			}
		</script>
		
		<div id="UNCC_Alerts">
			<div id="www-uncc-edu-alert"></div>
		</div>
		
		<div id="load_screen">
			<div id="loading" style="text-align:center;margin-left:auto;margin-right:auto;">
				<img src="http://weather.uncc.edu/src/20.gif" id="loader"><br><br><i>Connecting...</i>
			</div>
		</div>
		
		<div id="masthead">
			<h1>University of North Carolina at Charlotte</h1>
			<h2>Campus Weather Portal</h2>
		</div>
		
		<div id="schoolLogo">
			<p align="right">
				<a href="http://www.uncc.edu/"><img id = "school" src="http://weather.uncc.edu/src/UNCC_Crown_Logo_1c.png"  width="80%" height="80%"/></a>
			</p>
		</div>
		
		<nav id="menu"></nav>
		
		<img id = "school" style="position:absolute;bottom: 10px;right: 0px;z-index: 1000;" src="http://weather.uncc.edu/src/LogoIdea.png"  width="7%"/>
		
		<div id="rightButtons">
			
				<a id="stormReportsButton" class="toggleButton">Storm Reports</a>
				<a id="cltRadarButton" class="toggleButton">Charlotte Radar</a>
				<a id="cltVelocityButton" class="toggleButton">TCLT Velocity</a>
				<a id="attributesButton" class="toggleButton">Storm Attributes</a>
                <div class="slideLeft">
                    <a id="asosButton" class="toggleButton" onclick='showHideAsosMenu()'>ASOS</a>
                    <div id="asosMenu" class="slideLeftContent">
                    <ul>
                        <li>
                            <input type="radio" id="asosTempOption" name="selector" onchange="overlayASOS('ASOS Temp')">
                            <label for="asosTempOption">Temperature</label>
    
                            <div class="check"><div class="inside"></div></div>
                        </li>
  
                        <li>
                            <input type="radio" id="asosDewpOption" name="selector" onchange="overlayASOS('ASOS Dewp')">
                            <label for="asosDewpOption">Dewpoint</label>
    
                            <div class="check"><div class="inside"></div></div>
                        </li>
  
                        <li>
                            <input type="radio" id="asosWindOption" name="selector" onchange="overlayASOS('ASOS Wind')">
                            <label for="asosWindOption">Wind</label>
    
                            <div class="check"><div class="inside"></div></div>
                        </li>
                        <li>
                            <input type="radio" id="asosRainOption" name="selector" onchange="overlayASOS('ASOS Rain')">
                            <label for="asosRainOption">Rain</label>
    
                            <div class="check"><div class="inside"></div></div>
                        </li>
                        <li>
                            <input type="radio" id="asosPresOption" name="selector" onchange="overlayASOS('ASOS Pres')">
                            <label for="asosPresOption">Pressure</label>
    
                            <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                    </div>
			</div>
		</div>
		<div id="loadingIcon" class="loadingHide"><img src="http://weather.uncc.edu/src/20.gif" id="loader" alt="LOADING..."></div>
		<div id='leftButtons'>
			<div class="slideOut">
				<button class="dropbtn">Main Menu</button>
				<div class="slideout-content">
					<a href="http://weather.uncc.edu/station">Wx Station</a>
					<a href="http://weather.uncc.edu/obs">Satellite</a>
					<a href="http://weather.uncc.edu/radar">Radar</a>
					<a href="http://weather.uncc.edu/climate">Climate</a>
					<a href="http://weather.uncc.edu/AirQuality">Air Quality</a>
					<a href="http://weather.uncc.edu/archive">Archive</a>
					<a href="http://weather.uncc.edu/text.html">Climatology Reports</a>
					<a href="http://weather.uncc.edu/res">Resources</a>
					<a href="http://weather.uncc.edu/faq">FAQ</a>
					<a href="http://weather.uncc.edu/mobile.php">Mobile</a>
					<a href="http://weather.uncc.edu/lab">Learning</a>
				</div>
			</div>
			<div class="dropdown" id="conditionsDropdown">
				<button class="dropbtn">Current Condtions</button>
				<div class="dropdown-content">
					<div id="campus_obs" >
						<div class="stats">
						<div class="stats_header" >
							<b>Current Conditions</b><br>
							<div id="dattim"><br> </div>
							<div id="icon"></div>
						</div>
						<table style="width:100%">
							<tbody>
								<tr>
								<td class="stats_label">Temperature</td>
								<td class="stats_data" id="T"> </td>
								</tr>
								<tr> </tr>
								<tr>
								<td class="stats_label">Windchill</td>
								<td class="stats_data" id="WC"> </td>
								</tr>
								<tr> </tr>
								<tr>
								<td class="stats_label">Heat Index</td>
								<td class="stats_data" id="HI"> </td>
								</tr>
								<tr>
								<td class="stats_label">Dewpoint</td>
								<td class="stats_data" id="Td"> </td>
								</tr>
								<tr>
								<td class="stats_label">Humidity</td>
								<td class="stats_data" id="RH"> </td>
								</tr>
								<tr>
								<td class="stats_label">Barometer</td>
								<td class="stats_data" id="p"> </td>
								</tr>
								<tr>
								<td class="stats_label">Wind</td>
								<td class="stats_data" id="w"> </td>
								</tr>
								<tr>
								<td class="stats_label">Rain Rate</td>
								<td class="stats_data" id="rr"> </td>
								</tr>
								<tr>
								<td class="stats_label">UV Index</td>
								<td class="stats_data" id="UV"> </td>
								</tr>
								<tr>
								<td class="stats_label">Solar Radiation</td>
								<td class="stats_data" id="sun"> </td>
								</tr>
								<tr>
								<td class="stats_label">LCL</td>
								<td class="stats_data" id="lcl"> </td>
								</tr>
							</tbody>
						</table>
						<br>
						<table style="width:100%">
							<tbody>
								<div class="stats_header" >
									Today's Statistics
								</div>
								
								<tr>
								<td class="stats_label">High Temp:</td>
								<td class="stats_data" id="hi"> </td>
								</tr>
								<tr>
								<td class="stats_label">Low Temp:</td>
								<td class="stats_data" id="lo"> </td>
								</tr>
								<tr>
								<td class="stats_label">Rain:</td>
								<td class="stats_data" id="24rain"> </td>
								</tr>
								<tr>
								<td class="stats_label">High Wind:</td>
								<td class="stats_data" id="24wind"> </td>
								</tr>
								<tr>
								<td class="stats_label">High Pressure:</td>
								<td class="stats_data" id="24hiP"> </td>
								</tr>
								<tr>
								<td class="stats_label">Low Pressure:</td>
								<td class="stats_data" id="24loP"> </td>
								</tr>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
			
			<div class="slideOut">
				<button class="dropbtn">Traffic Cams</button>
				<div class='slideout-content'>
					<a href="http://weather.uncc.edu/cltMosaic.html" target="_blank">Charlotte</a>
					<a href="http://weather.uncc.edu/triadMosaic.html" target="_blank">Triad</a>
				</div>
			</div>
			<button id="studentForecastButton" class="dropbtn" onclick=''>Student Forecast</button>
			<div class="slideOut">
				<a id="pointForecast" class="toggleButton">Point Forecast</a>
			</div>
			<div id="mapKey">
				
			</div>
		</div> <!-- LEFT BUTTONS CONTAINER -->
		
		<div id='map' style='position:absolute; top:0; bottom:0; width: 100%;z-index:-1;'> </div>
		
		<div id='localAlert'>
			<?php 
				$DefaultZone = 'NCZ071'; // set to your NOAA zone
				$detailpage  = 'wxadvisory.php'; // overrides $hurlURL setting
				$doSummary   = false;  // display alert links only, not full alert details
				$includeOnly = false;  // include mode
				$noprint     = false;  // required for echo $advisory_html output
				include 'atom-advisory.php';
				if (preg_match("|There are no active|i",$advisory_html) ||
				preg_match("|Advisory Information Unavailable|i",$advisory_html)) {
					echo '<div class="advisoryBoxnoactive">' .$advisory_html .'</div>';
				}else{
					echo '<div class="advisoryBox">' . $advisory_html .'</div>';
				}
			?>
		</div>
		
		<div id="studentForecastBox" class="modal">
			<div class="modal-content">
				<div class="modal-header">
					<span class="close">&times;</span>
					<h2>Forecast for UNC Charlotte</h2>
				</div>
				<!-- Modal content -->
				<div class="modal-body">
					<p>There is no student generated forecast at this time...
					</p>
				</div>
				<div class="modal-footer">
					<h3></h3>
				</div>
			</div>
		</div>
		<div id="pointForecastBox" class="modal">
			<div class="modal-content">
				<div class="modal-header">
					<span class="close">&times;</span>
					<h2>NWS Point Forecast</h2>
				</div>
				<!-- Modal content -->
				<div class="modal-body">
                    <table id="stationConditions">
                        <tr id="station"></tr>
                        <tr id="stationData"></tr>
                    </table>
                    <h3>Forecast:</h3>
					<table id="ptForecastContent">                 
                        <tr id="dayLabels"></tr>
                        <tr id="dayIcons"></tr>
                        <tr id="temps"></tr>
                        <tr id="dayDesc"></tr>
                    </table>
				</div>
				<div class="modal-footer">
					<h3>Footer</h3>
				</div>
			</div>
		</div>
		
		<script src='map.js' type="text/javascript"></script>
		<script src="updateData.js" type="text/javascript"></script>
		<script src="statsData.js" type="text/javascript"></script>
		<script type="text/javascript" src="unccAlert.js" defer="defer"></script>
		<script type="text/javascript" src="forecast.js"></script>
	</body>
</html>