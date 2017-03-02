<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="PRAGMA" content="NO-CACHE">
		<title>UNC Charlotte Wx</title>
		<link rel="stylesheet" type="text/css" href="archive.css"/>
		<!--Load the AJAX API-->
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="../tabcontent.js" type="text/javascript"></script>
		<script src="grabData.js"></script>
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
		<div id="backgroundImg" style="position:absolute; z-index:-10;">
			<img src="../res/unccwxslide.png" align="middle" width="100%" height="100%">
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
		<ul id="navtabs">
			<li id="navtab1" class="navigate"><a href="http://weather.uncc.edu/">Wx Station</a></li>
			<li id="navtab2" class="navigate"><a href="http://weather.uncc.edu/obs/">Observations</a></li>
			<li id="navtab3" class="navigate"><a href="http://weather.uncc.edu/radar/">Radar Room</a></li>
			<li id="navtab5" class="navigate"><a href="http://weather.uncc.edu/climate">Climate</a></li>
			<li id="navtab6" class="navigate"><a href="http://weather.uncc.edu/AirQuality">Air Quality</a></li>
			<li id="navtab7" class="navigate"><a href="http://weather.uncc.edu/res">Resources</a></li>
			<li id="navtab8" class="navigate"><a href="http://weather.uncc.edu/faq">Contact Us...</a></li>
		</ul>
		
		<br>
		
		<div id="stats_group2" >
			<div class="stats">
				<div class="stats_header" >
					<b>This Year</b><br>
				</div>
				<table style="width:100%">
					<tbody>
						<tr>
						<td class="stats_label">High Temp:</td>
						<td class="stats_data" id="HTyr"> </td>
						</tr>
						<tr> </tr>
						<tr>
						<td class="stats_label">Low Temp:</td>
						<td class="stats_data" id="LTyr"> </td>
						</tr>
						<tr> </tr>
						<tr>
						<td class="stats_label">Total Rain</td>
						<td class="stats_data" id="TRyr"> </td>
						</tr>
						<tr>
						<td class="stats_label">High Wind</td>
						<td class="stats_data" id="HWyr"> </td>
						</tr>
						<tr>
						<td class="stats_label">High Pressure</td>
						<td class="stats_data" id="HPyr"> </td>
						</tr>
						<tr>
						<td class="stats_label">Low Pressure</td>
						<td class="stats_data" id="LPyr"> </td>
						</tr>
				</table>
				<br>
				<div class="stats_header" >
					<b>Past 6-Months</b><br>
				</div>
				<table style="width:100%">
					<tbody>
						<tr>
						<td class="stats_label">High Temp:</td>
						<td class="stats_data" id="HT6m"> </td>
						</tr>
						<tr> </tr>
						<tr>
						<td class="stats_label">Low Temp:</td>
						<td class="stats_data" id="LT6m"> </td>
						</tr>
						<tr> </tr>
						<tr>
						<td class="stats_label">Total Rain</td>
						<td class="stats_data" id="TR6m"> </td>
						</tr>
						<tr>
						<td class="stats_label">High Wind</td>
						<td class="stats_data" id="HW6m"> </td>
						</tr>
						<tr>
						<td class="stats_label">High Pressure</td>
						<td class="stats_data" id="HP6m"> </td>
						</tr>
						<tr>
						<td class="stats_label">Low Pressure</td>
						<td class="stats_data" id="LP6m"> </td>
						</tr>
				</table>
				<br>
				<a href="data.html" class="climo">Download Data</a>
			</div>
		</div>
		
		<div id="stats_group" >
			<div class="stats">
				<div class="stats_header" >
					<b>This Week</b><br>
				</div>
				<table style="width:100%">
					<tbody>
						<tr>
						<td class="stats_label">High Temp:</td>
						<td class="stats_data" id="HTwk"> </td>
						</tr>
						<tr> </tr>
						<tr>
						<td class="stats_label">Low Temp:</td>
						<td class="stats_data" id="LTwk"> </td>
						</tr>
						<tr> </tr>
						<tr>
						<td class="stats_label">Total Rain</td>
						<td class="stats_data" id="TRwk"> </td>
						</tr>
						<tr>
						<td class="stats_label">High Wind</td>
						<td class="stats_data" id="HWwk"> </td>
						</tr>
						<tr>
						<td class="stats_label">High Pressure</td>
						<td class="stats_data" id="HPwk"> </td>
						</tr>
						<tr>
						<td class="stats_label">Low Pressure</td>
						<td class="stats_data" id="LPwk"> </td>
						</tr>
				</table>
				<br>
				<div class="stats_header" >
					<b>Past 30-Days</b><br>
				</div>
				<table style="width:100%">
					<tbody>
						<tr>
						<td class="stats_label">High Temp:</td>
						<td class="stats_data" id="HT3d"> </td>
						</tr>
						<tr> </tr>
						<tr>
						<td class="stats_label">Low Temp:</td>
						<td class="stats_data" id="LT3d"> </td>
						</tr>
						<tr> </tr>
						<tr>
						<td class="stats_label">Total Rain</td>
						<td class="stats_data" id="TR3d"> </td>
						</tr>
						<tr>
						<td class="stats_label">High Wind</td>
						<td class="stats_data" id="HW3d"> </td>
						</tr>
						<tr>
						<td class="stats_label">High Pressure</td>
						<td class="stats_data" id="HP3d"> </td>
						</tr>
						<tr>
						<td class="stats_label">Low Pressure</td>
						<td class="stats_data" id="LP3d"> </td>
						</tr>
					</tbody>
				</table>
				<br>
			</div>
		</div>
		
		<br>
		<div id="CHARTS">
			<ul class="tabs" data-persist="true">
	            <li><a href="#view1">Temp/Rain</a></li>
		    	<li><a href="#view2">Radiation</a></li>
		    	<li><a href="#view3">Winds</a></li>
		    	<li><a href="#view4">Moisture</a></li>
	        </ul>
	        <div class="tabcontents">
	            <div id="view1">
	            	<img src='../data/pyplots/2016_TempRainSummary.png' width="90%">		   
	            </div>
	   	    	<div id="view2">
	                <div id="Radchart_div"> </div>
	            </div>
		    	<div id="view3">
	                <div id="Windchart_div"> </div>
	            </div>
	            <div id="view4">
	                <div id="Moisturechart_div"> </div>
	            </div>	            
	       </div>
	    
	    <div id"staticData" >
		    <!--<input type="radio" id="r1" name="range" value="week" onclick="grabData();" checked>Week &nbsp;
			<input type="radio" id="r2" name="range" value="month" onclick="grabData();">30-Days &nbsp;
		    <input type="radio" id="r3" name="range" value="sixmonth" onclick="grabData();">6-Month &nbsp;
			<input type="radio" id="r4" name="range" value="year" onclick="grabData();">Year &nbsp;
			<!--<input type="radio" name="range" value="all">All Time &nbsp;--> <br><br>
			<!--<input type="submit" value="Submit"> -->
		</div>
		<script src="allStats.js" type="text/javascript"></script>
		<script src="chartDraw.js" type="text/javascript"></script>	
		</div>
	</body>
</html>
