<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="PRAGMA" content="NO-CACHE">
		<title>Weather Learning Lab</title>
		<link rel="stylesheet" type="text/css" href="lab.css"/>
		<!--Load the AJAX API-->
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="../../tabcontent.js" type="text/javascript"></script>
		
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
			<img src="youmakecall.png" align="middle" width="100%" height="100%">
		</div>
		<div id="load_screen">
			<div id="loading" style="text-align:center;margin-left:auto;margin-right:auto;">
				<img src="../../src/20.gif" id="loader"><br><br><i>Connecting...</i>
			</div>
		</div>
		
		<!--<div id="masthead">
			<h1>University of North Carolina at Charlotte</h1>
			<h2>Weather Learning Lab</h2>
		</div>-->
		<div id="schoolLogo">
			
				<a href="http://www.uncc.edu/"><img id = "school" src="UNCC_Logo_1c.png"  width="10%" height="10%"/></a>
			
		</div>
		<div id="eventLogo" style="text-align:center;">
			<img id="eventLogoPicture" src="g4275.png" width="50%"/>
		</div>


		<br>
		<div id="Buttons" style="text-align:center;">
			<br>
			<div class="blueButton"><a href="http://weather.uncc.edu/lab/public/beginner">Beginner</a></div><br><br>
			<div class="blueButton"><a href="http://weather.uncc.edu/lab/public/cloud">Cloud Identification</a></div><br><br>
			<div class="blueButton"><a href="http://weather.uncc.edu/lab/public/radar">Radar</a></div><br><br><br><br>
			
			<!--<div class="blueButton"><a href="http://weather.uncc.edu/beta/pro">Professional</a></div><br><br>--></br>
		</div>
	
	</body>
</html>