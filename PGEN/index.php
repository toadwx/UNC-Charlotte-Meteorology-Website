<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

	<title>EM Support Page</title>
	<meta name="description" content="UNCC Meteorology EM Support">
	<meta name="author" content="Warren Pettee">
	
	<link rel="stylesheet" href="main.css">
</head>

<body>
	<div id="ControlPanel">
		<img id="logo" style="display:block;margin-left:auto;margin-right:auto;margin-top:10px" src="http://weather.uncc.edu/src/LogoIdea.png"  width="75%"/>
		<h4>Emergency Management Support Resources</h4>
		<button class="blueButton">Logout</button>
		<p><i>Questions? Problems? Complaints? Send to wpettee@uncc.edu</i> </p>
	</div>
	<div id="Content">
		<form action="sendForecast.php" method="post">
			
			<datalist id="weatherConditions">
				<option value="Sunny">
				<option value="Partly Sunny">
				<option value="Partly Cloudy">
				<option value="Cloudy">
				<option value="Light Rain">
				<option value="Heavy Rain">
				<option value="Thunderstorms">
				<option value="Light Snow">
				<option value="Heavy Snow">
				<option value="Sleet">
				<option value="Freezing Rain">
			</datalist>
			
			<input type="submit">&nbsp;&nbsp;<input type="checkbox" name="vehicle" value="Bike"> Download Report After?
			<ul class="tab">
				<li><a href="#" class="tablinks" onclick="openTab(event, 'basicTab')">Basic Info</a></li>
				<li><a href="#" class="tablinks" onclick="openTab(event, 'displayTab')">Wx Display</a></li>
				<li><a href="#" class="tablinks" onclick="openTab(event, 'hazardTab')">Hazard Matrix</a></li>
			</ul>
			<div id="basicTab" class="tabcontent">
			<table id="basicTable">
				<tr><th>Forecaster:</th> <td><input type="text" name="forecaster"></td><th>Code:</th><td><input type="text" name="fcode"></td></tr>
				<tr><th>Short Term Discussion:</th>  <td><textarea rows="15" cols="50" name="shortTerm"> </textarea></td></tr>
				<tr><th>Long Term Outlook:</th>  <td><textarea rows="15" cols="50" name="longTerm"> </textarea></td></tr>				
			
			</table>
			</div>
					
			<div id="displayTab" class="tabcontent">
			<table id="forecastTable">
				<tr><th> </th><th>Hi (F)</th><th>Lo (F)</th><th>Conditions</th></tr>
				<tr><th>Day 1</th><td><input type="text" name="d1Hi"></td><td><input type="text" name="d1Lo"></td><td><input list="weatherConditions" name="d1Cond"></td></tr>
				<tr><th>Day 2</th><td><input type="text" name="d2Hi"></td><td><input type="text" name="d2Lo"></td><td><input list="weatherConditions" name="d2Cond"></td></tr>
				<tr><th>Day 3</th><td><input type="text" name="d3Hi"></td><td><input type="text" name="d3Lo"></td><td><input list="weatherConditions" name="d3Cond"></td></tr>
				<tr><th>Day 4</th><td><input type="text" name="d4Hi"></td><td><input type="text" name="d4Lo"></td><td><input list="weatherConditions" name="d4Cond"></td></tr>
				<tr><th>Day 5</th><td><input type="text" name="d5Hi"></td><td><input type="text" name="d5Lo"></td><td><input list="weatherConditions" name="d5Cond"></td></tr>
			</table>
			</div>
			<div id="hazardTab" class="tabcontent">
				<h3>Hazard Matrix Forecast (EM Forecast Only)</h3>
			<table id="hazardTable">
				<tr><th colspan="24">Valid From <input id="timeStart" type="text" name="hazTimeStart" maxlength="4" size="4" style="background-color:white;"> EST to <input id="timeEnd"type="text" name="hazTimeEnd" style="background-color:white;" maxlength="4" size="4"> EST</th></tr>
				<tr>
					<th>Hour:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Wind:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Lightning:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Hail:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Tornado:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Precipitation:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Wind Chill:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Heat Index:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Snow Accumulation:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Ice Accumulation:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
		            <td bgcolor="#808080" colspan="24">&nbsp;</td>
		        </tr>
				<tr>
					<th>Temperature(F):</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Chance of Precip:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>1hr Precip Total:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Wind Gust(mph):</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Wind Speed(mph):</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
				<tr>
					<th>Wind Direction:</th>
					<td><input type="text" name="hr1" maxlength="4" size="4"></td>
					<td><input type="text" name="hr2" maxlength="4" size="4"></td>
					<td><input type="text" name="hr3" maxlength="4" size="4"></td>
					<td><input type="text" name="hr4" maxlength="4" size="4"></td>
					<td><input type="text" name="hr5" maxlength="4" size="4"></td>
					<td><input type="text" name="hr6" maxlength="4" size="4"></td>
					<td><input type="text" name="hr7" maxlength="4" size="4"></td>
					<td><input type="text" name="hr8" maxlength="4" size="4"></td>
					<td><input type="text" name="hr9" maxlength="4" size="4"></td>
					<td><input type="text" name="hr10" maxlength="4" size="4"></td>
					<td><input type="text" name="hr11" maxlength="4" size="4"></td>
					<td><input type="text" name="hr12" maxlength="4" size="4"></td>
					<td><input type="text" name="hr13" maxlength="4" size="4"></td>
					<td><input type="text" name="hr14" maxlength="4" size="4"></td>
					<td><input type="text" name="hr15" maxlength="4" size="4"></td>
					<td><input type="text" name="hr16" maxlength="4" size="4"></td>
					<td><input type="text" name="hr17" maxlength="4" size="4"></td>
					<td><input type="text" name="hr18" maxlength="4" size="4"></td>
					<td><input type="text" name="hr19" maxlength="4" size="4"></td>
					<td><input type="text" name="hr20" maxlength="4" size="4"></td>
					<td><input type="text" name="hr21" maxlength="4" size="4"></td>
					<td><input type="text" name="hr22" maxlength="4" size="4"></td>
					<td><input type="text" name="hr23" maxlength="4" size="4"></td>	
				</tr>
			</table>
			</div>
		</form>
	</div>
	<script>
		function openTab(evt, cityName) {
		    // Declare all variables
		    var i, tabcontent, tablinks;
		
		    // Get all elements with class="tabcontent" and hide them
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		
		    // Get all elements with class="tablinks" and remove the class "active"
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		
		    // Show the current tab, and add an "active" class to the link that opened the tab
		    document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active";
		}
	</script>
</body>
</html>