<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	 
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
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<!-- LOADD MEE -->
		<script>
			$(window).load(function() {
			    $('#load_screen').fadeOut('slow');
			});
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
		<div id="siteMenu">
			<a class="dropbtn" href="http://weather.uncc.edu/">Map</a>
			<!-- <a class="dropbtn" href="http://weather.uncc.edu/station">Wx Station</a> -->
			<a class="dropbtn" href="http://weather.uncc.edu/archive">Archive</a>
			<a class="dropbtn" href="http://weather.uncc.edu/obs">Satellite</a>
			<a class="dropbtn" href="http://weather.uncc.edu/radar">Radar</a>
			<a class="dropbtn" href="http://weather.uncc.edu/climate">Climate</a>
			<a class="dropbtn" href="http://weather.uncc.edu/AirQuality">Air Quality</a>
			<a class="dropbtn" href="http://weather.uncc.edu/res">Resources</a>
			<a class="dropbtn" href="http://weather.uncc.edu/lab">Learning</a>
			<a class="dropbtn" href="http://weather.uncc.edu/faq">About Us...</a>
		</div>
		<div id="obsBlock">
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
		<div id="chartContainer">
			<div id="picker">
				<form id="pickingForm">
					<b>Measurement:</b><br>
					<input type="radio" name="chartType" value="temp" checked="checked"> Temp/Dewp <br>
					<input type="radio" name="chartType" value="rain"> Rainfall <br>
					<input type="radio" name="chartType" value="wind"> Wind <br>
					<input type="radio" name="chartType" value="pres"> Pressure <br>
					<input type="radio" name="chartType" value="radi"> Radiation <br>
					<b>Time Range:</b><br>
					<input type="radio" name="chartTime" value="24" checked="checked"> 24 Hour <br>
					<input type="radio" name="chartTime" value="7"> 7 Day <br>
					<input type="radio" name="chartTime" value="30"> 30 Day <br>
					<input type="submit" value="Plot It!">
				</form>
			</div>
			<div id="chartObject">
				
			</div>
		</div>
		<script src="statsData.js"></script>
		<script src="updateData.js"></script>
		<script src="plotChart.js"></script>
	</body>
	
</html>