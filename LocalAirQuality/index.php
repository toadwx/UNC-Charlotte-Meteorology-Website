<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Current weather for UNC Charlotte and the greater Charlotte-Mecklenburg region. This weather portal is operated by the UNC Charlotte Meteorology Program.">
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
        <h1 style="margin-top:0; margin-bottom:0;text-align:center;color:#ffffff;">Current and Recent Air Quality in Mecklenburg County</h1>
        </div>
		<div id="skoolLogo">
			<p align="right">
			<a href="http://www.uncc.edu/"><img id = "logoImg2" src="http://weather.uncc.edu/src/UNCC_Crown_Logo_1c.png"  width="50%" height="50%"/></a>
			</p>
		</div>
		<div id="AQIlocal">
			<div style="width:80%;"/></div>
			<h2 align='center' style="color:#000000">Garinger H.S., northeast of downtown Charlotte</h2>
			<p align='center' style="color:#000000">** Temperature is not current/accurate **</p>
			<div id="container">				
				<iframe id="garinger" src="http://aqicn.org/city/usa/north-carolina/garinger/" scrolling="no" 
				style="-webkit-transform:scale(1.2);-moz-transform-scale(1.6);"></iframe><br>			
			</div>
			<div>
				<br>
			</div>
			<h2 align='center' style="color:#000000">Montclaire, south of downtown Charlotte</h2>
			<p align='center' style="color:#000000">** Temperature is not current/accurate **</p>
			<div id="container2">				
				<iframe id="montclaire" src="http://aqicn.org/city/usa/north-carolina/montclaire/" scrolling="no" 
				style="-webkit-transform:scale(1.2);-moz-transform-scale(1.6);"></iframe>
			</div>
			<div>
				<br>
			</div>
			<div>
				<p style="font-size:8pt;font-style:Arial;color:#000000"><b>Contact for more information about the display:  
					Brian Magi (Faculty at UNC Charlotte, brian dot magi at uncc dot edu).</b> Mass in ug/m3 is read as
					micrograms per cubic meter (or millionths of a gram per cubic meter) and mass in mg/m3 is read as 
					milligrams per cubic meter (or thousandths of a gram per cubic meter).  1 ug/m3 means you are breathing 
					about 100 particles per minute.  10 ug/m3 means about 1000 particles per minute.  Average in Charlotte is 
					about 8-12 ug/m3.      
					<b>Significant contributions to design and implementation:</b> Keenan Reed 
					(Staff at UNC Charlotte) and Warren Pettee (Graduate Student at UNC Charlotte).  Air quality data graphs 
					are from <a href="http://waqi.info/" target="blank">http://waqi.info/</a>, with location data graphs from 
					<a href="http://aqicn.org/city/usa/north-carolina/garinger/" target="blank">http://aqicn.org/city/usa/north-carolina/garinger/</a> and  
					<a href="http://aqicn.org/city/usa/north-carolina/montclaire/" target="blank">http://aqicn.org/city/usa/north-carolina/montclaire/</a>.
					Mecklenburg County air quality data is collected and managed by 
					staff at <a href="http://airquality.charmeck.org/" target="blank">http://airquality.charmeck.org/</a>, and this data is archived at  
					<a href="http://airnowtech.org/" target="blank">http://airnowtech.org/</a>.  For USA air quality discussions and background, 
					please visit <a href="http://airnow.gov/" target="blank">http://airnow.gov/</a> and 
					<a href="http://epa.gov/" target="blank">http://epa.gov/</a>.     
				</p>
			</div>
			<div>
				<br>
				<p style="font-size=12pt;font-style=Arial;color:#000000">Map showing where Garinger and Montclaire are:</p>
				<img src="/LocalAirQuality/meck-county-downtown-crop.png" width="500px" border="1px" style="border-color: #000000; margin-left: 15px" />
			</div>
		</div>
		<div id="AQItable">
			<div style="width:20%;float:left;"/></div>
			<h2 align='left' style="color:#000000">What the 24-hour PM2.5 AQI translates to in real units</h2>
			<div>
				<table>
					<tr>
					<td>
					<table border="2" cellspacing="2" style="width:100px; float:left;">
						<tr style="vertical-align:top; background:#036;">
						<td style="width:20%;"><strong><span style="color:#fff; font-family:arial; font-size:14pt;">AQI</span></strong></td>
						<td style="background:#036; width:41%;"><span style="color:#fff; font-family:arial; font-size:14pt;"><b>24-hour mass (ug/m3)</b></span></td>
						<td style="background:#036; width:39%;"><span style="color:#fff; font-family:arial; font-size:14pt;"><b>24-hour mass (mg/m3)</b></span></td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">4</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">1</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.001</td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">8</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">2</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.002</td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">13</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">3</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.003</td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">17</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">4</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.004</td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">21</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">5</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.005</td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">25</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">6</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.006</td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">29</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">7</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.007</td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">33</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">8</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.008</td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">38</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">9</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.009</td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">42</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">10</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.010</td>
						</tr>
						<tr style="vertical-align:center; background:#00cc00;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">46</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">11</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.011</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">50</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">12</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.012</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">53</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">13</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.013</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">55</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">14</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.014</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">57</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">15</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.015</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">59</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">16</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.016</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">61</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">17</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.017</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">64</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">18</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.018</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">66</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">19</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.019</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">68</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">20</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.020</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">70</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">21</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.021</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">72</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">22</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.022</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">74</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">23</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.023</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">76</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">24</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.024</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">78</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">25</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.025</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">80</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">26</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">0.026</td>
						</tr>
						<tr style="vertical-align:center; background:#fff000;">
						<td style="width:20%; font-size:16pt;"><span style="color:#000;">...</td>
						<td style="width:41%; font-size:16pt;"><span style="color:#000;">...</td>
						<td style="width:39%; font-size:16pt;"><span style="color:#000;">...</td>
						</tr>
				</table>
				</td>
				</tr>
			</table>				
			</div>
			<div>
				<p style="font-size:12pt;font-style:Arial;color:#000000">Typical values in Charlotte are between 20-60 AQI.</p>
			</div>
		</div>
	</body>
	</html>