<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="PRAGMA" content="NO-CACHE">
		<title>Weather Learning Lab</title>
		<!-- WEATHER LEARNING LAB: BEGINNERS ACTIVITY.
			Developed by Warren Pettee -->
		<link rel="stylesheet" type="text/css" href="pro.css"/>
		<!--Load the AJAX API-->
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		
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
	</head>
    
	<body>
		<div id="backgroundImg" style="position:absolute; z-index:-10;">
			<img src="pro_back.png" align="middle" width="100%" height="100%">
		</div>
		<div id="load_screen">
			<div id="loading" style="text-align:center;margin-left:auto;margin-right:auto;">
				<img src="../../../src/20.gif" id="loader"><br><br><i>Connecting...</i>
			</div>
		</div>
		
		<div id="masthead">
			<h1>University of North Carolina at Charlotte</h1>
			<h2>Weather Learning Lab</h2>
		</div>
		<div id="schoolLogo">
			<p align="right">
				<a href="http://www.uncc.edu/"><img id = "school" src="http://weather.uncc.edu/src/UNCC_Crown_Logo_1c.png"  width="80%" height="80%"/></a>
			</p>
		</div>
		
		<div id="content"></div>

		<div id="dialog">
			<h3>Professional</h3>
			<button type="button" onclick="return startActivity()">Start</button>
			<button type="button" onclick="return goHome()">Return</button><br>
			<p>*** NOTE *** <br> This activity is designed to be a challenge for trained meteorologists. There is help all over
				WeatherFest if you want help understanding an advanced term. If you are looking for something a little less advanced, press the 'return' button
				and try the radar activity.</p>
		</div>
		<script type="text/javascript" src="pro_activity.js"></script>
	</body>
</html>