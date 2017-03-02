<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Current air quality for Charlotte-Mecklenburg and beyond. This weather portal is operated by the UNC Charlotte Meteorology Program.">
		<title>Charlotte Air Quality</title>
		<link rel="stylesheet" type="text/css" href="main.css"/>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-54843224-1', 'auto');
			ga('require', 'displayfeatures');
			ga('send', 'pageview');
		</script>

	</head>
    
	<body>
		<div id="header">
        	<h1 style="margin-top:0; margin-bottom:0;text-align:center;color:#ffffff;">Current and Recent Air Quality</h1>
        </div>
		<div id="skoolLogo">
			<p align="right">
			<a href="http://www.uncc.edu/"><img id = "logoImg2" src="http://weather.uncc.edu/src/UNCC_Crown_Logo_1c.png"  width="50%" height="50%"/></a>
			</p>
		</div>
		<div id="AQIlocal" style="margin-left: 30px; margin-top: 5px">
			<p align='left' style="font-style:times; font-size: 16pt; color:#000000"><b>Garinger High School, northeast of downtown Charlotte:</b></p>
			<div id="container">				
				<iframe id="garinger" src="http://aqicn.org/city/usa/north-carolina/garinger/" scrolling="no" 
				style="-webkit-transform:scale(1.6);-moz-transform-scale(1.6);"></iframe>			
			</div>
			<div>
				<br>
				<hr style="color: #000000; margin-top: 40px">
			</div>
			<p align='left' style="font-style:times; font-size: 16pt; color:#000000"><b>Montclaire, south of downtown Charlotte:</b></p>
			<div id="container2">				
				<iframe id="montclaire" src="http://aqicn.org/city/usa/north-carolina/montclaire/" scrolling="no" 
				style="-webkit-transform:scale(1.6);-moz-transform-scale(1.6);"></iframe>
			</div>
			<div>
				<br>
				<hr style="color: #000000">
			</div>
			<div>
				<br>
				<p style="font-size:8pt;font-style:Times;color:#000000">PM2.5 is small particulate matter pollution, O3 is ground-level ozone gas pollution, and 
					PM10 is large particulate matter pollution.  Average particle pollution AQI in Charlotte is 30-60.</p>
				<p style="font-size:8pt;font-style:Times;color:#000000">All pollutants are monitored in the USA as a part of the Clean Air Act.  Some stations 
					monitor a wider variety of pollutants than others.</p>
				<p style="font-size:8pt;font-style:Times;color:#000000"><b>Contact for more information about the display:  
					Brian Magi (Faculty at UNC Charlotte).</b> Contributions to design and implementation: Keenan Reed 
					(Staff at UNC Charlotte) and Warren Pettee (Graduate Student at UNC Charlotte).  Air quality data graphs 
					are from <a href="http://waqi.info/" target="blank">http://waqi.info/</a>, with location data graphs from 
					<a href="http://aqicn.org/city/usa/north-carolina/garinger/" target="blank">http://aqicn.org/city/usa/north-carolina/garinger/</a> and  
					<a href="http://aqicn.org/city/usa/north-carolina/montclaire/" target="blank">http://aqicn.org/city/usa/north-carolina/montclaire/</a>.
					Mecklenburg County air quality data is collected and managed by staff at 
					<a href="http://airquality.charmeck.org/" target="blank">http://airquality.charmeck.org/</a>, and this data is archived at  
					<a href="http://airnowtech.org/" target="blank">http://airnowtech.org/</a>.  For detailed USA air quality discussions, 
					visit <a href="http://airnow.gov/" target="blank">http://airnow.gov/</a> and 
					<a href="http://epa.gov/" target="blank">http://epa.gov/</a>.</p>					
			</div>
			<div class="hidelogo"></div>
			<div class="hidelogo2"></div>
		</div>
		<div id="AQInonlocal" style="margin-left: 30px; margin-top: 5px">
			<p align='left' style="font-style:times; font-size: 16pt; color:#000000">In one of the most polluted cities:  <b>Beijing, China</b></p>
			<div id="container3">				
				<iframe id="beijing" src="http://aqicn.org/city/beijing/" scrolling="no" 
				style="-webkit-transform:scale(1.6);-moz-transform-scale(1.6);"></iframe><br>
			</div>
			<div>
				<p align='left' style="font-style:times; font-size: 42pt; color:#000000"></p>
				<hr style="color: #000000; margin-top: 0px; width: 730px; left: 0px">
			</div>
			<p align='left' style="font-style:times; font-size: 16pt; color:#000000"><b>Data from air quality stations around the world:</b></p>
			<div id="container4">				
				<iframe id="eastusa" src="http://aqicn.org/map/world/" scrolling="no" 
				style="-webkit-transform:scale(0.8);-moz-transform-scale(0.7);"></iframe>
			</div>
			<div class="hidelogo3"></div>
		</div>
	</body>
	</html>